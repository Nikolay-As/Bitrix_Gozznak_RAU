<template>
  <div :class="['v-order-info', {'v-order-info--dark': dark}]">
    <div class="v-order-info__time" v-if="visitTimeItems.length > 0 && !isExcursion">
      <v-dropdown ref="visitTimeDropdown" label="Выберите время посещения" placeholder="не выбрано"
                  v-model="visitTime" :items="visitTimeItems" error-message="Необходимо указать время посещения"
                  required/>
    </div>

    <div class="v-order-info__products">
      <div class="v-order-info__product" v-for="ticket in getTicketsInfo()" :key="ticket.id">
        <div class="v-order-info__product-name">{{ticket.name}}</div>
        <div class="v-order-info__product-price">{{ticket.amount}} x {{ticket.price}} ₽</div>
      </div>
    </div>

    <div class="v-order-info__total">
      <span>Итого</span>
      <div class="v-order-info__total-price">
        <span class="v-order-info__total-price-value">{{total}}</span>
        <span class="v-order-info__total-price-currency-symbol currency-ruble">e</span>
      </div>
    </div>

    <div class="v-order-info__btn" v-if="btnText">
      <button class="v-btn v-btn--primary v-btn__block" @click="submitOrder">{{btnText}}</button>

      <div class="v-order-info__information-text">
        <terms-of-purchase/>
      </div>
    </div>
  </div>
</template>

<script>
    import {VDropdown} from "./UI";
    import TermsOfPurchase from "./TermsOfPurchase";

    export default {
        name: "VOrderInfo",

        components: {
            TermsOfPurchase,
            VDropdown
        },

        props: {
            /**
             * Элементы, полученные из Bitrix.
             */
            items: {
                type: Array,
                required: true,
                default: () => []
            },

            tickets: {
                type: Object
            },

            btnText: {
                type: String
            },

            visitTimeItems: {
                type: Array,
                default: () => []
            },

          isExcursion: {
              type: Boolean
          },

            /**
             * Время посещения
             */
            value: null
        },

        data: () => ({
            windowWidth: 0
        }),

        computed: {
            total() {
                const ticketsInfo = this.getTicketsInfo();
                let total = 0;

                ticketsInfo.forEach(ticket => {
                    total += ticket.amount * ticket.price;
                });

                return total;
            },

            visitTime: {
                get() {
                    return this.value;
                },

                set(value) {
                    this.$emit("input", value);
                }
            },

            dark() {
                return this.windowWidth < 992;
            }
        },

        mounted() {
            this.$nextTick(() => {
                this.onResize();
                window.addEventListener('resize', this.onResize);
            })
        },

        methods: {
            getTicketsInfo() {
                let ticketsInfo = [];

                for (let ticketId in this.tickets) {
                    const ticketInfo = this.getTicketInfo(ticketId);

                    if (this.tickets[ticketId].amount > 0) {
                        ticketsInfo.push({
                            id: ticketId,
                            name: ticketInfo.NAME,
                            price: ticketInfo.PRICES.BASE.DISCOUNT_VALUE,
                            amount: this.tickets[ticketId].amount,
                            order: this.tickets[ticketId].order
                        });
                    }
                }

                ticketsInfo.sort((a, b) => {
                    return a.order > b.order ? 1 : -1;
                });

                return ticketsInfo;
            },

            getTicketInfo(id) {
                return this.items.find(item => item.ID === id);
            },

            submitOrder() {
                if (this.isExcursion || this.$refs.visitTimeDropdown.validate()) {
                    this.$emit("submit");
                }
            },

            onResize() {
                this.windowWidth = window.innerWidth || document.documentElement.clientWidth ||
                    document.body.clientWidth;
            }
        }
    }
</script>
