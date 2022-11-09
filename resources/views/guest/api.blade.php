@extends('guest.master')

@section('content')
 <!--  ABout2  AREA START  -->
 <section class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-8 mb-4">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                API Batam
              </h3>
            </div>
            <div class="card-body clearfix">
              <p>Untuk mendapatkan data telemetri di Batam, dapat mengakses url dengan method <b style="color: black;background-color: lightgray">Get : Https://bpdas-sjd.id/api/batam</b><br>
                link tersebut hanya menampilkan data 7 hari terakhir dari hari ini, data yang ditampilkan yaitu per 10 menit.<br>
                contoh data yang ditampilkan: <br></p>
                <blockquote class="quote-secondary">
                {
                  "success":true,
                  "message":"list data",
                  "data":
                  [
                    {
                      "Timestamp":"12-Oct-2022 00:00",
                      "WindSpeed":"1.1",
                      "WindDirection":"166",
                      "Temperature":"25.0",
                      "Humidity":"97.0",
                      "Rain":"0.0"
                    },
                    {
                      "Timestamp":"12-Oct-2022 00:10",
                      "WindSpeed":"1.1",
                      "WindDirection":"166",
                      "Temperature":"25.0",
                      "Humidity":"97.0",
                      "Rain":"0.0"
                    },
                    {
                      "Timestamp":"12-Oct-2022 00:20",
                      "WindSpeed":"1.1",
                      "WindDirection":"166",
                      "Temperature":"25.0",
                      "Humidity":"97.0",
                      "Rain":"0.0"
                    },
                    {
                      "Timestamp":"12-Oct-2022 00:30",
                      "WindSpeed":"1.1",
                      "WindDirection":"166",
                      "Temperature":"25.0",
                      "Humidity":"97.0",
                      "Rain":"0.0"
                    },
                    {
                      "Timestamp":"12-Oct-2022 00:40",
                      "WindSpeed":"0.0",
                      "WindDirection":"298",
                      "Temperature":"23.2",
                      "Humidity":"100.0",
                      "Rain":"16.4"
                    },
                    {
                      "Timestamp":"12-Oct-2022 23:50",
                      "WindSpeeds":"0.0",
                      "WindDirection":"166",
                      "Temperature":"25.4",
                      "Humidity":"93.0",
                      "Rain":"19.4"
                    }
                  ]
                }
              </blockquote>
              
            </div>
          </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-md-8 mb-4">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                API Tanjungpinang
              </h3>
            </div>
            <div class="card-body clearfix">
              <p>Untuk mendapatkan data telemetri di Tanjungpinang, dapat mengakses url dengan method <b style="color: black;background-color: lightgray">Get : Https://bpdas-sjd.id/api/tanjung-pinang</b><br>
                link tersebut hanya menampilkan data 7 hari terakhir dari hari ini, data yang ditampilkan yaitu per 10 menit.<br>
                contoh data yang ditampilkan: <br></p>
                <blockquote class="quote-secondary">
                {
                  "success":true,
                  "message":"list data",
                  "data":
                  [
                    {
                      "Timestamp":"02-Nov-2022 00:00",
                      "WindSpeed":"0.3",
                      "WindDirection":"101",
                      "Temperature":"24.6",
                      "Humidity":"91",
                      "Rain":"0.0",
                      "BarometicPressurembar":"1008.9",
                      "BatteryVolt":"12.2"
                    },
                    {
                      "Timestamp":"02-Nov-2022 00:10",
                      "WindSpeed":"0.3",
                      "WindDirection":"77",
                      "Temperature":"24.6",
                      "Humidity":"91",
                      "Rain":"0.0",
                      "BarometicPressurembar":"1008.7",
                      "BatteryVolt":"12.2"
                    },
                    {
                      "Timestamp":"02-Nov-2022 00:20",
                      "WindSpeed":"0.3",
                      "WindDirection":"77",
                      "Temperature":"24.6",
                      "Humidity":"91",
                      "Rain":"0.0",
                      "BarometicPressurembar":"1008.5",
                      "BatteryVolt":"12.2"
                    },
                    {
                      "Timestamp":"02-Nov-2022 00:30",
                      "WindSpeed":"0.3",
                      "WindDirection":"77",
                      "Temperature":"24.6",
                      "Humidity":"91",
                      "Rain":"0.0",
                      "BarometicPressurembar":"1008.5",
                      "BatteryVolt":"12.2"
                    },
                    {
                      "Timestamp":"02-Nov-2022 00:40",
                      "WindSpeed":"0.3",
                      "WindDirection":"77",
                      "Temperature":"24.6",
                      "Humidity":"90",
                      "Rain":"0.0",
                      "BarometicPressurembar":"1008.1",
                      "BatteryVolt":"12.3"
                    },
                    {
                      "Timestamp":"02-Nov-2022 00:50",
                      "WindSpeed":"0.3",
                      "WindDirection":"115",
                      "Temperature":"24.7",
                      "Humidity":"90",
                      "Rain":"0.0",
                      "BarometicPressurembar":"1008.0",
                      "BatteryVolt":"12.2"
                    }
                  ]
                }
              </blockquote>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--  ABOUT AREA END  -->
 
@endsection