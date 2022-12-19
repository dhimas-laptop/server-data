@extends('guest.master')
@section('content')
<!-- PRICE AREA START  -->
    <section id="pricing" class="section-padding bg-main">
        <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 m-auto">
            <div class="section-heading">
                <h4 class="section-title">Perkiraan Cuaca Kepulauan Riau</h4>
                <h4 class="section-title">{{ substr(today(),0,10) }}</h4>
                <div>Sumber : BMKG</div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-6">
            <div class="pricing-block ">
                <div class="price-header">
                
    
                <h2 class="price">Batam</h2>
                </div>
                <div class="line"></div>
                <ul>
                <li>00:00 WIB : @if ($batam[0]['value'] == "0") <i class="icofont-night">Cerah</i>@endif @if ($batam[0]['value'] == "1" || $batam[0]['value'] == "2") <i class="icofont-full-night">Cerah Berawan</i>@endif @if ($batam[0]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($batam[0]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($batam[0]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($batam[0]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($batam[0]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($batam[0]['value'] == "60") <i class="icofont-hail-rainy-night">Hujan Ringan</i>@endif @if ($batam[0]['value'] == "61") <i class="icofont-rainy-night">Hujan Sedang</i>@endif @if ($batam[0]['value'] == "63") <i class="icofont-rainy-night">Hujan lebat</i>@endif @if ($batam[0]['value'] == "80") <i class="icofont-rainy-night">Hujan lokal</i>@endif @if ($batam[0]['value'] == "95" || $batam[0]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                </li>
                <li>06:00 WIB : @if ($batam[1]['value'] == "0") <i class="icofont-sun">Cerah</i>@endif @if ($batam[1]['value'] == "1" || $batam[1]['value'] == "2") <i class="icofont-full-sunny">Cerah Berawan</i>@endif @if ($batam[1]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($batam[1]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($batam[1]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($batam[1]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($batam[1]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($batam[1]['value'] == "60") <i class="icofont-hail-rainy-sunny">Hujan Ringan</i>@endif @if ($batam[1]['value'] == "61") <i class="icofont-rainy-sunny">Hujan Sedang</i>@endif @if ($batam[1]['value'] == "63") <i class="icofont-rainy-sunny">Hujan lebat</i>@endif @if ($batam[1]['value'] == "80") <i class="icofont-rainy-sunny">Hujan lokal</i>@endif @if ($batam[1]['value'] == "95" || $batam[1]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                </li>
                <li>12:00 WIB : @if ($batam[2]['value'] == "0") <i class="icofont-sun">Cerah</i>@endif @if ($batam[2]['value'] == "1" || $batam[2]['value'] == "2") <i class="icofont-full-sunny">Cerah Berawan</i>@endif @if ($batam[2]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($batam[2]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($batam[2]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($batam[2]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($batam[2]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($batam[2]['value'] == "60") <i class="icofont-hail-rainy-sunny">Hujan Ringan</i>@endif @if ($batam[2]['value'] == "61") <i class="icofont-rainy-sunny">Hujan Sedang</i>@endif @if ($batam[2]['value'] == "63") <i class="icofont-rainy-sunny">Hujan lebat</i>@endif @if ($batam[2]['value'] == "80") <i class="icofont-rainy-sunny">Hujan lokal</i>@endif @if ($batam[2]['value'] == "95" || $batam[2]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                </li>
                <li>18:00 WIB : @if ($batam[3]['value'] == "0") <i class="icofont-night">Cerah</i>@endif @if ($batam[3]['value'] == "1" || $batam[3]['value'] == "2") <i class="icofont-full-night">Cerah Berawan</i>@endif @if ($batam[3]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($batam[3]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($batam[3]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($batam[3]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($batam[3]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($batam[3]['value'] == "60") <i class="icofont-hail-rainy-night">Hujan Ringan</i>@endif @if ($batam[3]['value'] == "61") <i class="icofont-rainy-night">Hujan Sedang</i>@endif @if ($batam[3]['value'] == "63") <i class="icofont-rainy-night">Hujan lebat</i>@endif @if ($batam[3]['value'] == "80") <i class="icofont-rainy-night">Hujan lokal</i>@endif @if ($batam[3]['value'] == "95" || $batam[3]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                </li>
                <li>24:00 WIB : @if ($batam[4]['value'] == "0") <i class="icofont-night">Cerah</i>@endif @if ($batam[4]['value'] == "1" || $batam[4]['value'] == "2") <i class="icofont-full-night">Cerah Berawan</i>@endif @if ($batam[4]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($batam[4]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($batam[4]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($batam[4]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($batam[4]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($batam[4]['value'] == "60") <i class="icofont-hail-rainy-night">Hujan Ringan</i>@endif @if ($batam[4]['value'] == "61") <i class="icofont-rainy-night">Hujan Sedang</i>@endif @if ($batam[4]['value'] == "63") <i class="icofont-rainy-night">Hujan lebat</i>@endif @if ($batam[4]['value'] == "80") <i class="icofont-rainy-night">Hujan lokal</i>@endif @if ($batam[4]['value'] == "95" || $batam[4]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                </li>
                
                </ul>
    
            </div>
            </div>
            <div class="col-lg-4 col-sm-6">
            <div class="pricing-block ">
                <div class="price-header">
                
    
                <h2 class="price">Tanjung<br>pinang</h2>
                </div>
                <div class="line"></div>
                <ul>
                    <li>00:00 WIB : @if ($tp[0]['value'] == "0") <i class="icofont-night">Cerah</i>@endif @if ($tp[0]['value'] == "1" || $tp[0]['value'] == "2") <i class="icofont-full-night">Cerah Berawan</i>@endif @if ($tp[0]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($tp[0]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($tp[0]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($tp[0]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($tp[0]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($tp[0]['value'] == "60") <i class="icofont-hail-rainy-night">Hujan Ringan</i>@endif @if ($tp[0]['value'] == "61") <i class="icofont-rainy-night">Hujan Sedang</i>@endif @if ($tp[0]['value'] == "63") <i class="icofont-rainy-night">Hujan lebat</i>@endif @if ($tp[0]['value'] == "80") <i class="icofont-rainy-night">Hujan lokal</i>@endif @if ($tp[0]['value'] == "95" || $tp[0]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                    </li>
                    <li>06:00 WIB : @if ($tp[1]['value'] == "0") <i class="icofont-sun">Cerah</i>@endif @if ($tp[1]['value'] == "1" || $tp[1]['value'] == "2") <i class="icofont-full-sunny">Cerah Berawan</i>@endif @if ($tp[1]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($tp[1]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($tp[1]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($tp[1]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($tp[1]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($tp[1]['value'] == "60") <i class="icofont-hail-rainy-sunny">Hujan Ringan</i>@endif @if ($tp[1]['value'] == "61") <i class="icofont-rainy-sunny">Hujan Sedang</i>@endif @if ($tp[1]['value'] == "63") <i class="icofont-rainy-sunny">Hujan lebat</i>@endif @if ($tp[1]['value'] == "80") <i class="icofont-rainy-sunny">Hujan lokal</i>@endif @if ($tp[1]['value'] == "95" || $tp[1]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                    </li>
                    <li>12:00 WIB : @if ($tp[2]['value'] == "0") <i class="icofont-sun">Cerah</i>@endif @if ($tp[2]['value'] == "1" || $tp[2]['value'] == "2") <i class="icofont-full-sunny">Cerah Berawan</i>@endif @if ($tp[2]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($tp[2]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($tp[2]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($tp[2]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($tp[2]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($tp[2]['value'] == "60") <i class="icofont-hail-rainy-sunny">Hujan Ringan</i>@endif @if ($tp[2]['value'] == "61") <i class="icofont-rainy-sunny">Hujan Sedang</i>@endif @if ($tp[2]['value'] == "63") <i class="icofont-rainy-sunny">Hujan lebat</i>@endif @if ($tp[2]['value'] == "80") <i class="icofont-rainy-sunny">Hujan lokal</i>@endif @if ($tp[2]['value'] == "95" || $tp[2]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                    </li>
                    <li>18:00 WIB : @if ($tp[3]['value'] == "0") <i class="icofont-night">Cerah</i>@endif @if ($tp[3]['value'] == "1" || $tp[3]['value'] == "2") <i class="icofont-full-night">Cerah Berawan</i>@endif @if ($tp[3]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($tp[3]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($tp[3]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($tp[3]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($tp[3]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($tp[3]['value'] == "60") <i class="icofont-hail-rainy-night">Hujan Ringan</i>@endif @if ($tp[3]['value'] == "61") <i class="icofont-rainy-night">Hujan Sedang</i>@endif @if ($tp[3]['value'] == "63") <i class="icofont-rainy-night">Hujan lebat</i>@endif @if ($tp[3]['value'] == "80") <i class="icofont-rainy-night">Hujan lokal</i>@endif @if ($tp[3]['value'] == "95" || $tp[3]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                    </li>
                    <li>24:00 WIB : @if ($tp[4]['value'] == "0") <i class="icofont-night">Cerah</i>@endif @if ($tp[4]['value'] == "1" || $tp[4]['value'] == "2") <i class="icofont-full-night">Cerah Berawan</i>@endif @if ($tp[4]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($tp[4]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($tp[4]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($tp[4]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($tp[4]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($tp[4]['value'] == "60") <i class="icofont-hail-rainy-night">Hujan Ringan</i>@endif @if ($tp[4]['value'] == "61") <i class="icofont-rainy-night">Hujan Sedang</i>@endif @if ($tp[4]['value'] == "63") <i class="icofont-rainy-night">Hujan lebat</i>@endif @if ($tp[4]['value'] == "80") <i class="icofont-rainy-night">Hujan lokal</i>@endif @if ($tp[4]['value'] == "95" || $tp[4]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                    </li>
                </ul>
    
            </div>
            </div>
            <div class="col-lg-4 col-sm-6">
            <div class="pricing-block">
                <div class="price-header">
               
    
                <h2 class="price">Bintan</h2>
                </div>
                <div class="line"></div>
                <ul>
                    <li>00:00 WIB : @if ($bintan[0]['value'] == "0") <i class="icofont-night">Cerah</i>@endif @if ($bintan[0]['value'] == "1" || $bintan[0]['value'] == "2") <i class="icofont-full-night">Cerah Berawan</i>@endif @if ($bintan[0]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($bintan[0]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($bintan[0]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($bintan[0]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($bintan[0]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($bintan[0]['value'] == "60") <i class="icofont-hail-rainy-night">Hujan Ringan</i>@endif @if ($bintan[0]['value'] == "61") <i class="icofont-rainy-night">Hujan Sedang</i>@endif @if ($bintan[0]['value'] == "63") <i class="icofont-rainy-night">Hujan lebat</i>@endif @if ($bintan[0]['value'] == "80") <i class="icofont-rainy-night">Hujan lokal</i>@endif @if ($bintan[0]['value'] == "95" || $bintan[0]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                    </li>
                    <li>06:00 WIB : @if ($bintan[1]['value'] == "0") <i class="icofont-sun">Cerah</i>@endif @if ($bintan[1]['value'] == "1" || $bintan[1]['value'] == "2") <i class="icofont-full-sunny">Cerah Berawan</i>@endif @if ($bintan[1]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($bintan[1]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($bintan[1]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($bintan[1]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($bintan[1]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($bintan[1]['value'] == "60") <i class="icofont-hail-rainy-sunny">Hujan Ringan</i>@endif @if ($bintan[1]['value'] == "61") <i class="icofont-rainy-sunny">Hujan Sedang</i>@endif @if ($bintan[1]['value'] == "63") <i class="icofont-rainy-sunny">Hujan lebat</i>@endif @if ($bintan[1]['value'] == "80") <i class="icofont-rainy-sunny">Hujan lokal</i>@endif @if ($bintan[1]['value'] == "95" || $bintan[1]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                    </li>
                    <li>12:00 WIB : @if ($bintan[2]['value'] == "0") <i class="icofont-sun">Cerah</i>@endif @if ($bintan[2]['value'] == "1" || $bintan[2]['value'] == "2") <i class="icofont-full-sunny">Cerah Berawan</i>@endif @if ($bintan[2]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($bintan[2]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($bintan[2]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($bintan[2]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($bintan[2]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($bintan[2]['value'] == "60") <i class="icofont-hail-rainy-sunny">Hujan Ringan</i>@endif @if ($bintan[2]['value'] == "61") <i class="icofont-rainy-sunny">Hujan Sedang</i>@endif @if ($bintan[2]['value'] == "63") <i class="icofont-rainy-sunny">Hujan lebat</i>@endif @if ($bintan[2]['value'] == "80") <i class="icofont-rainy-sunny">Hujan lokal</i>@endif @if ($bintan[2]['value'] == "95" || $bintan[2]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                    </li>
                    <li>18:00 WIB : @if ($bintan[3]['value'] == "0") <i class="icofont-night">Cerah</i>@endif @if ($bintan[3]['value'] == "1" || $bintan[3]['value'] == "2") <i class="icofont-full-night">Cerah Berawan</i>@endif @if ($bintan[3]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($bintan[3]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($bintan[3]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($bintan[3]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($bintan[3]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($bintan[3]['value'] == "60") <i class="icofont-hail-rainy-night">Hujan Ringan</i>@endif @if ($bintan[3]['value'] == "61") <i class="icofont-rainy-night">Hujan Sedang</i>@endif @if ($bintan[3]['value'] == "63") <i class="icofont-rainy-night">Hujan lebat</i>@endif @if ($bintan[3]['value'] == "80") <i class="icofont-rainy-night">Hujan lokal</i>@endif @if ($bintan[3]['value'] == "95" || $bintan[3]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                    </li>
                    <li>24:00 WIB : @if ($bintan[4]['value'] == "0") <i class="icofont-night">Cerah</i>@endif @if ($bintan[4]['value'] == "1" || $bintan[4]['value'] == "2") <i class="icofont-full-night">Cerah Berawan</i>@endif @if ($bintan[4]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($bintan[4]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($bintan[4]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($bintan[4]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($bintan[4]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($bintan[4]['value'] == "60") <i class="icofont-hail-rainy-night">Hujan Ringan</i>@endif @if ($bintan[4]['value'] == "61") <i class="icofont-rainy-night">Hujan Sedang</i>@endif @if ($bintan[4]['value'] == "63") <i class="icofont-rainy-night">Hujan lebat</i>@endif @if ($bintan[4]['value'] == "80") <i class="icofont-rainy-night">Hujan lokal</i>@endif @if ($bintan[4]['value'] == "95" || $bintan[4]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                    </li>
                </ul>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-6">
            <div class="pricing-block ">
                <div class="price-header">
                
    
                <h2 class="price">Daik, Lingga</h2>
                </div>
                <div class="line"></div>
                <ul>
                    <li>00:00 WIB : @if ($daik[0]['value'] == "0") <i class="icofont-night">Cerah</i>@endif @if ($daik[0]['value'] == "1" || $daik[0]['value'] == "2") <i class="icofont-full-night">Cerah Berawan</i>@endif @if ($daik[0]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($daik[0]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($daik[0]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($daik[0]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($daik[0]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($daik[0]['value'] == "60") <i class="icofont-hail-rainy-night">Hujan Ringan</i>@endif @if ($daik[0]['value'] == "61") <i class="icofont-rainy-night">Hujan Sedang</i>@endif @if ($daik[0]['value'] == "63") <i class="icofont-rainy-night">Hujan lebat</i>@endif @if ($daik[0]['value'] == "80") <i class="icofont-rainy-night">Hujan lokal</i>@endif @if ($daik[0]['value'] == "95" || $daik[0]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                    </li>
                    <li>06:00 WIB : @if ($daik[1]['value'] == "0") <i class="icofont-sun">Cerah</i>@endif @if ($daik[1]['value'] == "1" || $daik[1]['value'] == "2") <i class="icofont-full-sunny">Cerah Berawan</i>@endif @if ($daik[1]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($daik[1]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($daik[1]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($daik[1]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($daik[1]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($daik[1]['value'] == "60") <i class="icofont-hail-rainy-sunny">Hujan Ringan</i>@endif @if ($daik[1]['value'] == "61") <i class="icofont-rainy-sunny">Hujan Sedang</i>@endif @if ($daik[1]['value'] == "63") <i class="icofont-rainy-sunny">Hujan lebat</i>@endif @if ($daik[1]['value'] == "80") <i class="icofont-rainy-sunny">Hujan lokal</i>@endif @if ($daik[1]['value'] == "95" || $daik[1]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                    </li>
                    <li>12:00 WIB : @if ($daik[2]['value'] == "0") <i class="icofont-sun">Cerah</i>@endif @if ($daik[2]['value'] == "1" || $daik[2]['value'] == "2") <i class="icofont-full-sunny">Cerah Berawan</i>@endif @if ($daik[2]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($daik[2]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($daik[2]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($daik[2]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($daik[2]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($daik[2]['value'] == "60") <i class="icofont-hail-rainy-sunny">Hujan Ringan</i>@endif @if ($daik[2]['value'] == "61") <i class="icofont-rainy-sunny">Hujan Sedang</i>@endif @if ($daik[2]['value'] == "63") <i class="icofont-rainy-sunny">Hujan lebat</i>@endif @if ($daik[2]['value'] == "80") <i class="icofont-rainy-sunny">Hujan lokal</i>@endif @if ($daik[2]['value'] == "95" || $daik[2]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                    </li>
                    <li>18:00 WIB : @if ($daik[3]['value'] == "0") <i class="icofont-night">Cerah</i>@endif @if ($daik[3]['value'] == "1" || $daik[3]['value'] == "2") <i class="icofont-full-night">Cerah Berawan</i>@endif @if ($daik[3]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($daik[3]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($daik[3]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($daik[3]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($daik[3]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($daik[3]['value'] == "60") <i class="icofont-hail-rainy-night">Hujan Ringan</i>@endif @if ($daik[3]['value'] == "61") <i class="icofont-rainy-night">Hujan Sedang</i>@endif @if ($daik[3]['value'] == "63") <i class="icofont-rainy-night">Hujan lebat</i>@endif @if ($daik[3]['value'] == "80") <i class="icofont-rainy-night">Hujan lokal</i>@endif @if ($daik[3]['value'] == "95" || $daik[3]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                    </li>
                    <li>24:00 WIB : @if ($daik[4]['value'] == "0") <i class="icofont-night">Cerah</i>@endif @if ($daik[4]['value'] == "1" || $daik[4]['value'] == "2") <i class="icofont-full-night">Cerah Berawan</i>@endif @if ($daik[4]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($daik[4]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($daik[4]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($daik[4]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($daik[4]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($daik[4]['value'] == "60") <i class="icofont-hail-rainy-night">Hujan Ringan</i>@endif @if ($daik[4]['value'] == "61") <i class="icofont-rainy-night">Hujan Sedang</i>@endif @if ($daik[4]['value'] == "63") <i class="icofont-rainy-night">Hujan lebat</i>@endif @if ($daik[4]['value'] == "80") <i class="icofont-rainy-night">Hujan lokal</i>@endif @if ($daik[4]['value'] == "95" || $daik[4]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                    </li>
                </ul>
    
            </div>
            </div>
            <div class="col-lg-4 col-sm-6">
            <div class="pricing-block ">
                <div class="price-header">
                
    
                <h2 class="price">Natuna</h2>
                </div>
                <div class="line"></div>
                <ul>
                    <li>00:00 WIB : @if ($ranai[0]['value'] == "0") <i class="icofont-night">Cerah</i>@endif @if ($ranai[0]['value'] == "1" || $ranai[0]['value'] == "2") <i class="icofont-full-night">Cerah Berawan</i>@endif @if ($ranai[0]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($ranai[0]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($ranai[0]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($ranai[0]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($ranai[0]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($ranai[0]['value'] == "60") <i class="icofont-hail-rainy-night">Hujan Ringan</i>@endif @if ($ranai[0]['value'] == "61") <i class="icofont-rainy-night">Hujan Sedang</i>@endif @if ($ranai[0]['value'] == "63") <i class="icofont-rainy-night">Hujan lebat</i>@endif @if ($ranai[0]['value'] == "80") <i class="icofont-rainy-night">Hujan lokal</i>@endif @if ($ranai[0]['value'] == "95" || $ranai[0]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                    </li>
                    <li>06:00 WIB : @if ($ranai[1]['value'] == "0") <i class="icofont-sun">Cerah</i>@endif @if ($ranai[1]['value'] == "1" || $ranai[1]['value'] == "2") <i class="icofont-full-sunny">Cerah Berawan</i>@endif @if ($ranai[1]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($ranai[1]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($ranai[1]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($ranai[1]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($ranai[1]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($ranai[1]['value'] == "60") <i class="icofont-hail-rainy-sunny">Hujan Ringan</i>@endif @if ($ranai[1]['value'] == "61") <i class="icofont-rainy-sunny">Hujan Sedang</i>@endif @if ($ranai[1]['value'] == "63") <i class="icofont-rainy-sunny">Hujan lebat</i>@endif @if ($ranai[1]['value'] == "80") <i class="icofont-rainy-sunny">Hujan lokal</i>@endif @if ($ranai[1]['value'] == "95" || $ranai[1]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                    </li>
                    <li>12:00 WIB : @if ($ranai[2]['value'] == "0") <i class="icofont-sun">Cerah</i>@endif @if ($ranai[2]['value'] == "1" || $ranai[2]['value'] == "2") <i class="icofont-full-sunny">Cerah Berawan</i>@endif @if ($ranai[2]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($ranai[2]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($ranai[2]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($ranai[2]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($ranai[2]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($ranai[2]['value'] == "60") <i class="icofont-hail-rainy-sunny">Hujan Ringan</i>@endif @if ($ranai[2]['value'] == "61") <i class="icofont-rainy-sunny">Hujan Sedang</i>@endif @if ($ranai[2]['value'] == "63") <i class="icofont-rainy-sunny">Hujan lebat</i>@endif @if ($ranai[2]['value'] == "80") <i class="icofont-rainy-sunny">Hujan lokal</i>@endif @if ($ranai[2]['value'] == "95" || $ranai[2]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                    </li>
                    <li>18:00 WIB : @if ($ranai[3]['value'] == "0") <i class="icofont-night">Cerah</i>@endif @if ($ranai[3]['value'] == "1" || $ranai[3]['value'] == "2") <i class="icofont-full-night">Cerah Berawan</i>@endif @if ($ranai[3]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($ranai[3]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($ranai[3]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($ranai[3]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($ranai[3]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($ranai[3]['value'] == "60") <i class="icofont-hail-rainy-night">Hujan Ringan</i>@endif @if ($ranai[3]['value'] == "61") <i class="icofont-rainy-night">Hujan Sedang</i>@endif @if ($ranai[3]['value'] == "63") <i class="icofont-rainy-night">Hujan lebat</i>@endif @if ($ranai[3]['value'] == "80") <i class="icofont-rainy-night">Hujan lokal</i>@endif @if ($ranai[3]['value'] == "95" || $ranai[3]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                    </li>
                    <li>24:00 WIB : @if ($ranai[4]['value'] == "0") <i class="icofont-night">Cerah</i>@endif @if ($ranai[4]['value'] == "1" || $ranai[4]['value'] == "2") <i class="icofont-full-night">Cerah Berawan</i>@endif @if ($ranai[4]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($ranai[4]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($ranai[4]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($ranai[4]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($ranai[4]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($ranai[4]['value'] == "60") <i class="icofont-hail-rainy-night">Hujan Ringan</i>@endif @if ($ranai[4]['value'] == "61") <i class="icofont-rainy-night">Hujan Sedang</i>@endif @if ($ranai[4]['value'] == "63") <i class="icofont-rainy-night">Hujan lebat</i>@endif @if ($ranai[4]['value'] == "80") <i class="icofont-rainy-night">Hujan lokal</i>@endif @if ($ranai[4]['value'] == "95" || $ranai[4]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                    </li>
                </ul>
    
            </div>
            </div>
            <div class="col-lg-4 col-sm-6">
            <div class="pricing-block">
                <div class="price-header">
               
    
                <h2 class="price">Karimun</h2>
                </div>
                <div class="line"></div>
                <ul>
                    <li>00:00 WIB : @if ($karimun[0]['value'] == "0") <i class="icofont-night">Cerah</i>@endif @if ($karimun[0]['value'] == "1" || $karimun[0]['value'] == "2") <i class="icofont-full-night">Cerah Berawan</i>@endif @if ($karimun[0]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($karimun[0]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($karimun[0]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($karimun[0]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($karimun[0]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($karimun[0]['value'] == "60") <i class="icofont-hail-rainy-night">Hujan Ringan</i>@endif @if ($karimun[0]['value'] == "61") <i class="icofont-rainy-night">Hujan Sedang</i>@endif @if ($karimun[0]['value'] == "63") <i class="icofont-rainy-night">Hujan lebat</i>@endif @if ($karimun[0]['value'] == "80") <i class="icofont-rainy-night">Hujan lokal</i>@endif @if ($karimun[0]['value'] == "95" || $karimun[0]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                    </li>
                    <li>06:00 WIB : @if ($karimun[1]['value'] == "0") <i class="icofont-sun">Cerah</i>@endif @if ($karimun[1]['value'] == "1" || $karimun[1]['value'] == "2") <i class="icofont-full-sunny">Cerah Berawan</i>@endif @if ($karimun[1]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($karimun[1]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($karimun[1]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($karimun[1]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($karimun[1]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($karimun[1]['value'] == "60") <i class="icofont-hail-rainy-sunny">Hujan Ringan</i>@endif @if ($karimun[1]['value'] == "61") <i class="icofont-rainy-sunny">Hujan Sedang</i>@endif @if ($karimun[1]['value'] == "63") <i class="icofont-rainy-sunny">Hujan lebat</i>@endif @if ($karimun[1]['value'] == "80") <i class="icofont-rainy-sunny">Hujan lokal</i>@endif @if ($karimun[1]['value'] == "95" || $karimun[1]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                    </li>
                    <li>12:00 WIB : @if ($karimun[2]['value'] == "0") <i class="icofont-sun">Cerah</i>@endif @if ($karimun[2]['value'] == "1" || $karimun[2]['value'] == "2") <i class="icofont-full-sunny">Cerah Berawan</i>@endif @if ($karimun[2]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($karimun[2]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($karimun[2]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($karimun[2]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($karimun[2]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($karimun[2]['value'] == "60") <i class="icofont-hail-rainy-sunny">Hujan Ringan</i>@endif @if ($karimun[2]['value'] == "61") <i class="icofont-rainy-sunny">Hujan Sedang</i>@endif @if ($karimun[2]['value'] == "63") <i class="icofont-rainy-sunny">Hujan lebat</i>@endif @if ($karimun[2]['value'] == "80") <i class="icofont-rainy-sunny">Hujan lokal</i>@endif @if ($karimun[2]['value'] == "95" || $karimun[2]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                    </li>
                    <li>18:00 WIB : @if ($karimun[3]['value'] == "0") <i class="icofont-night">Cerah</i>@endif @if ($karimun[3]['value'] == "1" || $karimun[3]['value'] == "2") <i class="icofont-full-night">Cerah Berawan</i>@endif @if ($karimun[3]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($karimun[3]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($karimun[3]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($karimun[3]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($karimun[3]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($karimun[3]['value'] == "60") <i class="icofont-hail-rainy-night">Hujan Ringan</i>@endif @if ($karimun[3]['value'] == "61") <i class="icofont-rainy-night">Hujan Sedang</i>@endif @if ($karimun[3]['value'] == "63") <i class="icofont-rainy-night">Hujan lebat</i>@endif @if ($karimun[3]['value'] == "80") <i class="icofont-rainy-night">Hujan lokal</i>@endif @if ($karimun[3]['value'] == "95" || $karimun[3]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                    </li>
                    <li>24:00 WIB : @if ($karimun[4]['value'] == "0") <i class="icofont-night">Cerah</i>@endif @if ($karimun[4]['value'] == "1" || $karimun[4]['value'] == "2") <i class="icofont-full-night">Cerah Berawan</i>@endif @if ($karimun[4]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($karimun[4]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($karimun[4]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($karimun[4]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($karimun[4]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($karimun[4]['value'] == "60") <i class="icofont-hail-rainy-night">Hujan Ringan</i>@endif @if ($karimun[4]['value'] == "61") <i class="icofont-rainy-night">Hujan Sedang</i>@endif @if ($karimun[4]['value'] == "63") <i class="icofont-rainy-night">Hujan lebat</i>@endif @if ($karimun[4]['value'] == "80") <i class="icofont-rainy-night">Hujan lokal</i>@endif @if ($karimun[4]['value'] == "95" || $karimun[4]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                    </li>
                <li></li>   
                
                </ul>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-6"></div>
            <div class="col-lg-4 col-sm-6">
            <div class="pricing-block ">
                <div class="price-header">
                
    
                <h2 class="price">Anambas</h2>
                </div>
                <div class="line"></div>
                <ul>
                    <li>00:00 WIB : @if ($anambas[0]['value'] == "0") <i class="icofont-night">Cerah</i>@endif @if ($anambas[0]['value'] == "1" || $anambas[0]['value'] == "2") <i class="icofont-full-night">Cerah Berawan</i>@endif @if ($anambas[0]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($anambas[0]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($anambas[0]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($anambas[0]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($anambas[0]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($anambas[0]['value'] == "60") <i class="icofont-hail-rainy-night">Hujan Ringan</i>@endif @if ($anambas[0]['value'] == "61") <i class="icofont-rainy-night">Hujan Sedang</i>@endif @if ($anambas[0]['value'] == "63") <i class="icofont-rainy-night">Hujan lebat</i>@endif @if ($anambas[0]['value'] == "80") <i class="icofont-rainy-night">Hujan lokal</i>@endif @if ($anambas[0]['value'] == "95" || $anambas[0]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                    </li>
                    <li>06:00 WIB : @if ($anambas[1]['value'] == "0") <i class="icofont-sun">Cerah</i>@endif @if ($anambas[1]['value'] == "1" || $anambas[1]['value'] == "2") <i class="icofont-full-sunny">Cerah Berawan</i>@endif @if ($anambas[1]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($anambas[1]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($anambas[1]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($anambas[1]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($anambas[1]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($anambas[1]['value'] == "60") <i class="icofont-hail-rainy-sunny">Hujan Ringan</i>@endif @if ($anambas[1]['value'] == "61") <i class="icofont-rainy-sunny">Hujan Sedang</i>@endif @if ($anambas[1]['value'] == "63") <i class="icofont-rainy-sunny">Hujan lebat</i>@endif @if ($anambas[1]['value'] == "80") <i class="icofont-rainy-sunny">Hujan lokal</i>@endif @if ($anambas[1]['value'] == "95" || $anambas[1]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                    </li>
                    <li>12:00 WIB : @if ($anambas[2]['value'] == "0") <i class="icofont-sun">Cerah</i>@endif @if ($anambas[2]['value'] == "1" || $anambas[2]['value'] == "2") <i class="icofont-full-sunny">Cerah Berawan</i>@endif @if ($anambas[2]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($anambas[2]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($anambas[2]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($anambas[2]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($anambas[2]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($anambas[2]['value'] == "60") <i class="icofont-hail-rainy-sunny">Hujan Ringan</i>@endif @if ($anambas[2]['value'] == "61") <i class="icofont-rainy-sunny">Hujan Sedang</i>@endif @if ($anambas[2]['value'] == "63") <i class="icofont-rainy-sunny">Hujan lebat</i>@endif @if ($anambas[2]['value'] == "80") <i class="icofont-rainy-sunny">Hujan lokal</i>@endif @if ($anambas[2]['value'] == "95" || $anambas[2]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                    </li>
                    <li>18:00 WIB : @if ($anambas[3]['value'] == "0") <i class="icofont-night">Cerah</i>@endif @if ($anambas[3]['value'] == "1" || $anambas[3]['value'] == "2") <i class="icofont-full-night">Cerah Berawan</i>@endif @if ($anambas[3]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($anambas[3]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($anambas[3]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($anambas[3]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($anambas[3]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($anambas[3]['value'] == "60") <i class="icofont-hail-rainy-night">Hujan Ringan</i>@endif @if ($anambas[3]['value'] == "61") <i class="icofont-rainy-night">Hujan Sedang</i>@endif @if ($anambas[3]['value'] == "63") <i class="icofont-rainy-night">Hujan lebat</i>@endif @if ($anambas[3]['value'] == "80") <i class="icofont-rainy-night">Hujan lokal</i>@endif @if ($anambas[3]['value'] == "95" || $anambas[3]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                    </li>
                    <li>24:00 WIB : @if ($anambas[4]['value'] == "0") <i class="icofont-night">Cerah</i>@endif @if ($anambas[4]['value'] == "1" || $anambas[4]['value'] == "2") <i class="icofont-full-night">Cerah Berawan</i>@endif @if ($anambas[4]['value'] == "3") <i class="icofont-clouds">Berawan</i>@endif @if ($anambas[4]['value'] == "4") <i class="icofont-cloudy">Berawan Tebal</i>@endif @if ($anambas[4]['value'] == "5") <i class="icofont-clouds">berkabut</i>@endif @if ($anambas[4]['value'] == "10") <i class="icofont-clouds">berasap</i>@endif  @if ($anambas[4]['value'] == "45") <i class="icofont-clouds">Berkabut</i>@endif @if ($anambas[4]['value'] == "60") <i class="icofont-hail-rainy-night">Hujan Ringan</i>@endif @if ($anambas[4]['value'] == "61") <i class="icofont-rainy-night">Hujan Sedang</i>@endif @if ($anambas[4]['value'] == "63") <i class="icofont-rainy-night">Hujan lebat</i>@endif @if ($anambas[4]['value'] == "80") <i class="icofont-rainy-night">Hujan lokal</i>@endif @if ($anambas[4]['value'] == "95" || $anambas[4]['value'] == "95") <i class="icofont-rainy-thunder">Hujan Petir</i>@endif   
                    </li>
                </ul>
    
            </div>
            </div>
            
        </div>
        </div>
    </section>
<!-- PRICE AREA END  -->
<!--  ABOUT AREA START  -->
    <section id="intro" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12">
                    <div class="section-heading">
                        <p class="lead">Balai Pengelolaan DAS Sei Jang Duriangkang<br><br>ASN BerAKHLAK<br>
                        Bangga Melayani Bangsa</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5  d-none d-lg-block col-sm-12">
                    <div class="intro-img">
                        <img src="{{ asset('tdash/images/banner/banner1.jpg') }}" alt="intro-img" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-sm-12 ">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-md-6">
                            <div class="intro-box">
                                <span>01.</span>
                                <h4><span style="color:red">Ber</span>orientasi Pelayanan</h4>
                                <p>Memahami dan memenuhi kebutuhan masyarakat, dan juga ramah, cekatan, solutif dan dapat diandalkan melakukan perbaikan tiada henti.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6">
                            <div class="intro-box">
                                <span>02.</span>
                                <h4><span style="color:red">A</span>khlak</h4>
                                <p>Melaksanakan tugas dengan jujur, bertanggung jawab, cermat, serta disiplin dan berintegritas tinggi.</p>
                                <p>Menggunakan kekayaan dan barang milik negara secara bertanggung jawab, efektif dan efisien.</p>
                                <p>Tidak menyalahgunakan kewenangan jabatan.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6">
                            <div class="intro-box">
                                <span>03.</span>
                                <h4><span style="color:red">K</span>ompeten</h4>
                                <p>Meningkatkan kompetensi diri untuk menjawab tantangan yang selalu berubah.</p>
                                <p>Membantu orang lain belajar dan melaksankan tugas dengan kualitas terbaik.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6">
                            <div class="intro-box">
                                <span>04.</span>
                                <h4><span style="color:red">H</span>armonis</h4>
                                <p>Menghargai setiap orang apapun latar belakangnya dan suka menolong orang lain.</p>
                                <p>Membangun lingkungan kerja yang konduktif.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6">
                            <div class="intro-box">
                                <span>05.</span>
                                <h4><span style="color:red">L</span>oyal</h4>
                                <p>Memegang teguh ideologi Pancasila dan Undang-Undang Dasar Negara Republik Indonesia 1945.</p>
                                <p>Setia kepada NKRI serta pemerintahan yang sah, dan menjaga nama baik sesama ASN, Pimpinan, instansi dan negara, serta menjaga rahasia jabatan dan negara</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6">
                            <div class="intro-box">
                                <span>06.</span>
                                <h4><span style="color:red">A</span>daptif</h4>
                                <p>Cepat menyesuaikan diri menghadapi perubahan, dan terus berinovasi dan mengembangkan kreativitas, serta bertindak proaktif.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6">
                            <div class="intro-box">
                                <span>07.</span>
                                <h4><span style="color:red">K</span>olaboratif</h4>
                                <p>Memberi kesempatan kepada berbagai pihak untuk berkontribusi.</p>
                                <p>Terbuka dalam bekerja sama untuk menghasilkan nilai tambah, dan menggerakkan pemanfaatan berbagai sumber daya untuk tujuan bersama.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  ABOUT AREA END  -->

<!--  SERVICE AREA START  -->

<!--  SERVICE AREA END  -->

<!--  SERVICE PARTNER START  -->
<section id="service-head" class=" bg-feature">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 m-auto">
                <div class="section-heading text-white">
                    <h4 class="section-title">5 Kepulauan Besar di Kepulauan Riau</h4>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  SERVICE PARTNER END  -->

<!--  SERVICE AREA START  -->
    <section id="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="service-box">
                        <div>
                            <img src="{{ asset('tdash/images/bintan.jpg') }}" alt="service-icon" class="img-fluid">
                        </div>
                        <div class="service-inner">
                            <h4>Pulau Bintan</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="service-box ">
                        <div>
                            <img src="{{ asset('tdash/images/batam.png') }}" alt="service-icon" class="img-fluid">
                        </div>
                        <div class="service-inner">
                            <h4>Pulau Batam</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="service-box">
                        <div>
                            <img src="{{ asset('tdash/images/karimun.jpg') }}" alt="service-icon" class="img-fluid">
                        </div>
                        <div class="service-inner">
                            <h4>Pulau Karimun</h4>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="service-box">
                        <div>
                            <img src="{{ asset('tdash/images/daik.png') }}" alt="service-icon" class="img-fluid">
                        </div>
                        <div class="service-inner">
                            <h4>Pulau daik</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="service-box">
                        <div>
                            <img src="{{ asset('tdash/images/anambas.png') }}" alt="service-icon" class="img-fluid">
                        </div>
                        <div class="service-inner">
                            <h4>Pulau Anambas</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="service-box">
                        <div>
                            <img src="{{ asset('tdash/images/natuna.png') }}" alt="service-icon" class="img-fluid">
                        </div>
                        <div class="service-inner">
                            <h4>Pulau Natuna</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  SERVICE AREA END  -->
<!--  COUNTER AREA START  -->
<section id="counter" class="section-padding">
    <div class="overlay dark-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6 col-md-6">
                <div class="counter-stat">
                    <span class="counter">2967</span>
                    <h5>DAS di wilayah Kerja BPDAS Sei jang Duriangkang</h5>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-md-6">
                <div class="counter-stat">
                    <span class="counter">35</span>
                    <h5>DAS Dipulihkan</h5>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-md-6">
                <div class="counter-stat">
                    <span class="counter">2932</span>
                    <h5>DAS Dipertahankan</h5>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  COUNTER AREA END  -->

@endsection
   