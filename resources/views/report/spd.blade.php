<table id="example" class="table table-bordered table-striped">
<thead>
  <tr>
    <th style="text-align: center;vertical-align: middle;" rowspan="2">Nama Pelaksana</th>
    <th style="text-align: center;vertical-align: middle;" rowspan="2">Nama Pelaksana</th>
    <th style="text-align: center;vertical-align: middle;" rowspan="2">No.Telp</th>
    <th style="text-align: center;vertical-align: middle;" rowspan="2">SPT dan Tanggal</th>
    <th style="text-align: center;vertical-align: middle;" rowspan="2">NO SP2D dan Tanggal</th>
    <th style="text-align: center;vertical-align: middle;" rowspan="2">Tujuan</th>
    <th style="text-align: center;vertical-align: middle;" rowspan="2">Tanggal Berangkat</th>
    <th style="text-align: center;vertical-align: middle;" rowspan="2">Tanggal Kembali</th>
    <th style="text-align: center;vertical-align: middle;" rowspan="2">Uang Harian</th>
    <th style="text-align: center;vertical-align: middle;" colspan="6">Transportasi</th>
    <th style="text-align: center;vertical-align: middle;" colspan="4">Hotel/Penginapan</th>
    <th style="text-align: center;vertical-align: middle;" rowspan="2">Total SPJ</th>
</tr>
<tr>
    <th style="text-align: center;vertical-align: middle;" >Pesawat/Kapal</th>
    <th style="text-align: center;vertical-align: middle;" >No Penerbangan</th>
    <th style="text-align: center;vertical-align: middle;" >No Tiket</th>
    <th style="text-align: center;vertical-align: middle;" >Kode Booking</th>
    <th style="text-align: center;vertical-align: middle;" >Harga</th>
    <th style="text-align: center;vertical-align: middle;" >Taxi</th>
    <th style="text-align: center;vertical-align: middle;" >Nama</th>
    <th style="text-align: center;vertical-align: middle;" >Harga</th>
    <th style="text-align: center;vertical-align: middle;" >No. Telp</th>
    <th style="text-align: center;vertical-align: middle;" >Provinsi</th>
</tr> 
</thead>
<tbody>
    @foreach ($spd as $spd)
    <tr>
    <td>{{ $spd->user->name }}</td>
    <td>{{ $spd->user->no_telp }}</td>
    <td>@if($spd->nomor_spt!==null)
        {{ $spd->nomor_spt }} tanggal {{ date('d/m/Y', strtotime($spd->tgl_spt)); }}
        @endif</td>
    <td>@if($spd->nomor_spd!==null)
        {{ $spd->nomor_spd }} tanggal {{ date('d/m/Y', strtotime($spd->tgl_spd)); }}
        @endif
    </td>
    <td>{{ $spd->tujuan }}</td>
    <td>{{ $spd->berangkat }}</td>
    <td>{{ $spd->pulang }}</td>
    <td>{{ $spd->uang_harian }}</td>
    <td>{{ $spd->pesawat }}</td>
    <td>{{ $spd->no_penerbangan }}</td>
    <td>{{ $spd->no_tiket }}</td>
    <td>{{ $spd->kode_booking }}</td>
    <td>{{ $spd->harga_pesawat }}</td>
    <td>{{ $spd->taxi }}</td>
    <td>{{ $spd->hotel }}</td>
    <td>{{ $spd->harga_hotel }}</td>
    <td>{{ $spd->no_telp }}</td>
    <td>{{ $spd->provinsi }}</td>
    <td>{{ $spd->total }}</td>
    </tr>
      @endforeach
</tbody>
</table>