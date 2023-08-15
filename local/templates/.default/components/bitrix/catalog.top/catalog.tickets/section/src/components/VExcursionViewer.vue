<template>
    <div class="v-excursion-viewer">
        <div class="v-excursion-viewer__items">
            <div :class="['v-excursion-viewer__item', {'v-excursion-viewer__item--active': item.active}]"
                 v-for="item in filteredItems" :key="item.id">
                <div class="v-excursion-viewer__item-header" @click="item.active = !item.active">
                    <div class="v-excursion-viewer__item-header-background-wrap" v-if="item.picture">
                        <div class="v-excursion-viewer__item-header-background"
                             :style="{'background-image': `url(${item.picture})`}"></div>
                    </div>

                    <div class="v-excursion-viewer__item-name">{{item.name}}</div>
                    <div class="v-excursion-viewer__item-meta">
                        <div class="v-excursion-viewer__item-duration" v-if="item.duration">
                            <div class="v-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15"
                                     fill="none">
                                    <path fill="white" opacity="0.5"
                                          d="M7.97314 0.617981C4.11224 0.617981 0.981689 3.78757 0.981689 7.69663C0.981689 11.6057 4.11224 14.7753 7.97314 14.7753C11.834 14.7753 14.9646 11.6057 14.9646 7.69663C14.9646 3.78757 11.834 0.617981 7.97314 0.617981ZM10.7276 9.87236L10.2813 10.4886C10.2716 10.502 10.2593 10.5133 10.2453 10.522C10.2312 10.5306 10.2156 10.5363 10.1994 10.5388C10.1831 10.5413 10.1666 10.5405 10.1506 10.5365C10.1347 10.5325 10.1197 10.5253 10.1065 10.5154L7.52525 8.6099C7.50917 8.5982 7.4961 8.58277 7.48714 8.5649C7.47818 8.54703 7.47359 8.52724 7.47375 8.50719V4.1573C7.47375 4.08778 7.52993 4.0309 7.5986 4.0309H8.34925C8.41791 4.0309 8.47409 4.08778 8.47409 4.1573V8.06794L10.6995 9.69697C10.7557 9.73647 10.7682 9.81548 10.7276 9.87236Z"/>
                                </svg>
                            </div>
                            <span>{{item.duration}} {{vDeclOfNum(item.duration, ['минута', 'минуты', 'минут'])}}</span>
                        </div>

                        <div class="v-excursion-viewer__item-collapse-btn" v-if="item.active">
                            <span>Свернуть</span>
                        </div>
                    </div>
                </div>

                <transition-expand>
                    <div class="v-excursion-viewer__tickets-wrapper" v-if="item.active">
                        <div class="v-excursion-viewer__tickets">
                            <v-ticket-viewer v-model="viewerData" :items="item.items" :disabled="disabled"
                                             @change="onChange(item.id)" :max="item.quantity"/>
                        </div>
                    </div>
                </transition-expand>

            </div>
        </div>
    </div>
</template>

<script>
    import { declOfNum } from '../utils/words';
    import VTicketViewer from './VTicketViewer.vue';
    import VViewer from '../mixins/VViewer';
    import TransitionExpand from './TransitionExpand.vue';
    import { removeObservation } from '../utils/observation';

    export default {
        name: 'VExcursionViewer',

        mixins: [VViewer],

        components: {
            VTicketViewer,
            TransitionExpand,
        },

        props: {
            date: {
                type: String,
            },
        },

        data: () => ({
            orderedTickets: {},

            modifiedItems: [],
        }),

        computed: {
            filteredItems () {
                return this.modifiedItems;
            },
        },

        mounted () {
            this.prepareData();
        },
        watch: {
            items () {
                this.prepareData();
            },
        },

        methods: {
            prepareData () {
                this.modifiedItems = this.items.map(item => {
                    item.active = false;

                    return item;
                });
            },

            vDeclOfNum (number, titles) {
                return declOfNum(number, titles);
            },

            onChange (id) {
                this.changeExcursion(id);
                this.$emit('change', id);
            },

            /**
             * Смена экскурсии. Обнуляем количество билетов других экскурсий.
             *
             * @param id Идентификатор новой экскурсии.
             */
            changeExcursion (id) {
                const excursion = this.items.find(item => item.id === id);

                if (!excursion) {
                    return;
                }

                let itemIds = [];

                excursion.items.forEach(item => {
                    itemIds.push(parseInt(item.ID));
                });

                for (let _id in this.viewerData) {
                    if (!itemIds.includes(parseInt(_id))) {
                        this.viewerData[_id].amount = 0;
                        this.viewerData[_id].order = -1;
                    }
                }
            }
        }
    }
</script>
