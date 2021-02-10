// import something here
import money from 'v-money'

const config = {
  precision: 2,
  decimal: '.',
  thousands: ',',
  prefix: '',
  suffix: ''
}

// "async" is optional;
// more info on params: https://quasar.dev/quasar-cli/cli-documentation/boot-files#Anatomy-of-a-boot-file
export default ({ Vue }) => {
  Vue.use(money, config)
}
