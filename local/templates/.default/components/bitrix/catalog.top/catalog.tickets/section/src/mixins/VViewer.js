export default {
    props: {
        items: {
            type: Array,
            default: () => []
        },

        disabled: {
            type: Boolean,
            default: false
        },

        value: {
            type: Object
        }
    },

    computed: {
        viewerData: {
            get() {
                return this.value;
            },

            set(value) {
                this.$emit("input", value);
            }
        }
    }
}