<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- CSS Plugin -->
  <link rel="stylesheet" href="vendor/css/bootstrap.min.css">
  <link rel="stylesheet" href="vendor/css/font-awesome.css">
  <link rel="stylesheet" href="vendor/css/animate.css">
  <link rel="stylesheet" href="vendor/css/toastr.min.css">
  <link rel="stylesheet" href="vendor/css/jquery.gritter.css">
  <link rel="stylesheet" href="vendor/css/theme.css">



  <title>Kelulusan Otomatis</title>
</head>

<body class="pace-done boxed-layout">
  <div id="wrapper">
    <!-- Sidebar -->
    <nav class="navbar-default navbar-static-side" role="navigation">
      <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
          <li class="nav-header">
            <div class="dropdown profile-element">
              <img alt="image" class="rounded-circle" width="50px" src="img/uin.png" />
              <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <span class="block m-t-xs font-bold">Kukuh Rahmadani</span>
                <span class="text-muted text-xs block">Web Developer <b class="caret"></b></span>
              </a>
              <ul class="dropdown-menu animated fadeInRight m-t-xs">
                <li><a class="dropdown-item" href="https://www.instagram.com/kukuhkkh/?hl=id">Profile</a></li>
                <li><a class="dropdown-item" href="https://api.whatsapp.com/send?phone=6283845257534&text=Halo%20Admin%20Saya%20tanya">Contacts</a></li>
                <li><a class="dropdown-item" href="">Mailbox</a></li>
                <li class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="">Logout</a></li>
              </ul>
            </div>
            <div class="logo-element">
              KKH
            </div>
          </li>
          <li class="active">
            <a href="index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> <span
                class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li class="active"><a href="index.php">Halaman Utama</a></li>
            </ul>
          </li>
          <li>
            <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Manajemen Data</span><span
                class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
              <li><a href="data-mahasiswa.php">Data Mahasiswa</a></li>
              <li><a href="kelulusan.php">Tabel Kelulusan</a></li>
            </ul>
          </li>
        </ul>

      </div>
    </nav>
    <!-- Akhir Sidebar -->

    <!-- Kontent -->
    <div id="page-wrapper" class="gray-bg dashbard-1">
      <div class="row border-bottom">
        <!-- Navbar -->
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
          <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
              <div class="form-group">
                <input type="text" placeholder="Search for something..." class="form-control" name="top-search"
                  id="top-search">
              </div>
            </form>
          </div>
          <ul class="nav navbar-top-links navbar-right">
            <li>
              <a href="login.html">
                <i class="fa fa-sign-out"></i> Log out
              </a>
            </li>
          </ul>
        </nav>
        <!-- Akhir Navbar -->
      </div>
      <!-- Row Pertama -->
      <!-- <div class="row  border-bottom white-bg dashboard-header">

      </div> -->
      <!-- Akhir Row Pertama -->
      <div class="wrapper wrapper-content">
        <!-- Row Kedua -->
        <div class="row">
          <h1>Selamat Datang di Manajemen Kelulusan Otomatis</h1>
        </div>
        <!-- Akhir Row Kedua -->
      </div>

      <div class="footer">
        <div>
          <strong>Copyright</strong> UIN Maulana Malik Ibrahim Malang 2019 - 2020
        </div>
      </div>
    </div>
    <!-- Akhir Kontent -->
  </div>


  <!-- JS Plugin -->
  <script src="vendor/js/jquery-3.1.1.min.js"></script>
  <script src="vendor/js/popper.min.js"></script>
  <script src="vendor/js/bootstrap.min.js"></script>
  <script src="vendor/js/jquery.metisMenu.js"></script>
  <script src="vendor/js/jquery.slimscroll.min.js"></script>

  <!-- JS Flot -->
  <script src="vendor/js/flot/jquery.flot.js"></script>
  <script src="vendor/js/flot/jquery.flot.tooltip.min.js"></script>
  <script src="vendor/js/flot/jquery.flot.spline.js"></script>
  <script src="vendor/js/flot/jquery.flot.resize.js"></script>
  <script src="vendor/js/flot/jquery.flot.pie.js"></script>

  <!-- Peiti -->
  <script src="vendor/js/peity/jquery.peity.min.js"></script>
  <script src="vendor/js/peity/peity-demo.js"></script>

  <!-- Custom and plugin javascript -->
  <script src="vendor/js/custom/inspinia.js"></script>
  <script src="vendor/js/custom/pace.min.js"></script>

  <script src="vendor/js/custom/jquery-ui.min.js"></script>

  <!-- Gritter -->
  <script src="vendor/js/gritter/jquery.gritter.min.js"></script>

  <!-- Sparkline -->
  <script src="vendor/js/jquery.sparkline.min.js"></script>

  <!-- Sparkline demo data  -->
  <script src="vendor/js/sparkline-demo.js"></script>

  <!-- ChartJS-->
  <script src="vendor/js/Chart.min.js"></script>

  <!-- Toastr -->
  <script src="vendor/js/toastr.min.js"></script>



  <script>
    $(document).ready(function () {
      setTimeout(function () {
        toastr.options = {
          closeButton: true,
          progressBar: true,
          showMethod: 'slideDown',
          timeOut: 4000
        };
        toastr.success('Masih tahap pengembangan', 'Welcome to manajemen kelulusan otomatis');

      }, 1300);


      var data1 = [
        [0, 4],
        [1, 8],
        [2, 5],
        [3, 10],
        [4, 4],
        [5, 16],
        [6, 5],
        [7, 11],
        [8, 6],
        [9, 11],
        [10, 30],
        [11, 10],
        [12, 13],
        [13, 4],
        [14, 3],
        [15, 3],
        [16, 6]
      ];
      var data2 = [
        [0, 1],
        [1, 0],
        [2, 2],
        [3, 0],
        [4, 1],
        [5, 3],
        [6, 1],
        [7, 5],
        [8, 2],
        [9, 3],
        [10, 2],
        [11, 1],
        [12, 0],
        [13, 2],
        [14, 8],
        [15, 0],
        [16, 0]
      ];
      $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
        data1, data2
      ], {
        series: {
          lines: {
            show: false,
            fill: true
          },
          splines: {
            show: true,
            tension: 0.4,
            lineWidth: 1,
            fill: 0.4
          },
          points: {
            radius: 0,
            show: true
          },
          shadowSize: 2
        },
        grid: {
          hoverable: true,
          clickable: true,
          tickColor: "#d5d5d5",
          borderWidth: 1,
          color: '#d5d5d5'
        },
        colors: ["#1ab394", "#1C84C6"],
        xaxis: {},
        yaxis: {
          ticks: 4
        },
        tooltip: false
      });

      var doughnutData = {
        labels: ["App", "Software", "Laptop"],
        datasets: [{
          data: [300, 50, 100],
          backgroundColor: ["#a3e1d4", "#dedede", "#9CC3DA"]
        }]
      };


      var doughnutOptions = {
        responsive: false,
        legend: {
          display: false
        }
      };


      var ctx4 = document.getElementById("doughnutChart").getContext("2d");
      new Chart(ctx4, {
        type: 'doughnut',
        data: doughnutData,
        options: doughnutOptions
      });

      var doughnutData = {
        labels: ["App", "Software", "Laptop"],
        datasets: [{
          data: [70, 27, 85],
          backgroundColor: ["#a3e1d4", "#dedede", "#9CC3DA"]
        }]
      };


      var doughnutOptions = {
        responsive: false,
        legend: {
          display: false
        }
      };


      var ctx4 = document.getElementById("doughnutChart2").getContext("2d");
      new Chart(ctx4, {
        type: 'doughnut',
        data: doughnutData,
        options: doughnutOptions
      });

    });
  </script>
</body>

</html>