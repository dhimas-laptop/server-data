@extends('layout.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tabel curah Hujan</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
    <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>User</th>
                <th>Date</th>
                <th>Status</th>
                <th>Reason</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>183</td>
                <td>John Doe</td>
                <td>11-7-2014</td>
                <td><span class="tag tag-success">Approved</span></td>
                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
              </tr>
              <tr>
                <td>219</td>
                <td>Alexander Pierce</td>
                <td>11-7-2014</td>
                <td><span class="tag tag-warning">Pending</span></td>
                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
              </tr>
              <tr>
                <td>657</td>
                <td>Bob Doe</td>
                <td>11-7-2014</td>
                <td><span class="tag tag-primary">Approved</span></td>
                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
              </tr>
              <tr>
                <td>175</td>
                <td>Mike Doe</td>
                <td>11-7-2014</td>
                <td><span class="tag tag-danger">Denied</span></td>
                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div> 
 </div>
 </section>
 <section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
  <!-- BAR CHART -->
  <div class="card card-success">
  <div class="card-header">
    <h3 class="card-title">Bar Chart</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    <div class="chart">
      <canvas id="myChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
    </div>
  </div>
  <!-- /.card-body -->
  </div>
    <!-- /.card -->
      </div>
    </div>
  </div>
 </section>
</div>
@endsection

@section('script')
<!-- ChartJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.esm.js" integrity="sha512-jUlTTDoq6IvZiinGFQetLcklithBTp8sVUkkUBEYQvYd3hwMuCTd59kAzVpJwvRTmZ2palO++nX+vKC+cK9lqg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.esm.min.js" integrity="sha512-ESlgC6ZyzTZdmD7XoDrXJNOqoIugH+FNKg8nAk8sa3cZfFALiV+lo5xoia649oyygwnkKsdUdPAJ+puqGbOs+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.js" integrity="sha512-Lii3WMtgA0C0qmmkdCpsG0Gjr6M0ajRyQRQSbTF6BsrVh/nhZdHpVZ76iMIPvQwz1eoXC3DmAg9K51qT5/dEVg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/helpers.esm.js" integrity="sha512-DfyVRytIoS7LXOzmxSD4//oV81uwh1xV/EuK/xeh5gVJycOdBj+XTl7jeM6bcy7jiBIabR/9S2uyRL3oKKustw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/helpers.esm.min.js" integrity="sha512-urWBnIv+F027G24xDNigjxvIuwnWlWy94W2yx77VkISKLzKSohOKOubMDhtEF6LZcEH7gctmNSpxDqIW/zMmUg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
const ctx = document.getElementById('myChart');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
    
@endsection