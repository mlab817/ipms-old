<template>
  <q-card class="q-pa-sm text-white" style="background:linear-gradient( 135deg, #3A6073 25%, #2c343c 80%)">
    <q-card-section class="text-h6">
      Annual Total and Infra Investment
    </q-card-section>
    <q-card-section class="q-pa-none q-pt-md">
      <e-charts
        style="height: 300px;"
        ref="barRef"
        :loading="loading"
        @ready="onReady"
        :option="option"
        :resizable="true"></e-charts>
    </q-card-section>
  </q-card>
</template>

<script>
export default {
  name: 'BarChart',
  props: {
    title: {
      type: String
    },
    xAxis: {
      type: Array
    },
    yAxis: {
      type: Array
    },
    series: {
      type: Object
    },
    columns: {
      type: Array
    },
    legend: {
      type: Object
    }
  },
  data() {
    return {
      loading: true,
      echarts: null,
      option: {},
      dataAxis: [
        // '2016',
        '2017',
        '2018',
        '2019',
        '2020',
        '2021',
        '2022'
        // '2023',
        // '2024',
        // '2025'
      ],
      seriesData: []
    }
  },
  methods: {
    saveImage() {
      const linkSource = this.$refs.barRef.getDataURL()
      const downloadLink = document.createElement('a')
      document.body.appendChild(downloadLink)
      downloadLink.href = linkSource
      downloadLink.target = '_self'
      downloadLink.download = 'BarChart.png'
      downloadLink.click()
    },
    onReady(instance, echarts) {
      this.echarts = echarts
      this.option = {
        renderer: 'svg',
        tooltip: {
          trigger: 'axis',
          axisPointer: {
            type: 'cross',
            crossStyle: {
              color: '#999'
            }
          }
        },
        legend: {
          data: ['Total', 'Infra'],
          textStyle: {
            color: '#fff'
          }
        },
        xAxis: {
          data: this.dataAxis,
          axisLabel: {
            inside: false,
            textStyle: {
              color: '#fff'
            }
          },
          axisTick: {
            show: true
          },
          axisLine: {
            show: false
          },
          z: 10
        },
        toolbox: {
          feature: {
            dataView: { show: true, readOnly: true },
            magicType: { show: true, type: ['line', 'bar'] },
            restore: { show: true },
            saveAsImage: { show: true }
          }
        },
        grid: {
          top: '15%',
          bottom: '15%',
          left: '12%',
          right: '5%'
        },
        yAxis: {
          axisLine: {
            show: true
          },
          axisTick: {
            show: false
          },
          axisLabel: {
            textStyle: {
              color: '#fff'
            },
            formatter: '{value} B'
          }
        },
        dataZoom: [
          {
            type: 'inside'
          }
        ],
        series: [
          {
            type: 'bar',
            name: 'Total',
            itemStyle: {
              normal: {
                color: new echarts.graphic.LinearGradient(
                  0, 0, 0, 1,
                  [
                    { offset: 0, color: '#83bff6' },
                    { offset: 0.5, color: '#188df0' },
                    { offset: 1, color: '#188df0' }
                  ]
                )
              },
              emphasis: {
                color: new echarts.graphic.LinearGradient(
                  0, 0, 0, 1,
                  [
                    { offset: 0, color: '#2378f7' },
                    { offset: 0.7, color: '#2378f7' },
                    { offset: 1, color: '#83bff6' }
                  ]
                )
              }
            },
            data: [],
            axisPointer: {
              type: 'shadow'
            }
          },
          {
            type: 'bar',
            name: 'Infra',
            itemStyle: {
              normal: {
                color: new echarts.graphic.LinearGradient(
                  0, 0, 0, 1,
                  [
                    { offset: 0, color: '#328455' },
                    { offset: 0.5, color: '#326322' },
                    { offset: 1, color: '#324421' }
                  ]
                )
              },
              emphasis: {
                color: new echarts.graphic.LinearGradient(
                  0, 0, 0, 1,
                  [
                    { offset: 0, color: '#328455' },
                    { offset: 0.7, color: '#328455' },
                    { offset: 1, color: '#328455' }
                  ]
                )
              }
            },
            data: [],
            axisPointer: {
              type: 'shadow'
            }
          }
        ]
      }
    }
  },
  created() {
    this.$axios.get('/reports/funding_sources')
      .then(res => {
        const reduced = res.data.data && res.data.data.reduce((acc, cur) => {
          const { investment } = cur
          acc['2016'] += (investment && Math.round(investment.y2016 / 1000000000)) || 0
          acc['2017'] += (investment && Math.round(investment.y2017 / 1000000000)) || 0
          acc['2018'] += (investment && Math.round(investment.y2018 / 1000000000)) || 0
          acc['2019'] += (investment && Math.round(investment.y2019 / 1000000000)) || 0
          acc['2020'] += (investment && Math.round(investment.y2020 / 1000000000)) || 0
          acc['2021'] += (investment && Math.round(investment.y2021 / 1000000000)) || 0
          acc['2022'] += (investment && Math.round(investment.y2022 / 1000000000)) || 0
          acc['2023'] += (investment && Math.round(investment.y2023 / 1000000000)) || 0
          acc['2024'] += (investment && Math.round(investment.y2024 / 1000000000)) || 0
          acc['2025'] += (investment && Math.round(investment.y2025 / 1000000000)) || 0
          return acc
        }, {
          2016: 0,
          2017: 0,
          2018: 0,
          2019: 0,
          2020: 0,
          2021: 0,
          2022: 0,
          2023: 0,
          2024: 0,
          2025: 0
        })
        this.seriesData = Object.values(reduced)
        this.option.series[0].data = Object.values(reduced)

        const reduced2 = res.data.data && res.data.data.reduce((acc2, cur2) => {
          const { infrastructure } = cur2
          acc2['2016'] += (infrastructure && Math.round(infrastructure.y2016 / 1000000000)) || 0
          acc2['2017'] += (infrastructure && Math.round(infrastructure.y2017 / 1000000000)) || 0
          acc2['2018'] += (infrastructure && Math.round(infrastructure.y2018 / 1000000000)) || 0
          acc2['2019'] += (infrastructure && Math.round(infrastructure.y2019 / 1000000000)) || 0
          acc2['2020'] += (infrastructure && Math.round(infrastructure.y2020 / 1000000000)) || 0
          acc2['2021'] += (infrastructure && Math.round(infrastructure.y2021 / 1000000000)) || 0
          acc2['2022'] += (infrastructure && Math.round(infrastructure.y2022 / 1000000000)) || 0
          acc2['2023'] += (infrastructure && Math.round(infrastructure.y2023 / 1000000000)) || 0
          acc2['2024'] += (infrastructure && Math.round(infrastructure.y2024 / 1000000000)) || 0
          acc2['2025'] += (infrastructure && Math.round(infrastructure.y2025 / 1000000000)) || 0
          return acc2
        }, {
          2016: 0,
          2017: 0,
          2018: 0,
          2019: 0,
          2020: 0,
          2021: 0,
          2022: 0,
          2023: 0,
          2024: 0,
          2025: 0
        })
        this.option.series[1].data = Object.values(reduced2)

        this.dataAxis = Object.keys(reduced)
      })
      .finally(() => (this.loading = false))
  }
}
</script>

<style scoped>
</style>
