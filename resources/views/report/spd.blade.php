<table style="border-collapse: collapse;">
<thead>
  <tr></tr>
  <tr></tr>
  <tr>
      <th align="center" colspan="20"><b>REKAPITULASI PERJALANAN DINAS</b></th>
  </tr>
  <tr></tr>
  <tr>
    <th align="center" valign="center" rowspan="2" style="border: 3px solid black;background: yellow;"><b>No.</b></th>
    <th align="center" valign="center" rowspan="2" style="border: 3px solid black;background: yellow;"><b>Nama<br>Pelaksana</b></th>
    <th align="center" valign="center" rowspan="2" style="border: 3px solid black;background: yellow;"><b>No.Telp</b></th>
    <th align="center" valign="center" rowspan="2" style="border: 3px solid black;background: yellow;"><b>SPT</b></th>
    <th align="center" valign="center" rowspan="2" style="border: 3px solid black;background: yellow;"><b>Tanggal SPT</b></th>
    <th align="center" valign="center" rowspan="2" style="border: 3px solid black;background: yellow;"><b>NO SP2D</th>
    <th align="center" valign="center" rowspan="2" style="border: 3px solid black;background: yellow;"><b>Tanggal SP2D</b></th>
    <th align="center" valign="center" rowspan="2" style="border: 3px solid black;background: yellow;"><b>NO SPM</b></th>
    <th align="center" valign="center" rowspan="2" style="border: 3px solid black;background: yellow;"><b>Tujuan</b></th>
    <th align="center" valign="center" rowspan="2" style="border: 3px solid black;background: yellow;"><b>Tanggal<br>Berangkat</b></th>
    <th align="center" valign="center" rowspan="2" style="border: 3px solid black;background: yellow;"><b>Tanggal<br>Kembali</b></th>
    <th align="center" valign="center" rowspan="2" style="border: 3px solid black;background: yellow;"><b>Uang<br>Harian</b></th>
    <th align="center" valign="center" colspan="6" style="border: 3px solid black;background: yellow;"><b>Transportasi</b></th>
    <th align="center" valign="center" colspan="4" style="border: 3px solid black;background: yellow;"><b>Hotel/Penginapan</b></th>
    <th align="center" valign="center" rowspan="2" style="border: 3px solid black;background: yellow;"><b>Total<br>SPJ</b></th>
    <th align="center" valign="center" rowspan="2" style="border: 3px solid black;background: yellow;"><b>Kode<br>Kegiatan</b></th>
    <th align="center" valign="center" rowspan="2" style="border: 3px solid black;background: yellow;"><b>status</b></th>
</tr>
<tr>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>Pesawat/Kapal</b></th>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>No<br>Penerbangan</b></th>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>No Tiket</b></th>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>Kode<br>Booking</b></th>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>Harga</b></th>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>Transportasi<br>Darat</b></th>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>Nama</b></th>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>Harga</b></th>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>No. Telp</b></th>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>Provinsi/<br>Kabupaten</b></th>
</tr> 
</thead>
<tbody>
    @foreach ($spd as $spd)
    <tr>
    <td style="border: 1px solid black;" align="center" valign="top">{{ $no++ }}</td>
    <td style="border: 1px solid black;text-transform: uppercase;" valign="top">@if ($spd->nama_lain != null)
        {{ $spd->nama_lain}} 
    @else
        {{ $spd->user->name }}
    @endif</td>
    <td style="border: 1px solid black;" valign="top">@if ($spd->no_lain != null)
        {{ $spd->no_lain}}       
    @endif 
    @if ($spd->user != null)
        {{ $spd->user->no_telp }}
    @endif
    @if ($spd->user == null && $spd->no_lain == null )
        -
    @endif    
    </td>
    <td style="border: 1px solid black;text-transform: uppercase;" valign="top">@if($spd->nomor_spt!==null)
        {{ $spd->nomor_spt }}
        @endif</td>
    <td style="border: 1px solid black;text-transform: uppercase;" valign="top">@if($spd->nomor_spt!==null)
        {{ date('d/m/Y', strtotime($spd->tgl_spt)); }}
        @endif</td>
    <td style="border: 1px solid black;" valign="top">@if($spd->nomor_spd!==null)
        {{ $spd->nomor_spd }}
        @endif
    </td>
    <td style="border: 1px solid black;" valign="top">@if($spd->nomor_spd!==null)
       {{ date('d/m/Y', strtotime($spd->tgl_spd)); }}
        @endif
    </td>
    <td style="border: 1px solid black;" valign="top">@if($spd->no_spm!==null)
        {{ $spd->no_spm }}
        @endif
    </td>
    <td style="border: 1px solid black;text-transform: uppercase;" valign="top">{{ $spd->tujuan }}</td>
    <td style="border: 1px solid black;" valign="top">{{ date('d/m/Y', strtotime($spd->berangkat)) }}</td>
    <td style="border: 1px solid black;" valign="top">{{ date('d/m/Y', strtotime($spd->pulang)) }}</td>
    <td style="border: 1px solid black;" valign="top">{{ $spd->uang_harian }}</td>
    <td style="border: 1px solid black;text-transform: uppercase;" valign="top">{{ $spd->pesawat }}</td>
    <td style="border: 1px solid black;text-transform: uppercase;" valign="top">{{ $spd->no_penerbangan }}</td>
    <td style="border: 1px solid black;text-transform: uppercase;" valign="top">{{ $spd->no_tiket }}</td>
    <td style="border: 1px solid black;text-transform: uppercase;" valign="top">{{ $spd->kode_booking }}</td>
    <td style="border: 1px solid black;" valign="top">{{ $spd->harga_pesawat }}</td>
    <td style="border: 1px solid black;" valign="top">{{ $spd->taxi }}</td>
    <td style="border: 1px solid black;" valign="top">{{ $spd->hotel }}</td>
    <td style="border: 1px solid black;" valign="top">{{ $spd->harga_hotel }}</td>
    <td style="border: 1px solid black;" valign="top">{{ $spd->no_telp }}</td>
    <td style="border: 1px solid black;text-transform: uppercase;" valign="top">{{ $spd->provinsi }}</td>
    <td style="border: 1px solid black;" valign="top">{{ $spd->total }}</td>
    <td style="border: 1px solid black;" valign="top">{{ $spd->kode }}</td>
    <td style="border: 1px solid black;" valign="top">@if ($spd->status_lain!==null)
        {{ $spd->status_lain }}
    @else
        KLHK    
    @endif
    </td>
    </tr>
      @endforeach
    
</tbody>
</table>