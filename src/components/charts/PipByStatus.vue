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
  name: 'PipByStatus',
  computed: {
    chartData() {
      return this.$store.state.chart.pip_by_project_status
    }
  },
  mounted() {
    const chart = this.$refs.chart
    chart.showLoading()
    this.$store.dispatch('chart/getPipByProjectStatus')
      .then(() => chart.hideLoading())
  }
}
</script>
