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
  name: 'PipByFs',
  computed: {
    chartData() {
      return this.$store.state.chart.pip_by_main_funding_source
    }
  },
  mounted() {
    const chart = this.$refs.chart
    chart.showLoading()
    this.$store.dispatch('chart/getPipByMainFundingSource')
      .then(() => chart.hideLoading())
  }
}
</script>
