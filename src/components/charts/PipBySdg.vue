<template>
  <figure>
    <e-charts
      style="height: 300px;"
      :options="chartData"
      ref="chart" />
  </figure>
</template>

<script>
export default {
  name: 'PipBySdg',
  computed: {
    chartData() {
      return this.$store.state.chart.pip_by_sdg
    }
  },
  mounted() {
    const chart = this.$refs.chart
    chart.showLoading()
    this.$store.dispatch('chart/getPipBySdg')
      .then(() => chart.hideLoading())
  }
}
</script>
