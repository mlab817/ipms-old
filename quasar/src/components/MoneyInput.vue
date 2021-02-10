<template>
  <q-field
    v-model="money"
    :label="label"
    dense
    :readonly="readonly"
    borderless
    filled
  >
    <template v-slot:control="{ id, floatingLabel, value, emitValue }">
      <money
        :id="id"
        class="q-field__input text-right"
        :value="value"
        @input="emitValue"
        v-bind="moneyFormatForComponent"
        v-show="floatingLabel"
      />
    </template>
  </q-field>
</template>

<script>
export default {
  name: 'MoneyInput',
  props: ['value', 'label', 'readonly'],
  computed: {
    money: {
      get() {
        return this.value
      },
      set(val) {
        this.$emit('input', val)
      }
    }
  },
  data() {
    return {
      moneyFormatForComponent: {
        decimal: '.',
        thousands: ',',
        precision: 0,
        masked: false /* doesn't work with directive */
      }
    }
  }
}
</script>
