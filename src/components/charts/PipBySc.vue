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
  name: 'PipBySc',
  computed: {
    chartData() {
      return this.$store.state.chart.pip_by_spatial_coverage
    }
  },
  mounted() {
    const chart = this.$refs.chart
    chart.showLoading()
    this.$store.dispatch('chart/getPipBySpatialCoverage')
      .then(() => chart.hideLoading())
  }
}
</script>
