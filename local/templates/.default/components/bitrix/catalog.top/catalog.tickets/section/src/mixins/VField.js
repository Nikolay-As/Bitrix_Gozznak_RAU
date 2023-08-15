import {generateId} from "../utils/helpers";

export default {
    props: {
        label: {
            type: String,
        },

        required: {
            type: Boolean,
            default: false
        },

        disabled: {
            type: Boolean,
            default: false
        },

        placeholder: {
            type: String
        },

        name: {
            type: String
        },

        value: null
    },

    data: () => ({
        mainHtmlClass: "v-field",

        additionalHtmlClass: [],

        htmlId: null,

        validationError: false
    }),

    computed: {
        localValue: {
            get() {
                return this.value;
            },

            set(value) {
                this.$emit("input", value);
                this.$emit("change", value);
            }
        },

        htmlClass() {
            return [
                this.mainHtmlClass,
                this.disabled ? `${this.mainHtmlClass}--disabled` : null,
                this.validationError ? `${this.mainHtmlClass}--error` : null,
            ]
        }
    },

    mounted() {
        this.htmlId = `${this.mainHtmlClass}-${generateId()}`;
    },

    methods: {
        validate() {
            if (this.required && !this.value) {
                this.validationError = true;

                return false;
            }

            return true;
        },

        onFieldClicked() {
            this.validationError = false;
        }
    }
}
