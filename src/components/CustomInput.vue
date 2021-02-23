<template>
  <q-input
    square
    dense
    v-model="model"
    :type="!type ? 'text' : type"
    :placeholder="placeholder"
    borderless
    filled>
    <template v-slot:append>
      <span class="text-caption">
        {{ model && model.length }}
      </span>
    </template>
  </q-input>
</template>

<script>
export default {
  name: 'CustomInput',
  props: [
    'value',
    'placeholder',
    'type'
  ],
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
