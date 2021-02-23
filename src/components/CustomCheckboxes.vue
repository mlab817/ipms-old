<template>
  <q-list>
    <q-item v-for="({ value, label, description }) in options" :key="value">
      <q-item-section avatar>
        <q-checkbox :val="value" v-model="model" />
      </q-item-section>
      <q-item-section>
        <q-item-label>{{ label }}</q-item-label>
        <q-item-label caption>{{ description }}</q-item-label>
      </q-item-section>
    </q-item>
  </q-list>
</template>

<script>
export default {
  name: 'CustomCheckboxes',
  props: ['options', 'value'],
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
