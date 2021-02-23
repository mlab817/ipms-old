import { axiosInstance } from 'boot/axios'

const transformOptions = (data) => {
  return data.map(d => {
    return {
      value: d.id,
      label: d.name,
      children: d.children ? d.children : undefined,
      description: d.description ? d.description : undefined
    }
  })
}

const state = () => {
  return {
    regions: [],
    sdgs: [],
    ten_point_agendas: [],
    operating_units: [],
    pap_types: [],
    pdp_chapters: [],
    project_statuses: [],
    bases: [],
    spatial_coverages: [],
    cip_types: [],
    prerequisites: [],
    fs_statuses: [],
    tiers: [],
    approval_levels: [],
    pip_typologies: [],
    funding_sources: [],
    implementation_modes: [],
    gads: [],
    funding_institutions: [],
    pdp_indicators: [],
    infrastructure_sectors: []
  }
}

const actions = {
  loadOptions({ dispatch }) {
    // TODO: load options here
    dispatch('loadOption', 'regions')
    dispatch('loadOption', 'sdgs')
    dispatch('loadOption', 'ten_point_agendas')
    dispatch('loadOption', 'operating_units')
    dispatch('loadOption', 'pap_types')
    dispatch('loadOption', 'pdp_chapters')
    dispatch('loadOption', 'project_statuses')
    dispatch('loadOption', 'bases')
    dispatch('loadOption', 'spatial_coverages')
    dispatch('loadOption', 'cip_types')
    dispatch('loadOption', 'prerequisites')
    dispatch('loadOption', 'fs_statuses')
    dispatch('loadOption', 'tiers')
    dispatch('loadOption', 'approval_levels')
    dispatch('loadOption', 'pip_typologies')
    dispatch('loadOption', 'funding_sources')
    dispatch('loadOption', 'funding_institutions')
    dispatch('loadOption', 'implementation_modes')
    dispatch('loadOption', 'gads')
    dispatch('loadOption', 'pdp_indicators')
    dispatch('loadOption', 'infrastructure_sectors')
  },
  loadOption({ commit }, options) {
    axiosInstance.get(`/${options}`)
      .then(res => {
        const transformed = transformOptions(res.data.data)
        commit('SET_OPTIONS', {
          label: options,
          value: transformed
        })
      })
      .catch(err => console.log(err.message))
  }
}

const mutations = {
  SET_OPTIONS(state, options) {
    state[options.label] = options.value
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
