<head>
  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
  <div style="display: none;">{{ $lg = $data['data']['order'][0]['longitude'] }}</div>
  <div style="display: none;">{{ $lt = $data['data']['order'][0]['latitude'] }}</div>  
  <script>
    var lt = {{ $lt }};
    var lg = {{ $lg }};
    var map = L.map('map').setView([ lt , lg], 14);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
  maxZoom: 19,
  }).addTo(map);
   var marker = L.marker([lt, lg]).addTo(map);
</script>
<style>
    .header{
        width: 100%;
        align: center;
        line-height: 1.5;
    }
    .kop {
        font-family: tahoma; 
        text-align: center;
        height: 0,5cm;
    }
    td,p {
       font-family: tahoma;
       font-size: 12pt; 
    }
    map { height: 180px; }
    
    .leaflet-container {
        height: 400px;
        width: 750px;
        max-width: 100%;
        max-height: 100%;
    }

    .img {
      width: 100%;
    }

    barcode { position: fixed; top: 0px; left: 0px; right: 0px;}
    footer { position: fixed; bottom: 0px; left: 0px; right: 0px; background-color: lightblue; height: 50px; }
    .div { page-break-after: always; }
    footer:last-child { page-break-after: never; }
</style>
</head>

<div class="div">
  <barcode></barcode>
  <table class="header" cellpadding="0">
    <tbody>
      <tr>
        <td colspan="4">
          <div class="kop">
              <b>KOP SURAT</b>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="4" style="align:right">
           Tanjungpinang, <!-- {{ date("d F Y", strtotime($data['data']['order'][0]['created_at'])) }} -->
        </td>
      </tr>
      <tr>
        <td width="10%">No</td>
        <td colspan="3">: </td>
       </tr>
       <tr>
        <td>Lampiran</td>
        <td colspan="3">: </td>
       </tr>
       <tr>
        <td>Perihal</td>
        <td colspan="3">
          : Permohonan Bantuan Bibit
        </td>
       </tr>
       <tr><td><br></td></tr>
      <tr>
        <td colspan="4">Yth. Kepala balai BPDAS Sei Jang Duriangkang</td>
      </tr>
      <tr>
        <td colspan="4">Di- Tanjungpinang</td>    
      </tr>
      <tr>
        <td style="width: 25mm"><br></td>
        <td style="width: 35mm"><br></td>
        <td style="width: 50mm"><br></td>
        <td><br></td>
      </tr>
      <tr>
        <td colspan="4" valign="top" style="align:justify">
            <p>Sehubungan dengan adanya bibit gratis bagi masyarakat berupa bibit Berkualitas dan bibit Produktif pada Balai Pengelolaan Daerah Aliran Sungai (BPDAS) Sei Jang Duriangkang Provinsi Kepulauan Riau, dengan hormat kami atas nama :</p>
        </td>
      </tr>
      <tr>
        <td colspan="2" style="width: 6cm">
          Nama (kelompok/perorangan)
        </td>
        <td colspan="2">
            : {{$data['data']['pemohon'][0]['nama_pemohon']}}
        </td>
      </tr>
      <tr>
        <td colspan="2">
          Alamat
        </td>
        <td colspan="2">
            : {{$data['data']['pemohon'][0]['alamat']}}
        </td>
      </tr>
      <tr>
        <td colspan="2">
          nomor Telp/HP
        </td>
        <td colspan="2">
            : {{$data['data']['pemohon'][0]['no_telp']}}
        </td>
      </tr>
      <tr style="align:justify">
        <td colspan="4">akan melaksanakan penanaman bibit pohon seluas {{ $data['data']['order'][0]['luas']}} Ha, dengan alamat lokasi di {{$data['data']['order'][0]['alamat_lahan']}} (sketsa lokasi terlampir) dalam rangka kegiatan {{$data['data']['pemohon'][0]['kegiatan']}}</td>
      </tr>
      <tr>
        <td colspan="4"><br><br></td>
      </tr>
      <tr>
        <td colspan="4">Demikian, atas bantuan dan kerja samanya diucapkan terimakasih.</td>
      </tr>
      <tr>
        <td><br></td>
      </tr>
      <tr>
        <td colspan="3"></td>
        <td>Pemohon,</td>
      </tr>
      <tr>
        <td><br></td>
      </tr>
      <tr>
        <td colspan="3"></td>
        <td><img src="https://api.qrserver.com/v1/create-qr-code/?data=https://bpdas-sjd.id/view/{{$data['data']['order'][0]['id']}}&amp;size=100x100" alt="" title="" /></td>
      </tr>
      
      <tr>
        <td><br></td>
      </tr>
      <tr>
        <td colspan="3"></td>
        <td width="30%">{{$data['data']['pemohon'][0]['nama_pemohon']}}</td>
      </tr>
    </tbody>
  </table>
  <footer>
    <p><i>Dokumen ini dibuat dengan Sistem aplikasi Smart-Bibit</i></p>
  </footer>
</div>

<div style="page-break-after:always;margin: 1cm;">
  <table class="header" cellpadding="0">
      <tbody>
        <tr>
          <td colspan="4">
            <div class="kop">
                <b>SURAT PERNYATAAN KESANGGUPAN MELAKSANAKAN PENANAMAN DAN PEMELIHARAAN BIBIT BERKUALITAS / BIBIT PRODUKTIF</b>
            </div>
          </td>
        </tr>
        <tr>
          <td><br></td>
        </tr>
        <tr>
          <td colspan="4">Kami yang bertanda tangan di bawah ini:</td>
         </tr>
         <tr>
          <td style="width: 5cm"><br></td>
          <td style="width: 3cm"><br></td>
          <td style="width: 2cm"><br></td>
          <td><br></td>
         </tr>
         <tr>
          <td>Nama</td>
          <td colspan="3">
            : {{$data['data']['pemohon'][0]['nama_pemohon']}}
          </td>
         </tr>
         <tr>
          <td>Jabatan</td>
          <td colspan="3">
            : @if ($data['data']['pemohon'][0]['kelompok']==null)
                
            @else
               Ketua 
            @endif
          </td>
         </tr>
         <tr>
          <td>Instansi/lembaga/kelompok</td>
          <td colspan="3">
            : @if ($data['data']['pemohon'][0]['kelompok']==null)
                
            @else
              {{ $data['data']['pemohon'][0]['kelompok'] }} 
            @endif
          </td>
         </tr>
         <tr>
          <td>Jumlah Tanaman</td>
          <td>
            : {{ $data['data']['order'][0]['total'] }}
          </td>
          <td>Batang</td>
         </tr>
         <tr>
          <td>Alamat</td>
          <td colspan="3">
            : {{ $data['data']['pemohon'][0]['alamat'] }}
          </td>
         </tr>
         <tr>
          <td>Telp/HP</td>
          <td colspan="3">
            : {{ $data['data']['pemohon'][0]['no_telp'] }}
          </td>
         </tr>
         <tr><td>&nbsp;</td></tr>
        <tr>
          <td colspan="4" valign="top" style="align:justify">
              <p>Dengan ini menyatakan bahwa kami sanggup dan siap untuk melaksanakan penanaman dan pemeliharaan tanaman Berkualitas / Bibit Produktif dari BPDAS Sei Jang Duriangkang pada Tanggal ..... Bulan ......... Tahun ....... sesuai dengan jumlah dan jenis tanaman serta lokasi penanaman yang telah kami ajukan.</p>
          </td>
        </tr>
        <tr>
          <td width="50%"></td>
        </tr>
        <tr style="align:justify">
          <td colspan="4">Demikian Surat Pernyataan ini kami buat dengan penuh rasa tanggung jawab, untuk dapat dipergunakan sebagaimana mestinya.</td>
        </tr>
        
        <tr>
          <td colspan="3" ></td>
          <td>Tanjungpinang, </td>
        </tr>
        <tr>
          <td colspan="3"><br></td>
          <td>Pemohon,</td>
        </tr>
        <tr>
          <td colspan="3"></td>
          <td><img src="https://api.qrserver.com/v1/create-qr-code/?data=https://bpdas-sjd.id/view/{{$data['data']['order'][0]['id']}}&amp;size=70x70" alt="" title=""/> </td>
        </tr>
        <tr>
          <td colspan="3"></td>
          <td>{{$data['data']['pemohon'][0]['nama_pemohon']}}</td>
        </tr>
        <tr>
          <td colspan="4"><b>Sketsa Calon Lokasi Penanaman</b></td>
        </tr>
        <tr>
          <td colspan="4">Koordinat Lokasi: {{ $lt = $data['data']['order'][0]['latitude'] }}N {{ $lg = $data['data']['order'][0]['longitude'] }}E</td>
        </tr>
        <tr>
          <td colspan="4" style="align:center"><div id="map"></div></td>
        </tr>
      </tbody>
  </table>
</div>

    <img class="img" src="{{Asset('img/kop.png')}}" alt="" >
    <div style="margin-left: 2cm;margin-right: 2cm;">
    <table class="header" cellpadding="0">
        <tbody>
          <tr>
            <td colspan="9">
              <div class="kop">
                  <b>BERITA ACARA SERAH TERIMA BIBIT</b>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="9" style="align:center">Nomor : </td>
           </tr>
           <tr>
            <td style="width: 5mm;"><br></td>
            <td style="width: 2cm;"><br></td>
            <td style="width: 2cm;"><br></td>
            <td style="width: 2cm;"><br></td>
            <td style="width: 2cm;"><br></td>
            <td style="width: 2cm;"><br></td>
            <td style="width: 2cm;"><br></td>
            <td style="width: 2cm;"><br></td>
            <td ><br></td>
           </tr>
           <tr>
            <td colspan="9">Pada hari ini Tanggal ..... bulan ............... tahun ........, yang bertandatangan dibawah ini:</td>
           </tr>
           <tr>
            <td>1.</td>
            <td colspan="2">Nama</td>
            <td colspan="6">
              : Aswan Basri
            </td>
           </tr>
           <tr>
            <td><br></td>
            <td colspan="2">NIP</td>
            <td colspan="6">
              : 198310202007101001
            </td>
           </tr>
           <tr>
            <td><br></td>
            <td colspan="2">Jabatan</td>
            <td colspan="6">
              : Penanggung Jawab Posko Bibit
            </td>
           </tr>
           <tr>
            <td><br></td>
            <td colspan="2">Alamat</td>
            <td colspan="6" width="100%">
              : Jl. Daeng Kamboja KM 14, Kel. Air Raja, Kec. Tanjungpinang Timur
            </td>
           </tr>
           <tr>
            <td colspan="9"><br></td>
           </tr>
           <tr>
            <td colspan="9">telah menyerahkan bibit sebanyak {{$data['data']['order'][0]['total']}} batang yang terdiri dari :</td>
           </tr>
           <tr>
            <td colspan="9" style="align:center" >
              <table width="100%" height="100%" style="border-bottom: 1px solid;">
                <div style="display: none;">{{$h = count($data['data']['order'][0]['detail'])}}</div>
                <div style="display: none;">{{$i=0}}</div>
                <div style="display: none;">@if ($h % 2 == 0)
                    {{$j = $h/2}}
                @else
                    {{$j = ($h + 1)/2}}
                @endif
                </div>
                <div style="display: none;">{{$g = $j}}</div>
                <div style="display: none;">{{$k=1}}</div>
                <div style="display: none;">{{$l = $h + 1}}</div>
                @if ($h < 6)
                  @while ($k < $h)
                  <tr>
                    <th style="border: 1px solid;">No</th>
                    <th style="border: 1px solid;">Jenis Bibit</th>
                    <th style="border: 1px solid;">Jumlah (btg)</th>
                    <th style="border: 1px solid;">No</th>
                    <th style="border: 1px solid;">Jenis Bibit</th>
                    <th style="border: 1px solid;">Jumlah (btg)</th>
                  </tr>
                    @foreach ($data['data']['order'][0]['detail'] as $key)
                    <tr>
                      <td style="border-right: 1px solid;border-left: 1px solid;align:center">{{ $k++ }}.</td>
                      <td style="border-right: 1px solid;border-left: 1px solid;">{{$key['bibit']['nama']}}</td>
                      <td style="border-right: 1px solid;border-left: 1px solid;align:center">{{$key['jumlah']}}</td>
                      <td style="border-right: 1px solid;border-left: 1px solid;align:center">{{$l++}}</td>
                      <td style="border-right: 1px solid;border-left: 1px solid;align:center">-</td>
                      <td style="border-right: 1px solid;border-left: 1px solid;align:center">-</td>
                    </tr>                
                    @endforeach
                  @endwhile
                @else
                <tr>
                  <th style="border: 1px solid;">No</th>
                  <th style="border: 1px solid;">Jenis Bibit</th>
                  <th style="border: 1px solid;">Jumlah (btg)</th>
                  <th style="border: 1px solid;">No</th>
                  <th style="border: 1px solid;">Jenis Bibit</th>
                  <th style="border: 1px solid;">Jumlah (btg)</th>
                </tr>
                @while ($k <= $j)
                  <tr>
                    <td style="border-right: 1px solid;border-left: 1px solid;" align="center">{{ $k++ }}</td>
                    <td style="border-right: 1px solid;border-left: 1px solid;">{{$data['data']['order'][0]['detail'][$i]['bibit']['nama']}}</td>
                    <td style="border-right: 1px solid;border-left: 1px solid;" align="center">{{$data['data']['order'][0]['detail'][$i]['jumlah']}}</td>
                      <div style="display: none;">{{$i++}}</div> 
                    @if ($g >= $h && $g % 2 !== 0 )
                    <td style="border-right: 1px solid;border-left: 1px solid;" align="center">{{ $g + 1 }}</td>
                    <td style="border-right: 1px solid;border-left: 1px solid;" align="center">-</td>
                    <td style="border-right: 1px solid;border-left: 1px solid;" align="center">-</td>
                    @else
                      <td style="border-right: 1px solid;border-left: 1px solid;" align="center">{{ $g + 1 }}</td>
                      <td style="border-right: 1px solid;border-left: 1px solid;">{{ $data['data']['order'][0]['detail'][$g]['bibit']['nama']}}</td>
                      <td style="border-right: 1px solid;border-left: 1px solid;" align="center">{{$data['data']['order'][0]['detail'][$g]['jumlah']}}</td>
                      <div style="display: none;">{{$g++}}</div> 
                    @endif
                    
                  <tr>
                @endwhile
                
                @endif
              </table>
            </td>
          </tr>
          <tr>
            <td colspan="9">kepada pemohon bibit :</td>
          </tr>
          <tr>
            <td>1.</td>
            <td colspan="2">Nama pemohon</td>
            <td colspan="6"> 
              : {{ $data['data']['pemohon'][0]['nama_pemohon'] }}
            </td>
           </tr>
          <tr>
            <td><br></td>
            <td colspan="2">Alamat</td>
            <td colspan="6">
              : {{ $data['data']['pemohon'][0]['alamat'] }}
            </td>
           </tr>
           <tr>
            <td colspan="9">Demikian berita acara ini dibuat dengan sebenarnya dan untuk dipergunakan sebagaimana mestinya.</td>
           </tr>
           <tr>
            <td colspan="5" style="align:center">Yang Menerima/Pemohon</td>
            <td colspan="4" style="align:center">Yang Menyerahkan</td>
           </tr>
           <tr>
            <td colspan="5" style="align:center"><img src="https://api.qrserver.com/v1/create-qr-code/?data=https://bpdas-sjd.id/view/{{$data['data']['order'][0]['id']}}&amp;size=100x100" alt="" title=""/></td>
            <td colspan="4">
              @if ($data['data']['order'][0]['status'] === "proses")
              <img src="https://api.qrserver.com/v1/create-qr-code/?data=https://bpdas-sjd.id/view/{{$data['data']['order'][0]['id']}}&amp;size=100x100" alt="" title=""/> 
              @elseif ($data['data']['order'][0]['status'] === "selesai")
              <img src="https://api.qrserver.com/v1/create-qr-code/?data=https://bpdas-sjd.id/view/{{$data['data']['order'][0]['id']}}&amp;size=100x100" alt="" title=""/> 
              @endif
            </td>
           </tr>
           <tr>
            <td colspan="5" style="align:center">{{ $data['data']['pemohon'][0]['nama_pemohon'] }}</td>
            <td colspan="4" style="align:center">Aswan Basri</td>
           </tr>
        </tbody>
    </table> 
  </div>
  
    <script>
      
      var a = {{ $lt = $data['data']['order'][0]['latitude'] }};
      var b = {{ $lg = $data['data']['order'][0]['longitude'] }};
      var map = L.map('map').setView([a, b], 13);
      
      L.marker([a, b]).addTo(map);
      
      var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19
      }).addTo(map);
    </script>
    <script>
      setTimeout(() => { window.print() }, 500);
    </script>