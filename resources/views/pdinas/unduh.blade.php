<table class="table table-bordered">
        <thead>
            <tr>
                <th class="align-middle text-center" rowspan="2">No</th>
                <th class="align-middle text-center" rowspan="2">Nama Pelaksana</th>
                <th class="align-middle text-center" rowspan="2">No.Telp</th>
                <th class="align-middle text-center" rowspan="2">SPT dan Tanggal</th>
                <th class="align-middle text-center" rowspan="2">NO SP2D dan Tanggal</th>
                <th class="align-middle text-center" rowspan="2">Tujuan</th>
                <th class="align-middle text-center" rowspan="2">Tanggal Berangkat</th>
                <th class="align-middle text-center" rowspan="2">Tanggal Kembali</th>
                <th class="align-middle text-center" rowspan="2">Uang Harian</th>
                <th class="align-middle text-center" colspan="6">Transportasi</th>
                <th class="align-middle text-center" colspan="4">Hotel/Penginapan</th>
                <th class="align-middle text-center" rowspan="2">Total SPJ</th>
            </tr>
            <tr>
                <th class="align-middle text-center">Pesawat/Kapal</th>
                <th class="align-middle text-center">No Penerbangan</th>
                <th class="align-middle text-center">No Tiket</th>
                <th class="align-middle text-center">Kode Booking</th>
                <th class="align-middle text-center">Harga</th>
                <th class="align-middle text-center">Taxi</th>
                <th class="align-middle text-center">Nama</th>
                <th class="align-middle text-center">Harga</th>
                <th class="align-middle text-center">No. Telp</th>
                <th class="align-middle text-center">Provinsi</th>
            </tr> 
        </thead>
    <tbody>
        <td>{{ $spd->id }}</td>
        <td>{{ $spd->user->name }}</td>
        <td>{{ $spd->user->no_telp }}</td>
        <td>{{ $spd->spt->nomor }} tanggal {{ $spd->spt->tgl_surat }}</td>
        <td>{{ $spd->nomor }} tanggal {{ $spd->tgl_surat }}</td>
        <td>{{ $spd->spt->tujuan }}</td>
        <td>{{ $spd->spt->berangkat }}</td>
        <td>{{ $spd->spt->pulang }}</td>
        <td>{{ $spd->rincian->uang_harian }}</td>
        <td>{{ $spd->rincian->pesawat }}</td>
        <td>{{ $spd->rincian->no_pesawat }}</td>
        <td>{{ $spd->rincian->no_tiket }}</td>
        <td>{{ $spd->rincian->kode_booking }}</td>
        <td>{{ $spd->rincian->harga }}</td>
        <td>{{ $spd->rincian->taxi }}</td>
        <td>{{ $spd->rincian->nama }}</td>
        <td>{{ $spd->rincian->harga_penginapan }}</td>
        <td>{{ $spd->rincian->no_telp }}</td>
        <td>{{ $spd->rincian->provinsi }}</td>
        <td>{{ $spd->rincian->total }}</td>
    </tbody>
        
 </table>

