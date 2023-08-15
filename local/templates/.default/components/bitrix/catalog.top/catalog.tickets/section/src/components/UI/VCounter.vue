<template>
  <div class="v-counter">
    <div class="v-counter-inner">
      <span :class="['v-counter-action', {'v-counter-action__disabled': disabled || inputValue === min}]"
            @click="minusValue(step)">&minus;</span>
      <input class="v-counter-input" v-model.lazy="inputValue" :placeholder="min" size="1" @blur="handleBlur($event)"
             @keypress="handleKeypress($event)" maxlength="3" :disabled="disabled"/>
      <span :class="['v-counter-action', {'v-counter-action__disabled': disabled || inputValue === max}]"
            @click="plusValue(step)">&plus;</span>
    </div>

    <div class="v-counter-message" v-if="showMaxCountMessage">
      <div class="v-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
          <path d="M7.68002 0.940841L11.7006 7.45148C12.2784 8.38657 11.9946 9.61683 11.0664 10.199C10.7549 10.3951 10.3918 10.4996 10.0206 10.5H1.97881C0.886202 10.5 0 9.60749 0 8.50557C0 8.13281 0.1038 7.76823 0.298801 7.45148L4.32001 0.940841C4.89721 0.00575069 6.11762 -0.280668 7.04582 0.301503C7.30262 0.462504 7.51982 0.681256 7.68002 0.940841ZM6.00002 8.16665C6.15915 8.16665 6.31176 8.10519 6.42428 7.99579C6.5368 7.8864 6.60002 7.73802 6.60002 7.58331C6.60002 7.4286 6.5368 7.28023 6.42428 7.17083C6.31176 7.06143 6.15915 6.99997 6.00002 6.99997C5.84089 6.99997 5.68827 7.06143 5.57575 7.17083C5.46323 7.28023 5.40002 7.4286 5.40002 7.58331C5.40002 7.73802 5.46323 7.8864 5.57575 7.99579C5.68827 8.10519 5.84089 8.16665 6.00002 8.16665ZM6.00002 2.91661C5.84089 2.91661 5.68827 2.97807 5.57575 3.08746C5.46323 3.19686 5.40002 3.34523 5.40002 3.49994V5.8333C5.40002 5.98801 5.46323 6.13638 5.57575 6.24578C5.68827 6.35518 5.84089 6.41663 6.00002 6.41663C6.15915 6.41663 6.31176 6.35518 6.42428 6.24578C6.5368 6.13638 6.60002 5.98801 6.60002 5.8333V3.49994C6.60002 3.34523 6.5368 3.19686 6.42428 3.08746C6.31176 2.97807 6.15915 2.91661 6.00002 2.91661Z"
                fill="#EB5757"/>
        </svg>
      </div>

      <div class="v-counter-message__text">
        {{maxCountMessage}}
      </div>
    </div>
  </div>
</template>

<script>
    export default {
        name: "VCounter",

        props: {
            min: {
                type: Number,
                default: 0
            },

            max: {
                type: Number,
                default: Infinity
            },

            step: {
                type: Number,
                default: 1
            },

            maxCountMessage: {
                type: String
            },

            disabled: {
                type: Boolean,
                default: false
            },

            value: {
                type: Number | String
            }
        },

        computed: {
            inputValue: {
                get() {
                    return this.value;
                },
                set(value) {
                    this.$emit("input", value);
                    this.$emit("change", value);
                }
            },

            showMaxCountMessage() {
                return this.inputValue === this.max;
            }
        },

        methods: {
            minusValue(value) {
                if (this.disabled) return;

                const newValue = this.inputValue - value;

                if (newValue < this.min) {
                    this.inputValue = this.min;
                } else {
                    this.inputValue = newValue;
                }
            },

            plusValue(value) {
                if (this.disabled) return;

                const newValue = this.inputValue + value;

                if (newValue > this.max) {
                    this.inputValue = this.max;
                } else {
                    this.inputValue = newValue;
                }
            },

            handleBlur(event) {
                const value = parseInt(event.target.value);

                if (isNaN(value) || typeof value === "string") {
                    this.inputValue = 0;
                } else {
                    this.inputValue = value;
                }

                if (value > this.max) {
                    this.inputValue = this.max;
                }

                if (value < this.min) {
                    this.inputValue = this.min;
                }
            },

            handleKeypress(event) {
                if (event.code === "Enter") {
                    event.preventDefault();
                } else {
                    this.isNumber(event);
                }
            },

            isNumber: function (event) {
                event = (event) ? event : window.event;
                const charCode = (event.which) ? event.which : event.keyCode;
                if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
                    event.preventDefault();
                } else {
                    return true;
                }
            }
        }
    }
</script>