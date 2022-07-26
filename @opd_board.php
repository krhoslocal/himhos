<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE); 
include("includes/dbconn.php");    
include("data/data.php");
//include("includes/fusioncharts.php");
include("condb.php");
include("authen.php");
$obj = new auThen();
$obj->chkLogin();
if(!(isset($_GET['sclass']) == 'op')){
	 $isclass='inc.acc_opd';
	}else{
	 $isclass='inc.acc_no';
	}

$level=$_SESSION['level'];
$iclass = $_GET['class'];


/*
if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = True)) {
	header('Location: login.html');
	exit;
} */

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SOHO System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
 <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons 
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- leo style 
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    -->

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <?php
        if ($_SESSION['username'] != "") {
          echo  "<li class=\"nav-item\">";

          echo "<p class=\"text-success\">";
          echo "สวัสดี คุณ" . $_SESSION['mem_name'];
          echo "</p>";

          echo "</li>";
          // echo "สวัดี คุณ".$_SESSION['mem_name'];
        }

        ?>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
   <?php include('left.php'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">

        </div><!-- /.container-fluid -->
      </div>
      <section class="content">

        <!-- Default box -->
        <div align="center" class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>
            <h3>OPD บริการ</h3>
          </strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="card">
          <div class="card-header">
			<!--test-->
			    
			<div class="form-group">
			  <label class="col-sm-3 control-label">Date</label>
				<div class="col-sm-5">
				  <input type="text" class="form-control pull-right" id="datepickerss">
				</div>
			</div>
			<!---->	
			
			
				
				<!-- BAR CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">OFC</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
			
	
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            <?php
            //include("condb.php");
            $mem_id=$_SESSION['mem_id'];
            if($level =='1'){
              $sql="SELECT * FROM(
select  a.cur_month,a.m_accno,
			  	a.m_nameacc,
				a.CC_an0,
				replace(a.CC_cost,',','') as CC_cost,
				replace(a.CC_pay,',','') as CC_pay,
				replace(a.CC_costtotal,',','') as CC_costtotal,
				a.CC_an1,a.CC_an2,a.dateupdate,(SELECT inc.welcode FROM hos.insclasses inc where $isclass IN(a.m_accno) LIMIT 1) AS wel_c
	                from khosservice.des_moneygroup a
                    WHERE a.cur_month BETWEEN '2021-10' AND '2022-06'
                    having a.CC_an0<>0) AS tp
WHERE tp.wel_c IN('$iclass') ORDER BY cur_month DESC";
            }else{
              $sql="SELECT * FROM(
select  a.cur_month,a.m_accno,
			  	a.m_nameacc,
				a.CC_an0,
				replace(a.CC_cost,',','') as CC_cost,
				replace(a.CC_pay,',','') as CC_pay,
				replace(a.CC_costtotal,',','') as CC_costtotal,
				a.CC_an1,a.CC_an2,a.dateupdate,(SELECT inc.welcode FROM hos.insclasses inc where $isclass IN(a.m_accno) LIMIT 1) AS wel_c
	                from khosservice.des_moneygroup a
                    WHERE a.cur_month BETWEEN '2021-10' AND '2022-06'
                    having a.CC_an0<>0) AS tp
WHERE tp.wel_c IN('$iclass') ORDER BY cur_month DESC";
            }
            //$pdo->exec("set names tis-620");
            $stmt = $pdo->query($sql);
            //$stmt -> execute();
            ?>
            <table id="example1" class="table table-striped">
              <thead>
                <tr>
                  <th>  เดือนที่ประมวล
                  </th>
                  <th> รหัสบัญชี
                  </th>
                  <th>ชื่อ บัญชี
                  </th>
                  <th>ค่าใช้จ่าย
                  </th>
                  <th>ผู้ป่วยจ่าย
                  </th>
                  <th>ลูกหนี้
                  </th>
                  
                </tr>
              </thead>
              <tbody>
                <?php
					$nowdata = array();
					$nowdata2 = array();
                while ($row = $stmt->fetch()) {
					array_push($nowdata,$row["CC_cost"]);
					array_push($nowdata2,$row["CC_costtotal"]);
                ?>
                  <tr>
                    <td>
                      <?php echo $row["cur_month"]; ?>
                    </td>
                    <td>
                      <?php echo $row["m_accno"]; ?>
                    </td>
                    <td>

                      <?php echo $row["m_nameacc"]; ?>

                    </td>
                    <td>
                     
                        <button class="btn btn-warning"><a href="#1"><?php echo $row["CC_cost"]; ?> </a></button>

                    </td>
                    <td>
                    <button class="btn-primary"><?php echo $row["CC_pay"]; ?> </button>
                    </td>
                    <td>
                    <button class="btn btn-info"><?php echo $row["CC_costtotal"]; ?> </button>
                    </td>
                    

                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>

          </div>
          <!-- /.card-body -->
					
					
          <div class="card-footer">
           
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->

      </section>
      <!-- /.content-header -->
    </div>
    <!-- Main content -->

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

   <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>-->
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    //$.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline 
  <script src="plugins/sparklines/sparkline.js"></script>-->
  <!-- JQVMap 
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>-->
  <!-- jQuery Knob Chart
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script> -->
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- DataTables -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes)
  <script src="dist/js/pages/dashboard.js"></script> -->
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <script>
    $(function() {
	

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : 'ค่าใช้จ่าย',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : true,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?= implode(',', $nowdata) ?>]
        },
        {
          label               : 'ค่าใช้จ่าย',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : true,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [<?= implode(',', $nowdata2) ?>]
        },
      ]
    }
	console.log(areaChartData.datasets);
	 var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.

      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
      var table = $('#example').DataTable({
        responsive: true
      });
   
	
	
	   //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })
	
	 var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = jQuery.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    var stackedBarChart = new Chart(stackedBarChartCanvas, {
      type: 'bar', 
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
	  });
	  
      $('#datepickerss').datepicker({
    autoclose: true
  });
  </script>
</body>

</html>