<template>
    <div :class="['v-catalog', {'v-catalog--excursions': currentTab === 1}]">
        <div class="v-catalog-inner">
            <tabs :on-select="onTabChanged">
                <tab title="Входной билет">
                    <v-date class="v-date-selector" v-model="visitDate" placeholder="Выберите дату посещения"
                            :calendar-options="calendarOptions" :key="1" @change="onDateChange"/>
                    <v-ticket-viewer v-model="orderedTickets" :items="nonExcursionItems" :disabled="visitDate === null"
                                     @change="calculateAmount"/>
                </tab>

                <tab title="Экскурсии">
                    <v-date class="v-date-selector" v-model="visitDate" placeholder="Выберите дату посещения"
                            :calendar-options="calendarOptions" :key="2" @change="onDateChange"/>
                    <v-excursion-viewer v-model="orderedTickets" :items="excursionItems" :disabled="visitDate === null"
                                        :date="visitDate"
                                        @change="calculateAmount"/>
                </tab>
            </tabs>
        </div>

        <v-order-info :items="tickets" :tickets="orderedTickets" btn-text="Забронировать билеты" v-if="totalTickets > 0"
                      :visit-time-items="visitTimeItems" v-model="visitTime" @submit="handleSubmit" :is-excursion="this.currentTab === 1"/>

        <v-modal v-model="showModal" title="Забронировать билеты">
            <template slot="body">
                <div class="v-form">
                    <div class="v-form-text">
                        Введите ваш e-mail и мы отправим вам на почту номер брони.
                    </div>

                    <div class="v-form-input">
                        <v-text type="email" v-model="email" name="email" label="Введите ваш e-mail"
                                placeholder="ivanov.ivan@mail.ru"/>
                    </div>

                    <terms-of-purchase/>

                    <div class="v-form-btn">
                        <button class="v-btn v-btn--lg v-btn--primary" :disabled="isSendBtnDisabled" @click="sendOrder">
                            Отправить
                        </button>
                    </div>
                </div>
            </template>
        </v-modal>
    </div>
</template>

<script>
    import { Tabs, Tab } from 'vue-slim-tabs';
    import VTicketViewer from './VTicketViewer.vue';
    import VExcursionViewer from './VExcursionViewer.vue';
    import { VDate } from './UI';
    import VOrderInfo from './VOrderInfo.vue';
    import VModal from './VModal';
    import VText from './UI/VText';
    import TermsOfPurchase from './TermsOfPurchase';
    import axios from 'axios';
    import { removeObservation } from '../utils/observation';

    export default {
        name: 'VCatalog',

        components: {
            TermsOfPurchase,
            VText,
            VModal,
            Tabs,
            Tab,
            VTicketViewer,
            VExcursionViewer,
            VDate,
            VOrderInfo,
        },

        props: {
            items: {
                type: Array,
                default: () => [],
            },

            calendarOptions: {
                type: Object,
            },

            visitTimeItems: {
                type: Array,
                default: () => [],
            },

            siteId: {
                type: String,
                required: true,
            },
        },

        data: () => ({
            orderedTickets: {},
            visitDate: null,
            totalTickets: 0,
            visitTime: null,
            currentTab: 0,
            showModal: false,
            email: '',
            sendBtnDisabled: false,
            excursionId: -1,
            excursions: [],
            excursionCalendarOptions: {},
            tickets: [],
        }),

        computed: {
            nonExcursionItems () {
                return this.items.filter(
                    item => !item.DISPLAY_PROPERTIES.hasOwnProperty('EXCURSION') && !Array.isArray(item.PRICES) &&
                        item.PRICES.hasOwnProperty('BASE'));
            },

            excursionItems () {
                return this.excursions.map(excursion => {
                    let start = excursion.StartTime.split(':');
                    let end = excursion.EndTime.split(':');

                    let duration = (end[0] - start[0]) * 60 + (end[1] - start[1]);

                    return {
                        id: excursion.IDExcursions,
                        name: excursion.NameExcursions + ' ' + excursion.Date + ' ' + excursion.StartTime,
                        description: '',
                        picture: '',
                        excursion: true,
                        items: this.tickets.filter(item => item.ID === excursion.IDExcursions),
                        quantity: excursion.Quantity,
                        duration: duration,
                        date: excursion.Date,
                    };
                });
            },

            isSendBtnDisabled () {
                const reg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return this.sendBtnDisabled || this.email.length === 0 || !reg.test(String(this.email).toLowerCase());
            },

            isExcursion() {
                return this.currentTab === 1;
            }
        },

        async mounted () {
            this.tickets = this.items
            await this.fetchExcursions();
        },

        methods: {
            calculateAmount (excursionId) {
                if (excursionId) {
                    this.excursionId = excursionId;
                }

                let amount = 0;

                for (let ticketId in this.orderedTickets) {
                    amount += this.orderedTickets[ticketId].amount;
                }

                this.totalTickets = amount;
            },

            onTabChanged (event, index) {
                if (index === this.currentTab) {
                    return;
                }

                this.currentTab = index;
                this.orderedTickets = {};
                this.totalTickets = 0;
                this.visitTime = null;
                this.visitDate = null;
                this.excursionId = -1;
            },

            handleSubmit () {
                this.showModal = true;
            },

            async fetchExcursions (date) {
                let excursions = (await axios.get('/local/ajax/excursions.php', {
                    params: {
                        date,
                    },
                })).data;

                this.tickets = this.tickets.filter(item => !item.excursion)
                .concat(
                    excursions.map(excursion => {
                        return {
                            ID: excursion.IDExcursions,
                            NAME: 'Билет на экскурсию',
                            PREVIEW_TEXT: 'Museum admission ticket',
                            excursion: true,
                            VISIT_TIME: excursion.StartTime + ' - ' + excursion.EndTime,
                            PRICES: {
                                BASE: {
                                    DISCOUNT_VALUE: '250'
                                }
                            }
                        }
                    })
                )
                this.excursions = excursions
            },

            onDateChange (value) {
                if (!value) {
                    for (let ticketId in this.orderedTickets) {
                        this.orderedTickets[ticketId].amount = 0;
                    }

                    this.calculateAmount();
                }

                this.fetchExcursions(value);
            },

            sendOrder () {
                let data = {
                    VISIT_DATE: this.visitDate,
                    VISIT_TIME: this.visitTime,
                    EMAIL: this.email,
                    SITE_ID: this.siteId,
                    EXCURSION_ID: this.excursionId,
                    ITEMS: {},
                };

                for (let ticketId in this.orderedTickets) {
                    if (this.orderedTickets[ticketId].amount > 0) {
                        data.ITEMS[ticketId] = this.orderedTickets[ticketId].amount;

                        for(let ticket of this.tickets) {
                            if(ticket.ID === ticketId) {
                                data.NAME = ticket.NAME
                                if(ticket.excursion) {
                                    data.VISIT_TIME = ticket.VISIT_TIME;
                                }
                            }
                        }
                    }

                }

                this.sendBtnDisabled = true;

                axios.post('/local/ajax/order_handler.php', data).then((response) => {
                    if (response.data.type === 'success') {
                        window.location.href = '/info/order_ticket/order_create/?order_id=' +
                            response.data.data.orderId;
                    }

                    if (response.data.type === 'error') {
                        window.location.href = '/info/order_ticket/order_create/error.php';
                    }
                });
            },
        },
    };
</script>
