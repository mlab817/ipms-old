<template>
  <q-markup-table dense flat bordered square separator="horizontal">
    <thead>
      <q-tr>
        <q-td>{{ itemName }}</q-td>
        <q-td class="text-right">2016 &amp; Prior</q-td>
        <q-td class="text-right">2017</q-td>
        <q-td class="text-right">2018</q-td>
        <q-td class="text-right">2019</q-td>
        <q-td class="text-right">2020</q-td>
        <q-td class="text-right">2021</q-td>
        <q-td class="text-right">2022</q-td>
        <q-td class="text-right">2023</q-td>
        <q-td class="text-right">2024</q-td>
        <q-td class="text-right">2025</q-td>
        <q-td class="text-right">Total</q-td>
        <q-td></q-td>
      </q-tr>
    </thead>
    <tbody>
      <template v-if="model && model.length">
        <q-tr v-for="(item, index) in model" :key="index">
          <q-td>{{ item.selected && (item.selected.name || item.selected.label) }}</q-td>
          <q-td class="text-right">{{ item.y2016 && item.y2016.toLocaleString() }}</q-td>
          <q-td class="text-right">{{ item.y2017 && item.y2017.toLocaleString() }}</q-td>
          <q-td class="text-right">{{ item.y2018 && item.y2018.toLocaleString() }}</q-td>
          <q-td class="text-right">{{ item.y2019 && item.y2019.toLocaleString() }}</q-td>
          <q-td class="text-right">{{ item.y2020 && item.y2020.toLocaleString() }}</q-td>
          <q-td class="text-right">{{ item.y2021 && item.y2021.toLocaleString() }}</q-td>
          <q-td class="text-right">{{ item.y2022 && item.y2022.toLocaleString() }}</q-td>
          <q-td class="text-right">{{ item.y2023 && item.y2023.toLocaleString() }}</q-td>
          <q-td class="text-right">{{ item.y2024 && item.y2024.toLocaleString() }}</q-td>
          <q-td class="text-right">{{ item.y2025 && item.y2025.toLocaleString() }}</q-td>
          <q-td class="text-right">{{
              (item.y2016 +
                item.y2017 +
                item.y2018 +
                item.y2019 +
                item.y2020 +
                item.y2021 +
                item.y2022 +
                item.y2023 +
                item.y2024 +
                item.y2025).toLocaleString()
            }}</q-td>
          <q-td class="text-center">
            <q-btn flat icon="edit" size="sm" dense color="primary" @click="editItem(item, index)" />
            <q-btn flat icon="delete" size="sm" dense color="negative" @click="deleteItem(index)" />
          </q-td>
        </q-tr>
      </template>
      <q-tr>
        <q-td>
          <q-select v-model="newItem.selected" :options="filteredOptions" dense square outlined />
        </q-td>
        <q-td>
          <money-input v-model="newItem.y2016" />
        </q-td>
        <q-td>
          <money-input v-model="newItem.y2017" />
        </q-td>
        <q-td>
          <money-input v-model="newItem.y2018" />
        </q-td>
        <q-td>
          <money-input v-model="newItem.y2019" />
        </q-td>
        <q-td>
          <money-input v-model="newItem.y2020" />
        </q-td>
        <q-td>
          <money-input v-model="newItem.y2021" />
        </q-td>
        <q-td>
          <money-input v-model="newItem.y2022" />
        </q-td>
        <q-td>
          <money-input v-model="newItem.y2023" />
        </q-td>
        <q-td>
          <money-input v-model="newItem.y2024" />
        </q-td>
        <q-td>
          <money-input v-model="newItem.y2025" />
        </q-td>
        <q-td></q-td>
        <q-td class="text-center">
          <q-btn icon="add" color="primary" dense flat size="sm" @click="addItem" />
        </q-td>
      </q-tr>
    </tbody>
    <tfoot>
      <q-tr>
        <q-td>Total</q-td>
        <q-td></q-td>
        <q-td></q-td>
        <q-td></q-td>
        <q-td></q-td>
        <q-td></q-td>
        <q-td></q-td>
        <q-td></q-td>
        <q-td></q-td>
        <q-td></q-td>
        <q-td></q-td>
        <q-td></q-td>
      </q-tr>
    </tfoot>
  </q-markup-table>
</template>

<script>
import MoneyInput from 'components/MoneyInput'

export default {
  components: { MoneyInput },
  name: 'OuInvestments',
  props: {
    value: Array,
    option: {
      type: String,
      required: true
    },
    itemId: {
      type: String,
      required: true
    },
    itemName: {
      type: String,
      required: true
    }
  },
  computed: {
    options() {
      return this.$store.state.options[this.option]
    },
    model: {
      get() {
        return this.value
      },
      set(val) {
        this.$emit('input', val)
      }
    },
    filteredOptions() {
      const options = this.options
      if (this.model.length) {
        const selected = this.model.map(x => (x[this.option] && x[this.option].value))
        return options.filter(opt => {
          return !selected.includes(opt.value)
        })
      }
      return options
    }
  },
  data() {
    return {
      newItem: {
        selected: null,
        y2016: 0,
        y2017: 0,
        y2018: 0,
        y2019: 0,
        y2020: 0,
        y2021: 0,
        y2022: 0,
        y2023: 0,
        y2024: 0,
        y2025: 0
      }
    }
  },
  methods: {
    addItem() {
      const itemToAdd = this.newItem
      if (itemToAdd.selected) {
        itemToAdd[this.itemId] = itemToAdd.selected && itemToAdd.selected.value
        this.model.push(itemToAdd)
        this.newItem = {
          selected: null,
          y2016: 0,
          y2017: 0,
          y2018: 0,
          y2019: 0,
          y2020: 0,
          y2021: 0,
          y2022: 0,
          y2023: 0,
          y2024: 0,
          y2025: 0
        }
      } else {
        alert('You must select an option to save.')
      }
    },
    editItem(item, index) {
      this.newItem = item
      this.model.splice(index, 1)
    },
    deleteItem(index) {
      console.log(index)
      this.model.splice(index, 1)
    }
  }
}
</script>
