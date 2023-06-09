<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/appointment-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:46 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure - Appointment List Page</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
		
		<!-- Datatables CSS -->
		<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
			<?php
			include "header.php";
			?>
			<!-- /Header -->
			
			<!-- Sidebar -->
            <?php
			include "sidebar.php";
			?>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Appointments</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Appointments</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-md-12">
						
							<!-- Recent Orders -->
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Doctor Name</th>
													<th>Speciality</th>
													<th>Patient Name</th>
													<th>Apointment Time</th>
													<th>Status</th>
													<th class="text-right">Amount</th>
												</tr>
											</thead>
											<tbody>
												<?php
                                                include "../connection.php";
												$sql = "SELECT * FROM `appoinment`";
												$res = mysqli_query($con,$sql);
												while($row = mysqli_fetch_assoc($res))
												{
                                                $date = $row['appoinmentdate'];
                                                $day = $row['day'];
												$doctorid = $row['doctorId'];	
												$patientid = $row['patientId'];	
                                                $status = $row['status'];
                                                $fee = $row['amount'];
                                                if($status == 1)
                                                {
                                                    $st = '<button class="btn btn-success">Confirm</button>';
                                                }
                                                else{
                                                    $st = '<button class="btn btn-danger">Pending</button>';
                                                }
												$dsql = "SELECT * FROM `doctorprofile` WHERE `dcotorId` = '$doctorid'";
												$dres = mysqli_query($con,$dsql);
												$drow = mysqli_fetch_assoc($dres);
                                                $fname = $drow['fname'];
                                                $lname = $drow['lname'];
                                                $education = $drow['education'];
                                                $image = $drow['image'];
                                                $psql = "SELECT * FROM `patientprofile` WHERE `patientId` = '$patientid'";
												$pres = mysqli_query($con,$psql);
												$prow = mysqli_fetch_assoc($pres);
                                                $firstname = $prow['first-name'];
                                                $lastname = $prow['last-name'];
                                                $pimage = $prow['image'];
												echo'
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="../image/'.$image.'" width="100%" height="auto" alt="User Image"></a>
															<a href="profile.html">Dr.'.$fname.' '.$lname.'</a>
														</h2>
													</td>
													<td>'.$education.'</td>
													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="../image/'.$pimage.'" alt="User Image"></a>
															<a href="profile.html">'.$firstname .' '.$lastname.'</a>
														</h2>
													</td>
													<td>'.$date.'<span class="text-primary d-block">'.$day.'</span></td>
													<td>
														<div class="status-toggle">
														 '.$st.'
														</div>
													</td>
													<td class="text-right">
														'.$fee.'
													</td>
												</tr>';
                                            }
											 

                                            ?>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->
							
						</div>
					</div>
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Datatables JS -->
		<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatables/datatables.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
		
    </body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/appointment-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:49 GMT -->
</html>