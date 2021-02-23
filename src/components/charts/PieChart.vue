<template>
  <q-card class="q-pa-sm text-white" style="background-image: linear-gradient(to right, #09203f 0%, #537895 100%);">
    <q-card-section class="text-h6">
      Total Investment Requirement by Region (2017-2022)
    </q-card-section>
    <q-card-section class="q-pa-none q-pt-md">
      <e-charts style="height: 300px;" :option="options" :resizable="true"></e-charts>
    </q-card-section>
  </q-card>
</template>

<script>
export default {
  name: 'PieChart',
  data() {
    return {
      options: {
        renderer: 'svg',
        tooltip: {
          trigger: 'item',
          formatter: '{a} <br/>{b}: P{c} B ({d}%)'
        },
        series: [
          {
            name: 'Total Investment',
            type: 'pie',
            radius: ['50%', '70%'],
            center: ['50%', '50%'],
            avoidLabelOverlap: false,
            label: {
              normal: {
                textStyle: {
                  color: '#fff'
                }
              }
            },
            labelLine: {
              normal: {
                lineStyle: {
                  color: 'rgba(255, 255, 255, 0.3)'
                },
                smooth: 0.2,
                length: 10,
                length2: 20
              }
            },
            data: []
          }
        ]
      }
    }
  },
  mounted() {
    this.$axios.get('/reports/regions')
      .then(res => {
        const data = res.data.data

        this.options.series[0].data = data.map(({ name, investment }) => {
          return {
            name: name,
            value: Math.round((parseFloat(investment && investment.y2017) / 1000000000) +
              (parseFloat(investment && investment.y2018) / 1000000000) +
              (parseFloat(investment && investment.y2019) / 1000000000) +
              (parseFloat(investment && investment.y2020) / 1000000000) +
              (parseFloat(investment && investment.y2021) / 1000000000) +
              (parseFloat(investment && investment.y2022) / 1000000000))
          }
        }).sort((a, b) => {
          return b.value - a.value
        })
        this.options.legend.data = data.map(({ name }) => name)
      })
  }
}
</script>
