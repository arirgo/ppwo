<?php
require_once('config.php');
$sqle	= mysqli_query($koneksi,"select * from user where username='".$user."'");
$akses	= mysqli_fetch_array($sqle);

?>



				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<?php
				if ($akses['level_user']=='sh'){
					
					if ($nopp=="sh-lmnpl2"){
							$sqlr	= mysqli_query($koneksi,"SELECT count(no_pp) AS jumlah from tbl_pp where status_pp = 'finish' and section in ('PL2 LAMINASI','PL2 SLITTER')");
							$not1	= mysqli_fetch_array($sqlr);
							$sqlt	= mysqli_query($koneksi,"SELECT count(no_wo) AS jumlah from tbl_wo where status_wo = 'waiting' and section in ('PL2 LAMINASI','PL2 SLITTER')");
							$not2	= mysqli_fetch_array($sqlt);
							$jumlah = $not1['jumlah'] + $not2['jumlah'];
						}else if ($nopp=="ssh-coating"){
							$sqlr	= mysqli_query($koneksi,"SELECT count(no_pp) AS jumlah from tbl_pp where status_pp = 'finish' and section in ('COATING','RND')");
							$not1	= mysqli_fetch_array($sqlr);
							$sqlt	= mysqli_query($koneksi,"SELECT count(no_wo) AS jumlah from tbl_wo where status_wo = 'waiting' and section in ('COATING','RND')");
							$not2	= mysqli_fetch_array($sqlt);
							$jumlah = $not1['jumlah'] + $not2['jumlah'];
						}else {
							$sqlr	= mysqli_query($koneksi,"SELECT count(no_pp) AS jumlah from tbl_pp where status_pp = 'finish' and section = '".$akses['section']."'");
							$not1	= mysqli_fetch_array($sqlr);
							$sqlt	= mysqli_query($koneksi,"SELECT count(no_wo) AS jumlah from tbl_wo where status_wo = 'waiting' and section = '".$akses['section']."'");
							$not2	= mysqli_fetch_array($sqlt);
							$jumlah = $not1['jumlah'] + $not2['jumlah'];
						}
						?>
						<li class="purple">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<?php
									if ($jumlah=='0'){
								?>
								<i class="ace-icon fa fa-bell icon-bell"></i>
								<span class="badge badge-important"><?php echo $jumlah;?></span>
								</a>
								<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
									<li class="dropdown-header">
										
										Tidak ada permintaan Approve
									</li>
									<li class="dropdown-content">
										<ul class="dropdown-menu dropdown-navbar navbar-pink">
										<li>
											<a href="app_pp.php">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-pink fa  fa-external-link"></i>
														Lihat...
													</span>
												</div>
											</a>
										</li>
										</ul>
									</li>
								</ul>
								<?php
									}else {
										?>
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<span class="badge badge-important"><?php echo $jumlah;?></span>
								</a>
								<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
									<li class="dropdown-header">
									
									<?php echo $not1['jumlah'];?> Permintaan Perbaikan<br><?php echo $not2['jumlah'];?> Work Order<br>belum Anda Approve
									
									</li>
									<li class="dropdown-content">
										<ul class="dropdown-menu dropdown-navbar navbar-pink">
										<li>
											<a href="app_pp.php">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-pink fa  fa-external-link"></i>
														Lihat...
													</span>
												</div>
											</a>
										</li>
										</ul>
									</li>
								</ul>
										<?php
										}
								?>
							

							
						</li>
						
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/avatars/avatar2.png" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									<?php require_once('config.php');
										 $sqln = mysqli_query($koneksi,"select * from user where username='".$nopp."'");
										 $data = mysqli_fetch_array($sqln);
										 $name = $data['nama'];
										 echo "".$data['nama']."";
										 
										 ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								
								

								<li class="divider"></li>
								<li>
									<a href="change_pwd.php">
										<i class="ace-icon fa fa-key"></i>
										Ganti Password
									</a>
								</li>
								<li>
									<a href="logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
						
						<?php
				} else if ($akses['level_user']=='h_it'){
							
							$sqlt	= mysqli_query($koneksi,"SELECT count(no_wo) AS jumlah from tbl_wo where status_wo = 'accepted by IT'");
							$not2	= mysqli_fetch_array($sqlt);
							$jumlah = $not2['jumlah'];
						?>
						<li class="purple">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<?php
									if ($jumlah=='0'){
								?>
								<i class="ace-icon fa fa-bell icon-bell"></i>
								<span class="badge badge-important"><?php echo $jumlah;?></span>
								</a>
								<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
									<li class="dropdown-header">
										
										Tidak ada permintaan Approve
									</li>
									<li class="dropdown-content">
										<ul class="dropdown-menu dropdown-navbar navbar-pink">
										<li>
											<a href="wo_h_it.php">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-pink fa  fa-external-link"></i>
														Lihat...
													</span>
												</div>
											</a>
										</li>
										</ul>
									</li>
								</ul>
								<?php
									}else {
										?>
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<span class="badge badge-important"><?php echo $jumlah;?></span>
								</a>
								<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
									<li class="dropdown-header">
									Work Order									
									</li>
									<li class="dropdown-content">
										<ul class="dropdown-menu dropdown-navbar">
										<li>
												<div class="clearfix"><a href="wo_h_it.php">
													<span class="pull-left"><?php echo $not2['jumlah'];?> Work Order belum Anda Approve</span>
												</a>
												</div>
										</li>
									</ul>
									</li>
								</ul>
										<?php
										}
								?>
							

							
						</li>
						
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/avatars/avatar2.png" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									<?php require_once('config.php');
										 $sqln = mysqli_query($koneksi,"select * from user where username='".$nopp."'");
										 $data = mysqli_fetch_array($sqln);
										$name = $data['nama'];
										 echo "".$data['nama']."";
										 
										 ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								
								

								<li class="divider"></li>
								<li>
									<a href="change_pwd.php">
										<i class="ace-icon fa fa-key"></i>
										Ganti Password
									</a>
								</li>
								<li>
									<a href="logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
						
						<?php
				} else if ($akses['level_user']=='tek') { 
						$sqll	=	mysqli_query($koneksi,"select no_pp, count('status_pp') as hold from tbl_pp where status_pp='hold' and diterima = '".$_SESSION['nama']."'");
						$datal	=	mysqli_fetch_array($sqll);
						$sqlj	= 	mysqli_query($koneksi,"select no_wo, count('status_wo') as hold from tbl_wo where status_wo='hold' and diterima = '".$_SESSION['nama']."'");
						$dataj	=	mysqli_fetch_array($sqlj);
						$jum	=	$datal['hold'] + $dataj['hold'];
						$sqlk	=	mysqli_query($koneksi,"select no_pp, count('status_pp') as wait from tbl_pp where status_pp='waiting'");
						$datak	=	mysqli_fetch_array($sqlk);
						
						$sqlg	=	mysqli_query($koneksi,"select no_wo, count('status_wo') as wait from tbl_wo where status_wo='approved by IT' and diterima = '".$_SESSION['nama']."'");
						$datag	=	mysqli_fetch_array($sqlg);
						
						$sql5	=	mysqli_query($koneksi,"select no_wo, count('status_wo') as wait from tbl_wo where status_wo='approved by SH'");
						$data5	=	mysqli_fetch_array($sql5);
						$jum2	=	$datak['wait']+ $datag['wait']+ $data5['wait'];
					
						
						?>
						<li class="purple">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<span class="badge badge-important"><?php echo $jum2;?></span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									<?php echo $jum2;?> PP/WO Waiting
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<li>
												<div class="clearfix"><a href="menu_take_pp.php">
													<span class="pull-left"><?php echo $datak['wait'];?> Permintaan perbaikan baru</span>
												</a>
												</div>
												<div class="clearfix"><a href="menu_take_wo.php">
													<span class="pull-left"><?php echo $data5['wait'];?> Work order untuk diperiksa</span>
												</a>
												</div>
												<div class="clearfix"><a href="menu_process_wo.php">
													<span class="pull-left"><?php echo $datag['wait'];?> Work order untuk diproses</span>
												</a>
												</div>
										</li>
									</ul>
								</li>

								
							</ul>
						</li>
						<li class="grey">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-tasks icon-animated-vertical"></i>
								<span class="badge badge-grey"><?php echo $jum;?></span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-ban"></i>
									<?php echo $jum;?> PP/WO Hold
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<li>
												<div class="clearfix"><a href="menu_process_pp.php">
													<span class="pull-left"><?php echo $datal['hold'];?> Permintaan perbaikan</span>
												</a>
												</div>
												<div class="clearfix"><a href="menu_process_wo.php">
													<span class="pull-left"><?php echo $dataj['hold'];?> Work order</span>
												</a>
												</div>
										</li>
									</ul>
								</li>

								
							</ul>
						</li>
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/avatars/avatar2.png" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									<?php require_once('config.php');
										 $sqln = mysqli_query($koneksi,"select * from user where username='".$nopp."'");
										 $data = mysqli_fetch_array($sqln);
										$name = $data['nama'];
										 echo "".$data['nama']."";
										 
										 ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								
								

								<li class="divider"></li>
								<li>
									<a href="change_pwd.php">
										<i class="ace-icon fa fa-key"></i>
										Ganti Password
									</a>
								</li>
								<li>
									<a href="logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
						
						<?php
	} else { 
						?>
						
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/avatars/avatar2.png" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									<?php require_once('config.php');
										 $sqln = mysqli_query($koneksi,"select * from user where username='".$nopp."'");
										 $data = mysqli_fetch_array($sqln);
										$name = $data['nama'];
										 echo "".$data['nama']."";
										 
										 ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								
								

								<li class="divider"></li>
								<li>
									<a href="change_pwd.php">
										<i class="ace-icon fa fa-key"></i>
										Ganti Password
									</a>
								</li>
								<li>
									<a href="logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
						
						<?php
						} 
						?>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>