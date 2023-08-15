<template>
  <div :class="[htmlClass, additionalHtmlClass]">
    <label :class="`${mainHtmlClass}-label`" :for="htmlId" v-if="label">{{label}}</label>

    <select :class="`${mainHtmlClass}-control`" :id="htmlId" v-model="localValue" :disabled="disabled"
            :aria-disabled="disabled" @click="onFieldClicked">
      <option value="undefined" v-if="placeholder && localValue === undefined" disabled hidden>{{placeholder}}</option>
      <option value="null" v-if="placeholder && localValue === null" disabled hidden>{{placeholder}}</option>
      <option :value="item.id" v-for="(item, index) in items" :key="index">
        {{item.value}}
      </option>
    </select>

    <div :class="`${mainHtmlClass}-error-message`" v-if="validationError">
      <div class="v-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
          <path d="M7.68002 0.940841L11.7006 7.45148C12.2784 8.38657 11.9946 9.61683 11.0664 10.199C10.7549 10.3951 10.3918 10.4996 10.0206 10.5H1.97881C0.886202 10.5 0 9.60749 0 8.50557C0 8.13281 0.1038 7.76823 0.298801 7.45148L4.32001 0.940841C4.89721 0.00575069 6.11762 -0.280668 7.04582 0.301503C7.30262 0.462504 7.51982 0.681256 7.68002 0.940841ZM6.00002 8.16665C6.15915 8.16665 6.31176 8.10519 6.42428 7.99579C6.5368 7.8864 6.60002 7.73802 6.60002 7.58331C6.60002 7.4286 6.5368 7.28023 6.42428 7.17083C6.31176 7.06143 6.15915 6.99997 6.00002 6.99997C5.84089 6.99997 5.68827 7.06143 5.57575 7.17083C5.46323 7.28023 5.40002 7.4286 5.40002 7.58331C5.40002 7.73802 5.46323 7.8864 5.57575 7.99579C5.68827 8.10519 5.84089 8.16665 6.00002 8.16665ZM6.00002 2.91661C5.84089 2.91661 5.68827 2.97807 5.57575 3.08746C5.46323 3.19686 5.40002 3.34523 5.40002 3.49994V5.8333C5.40002 5.98801 5.46323 6.13638 5.57575 6.24578C5.68827 6.35518 5.84089 6.41663 6.00002 6.41663C6.15915 6.41663 6.31176 6.35518 6.42428 6.24578C6.5368 6.13638 6.60002 5.98801 6.60002 5.8333V3.49994C6.60002 3.34523 6.5368 3.19686 6.42428 3.08746C6.31176 2.97807 6.15915 2.91661 6.00002 2.91661Z"
                fill="#EB5757"/>
        </svg>
      </div>

      <div :class="`${mainHtmlClass}-error-message__text`">
        {{errorMessage}}
      </div>
    </div>
  </div>
</template>

<script>
    import VField from "../../mixins/VField";

    export default {
        name: "VDropdown",

        mixins: [VField],

        props: {
            items: {
                type: Array,
                default: () => []
            },

            placeholder: {
                type: String,
                default: "Выберите значение"
            },

            errorMessage: {
                type: String
            }
        },

        mounted() {
            this.additionalHtmlClass = this.additionalHtmlClass.concat(["v-dropdown"]);

            if (!this.localValue) {
                this.localValue = null;
            }
        }
    }
</script>
