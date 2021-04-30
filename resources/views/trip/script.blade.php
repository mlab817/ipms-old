@push('scripts')
    <script type="text/javascript">
        function formatToMoney(value) {
            // console.log('formatToMoney initial value: ', value)
            if (parseFloat(value) === 0) return 0
            return value
                .toString()
                .replace(/\.00$/,'')
                .replace(/^0+/,'')
                .replace(/\D/g, '')
                .replace(/\B(?=(\d{3})+(?!\d))/g, ',')
        }

        $('input.money').keyup(function (evt) {
            if (event.which >= 37 && event.which <= 40) return

            $(this).val(function (index, value) {
                if (parseInt(value) === 0) return 0
                return formatToMoney(value)
            })
        })

        function initializeSelect2() {
            $('select').select2({
                theme: 'bootstrap4'
            })
        }

        function calculateSum(items) {
            // console.log('calculating sum of ', items)
            // initialize sum variable
            let sum = 0
            // iterate over items
            $('.' + items).each(function() {
                // format the value first
                let $this = $(this)
                let val = parseFloat($this.val() ? $this.val().replace(/,/g, '') : 0)
                sum += val
            })

            $('#' + items + '_total').val(formatToMoney(sum))
        }

        const regions = @json($regions->pluck('id')->toArray())

        const fundingSources = @json($funding_sources->pluck('id')->toArray())

        const years = [2016, 2017, 2018, 2019, 2020, 2021, 2022, 2023]

        const $doc = $(document)

        const itemsToSum = [
            'resettlement_action_plan',
            'right_of_way',
            'fs_infrastructures',
            'region_infrastructures',
        ]

        regions.forEach(region => {
            itemsToSum.push('region_infrastructures_' + region)
        })

        fundingSources.forEach(fs => {
            itemsToSum.push('fs_infrastructures_' + fs)
        })

        years.forEach(year => {
            itemsToSum.push('region_infrastructures_' + year)
            itemsToSum.push('fs_infrastructures_' + year)
        })

        console.log(itemsToSum)

        $doc.ready(function() {
            initializeSelect2()

            $('.money').each(function() {
                $(this).val(formatToMoney($(this).val()))
            })

            itemsToSum.forEach(item => {
                calculateSum(item)
            })
        })

        itemsToSum.forEach(item => {
            $('.' + item).on('keyup', function () {
                calculateSum(item)
            })
        })
    </script>
@endpush
