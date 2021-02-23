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
  name: 'PipByType',
  computed: {
    chartData() {
      return this.$store.state.chart.pip_by_pap_type
    }
  },
  mounted() {
    const chart = this.$refs.chart
    chart.showLoading()
    this.$store.dispatch('chart/getPipByPapType')
      .then(() => chart.hideLoading())
  }
}
</script>
