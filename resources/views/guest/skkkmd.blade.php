@extends('guest.master')

@section('content')
 <!--  ABout2  AREA START  -->
 <section class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-8 mb-4">
            <center>
          <h3 class="mb-3">SK KKMD 2022</h3>
          
          <embed type="application/pdf" src="{{asset('tdash/pdf/SK-KKMD-KEPRI.pdf')}}" width="800" height="500"></embed>
        </center>
        </div>
      </div>
    </div>
  </section>
  <!--  ABOUT AREA END  -->
 
@endsection