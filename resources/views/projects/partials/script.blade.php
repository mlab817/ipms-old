@push('scripts')
    <script>
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

        function formatToMoney(value) {
            console.log('formatToMoney initial value: ', value)
            if (parseFloat(value) === 0) return 0
            return value
                .toString()
                .replace(/^0+/,'')
                .replace(/\D/g, '')
                .replace(/\B(?=(\d{3})+(?!\d))/g, ',')
        }

        function sumRow(change, total_element = '') {
            console.log(change)
            let sum = 0
            $('.' + change).each(function() {
                const val = parseFloat($(this).val() && $(this).val().replace(/,/g, ''))
                console.log('val: ', val)
                sum += val
                console.log('sum: ', sum)
            })
            const formatted = formatToMoney(sum)
            console.log(formatted)
            if (total_element) {
                $(total_element).val(formatted)
            } else {
                $("#" + change + "_total").val(formatted)
            }
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

        const doc = $(document)

        doc.ready(function () {
            console.log('test jQuery')
        })

        doc.ready(function() {
            let noPdpIndicator = htmlElements.pdpIndicatorCheckbox.prop('checked')
            togglePdpIndicators(noPdpIndicator)
        })

        const listenersForSum = [
            'fs',
            'nep',
            'gaa',
            'disbursement',
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

        listenersForSum.forEach(listener => {
            doc.on('keyup blur', '.' + listener, function() {
                sumRow(listener)
            })
        })

        doc.on('keyup blur', '.fs_investments', function() {
            sumRow('fs_investments')
        })
    </script>
@endpush
