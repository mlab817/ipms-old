<template>
  <q-card class="q-pa-sm text-white" style="background:linear-gradient( 135deg, #3A6073 25%, #2c343c 80%)">
    <q-card-section class="text-h6">
      Bar
      <q-btn icon="fa fa-download" class="float-right text-white" @click="saveImage" flat dense color="white">
        <q-tooltip>Download PNG</q-tooltip>
      </q-btn>
    </q-card-section>
    <q-card-section class="q-pa-none q-pt-md">
      <e-charts
        style="height: 300px;"
        ref="barRef"
        @ready="onReady"
        :option="options"
        :resizable="true">
      </e-charts>
    </q-card-section>
  </q-card>
</template>

<script>
export default {
  name: 'BarChart',
  props: ['title', 'categories', 'series'],
  computed: {
    options() {
      const bar = {
        title: {
          text: ''
        },
        xAxis: {
          data: [],
          axisLabel: {
            inside: false,
            textStyle: {
              color: '#fff'
            }
          },
          axisTick: {
            show: false
          },
          axisLine: {
            show: false
          },
          z: 10
        },
        grid: {
          top: '5%',
          bottom: '15%',
          left: '8%',
          right: '5%'
        },
        yAxis: {
          axisLine: {
            show: false
          },
          axisTick: {
            show: false
          },
          axisLabel: {
            textStyle: {
              color: '#fff'
            }
          }
        },
        dataZoom: [
          {
            type: 'inside'
          }
        ],
        series: [
          { // For shadow
            type: 'bar',
            itemStyle: {
              normal: { color: 'rgba(0,0,0,0.05)' }
            },
            barGap: '-100%',
            barCategoryGap: '40%',
            data: [],
            animation: false
          },
          {
            type: 'bar',
            data: []
          }
        ]
      }

      return bar
    }
  },
  data() {
    return {
      ins: null,
      echarts: null
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
      this.$refs.barRef.showLoading()
      this.echarts = echarts
      instance.showLoading()
    }
  }
}
</script>
