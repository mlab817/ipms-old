<template>
  <q-card class="">
    <q-img :src="data.img" height="220px">
      <q-chip v-if="data.chip" :class="data.chip_class" :color="data.chip_color" :label="data.chip"></q-chip>
    </q-img>

    <q-card-section>
      <q-btn
        fab
        color="teal-7"
        icon="shopping_cart"
        padding="sm"
        class="absolute"
        style="top: 0; right: 12px; transform: translateY(-50%);"
      />
    </q-card-section>

    <q-card-section>
      <div class="text-h6">
        {{ data.title }}
      </div>
      <div class="text-subtitle1 text-justify q-mt-sm">
        <q-item-label :lines="2">
          {{ data.description }}
        </q-item-label>
      </div>
      <div>
        <q-rating
          v-model="data.rating"
          max="5"
          size="1.5em"
          color="yellow"
          icon="star_border"
          icon-selected="star"
          icon-half="star_half"
          readonly
          no-dimming
        />
      </div>
    </q-card-section>
    <q-card-section>
      <div class="col-12">
        <span class="text-h6">{{ data.amount }}</span>
        <span class="text-h6 float-right">
          <q-btn label="See Details" rounded color="secondary" outline></q-btn>
        </span>
      </div>
    </q-card-section>
  </q-card>
</template>

<script>
export default {
  name: 'CardProject',
  props: ['data']
}
</script>

<style scoped>
</style>
