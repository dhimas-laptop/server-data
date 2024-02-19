<table style="border-collapse: collapse;">
<thead>
  <tr></tr>
  <tr></tr>
  <tr>
      <th align="center" colspan="13"><b>REKAPITULASI PERJALANAN DINAS</b></th>
  </tr>
  <tr></tr>
  <tr>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>No.</b></th>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>Nama<br>Pelaksana</b></th>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>No.Telp</b></th>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>SPT dan Tanggal</b></th>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>Tanggal SPT</b></th>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>Tujuan</b></th>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>Tanggal<br>Berangkat</b></th>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>Tanggal<br>Kembali</b></th>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>Uang<br>Harian</b></th>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>Transportasi</b></th>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>Hotel/Penginapan</b></th>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>Total<br>SPJ</b></th>
    <th align="center" valign="center" style="border: 3px solid black;background: yellow;"><b>Kode<br>Kegiatan</b></th>
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
    <td style="border: 1px solid black;text-transform: uppercase;" valign="top">@if($spd->tgl_spt!==null)
        {{ date('d/m/Y', strtotime($spd->tgl_spt)); }}
        @endif</td>
    <td style="border: 1px solid black;text-transform: uppercase;" valign="top">{{ $spd->tujuan }}</td>
    <td style="border: 1px solid black;" valign="top">{{ date('d/m/Y', strtotime($spd->berangkat)) }}</td>
    <td style="border: 1px solid black;" valign="top">{{ date('d/m/Y', strtotime($spd->pulang)) }}</td>
    <td style="border: 1px solid black;" valign="top">{{ $spd->uang_harian }}</td>
    <td style="border: 1px solid black;" valign="top">{{ $spd->harga_pesawat + $spd->taxi }}</td>
    <td style="border: 1px solid black;" valign="top">{{ $spd->harga_hotel }}</td>
    <td style="border: 1px solid black;" valign="top">{{ $spd->total }}</td>
    <td style="border: 1px solid black;" valign="top">{{ $spd->kode }}</td>
    </tr>
      @endforeach

      <tr></tr>
      <tr>
          @for ($i = 0;$i<9;$i++)
          <th></th> 
          @endfor
      <th colspan="2">Tanjungpinang, </th>
    </tr>

    <tr>
        @for ($i = 0;$i<9;$i++)
        <th></th> 
        @endfor
    <th colspan="2">Pejabat Pembuat Komitmen </th>
    </tr>

    @for ($i = 0;$i<4;$i++)
    <tr></tr>
    @endfor
    
    <tr>
        @for ($i = 0;$i<9;$i++)
        <th></th> 
        @endfor
    <th colspan="2"></th>
    </tr>
    <tr>
        @for ($i = 0;$i<9;$i++)
        <th></th> 
        @endfor
    <th colspan="2">NIP.</th>
    </tr>
    
</tbody>
</table>