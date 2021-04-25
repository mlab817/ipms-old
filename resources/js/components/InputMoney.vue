<template>
    value: {{ value }} <br/> new value: {{ displayValue }}
    <input type="text" :value="displayValue" @input="$emit('update:modelValue', $event.target.value)" :class="classes" :name="$attrs.name">
</template>

<script>
// import { VMoney } from 'v-money'

export default {
    props: {
        value: [Number, String]
    },

    // props: {
    //     value: {
    //         type: String,
    //         default: 0
    //     }
    // },

    // inheritAttrs: false,

    // emits: ['update:value'],
    //
    computed: {
        classes() {
            return this.$attrs.class + 'text-right'
        },
        displayValue: {
            get() {
                console.log('get value')
                return this.$props.value
            },
            set(val) {
                console.log('set value', val)
                this.$emit('update:modelValue', val)
            }
        }
    },

    mounted() {
        console.log(this.$props.value)
    }
    //

    // },
    //
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
    // methods: {
    //     convertInputToNumber(value) {
    //         const thousandFixed = value
    //             .replace(/(kr|\$|£|€)/g, '') // getting rid of currency
    //             .trim()
    //             .replace(/(.+)[.,](\d+)$/g, "$1x$2") // stripping number into $1: integer and $2: decimal part and putting it together with x as decimal point
    //             .replace(/[.,]/g, '') // getting rid of . AND ,
    //             .replace('x', '.'); // replacing x with .
    //
    //         return parseFloat(thousandFixed);
    //     }
    // }
}
</script>
