<template>
  <div :class="[htmlClass, additionalHtmlClass]">
    <label :class="`${mainHtmlClass}-label`" :for="htmlId" v-if="label">{{label}} <span
            v-if="required">(required)</span></label>
    <input :id="htmlId" :class="controlHtmlClass" :type="type" :name="name" v-model="localValue" :disabled="disabled"
           :aria-disabled="disabled" :placeholder="placeholder">
  </div>
</template>

<script>
    import VField from "../../mixins/VField";

    export default {
        name: "VText",

        mixins: [VField],

        props: {
            rtl: {
                type: Boolean,
                default: false
            },

            type: {
                type: String,
                default: "text"
            }
        },

        mounted() {
            this.additionalHtmlClass = this.additionalHtmlClass.concat(["v-text"]);
        },

        computed: {
            controlHtmlClass() {
                let extraClass = {};
                extraClass[`${this.mainHtmlClass}-control--rtl`] = this.rtl;

                return [`${this.mainHtmlClass}-control`, extraClass];
            }
        }
    }
</script>
