<template>
  <div class="v-ticket-viewer">
    <div class="v-ticket-viewer-header">
      <div class="v-ticket-viewer-header__column column__type">Тип билета</div>
      <div class="v-ticket-viewer-header__column column__price">Цена</div>
      <div class="v-ticket-viewer-header__column column__count">Количество</div>
    </div>

    <div class="v-ticket-row" v-for="(item,index) in items" :key="index">
      <div class="v-ticket-column v-ticket-info">
        <div class="v-ticket-name">{{item.NAME}}</div>
        <div class="v-ticket-preview-text">{{item.PREVIEW_TEXT}}</div>
      </div>

      <div class="v-ticket-column v-ticket-price">
        <span class="v-ticket-price__value">{{item.PRICES.BASE.DISCOUNT_VALUE}}</span> <span
              class="v-ticket-price__currency-symbol currency-ruble">e</span>
      </div>

      <div class="v-ticket-column v-ticket-counter">
        <v-counter v-model="viewerData[item.ID].amount" @change="amountChanged($event,item.ID)" :max="max"
                   max-count-message="Достигнут лимит приобретаемых билетов" v-if="viewerData[item.ID]"
                   :disabled="disabled"/>
      </div>
    </div>
  </div>
</template>

<script>
    import {VCounter} from "./UI";
    import VViewer from "../mixins/VViewer";
    import {removeObservation} from "../utils/observation";

    export default {
        name: "VTicketViewer",

        mixins: [VViewer],

      props: {
        max: {
          type: Number,
          default: () => 5
        }
      },

        components: {
            VCounter
        },

        mounted() {
            setTimeout(() => {
                this.prepareData();
            })
        },

        methods: {
            prepareData() {
                let values = removeObservation(this.viewerData);

                this.items.forEach(item => {
                    if (!values.hasOwnProperty(item.ID)) {
                        values[item.ID] = {
                            amount: 0,
                            order: -1
                        };
                    }
                });

                this.$set(this, "viewerData", values);
            },

            amountChanged(value, id) {
                this.$emit("change");

                if (this.viewerData[id].order !== -1 && value > 0) {
                    return;
                }

                if (value === 0) {
                    this.viewerData[id].order = -1;
                } else {
                    let maxOrder = -1;

                    for (let i in this.viewerData) {
                        if (i !== id && this.viewerData[i].order > maxOrder) {
                            maxOrder = this.viewerData[i].order;
                        }
                    }

                    this.viewerData[id].order = maxOrder + 1;
                }
            }
        }
    }
</script>