<?php
require_once('config.php');
$sqle	= mysqli_query($koneksi,"select * from user where username='".$user."'");
$akses	= mysqli_fetch_array($sqle);

?>
<div id="sidebar" class="sidebar                  responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<ul class="nav nav-list">
					<li class="active">
						<a href="#">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Pilih Menu </span>
						</a>

						<b class="arrow"></b>
					</li>
					<?php
						if ($akses['level_user']=='admin'){
					?>
					<li class="">
						<a class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text">Master</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="master_user.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Master User
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="master_section.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Master Section
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					
					<li class="">
						<a class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text">Form</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="form-pp.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Form PP
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="form-wo.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Form WO
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					
					<li class="">
						<a class="dropdown-toggle">
							<i class="menu-icon fa 	fa-check-square-o"></i>
							<span class="menu-text">Approval</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="approval_pp.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Approval PP
									<span class="label label-danger arrowed-in">20+</span>
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="approval_wo.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Approval WO
									<span class="label label-danger arrowed-in">20+</span>
								</a>

								<b class="arrow"></b>
							</li>

							</ul>
					</li>
					<?php } else if ($akses['level_user']=='usr'){ 
				
					?>
					<li class="">
								<a href="main_user.php">
									<i class="menu-icon fa fa-desktop"></i>
									Dashboard
								</a>

								<b class="arrow"></b>
					</li>
					<li class="">
						<a class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text">Form</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="form-pp.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Form PP
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="form-wo.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Form WO
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
								<a href="view_ppwo.php">
									<i class="menu-icon fa fa-book"></i>
									PPWO View
								</a>

								<b class="arrow"></b>
					</li>
					
					
					<?php } else if ($akses['level_user']=='tek'){ 
				
					?>
					<li class="">
								<a href="main_teknik.php">
									<i class="menu-icon fa fa-desktop"></i>
									Dashboard
								</a>

								<b class="arrow"></b>
					</li>
					<li class="">
						<a class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text">Form</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="form-pp.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Form PP
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="form-wo.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Form WO
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					
<!--
					<li class="">
						<a class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text">Job</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="menu_take_pp.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Take PP
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="menu_take_wo.php">
									<i class="menu-icon fa fa-caret-right"></i>
									WO Process
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
-->
					<li class="">
						<a class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text">Take</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
											<li class="">
												<a href="menu_take_pp.php">
													<i class="menu-icon fa fa-cog"></i>
													Permintaan Perbaikan
												</a>

												<b class="arrow"></b>
											</li>


											<li class="">
												<a href="menu_take_wo.php">
													<i class="menu-icon fa fa-file-text"></i>
													Work Order
												</a>

												<b class="arrow"></b>
											</li>

										</ul>
					</li>
					
					<li class="">
						<a class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text">Process</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
											<li class="">
												<a href="menu_process_pp.php">
													<i class="menu-icon fa fa-cog"></i>
													Permintaan Perbaikan
												</a>

												<b class="arrow"></b>
											</li>

											<li class="">
												<a href="menu_process_wo.php">
													<i class="menu-icon fa fa-file-text"></i>
													Work Order
												</a>

												<b class="arrow"></b>
											</li>
										</ul>
					</li>
					<li class="">
								<a href="category.php">
									<i class="menu-icon fa fa-plus-square"></i>
									Category
								</a>

								<b class="arrow"></b>
					</li>
					<li class="">
						<a class="dropdown-toggle">
							<i class="menu-icon fa fa-book"></i>
							<span class="menu-text">Report</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
											<li class="">
												<a href="report_pp.php">
													<i class="menu-icon fa fa-cog"></i>
													Permintaan Perbaikan IT All
												</a>

												<b class="arrow"></b>
											</li>

											<li class="">
												<a href="report_pp_infra.php">
													<i class="menu-icon fa fa-cog"></i>
													Permintaan Perbaikan Infrastruktur
												</a>

												<b class="arrow"></b>
											</li>

											<li class="">
												<a href="report_pp_prog.php">
													<i class="menu-icon fa fa-cog"></i>
													Permintaan Perbaikan Programer
												</a>

												<b class="arrow"></b>
											</li>

											<li class="">
												<a href="report_wo.php">
													<i class="menu-icon fa fa-file-text"></i>
													Work Order
												</a>

												<b class="arrow"></b>
											</li>
										</ul>
					</li>
					
<!--
					<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-folder-o"></i>
									Job
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="">
										<a href="#" class="dropdown-toggle">
											<i class="menu-icon fa fa-pencil orange"></i>

											Taking
											<b class="arrow fa fa-angle-down"></b>
										</a>

										<b class="arrow"></b>

										<ul class="submenu">
											<li class="">
												<a href="menu_take_pp.php">
													<i class="menu-icon fa fa-cog"></i>
													Permintaan Perbaikan
												</a>

												<b class="arrow"></b>
											</li>

											<li class="">
												<a href="menu_take_wo.php">
													<i class="menu-icon fa fa-file-text"></i>
													Work Order
												</a>

												<b class="arrow"></b>
											</li>
										</ul>
									</li>
								</ul>
								
								<ul class="submenu">
									<li class="">
										<a href="#" class="dropdown-toggle">
											<i class="menu-icon fa fa-gears orange"></i>

											Process
											<b class="arrow fa fa-angle-down"></b>
										</a>

										<b class="arrow"></b>

										<ul class="submenu">
											<li class="">
												<a href="menu_process_pp.php">
													<i class="menu-icon fa fa-cog"></i>
													Permintaan Perbaikan
												</a>

												<b class="arrow"></b>
											</li>

											<li class="">
												<a href="menu_process_wo.php">
													<i class="menu-icon fa fa-file-text"></i>
													Work Order
												</a>

												<b class="arrow"></b>
											</li>
										</ul>
									</li>
								</ul>
								
							</li>
-->
					
					<?php } else if ($akses['level_user']=='sh'){ 
				
					?>
					<li class="">
								<a href="main_user.php">
									<i class="menu-icon fa fa-desktop"></i>
									Dashboard
								</a>

								<b class="arrow"></b>
					</li>
					<li class="">
						<a class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text">Form</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="form-pp.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Form PP
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="form-wo.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Form WO
								</a>

								<b class="arrow"></b>
							</li>

							</ul>
					</li>
					
					<li class="">
								<a href="app_pp.php">
									<i class="menu-icon fa 	fa-check-square-o "></i>
									Approval
									<?php 
							$sqlv	= mysqli_query($koneksi,"SELECT count(no_pp) AS jumlah from tbl_pp where status_pp = 'finish' and section = '".$akses['section']."'");
							$dataz	= mysqli_fetch_array($sqlv);
							$sql3	= mysqli_query($koneksi,"SELECT count(no_wo) AS jumlah from tbl_wo where status_wo = 'waiting' and section = '".$akses['section']."'");
							$datax	= mysqli_fetch_array($sql3);
							
							$jumlah	= $dataz['jumlah'] + $datax['jumlah'];
							
									?>
									<span class="label label-danger arrowed-in"><?php echo $jumlah;?></span>
								
								</a>


								<b class="arrow"></b>
					</li>
					<li class="">
								<a href="view_ppwo.php">
									<i class="menu-icon fa fa-book"></i>
									PPWO View
								</a>

								<b class="arrow"></b>
					</li>
					
					<?php } else if ($akses['level_user']=='h_it'){ 
						$sql7	= mysqli_query($koneksi,"SELECT count(no_wo) AS jumlah from tbl_wo where status_wo = 'accepted by IT'");
						$dataf	= mysqli_fetch_array($sql7);
						$jumlah = $dataf['jumlah'];
					?>
					
					<li class="">
								<a href="main_section_h_it.php">
									<i class="menu-icon fa fa-desktop"></i>
									Dashboard
								</a>

								<b class="arrow"></b>
					</li>
					<li class="">
						<a class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text">Form</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="form-pp.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Form PP
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="form-wo.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Form WO
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
									
					<li class="">
								<a href="wo_h_it.php">
									<i class="menu-icon fa fa-check-square-o"></i>
									Approve WO
									<span class="label label-danger arrowed-in"><?php echo $jumlah;?></span>
								</a>

								<b class="arrow"></b>
					</li>
					<li class="">
								<a href="app_pp.php">
									<i class="menu-icon fa 	fa-check-square-o "></i>
									Approval
									<?php 
							$sqlv	= mysqli_query($koneksi,"SELECT count(no_pp) AS jumlah from tbl_pp where status_pp = 'finish' and section = '".$akses['section']."'");
							$dataz	= mysqli_fetch_array($sqlv);
							$sql3	= mysqli_query($koneksi,"SELECT count(no_wo) AS jumlah from tbl_wo where status_wo = 'waiting' and section = '".$akses['section']."'");
							$datax	= mysqli_fetch_array($sql3);
							
							$jumlah	= $dataz['jumlah'] + $datax['jumlah'];
							
									?>
									<span class="label label-danger arrowed-in"><?php echo $jumlah;?></span>
								
								</a>


								<b class="arrow"></b>
					</li>
					<li class="">
								<a href="view_ppwo.php">
									<i class="menu-icon fa fa-book"></i>
									PPWO View
								</a>

								<b class="arrow"></b>
					</li>
					
	
					
					
					
					<?php }?>
				</ul><!-- /.nav-list -->

<!--			non aktif ngariweuh keun
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
-->

				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>
