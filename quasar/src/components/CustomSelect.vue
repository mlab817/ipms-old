<template>
  <q-select
    v-model="model"
    :options="options"
    :placeholder="placeholder ? placeholder : void 0"
    :label="label"
    :stack-label="!!label"
    filled
    borderless
    dense
    square
    emit-value
    map-options
    class="col" />
</template>

<script>
export default {
  name: 'CustomSelect',
  props: ['value', 'label', 'options', 'placeholder'],
  computed: {
    model: {
      get() {
        return this.value
      },
      set(val) {
        this.$emit('input', val)
      }
    }
  }
}
</script>
