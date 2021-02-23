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
  name: 'PipByRegion',
  computed: {
    chartData() {
      return this.$store.state.chart.pip_by_region
    }
  },
  watch: {
    chartData(newValue) {
      // trigger refresh
    }
  },
  mounted() {
    const chart = this.$refs.chart
    chart.showLoading()
    this.$store.dispatch('chart/fetchPipByRegion')
      .then(() => chart.hideLoading())
  }
}
</script>
