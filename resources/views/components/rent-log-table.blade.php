<div>
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Users</th>
                <th>Books</th>
                <th>Rent Date</th>
                <th>Return Date</th>
                <th>Actual Return Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rentlog as $item)
                <tr class="{{ $item->actual_return_date == null ? '' : ($item->return_date < $item->actual_return_date ? 'text-light bg-danger' : 'text-light bg-success')}} ">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ optional($item->user)->username }}</td>
                    <td>{{ optional($item->book)->title }}</td>
                    <td>{{ $item->rent_date }}</td>
                    <td>{{ $item->return_date }}</td>
                    <td>{{ $item->actual_return_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>