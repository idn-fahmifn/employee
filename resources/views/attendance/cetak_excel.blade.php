<table>
    <thead>
        <tr>
            <th width="5%">#</th>
            <th>Nama Karyawan</th>
            <th>Tanggal</th>
            <th>Checkin</th>
            <th>Checkout</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($attendance as $row)
        <tr>
            <td>{{ $row->users->name }}</td>
            <td>{{ $row->date }}</td>
            <td>{{ $row->check_in }}</td>
            <td>{{ $row->check_out }}</td>
            <td>{{ $row->keterangan }}</td>
        </tr>
        @endforeach

    </tbody>
</table>
