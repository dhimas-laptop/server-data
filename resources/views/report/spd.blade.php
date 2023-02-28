<table style="border-collapse: collapse;">
<thead>
  <tr></tr>
  <tr></tr>
  <tr>
      <th align="center" colspan="19"><b>REKAPITULASI PERJALANAN DINAS</b></th>
  </tr>
  <tr></tr>
  <tr>
    <th align="center" valign="center" rowspan="2" style="border: 3px solid black;background: yellow;"><b>Nama Pelaksana</b></th>
    <th align="center" valign="center" rowspan="2" style="border: 3px solid black;background: yellow;"><b>No.Telp</b></th>
    <th align="center" valign="center" rowspan="2" style="border: 3px solid black;background: yellow;"><b>SPT dan Tanggal</b></th>
    <th align="center" valign="center" rowspan="2" style="border: 3px solid black;background: yellow;"><b>NO SP2D dan Tanggal</b></th>
    <th align="center" valign="center" rowspan="2" style="border: 3px solid black;background: yellow;"><b>Tujuan</b></th>
    <th align="center" valign="center" rowspan="2" style="border: 3px solid black;background: yellow;"><b>Tanggal<br>Berangkat</b></th>
    <th align="center" valign="center" rowspan="2" style="border: 3px solid black;background: yellow;"><b>Tanggal<br>Kembali</b></th>
    <th align="center" valign="center" rowspan="2" style="border: 3px solid black;background: yellow;"><b>Uang<br>Harian</b></th>
    <th align="center" valign="center" colspan="6" style="border: 3px solid black;background: yellow;"><b>Transportasi</b></th>
    <th align="center" valign="center" colspan="4" style="border: 3px solid black;background: yellow;"><b>Hotel/<br>Penginapan</b></th>
    <th align="center" valign="center" rowspan="2" style="border: 3px solid black;background: yellow;"><b>Total<br>SPJ</b></th>
</tr>
<tr>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>Pesawat/<br>Kapal</b></th>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>No Penerbangan</b></th>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>No Tiket</b></th>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>Kode<br>Booking</b></th>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>Harga</b></th>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>Taxi</b></th>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>Nama</b></th>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>Harga</b></th>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>No. Telp</b></th>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>Provinsi</b></th>
</tr> 
</thead>
<tbody>
    @foreach ($spd as $spd)
    <tr>
    <td style="border: 1px solid black;">@if ($spd->nama_lain != null)
        {{ $spd->nama_lain}} 
    @else
        {{ $spd->user->name }}
    @endif</td>
    <td style="border: 1px solid black;">'@if ($spd->no_lain != null)
        {{ $spd->no_lain}} 
    @else
        {{ $spd->user->no_telp }}
    @endif</td>
    <td style="border: 1px solid black;">@if($spd->nomor_spt!==null)
        {{ $spd->nomor_spt }} <br>tanggal {{ date('d/m/Y', strtotime($spd->tgl_spt)); }}
        @endif</td>
    <td style="border: 1px solid black;">@if($spd->nomor_spd!==null)
        {{ $spd->nomor_spd }} <br>tanggal {{ date('d/m/Y', strtotime($spd->tgl_spd)); }}
        @endif
    </td>
    <td style="border: 1px solid black;">{{ $spd->tujuan }}</td>
    <td style="border: 1px solid black;">{{ date('d/m/Y', strtotime($spd->berangkat)) }}</td>
    <td style="border: 1px solid black;">{{ date('d/m/Y', strtotime($spd->pulang)) }}</td>
    <td style="border: 1px solid black;">{{ $spd->uang_harian }}</td>
    <td style="border: 1px solid black;">{{ $spd->pesawat }}</td>
    <td style="border: 1px solid black;">'{{ $spd->no_penerbangan }}</td>
    <td style="border: 1px solid black;">'{{ $spd->no_tiket }}</td>
    <td style="border: 1px solid black;">'{{ $spd->kode_booking }}</td>
    <td style="border: 1px solid black;">{{ $spd->harga_pesawat }}</td>
    <td style="border: 1px solid black;">{{ $spd->taxi }}</td>
    <td style="border: 1px solid black;">{{ $spd->hotel }}</td>
    <td style="border: 1px solid black;">{{ $spd->harga_hotel }}</td>
    <td style="border: 1px solid black;">{{ $spd->no_telp }}</td>
    <td style="border: 1px solid black;">{{ $spd->provinsi }}</td>
    <td style="border: 1px solid black;">{{ $spd->total }}</td>
    </tr>
      @endforeach

      <tr></tr>
      <tr>
          @for ($i = 0;$i<15;$i++)
          <th></th> 
          @endfor
      <th colspan="2">Tanjungpinang, </th>
    </tr>

    <tr>
        @for ($i = 0;$i<15;$i++)
        <th></th> 
        @endfor
    <th colspan="2">Pejabat Pembuat Komitmen </th>
    </tr>

    @for ($i = 0;$i<4;$i++)
    <tr></tr>
    @endfor
    
    <tr>
        @for ($i = 0;$i<15;$i++)
        <th></th> 
        @endfor
    <th colspan="2"></th>
    </tr>
    <tr>
        @for ($i = 0;$i<15;$i++)
        <th></th> 
        @endfor
    <th colspan="2">NIP.</th>
    </tr>
    
</tbody>
</table>