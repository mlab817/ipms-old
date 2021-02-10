<template>
  <q-card class="q-pa-sm text-white" style="background-image: linear-gradient(to right, #09203f 0%, #537895 100%);">
    <q-card-section class="text-h6">
      Total Investment Requirement by Region
    </q-card-section>
    <q-card-section class="q-pa-none q-pt-md">
      <e-charts style="height: 300px;" :option="options" :resizable="true"></e-charts>
    </q-card-section>
  </q-card>
</template>

<script>
export default {
  name: 'SimpleBar',
  data() {
    return {
      options: {
        renderer: 'svg',
        legend: {},
        tooltip: {},
        dataset: {
          dimensions: ['name', '2017', '2018', '2019', '2020', '2021', '2022'],
          source: []
        },
        xAxis: { type: 'category' },
        yAxis: {},
        // Declare several bar series, each will be mapped
        // to a column of dataset.source by default.
        series: [
          { type: 'bar' },
          { type: 'bar' },
          { type: 'bar' },
          { type: 'bar' },
          { type: 'bar' },
          { type: 'bar' }
        ]
      }
    }
  },
  mounted() {
    this.$axios.get('/reports/regions')
      .then(res => {
        const data = res.data.data
        const mappedData = data.map(({ name, investment }) => {
          return {
            name: name,
            2016: investment.y2016,
            2017: investment.y2017,
            2018: investment.y2018,
            2019: investment.y2019,
            2020: investment.y2020,
            2021: investment.y2021,
            2022: investment.y2022,
            2023: investment.y2023,
            2024: investment.y2024,
            2025: investment.y2025
          }
        })
        this.options.dataset.source = mappedData
        // this.options.dataset.dimensions = //
      })
  }
}
</script>
