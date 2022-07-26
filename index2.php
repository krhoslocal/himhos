<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE); 

include("includes/dbconn.php");    
include("data/data.php");
include("includes/fusioncharts.php");
$goal=100;
$scale = 100;
$data_type = 0;

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $titleweb; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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

    
    <!-- start graph  -->

  <script type='text/javascript' src='script.js'></script>
    <script language='javascript' src='fusioncharts/fusioncharts.js'></script>
 

<!-- end graph  -->
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
          <a href="index.php" class="nav-link">หน้าหลัก</a>
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
          echo "สวัสดี คุณ  : " . $_SESSION['mem_name'];
          echo "</p>";
         
          echo "</li>";
          // echo "สวัดี คุณ".$_SESSION['mem_name'];
        }

        ?>
        
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?php echo $txttitle; ?></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

          <!---
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      -->
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>เมนูหลัก<i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <?php
              include("condb.php");
			  $pdo->exec("set names utf8");
              $stmt = $pdo->query("select * from kpi_group");
              
              ?>
              <ul class="nav nav-treeview">
                <?php
              while ($row = $stmt->fetch()) {
                ?>
                <li class="nav-item">
                  <a href="./index2.php?g_no=<?php echo $row['g_no'];?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p><?php echo $row['g_name'];?></p>
                  </a>
                </li>
                <?php } ?>
                
                <?php
 if ($_SESSION['username'] == "") {

        ?>
                <li class="nav-item">
                  <a href="login.html" class="nav-link">
                    <i class="fas fa-key"></i>
                    <p>&nbsp;&nbsp;&nbsp;เข้าสู่ระบบ</p>
                      <span class="right badge badge-danger">login</span>
                  </a>
                </li>
    <?php } else{ ?>


      <li class="nav-item">
                  <a href="logout.php" class="nav-link">
                    <i class="fas fa-key"></i>
                    <p>
                      ออกจากระบบ
                      <span class="right badge badge-danger">logout</span>

                    </p>
                  </a>
                </li>

                <li class="nav-item">
            <a href="kpi_edit.php" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">บันทึกข้อมูลตัวชีวัด</p>
            </a>
          </li>
      <?php } ?>
              </ul>
            </li>







            <!---
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/mailbox/mailbox.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>
        -->






          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
         
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="card">
            <div class="card-body">
 <div class="row">
 <div class="col-md col-12">
   <div align="center">
    <?php
    $g_no=$_GET['g_no'];
    include("condb.php");
		   ///แก้ไข
         // $sqlp = "select  kpi_group.g_no,kpi_group.g_name as g_name,
        //  count(*) as total_kpi,
         // sum(if(flag_result='1',1,0)) as kpi_pass,
         // sum(if(flag_result !='1',1,0)) as kpi_nopass,
         //(sum(if(flag_result='1',1,0)) * 100)/count(*) as percent,
         // now() as kpi_update
         // from kpi INNER JOIN  kpi_group on kpi.kpi_group=kpi_group.g_no WHERE kpi_group='$g_no'";
					$sqlp = "select  c.g_no,c.g_name as g_name,
          count(*) as total_kpi,
          sum(if(a.flag_result='1',1,0)) as kpi_pass,
          sum(if(a.flag_result !='1',1,0)) as kpi_nopass,
          (sum(if(a.flag_result='1',1,0)) * 100)/count(*) as percent,
          now() as kpi_update
          from kpi a 
				left JOIN  kpi_group c ON a.kpi_group=c.g_no 
				left JOIN  kpi_group_sub b ON b.kpi_sub_id=a.kpi_id
				WHERE b.kpi_g_id='$g_no'";
				
$resultstp=mysqli_query($link,$sqlp);
$rowstp=mysqli_fetch_array($resultstp);
$txt = "<div align='center'><h3>ตัวชี้วัด&nbsp;".$rowstp['g_name']."</h3></div><br>";
$txt .= "<table width='100%'>";
$txt .= "<tr align='center'><td align='center'>";

$strXMLp =  recivedata($goal,$rowstp['percent'],0,$scale) ;//เป้าหมาย,ผลงาน,ประเภท(0 มากดี,1 น้อยดี),ค่ามากสุด
//$txt .= "$rowstp[stg_group_name] <i>$rowstp[stg_name]</i><br>";


//$txt .= renderChart("fusioncharts/angulargauge.swf", "", $strXMLp, "myChartId$rowdata[kpi_id]", 900, 360, 0, 0);

$txt .= "<div align='center' style='font-size:10px'> Update : ".retDatets($rowstp['kpi_update'])."</div>";

//$txt .= '<iframe frameBorder="0" width="320" height="320" scrolling="no" src="gauage.php?kpi_tar='.$goal.'&db_rate='.$rowstp['percent'].'&kpi_type_data='.$data_type.'&kpi_scale='.$scale.'&kpi_radius=1" ></iframe>'; 

$txt .="</td></tr></table>";  
  echo $txt;
?>
           </div>
          </div>
      </div>
    </div>
 </div>
         
           <div class="card">
              <div class="card-body">
        
                 <?php
                 // หมวดตัวชีวัด
                 $kpi_tar=100;
                // $percent=100;
                 $data_type=0;
                 $scale=100;
                 $txt2 .= "<table><tr align='center'><td ><font size='4'>".$rowstg['stg_name']."</font><td></tr></table>"; 
                 $txt2 .= "<table width='100%' bgcolor='CCFFCC' ><tr align='center'>";
                 //แก้ Query ตัวนี้
								 //$sqldata = "SELECT left(trim(kpi.kpi_name),30) as name_kpi,kpi.* FROM kpi WHERE kpi_group='".$_GET['g_no']."'";	
								 $sqldata = "SELECT left(TRIM(a.kpi_name),30) as name_kpi,a.* FROM kpi a 
								 left JOIN kpi_group_sub b on b.kpi_sub_id=a.kpi_id
								 WHERE b.kpi_g_id='".$_GET['g_no']."'";	
								 	
                 $resultdata=mysqli_query($link,$sqldata);
                 if(mysqli_num_rows($resultdata) > 0){
                 $z=1;
                 while($rowdata=mysqli_fetch_array($resultdata)) {
                   
                 $txt2 .= "<td width='33%' valign='top'>
                            
                            
                             <div><center>".$rowdata['name_kpi']."</center></div>
                             <div align='center'>";
                 $strXML =  recivedata($rowdata['kpi_tar'],$rowdata['kpi_rate'],$rowdata['kpi_type_data'],$rowdata['kpi_scale']) ;//เป้าหมาย,ผลงาน,ประเภท(0 มากดี,1 น้อยดี),ค่ามากสุด
                 
                 //$txt .= renderChart("fusioncharts/angulargauge.swf", "", $strXML, "myChartId$rowdata[amphurcode]", 300, 150, 0, 0);
                 

                 
                 $txt2 .= '<iframe frameBorder="0" width="230" height="230" scrolling="no" src="gauage.php?kpi_tar='.$rowdata['kpi_tar'].'&db_rate='.$rowdata['kpi_rate'].'&kpi_type_data='.$rowdata['kpi_type_data'].'&kpi_scale='.$rowdata['kpi_scale'].'&kpi_radius=0" ></iframe>'; 
                 
                 $txt2 .= "</div>
                              
                           </td>";                                              
                         if(($z)%3==0){$txt2 .="</tr>";}
                         else{}
                          $z++; 
                  }          
                 }else{$txt2 .="<td>ยังไม่บันทึกข้อมูลตัวชี้วัด</td></tr>";}
                 $txt2 .= "</table>";

                  echo $txt2;
                 // สิ้นสุดตัวชีวัด
                 ?>
            
              </div>
           </div>
          <!-- /.row -->
          <!-- Main row -->
          <?php
          
          //$pdo->exec("set names utf8");
          $g_no=$_GET['g_no'];
          //แก้ไข query นี้
					//$stmt = $pdo->query("select g.g_no,g.g_name,k.* from kpi k INNER JOIN kpi_group g on k.kpi_group=g.g_no where k.kpi_group='$g_no'");
          //$stmt -> execute();
					$stmt = $pdo->query("select g.g_no,g.g_name,k.* from kpi k 
					INNER JOIN kpi_group g on k.kpi_group=g.g_no 
					left JOIN kpi_group_sub b ON b.kpi_sub_id=k.kpi_id
					WHERE b.kpi_g_id='$g_no'");
          ?>
          <!--  start project -->
          <div class="card">
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width: 2%">
                      kpi_id
                    </th>
                    <th style="width: 15%">
                      หมวดหมู่
                    </th>
                    <th style="width: 35%">ตัวชี้วัด
                    </th>
                    <th style="width: 25%">
                     เป้า
                    </th>
                    <th style="width: 15%">
                     ร้อยละ
                    </th>
                    <th style="width: 8%" class="text-center">
                      ผลงาน
                    </th>

                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($row = $stmt->fetch()) {
                  ?>
                    <tr>
                      <td>
                        <?php echo $row["kpi_id"]; ?>
                      </td>
                      <td>
                        <?php echo $row["g_name"]; ?>
                      </td>
                      <td>

                        <?php echo $row["kpi_name"]; ?>

                      </td>
                      <td>
                     
                     <?php echo $row["kpi_data"]; ?> 

                 </td>
                 <td>
                 <?php echo $row["kpi_result"]; ?> 
                 </td>
                 <td>
                 <?php echo $row["kpi_rate"]; ?> 
                 </td>
                 

                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>

          <!--   end proj -.

         <div class="container">
        <div class="row">
       
   
      
          right col -->
        </div>
        <!-- /.row (main row) -->
    </div>
  </div><!-- /.container-fluid -->
  </section>
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
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
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
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <script>
    $(function() {
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
    });
  </script>
</body>

</html>