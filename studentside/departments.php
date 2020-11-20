<?php
	session_start();
	error_reporting(E_ALL);
	require_once("db_class.php");

	//check for login

	if(! isset($_SESSION["stud_id"]) )
	{
		header("location: loginstudent.php");
		exit;
	}

	$id = $_SESSION["stud_id"];
	$Hi = "";


	$exist_user = MYDB::query(
															"select
																*
															from
																tbl_student
															where
																stud_id = ? "
															,
															array($id)
															,
															"SELECT"
														);
	
	
	foreach ($exist_user as $key){
			$id = "{$key['stud_id']}";
			$lname = "{$key['stud_lname']}";
			$fname = "{$key['stud_fname']}";
			$deptid = "{$key['dept_id']}";
            $yrlvl = "{$key['stud_yearLevel']}";
            $email = "{$key['email']}";
            $date = "{$key['date_applied']}";
				
	}

?>

<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">

<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>LockItUp</title>
	<link rel="icon" type="image/png" href="image/lock.png">
	<link rel="stylesheet" href="../view/assets/css/bs.css">
	<link rel="stylesheet" href="../view/assets/css/fa.css">
	<link rel="stylesheet" href="../view/assets/css/progress.css">
	<link rel="stylesheet" href="../view/assets/css/animate.css">
	<link rel="stylesheet" href="../view/assets/css/custom.css">
	 </head>
	 <style>
	 
	 #act {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#act td, #act th {
    border: 1px solid #ddd;
    padding: 8px;
}

#act tr:nth-child(even){background-color: #f2f2f2;}

#act tr:hover {background-color: #ddd;}

#act th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
	 </style>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col menu_fixed">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="#" class="site_title"><img src="image/locker.png" width="25" height="25"> <span>UC Locker System</span></a>
					</div>
					<div class="clearfix"></div>
					<!-- menu profile quick info -->
					<div class="profile clearfix">
						<div class="profile_pic"> <img src="image/blank.png" alt="Avatar" class="img-circle profile_img"> </div>
						
						<?php
						
						echo"<div class='profile_info'> <span>Welcome </span> <h2>{$fname} {$lname}</h2> </div>";
						
                        ?> 
							
						<div class="clearfix"></div>
					</div>
					<!-- /menu profile quick info -->
					<br />
					<!-- sidebar menu -->
					<div id="sidebar-menu" class=" main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<h3>Menu</h3>
							<ul class="nav side-menu">
                            <li> <a href="dashboard.php"><i class="fa fa-home"></i> Home </a> </li>
								<li> <a href="student.php"><i class="fa fa-profile"></i> Your Profile </a> </li>
								<li> <a href="departments.php"><i class="fa fa-profile"></i> Department </a> </li>
							</ul>
						</div>
					</div>
					<!-- /sidebar menu -->
				</div>
			</div>
			<!-- top navigation -->
			<div class="top_nav">
				<div class="nav_menu">
					<nav>
						<div class="nav toggle"> <a id="menu_toggle"><i class="fa fa-bars"></i></a> </div>
						<ul class="nav navbar-nav navbar-right">
							<li class="">
								<?php
								echo "<a href='javascript:;' class='user-profile dropdown-toggle' data-toggle='dropdown'aria-expanded='false'> <img src='image/blank.png' alt='Avatar'> {$lname} {$fname} <span class='fa fa-angle-down'></span> </a>";
								?>
								<ul class="dropdown-menu dropdown-usermenu pull-right">
									<li><a href="javascript:;"> Profile</a></li>
									<?php
									echo"<li><a href='../controller/loginController/logout.php'><i class='fa fa-sign-out pull-right'></i> Log Out as {$fname} {$lname}</a></li>";
									?>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>
			<!-- /top navigation -->
			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12">
						<div class="x_panel">
							<div class="x_title">
								<h2>Department</h2>
								<ul class="nav navbar-right panel_toolbox">
									<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
									<li>
										<!-- <a class="close-link"><i class="fa fa-close"></i></a> --></li>
								</ul>
								<div class="clearfix"></div>
							</div>
			<?php	
			$view = "";
			$list = "";
			
			if(isset($_POST["view"]))
			{
				$btnview = trim($_POST["view"]);						
				require_once("db_class.php");
				//calling the stored procedure
				$records = MYDB::query(
					"select 
					*
				from
					tbl_dept"
				
				,
									 
				array(" "),
				"SELECT"
								);
								
				if(count($records) > 0)
				{
					$list.="<table class='table table-striped projects'>";
					$list.="	<thead>";
					$list.="		<tr>";
					$list.="			<th>Dept(ID)</th>";
					$list.="			<th>DEPT CODE</th>";
					$list.="			<th>Desc</th>";
					$list.="			<th>location</th>";
					$list.="		</tr>";
					$list.="	</thead>";
					$list.="	<tbody>";
					foreach($records as $r)
					{
						$list.="<tr>";
						$list.="	<td>".$r["dept_id"]."</td>";
						$list.="	<td>".$r["dept_code"]."</td>";
						$list.="	<td>".$r["dept_description"]."</td>";
						$list.="	<td>".$r["office_location"]."</td>";
						$list.="	</td>";
						$list.="</tr>";
					}
					$list.="	</tbody>";
					$list.="</table>";
					
				}
				else 
				{
					 $list.= "<script>alert('Oh snap Nothing here');</script>";
				}
			}
		
?>
<?php
	error_reporting(E_ALL);	
	
	//create the result in a list or table
	$result = "";
	$txtkeyword = "";
		
	if(isset($_GET["btnsearch"]))
	{
		$txtkeyword = trim($_GET["txtkeyword"]);
		
		require_once("db_class.php");
		
		$records = MYDB::query(
														"select 
															*
														from
															tbl_dept
														where
															dept_id like ? or
															dept_code like ? or
															dept_description like ? or
															office_location =? 
															
														"
														,
														array("%{$txtkeyword}%", "%{$txtkeyword}%", "%{$txtkeyword}%", "%{$txtkeyword}%")
														,
														"SELECT"
		
													);
		if(count($records) > 0)
				{
					$list.="<table class='table table-striped projects'>";
					$list.="	<thead>";
					$list.="		<tr>";
					$list.="			<th>Dept(ID)</th>";
					$list.="			<th>DEPT CODE</th>";
					$list.="			<th>Desc</th>";
					$list.="			<th>location</th>";
					$list.="		</tr>";
					$list.="	</thead>";
					$list.="	<tbody>";
					foreach($records as $r)
					{
						$list.="<tr>";
						$list.="	<td>".$r["dept_id"]."</td>";
						$list.="	<td>".$r["dept_code"]."</td>";
						$list.="	<td>".$r["dept_description"]."</td>";
						$list.="	<td>".$r["office_location"]."</td>";
						$list.="</tr>";
					}
					$list.="	</tbody>";
					$list.="</table>";
					
				}
				else 
				{
					$list = "<script>alert('Oh snap Nothing here');</script>";
				}
			}
?>
							<div class="x_content">
							
								<div class="col-md-3 col-sm-3 col-xs-6">
								<form method="GET" action="departments.php">
								<input type="text" name="txtkeyword"  placeholder="Search Department by its Desc/location/id/code" /><br/>
								<br />
								<input type="submit" name="btnsearch" value="Search" />
								<?php
								echo $result;
								?>
											
								</form>
								<form method="POST" action="departments.php">
								<?php echo $list; ?>
				
								<br /> <br />
								<button class="btn btn-primary" type = "submit" name = "view">View Department</button><br /><br />			
								</form>
						

								</div>

								<!-- start project list -->
		
							<!-- code starts jere MS Cherlyn Mallen BLYAT>
			<!-- end of page content -->
			<!-- footer content -->
			<footer>
				
				<div class="clearfix"></div>
			</footer>
			<!-- /footer content -->
			<!-- ADD MODAL -->
			
						</div>
					</div>
				</div>
			</div>
			<!-- END MODAL -->
			<!-- view modal -->
			<div class="modal fade" tabindex="-1" role="dialog" id="viewDepartment">
				<div class="modal-dialog" style="width:40%" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"> <span>&times;</span> </button>
							<h3 class="modal-title">View Department</h3> </div>
						<div class="modal-body">
							<div>
								<h3 id="view_course_name"></h3>
								<h4 class="w3-center" id="view_course_label"></h4>
								<table id="view_course_table" class="table table-striped projects">
									<tr>
										<th ng-repeat="l in student_course_label">{{ l }}</th>
									</tr>
									<tr ng-repeat="s in student  | filter:search">
										<td>{{ s.stud_id }} </td>
										<td>{{ s.stud_fname }} </td>
										<td>{{ s.stud_lname }} </td>
										<td>{{ s.stud_yearLevel }} </td>
										<td>{{ s.email }} </td>
										<td>{{ s.date_applied }} </td>
									</tr>
								</table>
							</div>
						</div>
						<div class="modal-footer">
						<button class="btn button-secondary" data-dismiss="modal" type="button">OK</button>
						</div>
					</div>
				</div>
			</div>
			
			<!-- end edit -->
			
	</div>
	<!-- PHP -->
	<!-- END -->
	<!-- Script start -->
	<script src="../view/assets/js/jq.js"></script>
	<script src="../view/assets/js/bs.js"></script>
	<script src="../view/assets/js/fc.js"></script>
	<script src="../view/assets/js/progress.js"></script>
	<script src="../view/assets/js/bsprogress.js"></script>
	<script src="../view/assets/js/custom.js"></script>
	<script src="../view/assets/js/jquery.dataTables.min.js"></script>
	<script src="../view/assets/js/dataTables.buttons.min.js"></script>
	<script src="../view/assets/js/buttons.flash.min.js"></script>
	<script src="../view/assets/js/buttons.html5.min.js"></script>
	<script src="../view/assets/js/vfs_fonts.js"></script>
	<script src="../view/assets/js/pdfmake.min.js"></script>
	<script src="../view/assets/js/jszip.min.js"></script>
	<script src="../view/assets/js/buttons.print.min.js"></script>
	<script src="../view/assets/js/angular.min.js"></script>
	<script src="../view/assets/js/angular-route.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$('#dataTable').DataTable({});
	});
	</script>
	<script type="text/javascript">
	var app = angular.module("myApp", []);
	app.controller("myCtrl", function($http, $scope) {
		$http.get('../controller/departmentController/allDept.php').then(function(response) {
			$scope.dept_label = ["Dept id", "Dept code", "Dept Description", "Office Location", "ACTION"];
			$scope.department = response.data;
		});
		$scope.openModal = function(modal_id) {
			$('#' + modal_id).show();
		};
		$scope.closeModal = function(modal_id) {
			$('#' + modal_id).hide();
		};
		$scope.editDepartment = function(dept_id) {
			$http.post('../controller/departmentController/getDept.php', {
				'dept_id': dept_id
			}).then(function(response) {
				console.log(response);
				$('#edit_dept_id').val(response.data.dept_id);
				$('#edit_dept_code').val(response.data.dept_code);
				$('#edit_dept_description').val(response.data.dept_description);
				$('#edit_office_location').val(response.data.office_location);
				$('#editDepartment').modal('show');
			});
		};
		$scope.viewDepartment = function(dept_id, dept_code) {
			$http.post('../controller/departmentController/studentsDept.php', {
				'dept_id': dept_id
			}).then(function(response) {
				console.log(response);
				if(response.data[0] == null) {
					$('#view_course_label').text('No Student');
					$('#view_course_table').hide();
				} else {
					$scope.student_course_label = ["STUDENT ID", "FAMILYNAME", "GIVENNAME", "LEVEL", "EMAIL", "Date Applied"];
					$scope.student = response.data;
					$('#view_course_label').text(`Student's List`);
					$('#view_course_table').show();
				}
			});
			$scope.student_course_labels = ["STUDENT ID", "FAMILYNAME", "GIVENNAME", "LEVEL", "EMAIL", "Date Applied"];
			$('#view_course_name').text(dept_code);
			$('#viewDepartment').modal('show');
		}
		$scope.deleteDepartment = function(dept_id) {
			console.log(dept_id);
			$('#deleteDepartment').modal('show');
			$('#delDept').on('click', function() {
				$http.post('../controller/departmentController/deleteDept.php', {
					'dept_id': dept_id
				}).then(function(response) {
					location.reload();
					console.log(response);
				});
			});
		};
	});
	</script>
</body>

</html>