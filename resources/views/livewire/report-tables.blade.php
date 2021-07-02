<div class="d-table table-fixed width-full">
    <div class="d-flex flex-row">
        <div class="d-table-cell">
            Item
        </div>
        <div class="d-table-cell">
            Item
        </div>
        <div class="d-table-cell">
            Item
        </div>
        <div class="d-table-cell">
            Item
        </div>
        <div class="d-table-cell">
            Item
        </div>
        <div class="d-table-cell">
            Item
        </div>
        <div class="d-table-cell">
            Item
        </div>
        <div class="d-table-cell">
            Item
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <td>Item</td>
                <td class="text-right">2016</td>
                <td class="text-right">2017</td>
                <td class="text-right">2018</td>
                <td class="text-right">2019</td>
                <td class="text-right">2020</td>
                <td class="text-right">2021</td>
                <td class="text-right">2022</td>
                <td class="text-right">2023</td>
                <td class="text-right">Total</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td class="text-right">{{ number_format($item->investments_sum_y2016 / 1000000, 2) }}</td>
                <td class="text-right">{{ number_format($item->investments_sum_y2017 / 1000000, 2) }}</td>
                <td class="text-right">{{ number_format($item->investments_sum_y2018 / 1000000, 2) }}</td>
                <td class="text-right">{{ number_format($item->investments_sum_y2019 / 1000000, 2) }}</td>
                <td class="text-right">{{ number_format($item->investments_sum_y2020 / 1000000, 2) }}</td>
                <td class="text-right">{{ number_format($item->investments_sum_y2021 / 1000000, 2) }}</td>
                <td class="text-right">{{ number_format($item->investments_sum_y2022 / 1000000, 2) }}</td>
                <td class="text-right">{{ number_format($item->investments_sum_y2023 / 1000000, 2) }}</td>
                <td>Total</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
