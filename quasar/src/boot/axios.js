import Vue from 'vue'
import axios from 'axios'
import axiosRetry from 'axios-retry'

export const axiosInstance = axios.create({
  baseURL: process.env.DEV
    ? 'http://tdd.test/api/v1'
    : 'https://ipms-v2.dapmsipd.org/api/v1'
})

axiosRetry(axiosInstance, { retries: 3 })

Vue.prototype.$axios = axiosInstance
