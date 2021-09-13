<div class="Subhead Subhead--spacious">
    <div class="Subhead-heading" id="investment-required-by-region">{{ __("Investment Required by Region") }}</div>
    <div class="Subhead-description">in absolute PhP terms</div>
</div>

<dl class="mb-4">
    <dt class="form-group-header">

    </dt>
    <dd class="form-group-body">
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('regionInvestments', () => ({
                    items: @json(old('region_investments', $project->region_investments)),
                    regions: @json($regions),
                    get total() {
                        const items = this.items,
                            totalsRow = {
                                y2016: 0,
                                y2017: 0,
                                y2018: 0,
                                y2019: 0,
                                y2020: 0,
                                y2021: 0,
                                y2022: 0,
                                y2023: 0,
                                total: 0
                            }

                        items.length && items.reduce((acc, item) => {
                            acc.y2016 += parseFloat(item.y2016)
                            acc.y2017 += parseFloat(item.y2017)
                            acc.y2018 += parseFloat(item.y2018)
                            acc.y2019 += parseFloat(item.y2019)
                            acc.y2020 += parseFloat(item.y2020)
                            acc.y2021 += parseFloat(item.y2021)
                            acc.y2022 += parseFloat(item.y2022)
                            acc.y2023 += parseFloat(item.y2023)
                            acc.total += parseFloat(item.y2016)
                                + parseFloat(item.y2017)
                                + parseFloat(item.y2018)
                                + parseFloat(item.y2019)
                                + parseFloat(item.y2020)
                                + parseFloat(item.y2021)
                                + parseFloat(item.y2022)
                                + parseFloat(item.y2023)
                            return acc
                        }, totalsRow)

                        return totalsRow
                    },
                    format(val) {
                        return val.toLocaleString()
                    },
                    region(val) {
                        return this.regions.filter(r => (parseInt(r.id) === parseInt(val)))[0].label
                    }
                }));
            });
        </script>
        <div x-data="regionInvestments">
            <table class="d-table col-12 border-y">
                <thead>
                <tr class="border-bottom">
                    <th class="col-1 p-1">Region</th>
                    <th class="col-1 p-1">2016 &amp; Prior</th>
                    <th class="col-1 p-1">2017</th>
                    <th class="col-1 p-1">2018</th>
                    <th class="col-1 p-1">2019</th>
                    <th class="col-1 p-1">2020</th>
                    <th class="col-1 p-1">2021</th>
                    <th class="col-1 p-1">2022</th>
                    <th class="col-1 p-1">2023 &amp; Beyond</th>
                    <th class="col-1 p-1">Total</th>
                </tr>
                </thead>
                <tbody>
                <template x-for="(item, index) in items" :key="index">
                    <tr class="border-bottom" x-data="{
                                    item: item,
                                    get total() {
                                        const { y2016, y2017, y2018, y2019, y2020, y2021, y2022, y2023 } = this.item
                                        return parseFloat(y2016)
                                            + parseFloat(y2017)
                                            + parseFloat(y2018)
                                            + parseFloat(y2019)
                                            + parseFloat(y2020)
                                            + parseFloat(y2021)
                                            + parseFloat(y2022)
                                            + parseFloat(y2023)
                                    }
                                }">
                        <td class="p-1">
                            <input type="hidden" x-bind:name="`region_investments[${index}][region_id]`" x-model="item.region_id">
                            <span x-text="region(item.region_id)"></span>
                        </td>
                        <td class="p-1">
                            <input type="number" class="form-control border-0 text-right pr-1 width-full" x-bind:name="`region_investments[${index}][y2016]`" x-model="item.y2016">
                        </td>
                        <td class="p-1">
                            <input type="number" class="form-control border-0 text-right pr-1 width-full" x-bind:name="`region_investments[${index}][y2017]`" x-model="item.y2017">
                        </td>
                        <td class="p-1">
                            <input type="number" class="form-control border-0 text-right pr-1 width-full" x-bind:name="`region_investments[${index}][y2018]`" x-model="item.y2018">
                        </td>
                        <td class="p-1">
                            <input type="number" class="form-control border-0 text-right pr-1 width-full" x-bind:name="`region_investments[${index}][y2019]`" x-model="item.y2019">
                        </td>
                        <td>
                            <input type="number" class="form-control border-0 text-right pr-1 width-full" x-bind:name="`region_investments[${index}][y2020]`" x-model="item.y2020">
                        </td>
                        <td class="p-1">
                            <input type="number" class="form-control border-0 text-right pr-1 width-full" x-bind:name="`region_investments[${index}][y2021]`" x-model="item.y2021">
                        </td>
                        <td class="p-1">
                            <input type="number" class="form-control border-0 text-right pr-1 width-full" x-bind:name="`region_investments[${index}][y2022]`" x-model="item.y2022">
                        </td>
                        <td class="p-1">
                            <input type="number" class="form-control border-0 text-right pr-1 width-full" x-bind:name="`region_investments[${index}][y2023]`" x-model="item.y2023">
                        </td>
                        <td class="p-1 text-right">
                            <span x-text="format(total)"></span>
                        </td>
                    </tr>
                </template>
                </tbody>
                <tfoot>
                <tr>
                    <th class="p-2">
                        Total
                    </th>
                    <th class="p-2 text-right">
                        <span x-text="format(total.y2016)"></span>
                    </th>
                    <th class="p-2 text-right">
                        <span x-text="format(total.y2017)"></span>
                    </th>
                    <th class="p-2 text-right">
                        <span x-text="format(total.y2018)"></span>
                    </th>
                    <th class="p-2 text-right">
                        <span x-text="format(total.y2019)"></span>
                    </th>
                    <th class="p-2 text-right">
                        <span x-text="format(total.y2020)"></span>
                    </th>
                    <th class="p-2 text-right">
                        <span x-text="format(total.y2021)"></span>
                    </th>
                    <th class="p-2 text-right">
                        <span x-text="format(total.y2022)"></span>
                    </th>
                    <th class="p-2 text-right">
                        <span x-text="format(total.y2023)"></span>
                    </th>
                    <th class="p-2 text-right">
                        <span x-text="format(total.total)"></span>
                    </th>
                </tr>
                </tfoot>
            </table>
        </div>
    </dd>
</dl>
