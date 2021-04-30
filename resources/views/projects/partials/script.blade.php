@push('scripts')
    <script>
        function formatToMoney(value) {
            console.log('formatToMoney initial value: ', value)
            if (parseFloat(value) === 0) return 0
            return value
                .toString()
                .replace(/\.00$/,'')
                .replace(/^0+/,'')
                .replace(/\D/g, '')
                .replace(/\B(?=(\d{3})+(?!\d))/g, ',')
        }

        const htmlElements = {
            pdpIndicatorCheckbox: $('#no_pdp_indicator'),
            pdpChapterId: $('#pdp_chapter_id')
        }

        htmlElements.pdpIndicatorCheckbox.on('change', function(evt) {
            let val = $(this).prop('checked')
            togglePdpIndicators(val)
        })

        htmlElements.pdpChapterId.on('change', function(evt) {
            // hide PDP indicators
            showSelectedPdpIndicatorsByChapter(evt.target.value)
        })

        $('input.money').keyup(function (evt) {
            if (event.which >= 37 && event.which <= 40) return

            $(this).val(function (index, value) {
                if (parseInt(value) === 0) return 0
                return formatToMoney(value)
            })
        })

        const listenersForSum = [
            'nep',
            'fs',
            'allocation',
            'disbursement',
            'fs_investments',
            'fs_investments_2016',
            'fs_investments_2017',
            'fs_investments_2018',
            'fs_investments_2019',
            'fs_investments_2020',
            'fs_investments_2021',
            'fs_investments_2022',
            'fs_investments_2023',
            'fs_investments_1',
            'fs_investments_2',
            'fs_investments_3',
            'fs_investments_4',
            'fs_investments_5',
            'fs_investments_6',
            'fs_investments_7',
            'fs_investments_8',
            'fs_investments_9',
            'region_investments_2016',
            'region_investments_2017',
            'region_investments_2018',
            'region_investments_2019',
            'region_investments_2020',
            'region_investments_2021',
            'region_investments_2022',
            'region_investments_2023',
            'region_investments',
        ]

        const regions = @json($regions->pluck('id')->toArray()).map(region => ('region_investments_' + region))

        listenersForSum.push(...regions)

        const $doc = $(document)

        // function initializeListeners() {
        //     listenersForSum.forEach(listener => {
        //         $doc.on('keyup blur', '.' + listener, function() {
        //             sumRow(listener)
        //         })
        //     })
        //     console.log('initialized')
        // }

        function initializeSelect2() {
            $('select').select2({
                theme: 'bootstrap4'
            })
        }

        function filterPdpIndicators() {
            let $noPdpIndicator = $('#no_pdp_indicator'),
                $pdpChapterId = $('#pdp_chapter_id'),
                $pdpIndicators = $('input.pdp_indicators')

            // if there is no pdp indicator
            if ($noPdpIndicator.val() === 1) {
                if (val) {
                    $pdpIndicators.prop('disabled', true)
                } else {
                    $pdpIndicators.prop('disabled', false)
                }
            }
        }

        function togglePdpIndicators(val)
        {
            let allPdpIndicators = $('input.pdp_indicators')
            if (val) {
                allPdpIndicators.prop('disabled', true)
            } else {
                allPdpIndicators.prop('disabled', false)
            }
        }

        function showSelectedPdpIndicatorsByChapter(val)
        {
            if (val) {
                $('.pdp_chapters').hide()
                $('.pdp_indicators').prop('checked', false)
                $("div#pdp_chapter_" + val).show()
            }
        }


        function calculateSum(items) {
            console.log('calculating sum of ', items)
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

        $doc.ready(function () {
            let noPdpIndicator = htmlElements.pdpIndicatorCheckbox.prop('checked')
            togglePdpIndicators(noPdpIndicator)

            initializeSelect2()

            filterPdpIndicators()

            $('.money').each(function() {
                $(this).val(formatToMoney($(this).val()))
            })

            listenersForSum.forEach(listener => {
                console.log('calculating for ', listener)
                calculateSum(listener)
            })
        })
    </script>
@endpush
