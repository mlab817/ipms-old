<div class="Subhead Subhead--spacious">
    <div class="Subhead-heading" id="financial-status">{{ __("Financial Status") }}</div>
</div>

<dl class="mb-4">
    <dt class="form-group-header">

    </dt>
    <dd class="form-group-body">
        <div class="d-table col-12 border-bottom border-top">
            <div class="col-1 p-2 text-center v-align-middle d-table-cell">

            </div>
            <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                2016 &amp; Prior
            </div>
            <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                2017
            </div>
            <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                2018
            </div>
            <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                2019
            </div>
            <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                2020
            </div>
            <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                2021
            </div>
            <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                2022
            </div>
            <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                2023 &amp; Beyond
            </div>
            <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                Total
            </div>
        </div>

        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('nep', () => ({
                    nep: @json($project->nep ?? []),
                    get total() {
                        const { y2016, y2017, y2018, y2019, y2020, y2021, y2022, y2023 } = this.nep
                        return parseFloat(y2016)
                            + parseFloat(y2017)
                            + parseFloat(y2018)
                            + parseFloat(y2019)
                            + parseFloat(y2020)
                            + parseFloat(y2021)
                            + parseFloat(y2022)
                            + parseFloat(y2023)
                    },
                    format(val) {
                        return val.toLocaleString()
                    }
                }));
            });
        </script>

        <div class="d-table col-12 border-bottom" x-data="nep">
            <div class="col-1 p-2 d-table-cell">
                NEP
            </div>
            <div class="col-1 p-2 d-table-cell">
                <input type="number" class="form-control text-right border-0 pr-1 width-full" name="nep[y2016]" x-model="nep.y2016" value="{{ old('nep.y2016', $project->nep->y2016 ?? 0) }}">
            </div>
            <div class="col-1 p-2 d-table-cell">
                <input type="number" class="form-control text-right border-0 pr-1 width-full" name="nep[y2017]" x-model="nep.y2017" value="{{ old('nep.y2017', $project->nep->y2017 ?? 0) }}">
            </div>
            <div class="col-1 p-2 d-table-cell">
                <input type="number" class="form-control text-right border-0 pr-1 width-full" name="nep[y2018]" x-model="nep.y2018" value="{{ old('nep.y2018', $project->nep->y2018 ?? 0) }}">
            </div>
            <div class="col-1 p-2 d-table-cell">
                <input type="number" class="form-control text-right border-0 pr-1 width-full" name="nep[y2019]" x-model="nep.y2019" value="{{ old('nep.y2019', $project->nep->y2019 ?? 0) }}">
            </div>
            <div class="col-1 p-2 d-table-cell">
                <input type="number" class="form-control text-right border-0 pr-1 width-full" name="nep[y2020]" x-model="nep.y2020" value="{{ old('nep.y2020', $project->nep->y2020 ?? 0) }}">
            </div>
            <div class="col-1 p-2 d-table-cell">
                <input type="number" class="form-control text-right border-0 pr-1 width-full" name="nep[y2021]" x-model="nep.y2021" value="{{ old('nep.y2021', $project->nep->y2021 ?? 0) }}">
            </div>
            <div class="col-1 p-2 d-table-cell">
                <input type="number" class="form-control text-right border-0 pr-1 width-full" name="nep[y2022]" x-model="nep.y2022" value="{{ old('nep.y2022', $project->nep->y2022 ?? 0) }}">
            </div>
            <div class="col-1 p-2 d-table-cell">
                <input type="number" class="form-control text-right border-0 pr-1 width-full" name="nep[y2023]" x-model="nep.y2023" value="{{ old('nep.y2023', $project->nep->y2023 ?? 0) }}">
            </div>
            <div class="col-1 p-2 d-table-cell text-right">
                <span x-text="format(total)"></span>
            </div>
        </div>

        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('allocation', () => ({
                    allocation: @json($project->allocation ?? []),
                    get total() {
                        const { y2016, y2017, y2018, y2019, y2020, y2021, y2022, y2023 } = this.allocation
                        return parseFloat(y2016)
                            + parseFloat(y2017)
                            + parseFloat(y2018)
                            + parseFloat(y2019)
                            + parseFloat(y2020)
                            + parseFloat(y2021)
                            + parseFloat(y2022)
                            + parseFloat(y2023)
                    },
                    format(val) {
                        return val.toLocaleString()
                    }
                }));
            });
        </script>

        <div class="d-table col-12 border-bottom" x-data="allocation">
            <div class="col-1 p-2 d-table-cell">
                GAA
            </div>
            <div class="col-1 p-2 d-table-cell">
                <input type="number" class="form-control text-right border-0 pr-1 width-full" name="allocation[y2016]" x-model="allocation.y2016" value="{{ old('allocation.y2016', $project->allocation->y2016 ?? 0) }}">
            </div>
            <div class="col-1 p-2 d-table-cell">
                <input type="number" class="form-control text-right border-0 pr-1 width-full" name="allocation[y2017]" x-model="allocation.y2017" value="{{ old('allocation.y2017', $project->allocation->y2017 ?? 0) }}">
            </div>
            <div class="col-1 p-2 d-table-cell">
                <input type="number" class="form-control text-right border-0 pr-1 width-full" name="allocation[y2018]" x-model="allocation.y2018" value="{{ old('allocation.y2018', $project->allocation->y2018 ?? 0) }}">
            </div>
            <div class="col-1 p-2 d-table-cell">
                <input type="number" class="form-control text-right border-0 pr-1 width-full" name="allocation[y2019]" x-model="allocation.y2019" value="{{ old('allocation.y2019', $project->allocation->y2019 ?? 0) }}">
            </div>
            <div class="col-1 p-2 d-table-cell">
                <input type="number" class="form-control text-right border-0 pr-1 width-full" name="allocation[y2020]" x-model="allocation.y2020" value="{{ old('allocation.y2020', $project->allocation->y2020 ?? 0) }}">
            </div>
            <div class="col-1 p-2 d-table-cell">
                <input type="number" class="form-control text-right border-0 pr-1 width-full" name="allocation[y2021]" x-model="allocation.y2021" value="{{ old('allocation.y2021', $project->allocation->y2021 ?? 0) }}">
            </div>
            <div class="col-1 p-2 d-table-cell">
                <input type="number" class="form-control text-right border-0 pr-1 width-full" name="allocation[y2022]" x-model="allocation.y2022" value="{{ old('allocation.y2022', $project->allocation->y2022 ?? 0) }}">
            </div>
            <div class="col-1 p-2 d-table-cell">
                <input type="number" class="form-control text-right border-0 pr-1 width-full" name="allocation[y2023]" x-model="allocation.y2023" value="{{ old('allocation.y2023', $project->allocation->y2023 ?? 0) }}">
            </div>
            <div class="col-1 p-2 d-table-cell text-right">
                <span x-text="format(total)"></span>
            </div>
        </div>

        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('disbursement', () => ({
                    disbursement: @json($project->disbursement ?? []),
                    get total() {
                        const { y2016, y2017, y2018, y2019, y2020, y2021, y2022, y2023 } = this.disbursement
                        return parseFloat(y2016)
                            + parseFloat(y2017)
                            + parseFloat(y2018)
                            + parseFloat(y2019)
                            + parseFloat(y2020)
                            + parseFloat(y2021)
                            + parseFloat(y2022)
                            + parseFloat(y2023)
                    },
                    format(val) {
                        return val.toLocaleString()
                    }
                }));
            });
        </script>
        <div class="d-table col-12 border-bottom" x-data="disbursement">
            <div class="col-1 p-1 d-table-cell">
                Disbursement
            </div>
            <div class="col-1 p-2 d-table-cell">
                <input type="number" class="form-control text-right border-0 pr-1 width-full" name="disbursement[y2016]" x-model="disbursement.y2016" value="{{ old('disbursement.y2016', $project->disbursement->y2016 ?? 0) }}">
            </div>
            <div class="col-1 p-2 d-table-cell">
                <input type="number" class="form-control text-right border-0 pr-1 width-full" name="disbursement[y2017]" x-model="disbursement.y2017" value="{{ old('disbursement.y2017', $project->disbursement->y2017 ?? 0) }}">
            </div>
            <div class="col-1 p-2 d-table-cell">
                <input type="number" class="form-control text-right border-0 pr-1 width-full" name="disbursement[y2018]" x-model="disbursement.y2018" value="{{ old('disbursement.y2018', $project->disbursement->y2018 ?? 0) }}">
            </div>
            <div class="col-1 p-2 d-table-cell">
                <input type="number" class="form-control text-right border-0 pr-1 width-full" name="disbursement[y2019]" x-model="disbursement.y2019" value="{{ old('disbursement.y2019', $project->disbursement->y2019 ?? 0) }}">
            </div>
            <div class="col-1 p-2 d-table-cell">
                <input type="number" class="form-control text-right border-0 pr-1 width-full" name="disbursement[y2020]" x-model="disbursement.y2020" value="{{ old('disbursement.y2020', $project->disbursement->y2020 ?? 0) }}">
            </div>
            <div class="col-1 p-2 d-table-cell">
                <input type="number" class="form-control text-right border-0 pr-1 width-full" name="disbursement[y2021]" x-model="disbursement.y2021" value="{{ old('disbursement.y2021', $project->disbursement->y2021 ?? 0) }}">
            </div>
            <div class="col-1 p-2 d-table-cell">
                <input type="number" class="form-control text-right border-0 pr-1 width-full" name="disbursement[y2022]" x-model="disbursement.y2022" value="{{ old('disbursement.y2022', $project->disbursement->y2022 ?? 0) }}">
            </div>
            <div class="col-1 p-2 d-table-cell">
                <input type="number" class="form-control text-right border-0 pr-1 width-full" name="disbursement[y2023]" x-model="disbursement.y2023" value="{{ old('disbursement.y2023', $project->disbursement->y2023 ?? 0) }}">
            </div>
            <div class="col-1 p-2 d-table-cell text-right">
                <span x-text="format(total)"></span>
            </div>
        </div>

    </dd>
</dl>
