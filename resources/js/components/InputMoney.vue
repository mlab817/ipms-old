<template>
    <div>
        value: {{ numberValue }} <br/> new value: {{ displayValue }}
        <input type="hidden" :value="numberValue" :name="$attrs.name">
        <input type="text" v-model.lazy="displayValue" :class="classes">
    </div>
</template>

<script>
// import { VMoney } from 'v-money'

export default {
    props: {
        value: {
            type: [Number, String],
            default: 0
        },
        type: {
            type: String,
            default: 'text'
        }
    },

    inheritAttrs: false,

    computed: {
        classes() {
            return this.$attrs.class + 'text-right'
        },

        displayValue: {
            get() {
                return this.$props.value
            },
            set(val) {
                this.$emit('update:modelValue', val)
            }
        },

        numberValue() {
            this.convertInputToNumber(this.displayValue)
        }
    },

    emits: ['update:modelValue'],

    mounted() {
        console.log(this.$props.value)
    },

    // data () {
    //     return {
    //         money: {
    //             decimal: '.',
    //             thousands: ',',
    //             prefix: '',
    //             suffix: '',
    //             precision: 2
    //         }
    //     }
    // },
    //
    // directives: {
    //     money: VMoney
    // },
    //
    methods: {
        convertInputToNumber(value) {
            const thousandFixed = value
                .replace(/(kr|\$|£|€)/g, '') // getting rid of currency
                .trim()
                .replace(/(.+)[.,](\d+)$/g, "$1x$2") // stripping number into $1: integer and $2: decimal part and putting it together with x as decimal point
                .replace(/[.,]/g, '') // getting rid of . AND ,
                .replace('x', '.'); // replacing x with .

            return parseFloat(thousandFixed);
        }
    }
}
</script>
