<?php
require_once('config.php');
$sqle	= mysqli_query($koneksi,"select * from user where username='".$user."'");
$akses	= mysqli_fetch_array($sqle);
$pls=$_SESSION['pls'];
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
						if ($akses['level_user']=='admin' OR $akses['level_user']=='adminho'){
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
					<?php }
					
					else if ($akses['level_user']=='usr'){ 
				
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
											<li class="">
												<a href="menu_take_modul.php">
													<i class="menu-icon fa fa-file-text"></i>
													Modul
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

											<li class="">
												<a href="menu_process_modul.php">
													<i class="menu-icon fa fa-file-text"></i>
													MODUL
												</a>

												<b class="arrow"></b>
											</li>
										</ul>
										
					</li>
						<li class="">
						<a class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text">REPORT PROJECT IT</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

					
						<ul class="submenu">
											
											<li class="">
												<a href="view_dailyreport.php">
													<i class="menu-icon fa fa-file-text"></i>
												 DAILY REPORT IT
												</a>

												<b class="arrow"></b>
											</li>

										</ul>
						<ul class="submenu">
											
											<li class="">
												<a href="view_laporan.php">
													<i class="menu-icon fa fa-file-text"></i>
													WEEKS REPORT
												</a>

												<b class="arrow"></b>
											</li>

								</ul>
						<ul class="submenu">
											
											<li class="">
												<a href="browse_ostanding.php">
													<i class="menu-icon fa fa-file-text"></i>
													OSTANDING
												</a>

												<b class="arrow"></b>
											</li>

								</ul>
								<ul class="submenu">
											
											<li class="">
												<a href="view_trouble.php">
													<i class="menu-icon fa fa-file-text"></i>
												Troubleshooting
												</a>

												<b class="arrow"></b>
											</li>

								</ul>
					</li>
					<?php  
					$pls = $_SESSION['pls'];
					if($pls=="ho"){}else{	
					?>
						<li class="">
								<a href="view_performance.php">
									<i class="menu-icon fa fa-tachometer"></i>
									Performance
								</a>

								<b class="arrow"></b>
					</li>
					<?php } ?>

					<?php if($pls=="ho"){}else{?>
					<li class="">
						<a class="dropdown-toggle">
							<i class="menu-icon  fa fa-book"></i>
							<span class="menu-text">INVENTORY</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
											
											<li class="">
												<a href="form_barang_masuk.php">
													<i class="menu-icon fa fa-file-text"></i>
												 BARANG MASUK
												</a>

												<b class="arrow"></b>
											</li>

										</ul>
						<ul class="submenu">
											
											<li class="">
												<a href="form_barang_keluar.php">
													<i class="menu-icon fa fa-file-text"></i>
													BARANG KELUAR
												</a>

												<b class="arrow"></b>
											</li>

								</ul>
								<ul class="submenu">
											
											<li class="">
												<a href="view_stok.php">
													<i class="menu-icon fa fa-file-text"></i>
													STOK
												</a>

												<b class="arrow"></b>
											</li>

								</ul>
								<!-- <ul class="submenu">
											
											<li class="">
												<a href="view_inventaris.php">
													<i class="menu-icon fa fa-file-text"></i>
													INVENTARIS IT
												</a>

												<b class="arrow"></b>
											</li>

								</ul> -->
					</li>
					<?php }?>
					<!-- <li class="">
								<a href="category.php">
									<i class="menu-icon fa fa-plus-square"></i>
									Category
								</a>

								<b class="arrow"></b>
					</li> -->
					<li class="">
								<a href="view_inventaris.php">
									<i class="menu-icon fa fa-plus-square"></i>
									Inventaris IT
								</a>

								<b class="arrow"></b>
					</li>
					
					<li class="">
								<a href="form_pc.php">
									<i class="menu-icon fa fa-plus-square"></i>
									Master Komputer
								</a>

								<b class="arrow"></b>
					</li>
					<li class="">
						<a class="dropdown-toggle">
							<i class="menu-icon fa fa-book"></i>
							<span class="menu-text">Browse & Report</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

						<li class="">
												<a href="report_pp_all.php">
													<i class="menu-icon fa fa-cog"></i>
													Permintaan Perbaikan IT ALL
												</a>

												<b class="arrow"></b>
											</li>
											
											<li class="">
												<a href="report_modul_all.php">
													<i class="menu-icon fa fa-cog"></i>
													Modul IT ALL
												</a>

												<b class="arrow"></b>
											</li>

											<li class="">
												<a href="view_move_inventaris.php">
													<i class="menu-icon fa fa-cog"></i>
													Inventaris Move
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
											<li class="">
												<a href="view_trackpp.php">
													<i class="menu-icon fa fa-cog"></i>
													Track Perbaikan
												</a>

												<b class="arrow"></b>
											</li>

											
										</ul>
					</li>

					<?php if($pls=='ho'){}else{?>
						<li class="">
								<a href="app_pr.php">
									<i class="menu-icon fa 	fa-check-square-o "></i>
									Approval_PR
									<?php 
							$sqlv	= mysqli_query($koneksi,"SELECT count(no_request) AS jumlah from request where no_pr <>'' and user_approve ='' and request in('order','service_eksternal') and pls='$pls'");
							$dataz	= mysqli_fetch_array($sqlv);
							
							
							$jumlah	= $dataz['jumlah'] ;
							
									?>
									<span class="label label-danger arrowed-in"><?php echo $jumlah;?></span>
								
								</a>


								<b class="arrow"></b>
							</li>
							<?php } ?>

					<?php if($_SESSION['username']=='it01'){?>
					<li class="">
								<a href="app_nilai.php">
									<i class="menu-icon fa 	fa-check-square-o "></i>
									Approval_Nilai 
									<?php  
						
							
						
							$sql3_cek_prog_spv	= mysqli_query($koneksi,"SELECT count(*)  as woprog  from tbl_wo  JOIN nilai_wo  ON tbl_wo.no_wo=nilai_wo.no_wo join user on tbl_wo.diterima=user.nama where tbl_wo.pls='$pls' and tbl_wo.status_wo ='finish' and user.dev ='pro' and tbl_wo.tgl_s_kerja >'2020-07-05'  and  nilai_wo.spv =''");
							$woprog_spv		= mysqli_fetch_array($sql3_cek_prog_spv);		
						
							$sql3_pp_prog_spv	= mysqli_query($koneksi,"SELECT count(*)  as ppprog  from tbl_pp  JOIN nilai_pp  ON tbl_pp.no_pp=nilai_pp.no_pp join user on tbl_pp.diterima=user.nama where tbl_pp.pls='$pls' and tbl_pp.status_pp in('finish','complete') and user.dev ='pro' and tbl_pp.tgl_s_kerja >'2020-07-05' and  nilai_pp.spv =''");
							$ppprog_spv		= mysqli_fetch_array($sql3_pp_prog_spv)	;	

									?>
									<span class="label label-danger arrowed-in"><?php echo $woprog_spv['woprog']+$ppprog_spv['ppprog']; ?></span>
								
								</a>


								<b class="arrow"></b>
					</li>
					<?php }else{}?>

					<?php if($pls="ho"){}else{?>
						<li class="">
								<a href="view_planing.php">
									<i class="menu-icon fa fa-bar-chart-o"></i>
									REPORT NILAI
					
						

								<span class="label label-danger arrowed-in"></span>
								</a>

								<b class="arrow"></b>
						</li>
						<?php }?>
						
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
							$sqlv	= mysqli_query($koneksi,"SELECT count(no_pp) AS jumlah from tbl_pp where pls='$pls' and status_pp = 'finish' and section = '".$akses['section']."'");
							$dataz	= mysqli_fetch_array($sqlv);
							$sql3	= mysqli_query($koneksi,"SELECT count(no_wo) AS jumlah from tbl_wo where pls='$pls' and status_wo = 'waiting' and section = '".$akses['section']."'");
							$datax	= mysqli_fetch_array($sql3);
					
							$jumlah	= $dataz['jumlah'] + $datax['jumlah'];
							
									?>
									<span class="label label-danger arrowed-in"><?php echo $jumlah;?></span>
								
								</a>


								<b class="arrow"></b>
					</li>

<!-- 
					<li class="">
								<a href="app_nilai.php">
									<i class="menu-icon fa 	fa-check-square-o "></i>
									Approval_Nilai 
									<?php  
						
							
							$sql3_cek_infra	= mysqli_query($koneksi,"SELECT count(*)  as woinfra  from tbl_wo  JOIN nilai_wo  ON tbl_wo.no_wo=nilai_wo.no_wo join user on tbl_wo.diterima=user.nama where tbl_wo.pls='$pls' and tbl_wo.status_wo ='finish' and user.dev ='inf' and tbl_wo.tgl_s_kerja >'2020-07-05' and nilai_wo.sshit =''");
							$woinfra		= mysqli_fetch_array($sql3_cek_infra);
							$sql3_cek_prog	= mysqli_query($koneksi,"SELECT count(*)  as woprog  from tbl_wo  JOIN nilai_wo  ON tbl_wo.no_wo=nilai_wo.no_wo join user on tbl_wo.diterima=user.nama where tbl_wo.pls='$pls' and  tbl_wo.status_wo ='finish' and user.dev ='pro' and tbl_wo.tgl_s_kerja >'2020-07-05' and nilai_wo.sshit ='' and  nilai_wo.spv !=''");
							$woprog		= mysqli_fetch_array($sql3_cek_prog);		
						
							$sql3_pp_infra	= mysqli_query($koneksi,"SELECT count(*)  as ppinfra  from tbl_pp JOIN nilai_pp  ON tbl_pp.no_pp=nilai_pp.no_pp join user on tbl_pp.diterima=user.nama where tbl_pp.pls='$pls' and  tbl_pp.status_pp in('finish','complete') and user.dev ='inf' and tbl_pp.tgl_s_kerja >'2020-07-05' and nilai_pp.sshit =''");
							$ppinfra		= mysqli_fetch_array($sql3_pp_infra);
							$sql3_pp_prog	= mysqli_query($koneksi,"SELECT count(*)  as ppprog  from tbl_pp JOIN nilai_pp  ON tbl_pp.no_pp=nilai_pp.no_pp join user on tbl_pp.diterima=user.nama where tbl_pp.pls='$pls' and  tbl_pp.status_pp in('finish','complete') and user.dev ='pro' and tbl_pp.tgl_s_kerja >'2020-07-05' and nilai_pp.sshit ='' and  nilai_pp.spv !=''");
							$ppprog		= mysqli_fetch_array($sql3_pp_prog)	;	

									?>
									<span class="label label-danger arrowed-in"><?php echo $woinfra['woinfra']+$woprog['woprog']+$ppinfra['ppinfra']+$ppprog['ppprog']; ?></span>
								
								</a>


								<b class="arrow"></b>
					</li> -->

					<?php if($pls=='ho'){}else{?>
					<li class="">
								<a href="app_pr.php">
									<i class="menu-icon fa 	fa-check-square-o "></i>
									Approval_PR 
									<?php  
							$sqlv	= mysqli_query($koneksi,"SELECT count(no_request) AS jumlah from request where no_pr ='' and request in('order','service_eksternal') and pls='$pls'");
							$dataz	= mysqli_fetch_array($sqlv);
							
							
							$jumlah	= $dataz['jumlah'] ;
							
									?>
									<span class="label label-danger arrowed-in"><?php echo $jumlah;?></span>
								
								</a>


								<b class="arrow"></b>
					</li>
					<?php }?>
					<li class="">
								<a href="view_ppwo.php">
									<i class="menu-icon fa fa-book"></i>
									PPWO View
								</a>

								<b class="arrow"></b>
					</li>
					</li>
						<!-- <li class="">
								<a href="view_performance.php">
									<i class="menu-icon fa fa-tachometer"></i>
									Performance
								</a>

								<b class="arrow"></b>
					</li> -->

					<li class="">
						<a class="dropdown-toggle">
							<i class="menu-icon  fa fa-book"></i>
							<span class="menu-text">REPORT PROJECT IT</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
											
											<li class="">
												<a href="view_dailyreport.php">
													<i class="menu-icon fa fa-file-text"></i>
												 DAILY REPORT IT
												</a>

												<b class="arrow"></b>
											</li>

										</ul>
						<ul class="submenu">
											
											<li class="">
												<a href="view_laporan.php">
													<i class="menu-icon fa fa-file-text"></i>
													WEEKS REPORT IT
												</a>

												<b class="arrow"></b>
											</li>

								</ul>
					</li>
					<li class="">
						<a class="dropdown-toggle">
							<i class="menu-icon  fa fa-book"></i>
							<span class="menu-text">INVENTORY</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
											
											<li class="">
												<a href="form_barang_masuk.php">
													<i class="menu-icon fa fa-file-text"></i>
												 BARANG MASUK
												</a>

												<b class="arrow"></b>
											</li>

										</ul>
						<ul class="submenu">
											
											<li class="">
												<a href="form_barang_keluar.php">
													<i class="menu-icon fa fa-file-text"></i>
													BARANG KELUAR
												</a>

												<b class="arrow"></b>
											</li>

								</ul>
								<ul class="submenu">
											
											<li class="">
												<a href="view_stok.php">
													<i class="menu-icon fa fa-file-text"></i>
													STOK
												</a>

												<b class="arrow"></b>
											</li>

								</ul>
					</li>
						<!-- <li class="">
								<a href="view_planing.php">
									<i class="menu-icon fa fa-bar-chart-o"></i>
									REPORT NILAI
								</a>

								<b class="arrow"></b>
					</li> -->
					
											
											<li class="">
												<a href="view_trouble.php">
													<i class="menu-icon fa fa-file-text"></i>
												Troubleshooting
												</a>

												<b class="arrow"></b>
											</li>

							
					<li class="">
								<a href="view_inventaris.php">
									<i class="menu-icon fa fa-plus-square"></i>
									Inventaris IT
								</a>

								<b class="arrow"></b>
					</li>
					<li class="">
												<a href="view_trackpp.php">
													<i class="menu-icon fa fa-cog"></i>
													Track Perbaikan
												</a>

												<b class="arrow"></b>
											</li>
	
					
					
					
					<?php }

					else if ($akses['level_user']=='sh'){ 
				
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
							$sqlv	= mysqli_query($koneksi,"SELECT count(no_pp) AS jumlah from tbl_pp where pls='$pls' and  status_pp = 'finish' and section = '".$akses['section']."'");
							$dataz	= mysqli_fetch_array($sqlv);
							$sql3	= mysqli_query($koneksi,"SELECT count(no_wo) AS jumlah from tbl_wo where pls='$pls' and status_wo = 'waiting' and section = '".$akses['section']."'");
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
					
					<?php } else if ($akses['level_user']=='ho_it'){ 
						$sql7	= mysqli_query($koneksi,"SELECT count(no_wo) AS jumlah from tbl_wo where pls='$pls' and status_wo = 'accepted by IT'");
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
							$sqlv	= mysqli_query($koneksi,"SELECT count(no_pp) AS jumlah from tbl_pp where pls='$pls' and status_pp = 'finish' and section = '".$akses['section']."'");
							$dataz	= mysqli_fetch_array($sqlv);
							$sql3	= mysqli_query($koneksi,"SELECT count(no_wo) AS jumlah from tbl_wo where pls='$pls' and status_wo = 'waiting' and section = '".$akses['section']."'");
							$datax	= mysqli_fetch_array($sql3);
					
							$jumlah	= $dataz['jumlah'] + $datax['jumlah'];
							
									?>
									<span class="label label-danger arrowed-in"><?php echo $jumlah;?></span>
								
								</a>


								<b class="arrow"></b>
					</li>


					

					<?php if($pls=="ho"){}else{?>
					<li class="">
								<a href="app_pr.php">
									<i class="menu-icon fa 	fa-check-square-o "></i>
									Approval_PR 
									<?php  
							$sqlv	= mysqli_query($koneksi,"SELECT count(no_request) AS jumlah from request where no_pr ='' and request in('order','service_eksternal')");
							$dataz	= mysqli_fetch_array($sqlv);
							
							
							$jumlah	= $dataz['jumlah'] ;
							
									?>
									<span class="label label-danger arrowed-in"><?php echo $jumlah;?></span>
								
								</a>


								<b class="arrow"></b>
					</li>
					<?php } ?>

					<li class="">
								<a href="view_ppwo.php">
									<i class="menu-icon fa fa-book"></i>
									PPWO View
								</a>

								<b class="arrow"></b>
					</li>
					</li>
						
					<li class="">
						<a class="dropdown-toggle">
							<i class="menu-icon  fa fa-book"></i>
							<span class="menu-text">REPORT PROJECT IT</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
											
											<li class="">
												<a href="view_dailyreport.php">
													<i class="menu-icon fa fa-file-text"></i>
												 DAILY REPORT IT
												</a>

												<b class="arrow"></b>
											</li>

										</ul>
						<ul class="submenu">
											
											<li class="">
												<a href="view_laporan.php">
													<i class="menu-icon fa fa-file-text"></i>
													WEEKS REPORT IT
												</a>

												<b class="arrow"></b>
											</li>

								</ul>
					</li>
					<!-- <li class="">
						<a class="dropdown-toggle">
							<i class="menu-icon  fa fa-book"></i>
							<span class="menu-text">INVENTORY</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
											
											<li class="">
												<a href="form_barang_masuk.php">
													<i class="menu-icon fa fa-file-text"></i>
												 BARANG MASUK
												</a>

												<b class="arrow"></b>
											</li>

										</ul>
						<ul class="submenu">
											
											<li class="">
												<a href="form_barang_keluar.php">
													<i class="menu-icon fa fa-file-text"></i>
													BARANG KELUAR
												</a>

												<b class="arrow"></b>
											</li>

								</ul>
								<ul class="submenu">
											
											<li class="">
												<a href="view_stok.php">
													<i class="menu-icon fa fa-file-text"></i>
													STOK
												</a>

												<b class="arrow"></b>
											</li>

								</ul>
					</li> -->
					<li class="">
								<a href="view_inventaris.php">
									<i class="menu-icon fa fa-plus-square"></i>
									Inventaris IT
								</a>

								<b class="arrow"></b>
					</li>
						
					<li class="">
												<a href="view_trouble.php">
													<i class="menu-icon fa fa-file-text"></i>
												Troubleshooting
												</a>

												<b class="arrow"></b>
											</li>
	
					
					<li class="">
												<a href="view_trackpp.php">
													<i class="menu-icon fa fa-cog"></i>
													Track Perbaikan
												</a>

												<b class="arrow"></b>
											</li>
					
					<?php }
						
					?>
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
