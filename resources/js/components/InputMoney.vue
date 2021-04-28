<template>
    <div>
        <input type="hidden" :value="convertInputToNumber(displayValue)" :name="$attrs.name">
        <input type="text" v-model.lazy="displayValue" v-money="money" :class="$attrs.class">
    </div>
</template>

<script>
import { VMoney } from 'v-money'

export default {
    props: {
        initialValue: {
            type: [Number, String],
            default: 0
        },
    },

    inheritAttrs: false,

    data () {
        return {
            displayValue: 0,
            money: {
                decimal: '.',
                thousands: ',',
                prefix: '',
                suffix: '',
                precision: 0
            }
        }
    },

    directives: {
        money: VMoney
    },

    methods: {
        convertInputToNumber(value) {
            if (value) {
                const thousandFixed = value.replace(/[^\d\.\-]/g, "")

                return parseFloat(thousandFixed);
            }
            return 0;
        }
    },

    mounted() {
        this.displayValue = this.initialValue
        console.log(this.displayValue)
    }
}
</script>
