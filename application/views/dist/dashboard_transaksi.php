<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Karyawan</h4>
                  </div>
                  <div class="card-body">
                  <?php echo $total_user; ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Item</h4>
                  </div>
                  <div class="card-body">
                  <?php echo $total_item; ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Lokasi</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $total_lokasi; ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Transaksi</h4>
                  </div>
                  <div class="card-body">
                  <?php echo $total_transaksi; ?>
                  </div>
                </div>
              </div>
            </div>                  
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                  <div class="card-header">
                    <h4>Achievemet Chart</h4>
                  </div>
                  <div class="card-body">
                    <canvas id="myChart"></canvas>
                  </div>
                  <div class="card-footer">
                   <p>Chart ini dibuat berdasarkan table achievement, apa yang muncul di chart di atas adalah menunjukkan achievement mana saja yang paling banyak terdapat produksi di dalamnya</p>
                   <p>pengambilan datanya berdasarkan table transaksi yang di join dengan table achievement, setiap dari isi table achievement (misal a001) akan dicari berapa banyak qty actual yang di proses pada waktu mulai dari jam mulai achievement a001 sampai selesai </p>
                   <p> dengan kata lain, jika a001 punya jam mulai jam 08:00 dan selesai 09:00 maka data yang tersaji di chart adalah berapa banyak produksi pada jam tersebut </p>
                  </div>
                </div>
            </div>       
          </div>



    
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>

<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
   // labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
    labels: [
      <?php
            if (count($avc)>0) {
              foreach ($avc as $data) {
                echo "'" .$data['kode_acv'] ."',";
              }
            }
          ?>
    ],
    datasets: [{
      label: 'Statistics',
      data: [
        <?php
            if (count($jumlah)>0) {
              foreach ($jumlah as $data) {
                echo "'" .$data."',";
              }
            }
          ?>
      ],
      borderWidth: 2,
      backgroundColor: '#6777ef',
      borderColor: '#6777ef',
      borderWidth: 2.5,
      pointBackgroundColor: '#ffffff',
      pointRadius: 4
    }]
  },
  options: {
    legend: {
      display: false
    },
    scales: {
      yAxes: [{
        gridLines: {
          drawBorder: false,
          color: '#f2f2f2',
        },
        ticks: {
          beginAtZero: true,
          stepSize: 150
        }
      }],
      xAxes: [{
        ticks: {
          display: false
        },
        gridLines: {
          display: false
        }
      }]
    },
  }
});

</script>