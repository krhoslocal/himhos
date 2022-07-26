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
			   
			 <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="nav-icon far fa-envelope"></i>
              <p> รายงานลูกหนี้  ตามสิทธิ
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="@opd_board.php?class=OFC" class="nav-link">
                  <i class="nav-icon far fa-bars "></i>
                  <p>สิทธิข้าราชการ</p>
                </a>
				<p>
				<ul class="nav nav-treeview">	
					<li class="nav-item has-treeview">
					<a href="@opd_board.php?class=OFC&sclass=op" class="nav-link">
					  <i class="far fa-circle nav-icon"></i>
					  <p>OFC OP</p>
					</a>
					</li>
					<li class="nav-item has-treeview">
					<a href="@opd_board.php?class=OFC&sclass=ip" class="nav-link">
					  <i class="far fa-circle nav-icon"></i>
					  <p>OFC IP</p>
					</a>
					</li>
				</ul>
				</p>
              </li>
              <li class="nav-item">
                <a href="@opd_board.php?class=SSS" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>สิทธิประกันสังคม</p>
                </a>
				<p>
				<ul class="nav nav-treeview">	
					<li class="nav-item has-treeview">
					<a href="@opd_board.php?class=SSS&sclass=op" class="nav-link">
					  <i class="far fa-circle nav-icon"></i>
					  <p>SSS OP</p>
					</a>
					</li>
					<li class="nav-item has-treeview">
					<a href="@opd_board.php?class=SSS&sclass=ip" class="nav-link">
					  <i class="far fa-circle nav-icon"></i>
					  <p>SSS IP</p>
					</a>
					</li>
				</ul>
				</p>
				
              </li>
			  <li class="nav-item">
                <a href="@opd_board.php?class=UCS" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>สิทธิบัตรทอง</p>
                </a>
				<p>
				<ul class="nav nav-treeview">	
					<li class="nav-item has-treeview">
					<a href="@opd_board.php?class=UCS&sclass=op" class="nav-link">
					  <i class="far fa-circle nav-icon"></i>
					  <p>UCS OP</p>
					</a>
					</li>
					<li class="nav-item has-treeview">
					<a href="@opd_board.php?class=UCS&sclass=ip" class="nav-link">
					  <i class="far fa-circle nav-icon"></i>
					  <p>UCS IP</p>
					</a>
					</li>
				</ul>
				</p>
              </li>
			  <li class="nav-item">
                <a href="@opd_board.php?class=LGO" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>สิทธิ อปท</p>
                </a>
				<p>
				<ul class="nav nav-treeview">	
					<li class="nav-item has-treeview">
					<a href="@opd_board.php?class=LGO&sclass=op" class="nav-link">
					  <i class="far fa-circle nav-icon"></i>
					  <p>LGO OP</p>
					</a>
					</li>
					<li class="nav-item has-treeview">
					<a href="@opd_board.php?class=LGO&sclass=ip" class="nav-link">
					  <i class="far fa-circle nav-icon"></i>
					  <p>LGO IP</p>
					</a>
					</li>
				</ul>
				</p>
              </li>
			  <li class="nav-item">
                <a href="@opd_board.php?class=A1" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>สิทธิชำระเงินเอง</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="@opd_board.php?class=other" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>อื่นๆ</p>
                </a>
              </li>
            </ul>
          </li>
		  
		  
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  เมนูหลัก
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
              <?php
			  $pdo->exec("set names utf8");
              $stmt = $pdo->query("select * from kpi_group");
              
              ?>
            
                <?php
              while ($row = $stmt->fetch()) {
                ?>
                <li class="nav-item">
                  <a href="./index.php" class="nav-link">
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
                <?php } else { ?>


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
                      <p class="text">บันทึกข้อมูลตัวชี้วัด</p>
                    </a>
                  </li>
									<li class="nav-item">
                    <a href="kpi_editkpi.php" class="nav-link">
                      <i class="nav-icon far fa-circle text-danger"></i>
                      <p class="text">กำหนดตัวชี้วัด</p>
                    </a>
                  </li>
                <?php } ?>
              </ul>
            </li>







      
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






          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>