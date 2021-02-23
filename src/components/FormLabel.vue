<template>
  <q-item-label class="text-subtitle2 q-mt-md">
    {{ label }} <span class="text-negative">{{ required ? '*': '' }}</span>
  </q-item-label>
</template>

<script>
export default {
  name: 'FormLabel',
  props: ['label',
    'required'
  ]
}
</script>
