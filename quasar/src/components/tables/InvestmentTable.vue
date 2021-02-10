<template>
  <q-table
    :data="tableData"
    :columns="columns"
    :pagination="pagination"
    :title="title"
    :hide-pagination="tableData.length < 10"
    wrap-cells>
    <template v-slot:top-right>
      <q-btn
        color="primary"
        icon-right="archive"
        label="Export to csv"
        no-caps
        @click="exportTable"
      />
    </template>
    <template v-slot:header="props">
      <q-tr :props="props" class="bg-primary text-white">
        <q-th
          v-for="col in props.cols"
          :key="col.name"
          :props="props"
          class="text-weight-bold"
        >
          {{ col.label }}
        </q-th>
      </q-tr>
    </template>
    <template v-slot:bottom-row>
      <q-tr class="text-weight-bold bg-primary text-white">
        <q-td>Grand Total</q-td>
        <q-td align="right">{{ totalsRow.project_count }}</q-td>
        <q-td align="right" v-for="i in 6" :key="i">
          {{ totalsRow[`${2016+i}`].toLocaleString() }}
        </q-td>
        <q-td align="right">
          {{ totalsRow['20172022'].toLocaleString() }}
        </q-td>
        <q-td align="right">
          {{ totalsRow['total'].toLocaleString() }}
        </q-td>
      </q-tr>
    </template>
  </q-table>
</template>

<script>
import { exportFile } from 'quasar'

function wrapCsvValue(val, formatFn) {
  let formatted = formatFn !== undefined
    ? formatFn(val)
    : val
  formatted = formatted === undefined || formatted === null
    ? ''
    : String(formatted)
  formatted = formatted.split('"').join('""')
  /**
   * Excel accepts \n and \r in strings, but some other CSV parsers do not
   * Uncomment the next two lines to escape new lines
   */
  // .split('\n').join('\\n')
  // .split('\r').join('\\r')
  return `"${formatted}"`
}

export default {
  name: 'InvestmentTable',
  props: {
    tableData: Array,
    title: String
  },
  computed: {
    totalsRow() {
      const tableData = this.tableData,
        totalsRow = {
          project_count: 0,
          2017: 0,
          2018: 0,
          2019: 0,
          2020: 0,
          2021: 0,
          2022: 0,
          20172022: 0,
          total: 0
        }

      if (tableData.length) {
        return tableData.reduce((acc, cur) => {
          acc.project_count += parseInt(cur.project_count)
          acc['2017'] += Math.round(parseFloat(cur['2017']) / 1000000)
          acc['2018'] += Math.round(parseFloat(cur['2018']) / 1000000)
          acc['2019'] += Math.round(parseFloat(cur['2019']) / 1000000)
          acc['2020'] += Math.round(parseFloat(cur['2020']) / 1000000)
          acc['2021'] += Math.round(parseFloat(cur['2021']) / 1000000)
          acc['2022'] += Math.round(parseFloat(cur['2022']) / 1000000)
          acc['20172022'] += Math.round(parseFloat(cur['2017']) / 1000000 +
              parseFloat(cur['2018']) / 1000000 +
              parseFloat(cur['2019']) / 1000000 +
              parseFloat(cur['2020']) / 1000000 +
              parseFloat(cur['2021']) / 1000000 +
              parseFloat(cur['2022']) / 1000000)
          acc.total += Math.round(parseFloat(cur.total) / 1000000)
          return acc
        }, totalsRow)
      }

      return totalsRow
    }
  },
  data() {
    return {
      pagination: {
        rowsPerPage: 10
      },
      columns: [
        {
          name: 'label',
          label: 'Particular',
          field: 'label',
          align: 'left'
        },
        {
          name: 'numPaps',
          label: 'No. of PAPs',
          field: 'project_count',
          align: 'right',
          sortable: true
        },
        {
          name: '2017',
          label: '2017',
          field: '2017',
          align: 'right',
          format: (val, row) => (Math.round(parseFloat(val) / 1000000)).toLocaleString(),
          sortable: true
        },
        {
          name: '2018',
          label: '2018',
          field: '2018',
          align: 'right',
          format: (val, row) => (Math.round(parseFloat(val) / 1000000)).toLocaleString(),
          sortable: true
        },
        {
          name: '2019',
          label: '2019',
          field: '2019',
          align: 'right',
          format: (val, row) => (Math.round(parseFloat(val) / 1000000)).toLocaleString(),
          sortable: true
        },
        {
          name: '2020',
          label: '2020',
          field: '2020',
          align: 'right',
          format: (val, row) => (Math.round(parseFloat(val) / 1000000)).toLocaleString(),
          sortable: true
        },
        {
          name: '2021',
          label: '2021',
          field: '2021',
          align: 'right',
          format: (val, row) => (Math.round(parseFloat(val) / 1000000)).toLocaleString(),
          sortable: true
        },
        {
          name: '2022',
          label: '2022',
          field: '2022',
          align: 'right',
          format: (val, row) => (Math.round(parseFloat(val) / 1000000)).toLocaleString(),
          sortable: true
        },
        {
          name: '20172022',
          label: '2017-2022',
          field: row => (parseFloat(row[2017]) + parseFloat(row[2018]) + parseFloat(row[2019]) + parseFloat(row[2020]) + parseFloat(row[2021]) + parseFloat(row[2022])),
          align: 'right',
          format: (val, row) => (Math.round(parseFloat(val) / 1000000)).toLocaleString(),
          sortable: true
        },
        {
          name: 'total',
          label: 'Total',
          field: 'total',
          align: 'right',
          format: (val, row) => (Math.round(parseFloat(val) / 1000000)).toLocaleString(),
          sortable: true
        }
      ]
    }
  },
  methods: {
    exportTable() {
      const content = [this.columns.map(col => wrapCsvValue(col.label))].concat(
        this.tableData.map(row => this.columns.map(col => wrapCsvValue(
          typeof col.field === 'function'
            ? col.field(row)
            : row[col.field === undefined ? col.name : col.field],
          col.format
        )).join(','))
      ).join('\r\n')
      const status = exportFile(
        'table-export.csv',
        content,
        'text/csv'
      )
      if (status !== true) {
        this.$q.notify({
          message: 'Browser denied file download...',
          color: 'negative',
          icon: 'warning'
        })
      }
    }
  }
}
</script>
