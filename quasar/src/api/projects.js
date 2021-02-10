import { axiosInstance as axios } from 'boot/axios'

export const ProjectAPI = {
  index(params) {
    return axios.get('/projects', params)
      .then(response => response.data)
      .catch(err => console.log(err.message))
  },
  show(id) {
    return axios.get(`/projects/${id}`)
      .then(response => response.data)
      .catch(err => console.log(err.message))
  },
  store(payload) {
    return axios.post('/projects', payload)
      .then(response => response.data)
      .catch(err => console.log(err.message))
  },
  update(payload, id) {
    return axios.put(`/projects/${id}`, payload)
      .then(response => response.data)
      .catch(err => console.log(err.message))
  },
  destroy(id) {
    return axios.delete(`/projects/${id}`)
      .then(response => response.data)
      .catch(err => console.log(err.message))
  }
}
