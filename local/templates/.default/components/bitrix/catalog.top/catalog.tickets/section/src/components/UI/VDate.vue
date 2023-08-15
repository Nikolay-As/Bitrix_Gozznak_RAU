<template>
  <div :class="[htmlClass, additionalHtmlClass]">
    <label :class="`${mainHtmlClass}-label`" :for="htmlId" v-if="label">{{label}}</label>

    <v-date-picker v-model="date" locale="ru" :popover="{ visibility: 'click' }" :min-date="localOptions.minDate"
                   :disabled-dates="localOptions.disabledDates" :available-dates="localOptions.availableDates"
                   @input="dateSelected"
                   class="vc-wrapper">
      <div :class="`${mainHtmlClass}-control-wrapper`">
        <span class="v-icon">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13.23 1.92H10.5V0.88C10.5 0.8085 10.4415 0.75 10.37 0.75H9.46C9.3885 0.75 9.33 0.8085 9.33 0.88V1.92H5.17V0.88C5.17 0.8085 5.1115 0.75 5.04 0.75H4.13C4.0585 0.75 4 0.8085 4 0.88V1.92H1.27C0.982375 1.92 0.75 2.15237 0.75 2.44V13.23C0.75 13.5176 0.982375 13.75 1.27 13.75H13.23C13.5176 13.75 13.75 13.5176 13.75 13.23V2.44C13.75 2.15237 13.5176 1.92 13.23 1.92ZM12.58 12.58H1.92V6.405H12.58V12.58ZM1.92 5.3V3.09H4V3.87C4 3.9415 4.0585 4 4.13 4H5.04C5.1115 4 5.17 3.9415 5.17 3.87V3.09H9.33V3.87C9.33 3.9415 9.3885 4 9.46 4H10.37C10.4415 4 10.5 3.9415 10.5 3.87V3.09H12.58V5.3H1.92Z"
                    fill="#D1C9B3" stroke="#D1C9B3" stroke-width="0.06"/>
            </svg>
        </span>

        <input :id="htmlId" readonly :class="[`${mainHtmlClass}-control`]" type="text" v-model="localValue"
               @change="datePrinted" :disabled="disabled" :aria-disabled="disabled" :placeholder="placeholder">
      </div>
    </v-date-picker>
  </div>
</template>

<script>
    import VField from "../../mixins/VField";
    import VDatePicker from "v-calendar/lib/components/date-picker.umd";
    import {getDateValues} from "../../utils/date";
    import {removeObservation} from "../../utils/observation";

    export default {
        name: "VDate",

        mixins: [VField],

        components: {
            VDatePicker
        },

        props: {
            calendarOptions: {
                type: Object
            }
        },

        data: () => ({
            date: null,
            localOptions: {}
        }),

        mounted() {
            this.additionalHtmlClass = this.additionalHtmlClass.concat(["v-date"]);
            this.date = this.parseDateString(this.localValue);
            this.localOptions = this.prepareOptions(this.calendarOptions);
        },

        methods: {
            parseDateString(date) {
                if (!date) {
                    return null;
                }

                try {
                    return new Date(date.replace(/(\d{2})\/(\d{2})\/(\d{4})/, "$1/$2/$3"));
                } catch {
                    return null;
                }
            },

            dateSelected(value) {
                if (!value) {
                    this.localValue = null;
                    return;
                }

                const {day, month, year} = getDateValues(value);

                this.localValue = `${day}.${month}.${year}`;
            },

            datePrinted() {
                this.date = this.parseDateString(this.localValue);
            },

            prepareOptions(options) {
                let _options = removeObservation(options);

                if (_options.hasOwnProperty("disabledDates")) {
                    if (_options.disabledDates.hasOwnProperty("weekdays")) {
                        _options.disabledDates.weekdays = _options.disabledDates.weekdays.map(day => {
                            return parseInt(day);
                        })
                    }

                    _options.disabledDates = this.obj2Array(_options.disabledDates);
                }

                if (_options.hasOwnProperty("availableDates")) {
                    if (_options.availableDates.hasOwnProperty("weekdays")) {
                        _options.availableDates.weekdays = _options.availableDates.weekdays.map(day => {
                            return parseInt(day);
                        })
                    }

                    _options.availableDates = this.obj2Array(_options.availableDates);
                }

                return _options;
            },

            obj2Array(obj) {
                let tmpArray = [];

                for (let key in obj) {
                    const _key = parseInt(key);

                    if (typeof _key === "number" && !isNaN(_key)) {
                        tmpArray.push(obj[key]);
                    } else {
                        let tmpObj = {};
                        tmpObj[key] = obj[key];
                        tmpArray.push(tmpObj)
                    }
                }

                return tmpArray;
            }
        }
    }
</script>
