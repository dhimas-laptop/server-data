<table style="border-collapse: collapse;">
<thead>
  <tr></tr>
  <tr></tr>
  <tr>
      <th align="center" colspan="19"><b>REKAPITULASI PERJALANAN DINAS BULAN     
      @if ($month === 1)
      JANUARI @endif
      @if ($month === 2)
      FEBRUARI @endif
      @if ($month === 3)
      MARET @endif
      @if ($month === 4)
      APRIL @endif
      @if ($month === 5)
      MEI @endif
      @if ($month === 6)
      JUNI @endif
      @if ($month === 7)
      JULI @endif
      @if ($month === 8)
      AGUSTUS @endif
      @if ($month === 9)
      SEPTEMBER @endif
      @if ($month === 10)
      OKTOBER @endif
      @if ($month === 11)
      NOVEMBER @endif
      @if ($month === 12)
      DESEMBER @endif

      TAHUN {{ $year }}
      </b></th>
  </tr>
  <tr><th>Nama</th><th colspan="2">: {{ auth()->user()->name }}</th></tr>
  <tr><th>NIP</th><th colspan="2">: {{ auth()->user()->nip }}</th></tr>
  <tr><th>Bagian</th><th colspan="2">: @if (auth()->user()->role === 'admin') Tata Usaha @endif
    @if (auth()->user()->role === 'tu') Subbag Tata Usaha @endif
    @if (auth()->user()->role === 'ev') Evaluasi @endif
    @if (auth()->user()->role === 'rhl') Rehabilitasi Hutan dan Lahan @endif
    @if (auth()->user()->role === 'prog') Program @endif
  </th></tr>
  <tr></tr>
  <tr>
    <th align="center" valign="center" rowspan="2" style="border: 3px solid black;background: yellow;"><b>Nama Pelaksana</b></th>
    <th align="center" valign="center" rowspan="2" style="border: 3px solid black;background: yellow;"><b>No.Telp</b></th>
    <th align="center" valign="center" rowspan="2" style="border: 3px solid black;background: yellow;"><b>SPT dan Tanggal</b></th>
    <th align="center" valign="center" rowspan="2" style="border: 3px solid black;background: yellow;"><b>NO SP2D dan Tanggal</b></th>
    <th align="center" valign="center" rowspan="2" style="border: 3px solid black;background: yellow;"><b>Tujuan</b></th>
    <th align="center" valign="center" rowspan="2" style="border: 3px solid black;background: yellow;"><b>Tanggal Berangkat</b></th>
    <th align="center" valign="center" rowspan="2" style="border: 3px solid black;background: yellow;"><b>Tanggal Kembali</b></th>
    <th align="center" valign="center" rowspan="2" style="border: 3px solid black;background: yellow;"><b>Uang Harian</b></th>
    <th align="center" valign="center" colspan="6" style="border: 3px solid black;background: yellow;"><b>Transportasi</b></th>
    <th align="center" valign="center" colspan="4" style="border: 3px solid black;background: yellow;"><b>Hotel/Penginapan</b></th>
    <th align="center" valign="center" rowspan="2" style="border: 3px solid black;background: yellow;"><b>Total SPJ</b></th>
</tr>
<tr>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>Pesawat/Kapal</b></th>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>No Penerbangan</b></th>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>No Tiket</b></th>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>Kode Booking</b></th>
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
    <td style="border: 1px solid black;">{{ $spd->user->name }}</td>
    <td style="border: 1px solid black;">'{{ $spd->user->no_telp }}</td>
    <td style="border: 1px solid black;">@if($spd->nomor_spt!==null)
        {{ $spd->nomor_spt }} tanggal {{ date('d/m/Y', strtotime($spd->tgl_spt)); }}
        @endif</td>
    <td style="border: 1px solid black;">@if($spd->nomor_spd!==null)
        {{ $spd->nomor_spd }} tanggal {{ date('d/m/Y', strtotime($spd->tgl_spd)); }}
        @endif
    </td>
    <td style="border: 1px solid black;">{{ $spd->tujuan }}</td>
    <td style="border: 1px solid black;">{{ $spd->berangkat }}</td>
    <td style="border: 1px solid black;">{{ $spd->pulang }}</td>
    <td style="border: 1px solid black;">{{ $spd->uang_harian }}</td>
    <td style="border: 1px solid black;">{{ $spd->pesawat }}</td>
    <td style="border: 1px solid black;">{{ $spd->no_penerbangan }}</td>
    <td style="border: 1px solid black;">'{{ $spd->no_tiket }}</td>
    <td style="border: 1px solid black;">{{ $spd->kode_booking }}</td>
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
      <th colspan="2">Tanjungpinang, {{ $year }}</th>
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
    <th colspan="2">{{ auth()->user()->name }} </th>
    </tr>
    <tr>
        @for ($i = 0;$i<15;$i++)
        <th></th> 
        @endfor
    <th colspan="2">NIP.{{ auth()->user()->nip }} </th>
    </tr>
    
</tbody>
</table>