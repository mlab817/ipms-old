<template>
  <q-item tag="label" v-ripple>
    <q-item-section side top>
      <q-checkbox v-model="model" />
    </q-item-section>

    <q-item-section>
      <q-item-label>{{ label }}</q-item-label>
      <q-item-label caption v-if="caption">
        {{ caption }}
      </q-item-label>
    </q-item-section>
  </q-item>
</template>

<script>
export default {
  name: 'CustomCheckbox',
  props: ['label', 'caption', 'value'],
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
