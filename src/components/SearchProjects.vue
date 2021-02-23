<template>
  <q-input
    outlined
    v-model="model"
    class="col"
    placeholder="Type to search..."
    debounce="500"
    clearable>
    <template v-slot:append>
      <q-icon name="send" @click="e => $emit('input', e)" class="cursor-pointer" color="primary" />
    </template>
  </q-input>
</template>

<script>
export default {
  name: 'SearchProjects',
  props: ['value'],
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
