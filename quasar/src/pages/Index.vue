<template>
  <q-page padding>
    <div class="row">
      <card-social />
    </div>
    <div class="row q-col-gutter-md q-mt-md" v-if="showBanner">
      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
        <div class="q-pb-md">
          <q-banner class="bg-primary text-white">
            <template v-slot:avatar>
              <q-icon name="warning"></q-icon>
            </template>
            Note: If the data is not loading, please click in the link below to allow access to the backend.
            <template v-slot:action>
              <q-btn type="a" @click="showBanner = false" label="Dismiss" flat></q-btn>
              <q-btn type="a" href="https://ipms-v2.dapmsipd.org/" label="Go" flat></q-btn>
            </template>
          </q-banner>
        </div>
      </div>
    </div>
    <div class="row">
      <e-charts style="height: 300px;" :options="barOptions" ref="bar1"></e-charts>
      <e-charts style="height: 300px;" :options="barOptions2" ref="bar2"></e-charts>
      <e-charts style="height: 300px;" :options="barOptions3" ref="bar3"></e-charts>
      <e-charts style="height: 300px;" :options="barOptions4" ref="bar4"></e-charts>
      <e-charts style="height: 300px;" :options="barOptions5" ref="bar5"></e-charts>
      <e-charts style="height: 300px;" :options="barOptions6" ref="bar6"></e-charts>
      <e-charts style="height: 300px;" :options="barOptions7" ref="bar7"></e-charts>
      <e-charts style="height: 300px;" :options="barOptions8" ref="bar8"></e-charts>
    </div>
    <div class="row q-gutter-md q-mt-md">
      <q-card class="col">
        <investment-table
          title="PIP Investment Targets by Spatial Coverage"
          :table-data="pip_by_spatial_coverage"></investment-table>
      </q-card>
      <q-card class="col">
        <investment-table
          title="PIP Investment Targets by Implementation Mode"
          :table-data="pip_by_implementation_mode"></investment-table>
      </q-card>
    </div>
    <div class="row q-gutter-md q-mt-md">
      <q-card class="col">
        <investment-table
          title="PIP Investment Targets by PDP Chapter"
          :table-data="pip_by_main_pdp_chapter"></investment-table>
      </q-card>
      <q-card class="col">
        <investment-table
          title="PIP Investment Targets by Office"
          :table-data="pip_by_office"></investment-table>
      </q-card>
    </div>
    <div class="row q-gutter-md q-mt-md">
      <q-card class="col">
        <investment-table
          title="PIP Investment Targets by Project Status"
          :table-data="pip_by_project_status"></investment-table>
      </q-card>
    </div>
  </q-page>
</template>

<script>
import InvestmentTable from 'components/tables/InvestmentTable'
import CardSocial from 'components/cards/CardSocial'

export default {
  name: 'PageIndex',
  components: { CardSocial, InvestmentTable },
  data() {
    return {
      pip_by_office: [],
      cip_by_office: [],
      pip_by_spatial_coverage: [],
      cip_by_spatial_coverage: [],
      cip_by_implementation_mode: [],
      pip_by_implementation_mode: [],
      pip_by_main_pdp_chapter: [],
      pip_by_project_status: [],
      pagination: {
        rowsPerPage: 0
      },
      showBanner: true,
      chart: null,
      loading: true,
      barOptions: {
        renderer: 'svg',
        title: {
          text: ''
        },
        dataset: {
          source: [],
          dimensions: []
        },
        tooltip: {
          show: true
        },
        toolbox: {
          show: true,
          feature: {
            dataView: { show: true, readOnly: false },
            restore: { show: true },
            saveAsImage: { show: true }
          }
        },
        xAxis: {
          type: 'category'
        },
        yAxis: [
          {
            type: 'value',
            show: true
          },
          {
            type: 'value',
            show: true
          }
        ],
        series: []
      },
      barOptions2: {
        renderer: 'svg',
        title: {
          text: ''
        },
        tooltip: {
          show: true
        },
        toolbox: {
          show: true,
          feature: {
            dataView: { show: true, readOnly: false },
            restore: { show: true },
            saveAsImage: { show: true }
          }
        },
        xAxis: {
          type: 'category',
          data: [],
          axisLine: {
            show: false
          },
          axisTick: {
            show: false
          }
        },
        yAxis: {
          type: 'value',
          show: true
        },
        series: [{
          data: [],
          type: 'bar'
        }]
      },
      barOptions3: {
        renderer: 'svg',
        title: {
          text: ''
        },
        tooltip: {
          show: true
        },
        toolbox: {
          show: true,
          feature: {
            dataView: { show: true, readOnly: false },
            restore: { show: true },
            saveAsImage: { show: true }
          }
        },
        xAxis: {
          type: 'category',
          data: [],
          axisLine: {
            show: false
          },
          axisTick: {
            show: false
          },
          axisLabel: {
            rotate: 90
          }
        },
        yAxis: {
          type: 'value',
          show: true
        },
        series: [{
          data: [],
          type: 'bar'
        }]
      },
      barOptions4: {
        renderer: 'svg',
        title: {
          text: ''
        },
        tooltip: {
          show: true
        },
        toolbox: {
          show: true,
          feature: {
            dataView: { show: true, readOnly: false },
            restore: { show: true },
            saveAsImage: { show: true }
          }
        },
        xAxis: {
          type: 'category',
          data: [],
          axisLine: {
            show: false
          },
          axisTick: {
            show: false
          },
          axisLabel: {
            rotate: 90
          }
        },
        yAxis: {
          type: 'value',
          show: true
        },
        series: [{
          data: [],
          type: 'bar'
        }]
      },
      barOptions5: {
        renderer: 'svg',
        title: {
          text: ''
        },
        tooltip: {
          show: true
        },
        toolbox: {
          show: true,
          feature: {
            dataView: { show: true, readOnly: false },
            restore: { show: true },
            saveAsImage: { show: true }
          }
        },
        xAxis: {
          type: 'category',
          data: [],
          axisLine: {
            show: false
          },
          axisTick: {
            show: false
          },
          axisLabel: {
            rotate: 90
          }
        },
        yAxis: {
          type: 'value',
          show: true
        },
        series: [{
          data: [],
          type: 'bar'
        }]
      },
      barOptions6: {
        renderer: 'svg',
        title: {
          text: ''
        },
        tooltip: {
          show: true
        },
        toolbox: {
          show: true,
          feature: {
            dataView: { show: true, readOnly: false },
            restore: { show: true },
            saveAsImage: { show: true }
          }
        },
        xAxis: {
          type: 'category',
          data: [],
          axisLine: {
            show: false
          },
          axisTick: {
            show: false
          },
          axisLabel: {
            rotate: 90
          }
        },
        yAxis: {
          type: 'value',
          show: true
        },
        series: [{
          data: [],
          type: 'bar'
        }]
      },
      barOptions7: {
        renderer: 'svg',
        title: {
          text: ''
        },
        legend: {
          top: '5%',
          left: 'right'
        },
        tooltip: {
          show: true
        },
        toolbox: {
          show: true,
          feature: {
            dataView: { show: true, readOnly: false },
            restore: { show: true },
            saveAsImage: { show: true }
          }
        },
        xAxis: {
          show: false
        },
        yAxis: {
          type: 'value',
          show: false
        },
        series: [{
          data: [],
          type: 'pie',
          radius: ['40%', '70%'],
          labelLine: {
            show: true
          }
        }]
      },
      barOptions8: {
        renderer: 'svg',
        title: {
          text: ''
        },
        dataset: {
          source: [],
          dimensions: []
        },
        legend: {
          top: '5%',
          left: 'right'
        },
        tooltip: {
          show: true
        },
        toolbox: {
          show: true,
          feature: {
            dataView: { show: true, readOnly: false },
            restore: { show: true },
            saveAsImage: { show: true }
          }
        },
        xAxis: {
          type: 'category',
          show: true
        },
        yAxis: {
          type: 'value',
          show: false
        },
        series: [{
          data: [],
          type: 'pie',
          radius: ['40%', '70%'],
          labelLine: {
            show: true
          }
        }]
      }
    }
  },
  mounted() {
    const bar1 = this.$refs.bar1,
      bar2 = this.$refs.bar2,
      bar3 = this.$refs.bar3,
      bar4 = this.$refs.bar4,
      bar5 = this.$refs.bar5,
      bar6 = this.$refs.bar6,
      bar7 = this.$refs.bar7,
      bar8 = this.$refs.bar8
    bar1.showLoading()
    bar2.showLoading()
    bar3.showLoading()
    bar4.showLoading()
    bar5.showLoading()
    bar6.showLoading()
    bar7.showLoading()
    bar8.showLoading()
    this.$axios.get('/chart/spatial_coverages')
      .then(res => {
        this.barOptions.title.text = res.data.title
        this.barOptions.dataset.dimensions = [
          'name',
          'project_count',
          'total'
        ]
        this.barOptions.dataset.source = res.data.original
        this.barOptions.series = [
          {
            name: 'No. of Projects',
            type: 'bar'
          },
          {
            name: 'Total Investment Requirements',
            type: 'bar',
            yAxisIndex: 1
          }
        ]
      })
      .finally(() => bar1.hideLoading())
    this.$axios.get('/chart/pap_types')
      .then(res => {
        // this.barOptions.title.text = res.data.title
        this.barOptions2.title.text = res.data.title
        this.barOptions2.xAxis.data = res.data.categories
        this.barOptions2.series[0].data = res.data.data
      })
      .finally(() => bar2.hideLoading())
    this.$axios.get('/chart/regions')
      .then(res => {
        this.barOptions3.title.text = res.data.title
        this.barOptions3.xAxis.data = res.data.categories
        this.barOptions3.series[0].data = res.data.data
      })
      .finally(() => bar3.hideLoading())
    this.$axios.get('/chart/implementation_start')
      .then(res => {
        this.barOptions4.title.text = res.data.title
        this.barOptions4.xAxis.data = res.data.categories
        this.barOptions4.series[0].data = res.data.data
      })
      .finally(() => bar4.hideLoading())
    this.$axios.get('/chart/main_funding_source')
      .then(res => {
        this.barOptions5.title.text = res.data.title
        this.barOptions5.xAxis.data = res.data.categories
        this.barOptions5.series[0].data = res.data.data
      })
      .finally(() => bar5.hideLoading())
    this.$axios.get('/chart/office')
      .then(res => {
        this.barOptions6.title.text = res.data.title
        this.barOptions6.xAxis.data = res.data.categories
        this.barOptions6.series[0].data = res.data.data
      })
      .finally(() => bar6.hideLoading())
    this.$axios.get('/chart/pip')
      .then(res => {
        this.barOptions7.title.text = res.data.title
        // this.barOptions7.xAxis.data = res.data.categories
        const data = []
        Object.keys(res.data.original).forEach(key => {
          data.push({
            name: key,
            value: res.data.original[key]
          })
        })
        this.barOptions7.series[0].data = data
      })
      .finally(() => bar7.hideLoading())
    this.$axios.get('/chart/pip_by_spatial_coverage')
      .then(res => {
        this.barOptions8.title.text = res.data.title
        this.barOptions8.dataset.dimensions = [
          'label',
          '2017',
          '2018',
          '2019',
          '2020',
          '2021',
          '2022'
        ]
        this.barOptions8.dataset.source = res.data.original
        this.barOptions8.series = [
          { type: 'bar' },
          { type: 'bar' },
          { type: 'bar' },
          { type: 'bar' },
          { type: 'bar' },
          { type: 'bar' }
        ]
        this.pip_by_spatial_coverage = res.data.original
      })
      .finally(() => bar8.hideLoading())
    this.$axios.get('/chart/pip_by_office')
      .then(res => {
        this.pip_by_office = res.data.original
      })
    this.$axios.get('/chart/cip_by_office')
      .then(res => {
        this.cip_by_office = res.data.original
      })
    this.$axios.get('/chart/cip_by_spatial_coverage')
      .then(res => {
        this.cip_by_spatial_coverage = res.data.original
      })
    this.$axios.get('/chart/pip_by_implementation_mode')
      .then(res => {
        this.pip_by_implementation_mode = res.data.original
      })
    this.$axios.get('/chart/cip_by_implementation_mode')
      .then(res => {
        this.cip_by_implementation_mode = res.data.original
      })
    this.$axios.get('/chart/pip_by_main_pdp_chapter')
      .then(res => {
        this.pip_by_main_pdp_chapter = res.data.original
      })
    this.$axios.get('/chart/pip_by_project_status')
      .then(res => {
        this.pip_by_project_status = res.data.original
      })
  }
}
</script>
