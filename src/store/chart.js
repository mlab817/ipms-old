import { axiosInstance } from 'boot/axios'

const chartData = {
  renderer: 'svg',
  title: {
    text: ''
  },
  tooltip: {
    show: true
  },
  // toolbox: {
  //   show: true,
  //   feature: {
  //     dataView: { show: true, readOnly: true },
  //     restore: { show: true },
  //     saveAsImage: { show: true }
  //   }
  // },
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
    type: 'bar',
    showBackground: true,
    backgroundStyle: {
      color: 'rgba(180, 180, 180, 0.2)'
    }
  }]
}

const state = () => {
  return {
    pip_by_region: {},
    pip_by_sdg: {},
    pip_by_main_funding_source: {},
    pip_by_spatial_coverage: {},
    pip_by_pap_type: {},
    pip_by_project_status: {},
    type: 'total'
  }
}

const actions = {
  fetchPipByRegion({ commit }) {
    axiosInstance.get('/chart/pip_by_region')
      .then(res => {
        // const data = Object.assign({}, JSON.parse(JSON.stringify(chartData2)))
        // data.title.text = 'Regions'
        // data.xAxis.data = res.data.data && res.data.data.map(d => d.label)
        // data.dataset.source = res.data.data
        // // data.series[0].data = res.data.data && res.data.data.map(d => d.project_count)
        const chart = {
          xAxis: {
            scale: true
          },
          yAxis: {
            scale: true
          },
          series: [
            {
              type: 'scatter',
              symbolSize: 20,
              data: []
            }
          ]
        }
        commit('SET_PIP_BY_REGION', chart)
      })
      .catch(err => console.log(err.message))
  },
  getPipBySdg({ commit }) {
    axiosInstance.get('/chart/pip_by_sdg')
      .then(res => {
        // format data before commit
        const data = Object.assign({}, JSON.parse(JSON.stringify(chartData)))
        data.title.text = 'SDGs'
        data.xAxis.data = res.data.data && res.data.data.map(d => d.label)
        data.series[0].data = res.data.data && res.data.data.map(d => d.project_count)
        commit('SET_PIP_BY_SDG', data)
      })
      .catch(err => console.log(err.message))
  },
  getPipByMainFundingSource({ commit }) {
    axiosInstance.get('/chart/pip_by_main_funding_source')
      .then(res => {
        // format data before commit
        const data = Object.assign({}, JSON.parse(JSON.stringify(chartData)))
        data.title.text = 'Main Funding Source'
        data.xAxis.data = res.data.data && res.data.data.map(d => d.label)
        data.series[0].data = res.data.data && res.data.data.map(d => d.project_count)
        commit('SET_PIP_BY_MAIN_FUNDING_SOURCE', data)
      })
      .catch(err => console.log(err.message))
  },
  getPipBySpatialCoverage({ commit }) {
    axiosInstance.get('/chart/pip_by_spatial_coverage')
      .then(res => {
        // format data before commit
        const data = Object.assign({}, JSON.parse(JSON.stringify(chartData)))
        data.title.text = 'Spatial Coverage'
        data.xAxis.data = res.data.data && res.data.data.map(d => d.label)
        data.series[0].data = res.data.data && res.data.data.map(d => d.project_count)
        commit('SET_PIP_BY_SPATIAL_COVERAGE', data)
      })
      .catch(err => console.log(err.message))
  },
  getPipByPapType({ commit }) {
    axiosInstance.get('/chart/pip_by_pap_type')
      .then(res => {
        // format data before commit
        const data = Object.assign({}, JSON.parse(JSON.stringify(chartData)))
        data.title.text = 'PAP Type'
        data.xAxis.data = res.data.data && res.data.data.map(d => d.label)
        data.series[0].data = res.data.data && res.data.data.map(d => d.project_count)
        commit('SET_PIP_BY_PAP_TYPE', data)
      })
      .catch(err => console.log(err.message))
  },
  getPipByProjectStatus({ commit }) {
    axiosInstance.get('/chart/pip_by_project_status')
      .then(res => {
        // format data before commit
        const data = Object.assign({}, JSON.parse(JSON.stringify(chartData)))
        data.title.text = 'Project Status'
        data.xAxis.data = res.data.data && res.data.data.map(d => d.label)
        data.series[0].data = res.data.data && res.data.data.map(d => d.project_count)
        commit('SET_PIP_BY_PROJECT_STATUS', data)
      })
      .catch(err => console.log(err.message))
  },
  setType({ commit }, payload) {
    commit('SET_TYPE', payload)
  }
}

const mutations = {
  SET_PIP_BY_REGION(state, value) {
    state.pip_by_region = value
  },
  SET_PIP_BY_SDG(state, value) {
    state.pip_by_sdg = value
  },
  SET_PIP_BY_MAIN_FUNDING_SOURCE(state, value) {
    state.pip_by_main_funding_source = value
  },
  SET_PIP_BY_SPATIAL_COVERAGE(state, value) {
    state.pip_by_spatial_coverage = value
  },
  SET_PIP_BY_PAP_TYPE(state, value) {
    state.pip_by_pap_type = value
  },
  SET_PIP_BY_PROJECT_STATUS(state, value) {
    state.pip_by_project_status = value
  },
  SET_TYPE(state, value) {
    state.type = value
  }
}

const getters = {}

export default {
  namespaced: true,
  state,
  actions,
  mutations,
  getters
}
