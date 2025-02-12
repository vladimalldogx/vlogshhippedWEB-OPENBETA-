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

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>LockItUp</title>
	<link rel="icon" type="image/png" href="view/image/lock.png">
	<!-- Bootstrap core CSS -->
	<link href="view/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="view/assets/vendor/bootstrap/css/w3.css" rel="stylesheet">
	<link href="view/assets/css/w3.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="view/assets/css/scrolling-nav.css" rel="stylesheet"> </head>

<body id="page-top" ng-app="myApp" ng-controller="myCtrl">
	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
		<div class="container">
			<a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="view/image/locker.png" width="50" height="50" alt=""> LockItUp</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"> <a class="nav-link js-scroll-trigger" href="#about">About</a> </li>
					<li class="nav-item"> <a class="nav-link js-scroll-trigger" href="#services">Services</a> </li>
					<li class="nav-item"> <a class="nav-link js-scroll-trigger" href="#inquiries">Inquiries</a> </li>
                    <li class="nav-item"> <a class="nav-link js-scroll-trigger" href="#contact">Contact</a> </li>
                    <?php 
                     echo " <li class='nav-item'> <a class='nav-link js-scroll-trigger' href='/studentside/dashboard.php'> Hi {$fname}!</a> </li>";

                        ?> 

					<button type="button" class="btn btn-secondary"  data-target="#"><a href="index.html">Log-out</a></button>
				</ul>
			</div>
		</div>
	</nav>
	<div class="mySlides w3-display-container w3-center"> <img src="image/locker5.jpg" height="600" width="100%">
		<div class="w3-display-middle w3-margin-top w3-center">
			<h1 class="w3-xxlarge w3-text-white"> <span class="w3-hide-small w3-text-grey">Lock</span><span class="w3-padding w3-black w3-opacity-min"><b>IT</b></span><span class="w3-hide-small w3-text-grey">Up</span></h1> </div>
	</div>
	<div class="mySlides w3-display-container w3-center"> <img src="image/locker7.jpg" height="600" width="100%">
		<div class="w3-display-middle w3-margin-top w3-center">
			<h1 class="w3-xxlarge w3-text-white"> <span class="w3-hide-small w3-text-grey">Lock</span><span class="w3-padding w3-black w3-opacity-min"><b>IT</b></span><span class="w3-hide-small w3-text-grey">Up</span></h1> </div>
	</div>
	<div class="mySlides w3-display-container w3-center"> <img src="image/locker4.jpg" height="600" width="100%">
		<div class="w3-display-middle w3-margin-top w3-center">
			<h1 class="w3-xxlarge w3-text-white"> <span class="w3-hide-small w3-text-grey">Lock</span><span class="w3-padding w3-black w3-opacity-min"><b>IT</b></span><span class="w3-hide-small w3-text-grey">Up</span></h1> </div>
	</div>
	<section id="about">
		<div class="w3-container">
			<div class="w3-container col-lg-8 mx-auto">
				<h1><span class="w3-padding w3-black w3-opacity-min w3-round">About this page</span></h1>
				<div class="w3-container">
					<div class="w3-container">
						</br> <small>With safety and security being two key assurances all schools should give to their students, it’s often surprising how many schools fail to provide a safe space for students to store their belongings. Far from simply being a ‘nice-to-have’, school lockers offer a great deal to students, teachers and parents beyond serving as a secure place for students to keep their things over the course of the school day.</small> </div>
				</div>
				</br>
				<h3><span class="w3-padding w3-black w3-opacity-min w3-round">We can assure your the following:</span></h3>
				<div class="w3-row-padding w3-container">
					<div class="w3-container w3-left" style="width:50%"> </div>
					<div class="w3-container w3-left">
						</br>
						<h1>Security</h1> <small>The single most important thing that lockers provide for students is security. With an increasing number of students carrying a mobile phone, tablet or even laptop, lockers for schools are more important than ever when it comes to keeping cases of theft and damage to a minimum. The added security of school lockers isn’t only beneficial to students, either, as the presence of a personal locker gives parents peace of mind that their children’s costly belongings are secure throughout the day.</small> </div>
					<div class="w3-container w3-left">
						</br>
						</br>
						<h1>Independence and Respect</h1> <small>One key lesson that school lockers teach children is the responsibility of looking after their own possessions and the importance of their belongings – a lesson which will stay with them in later life. Lockers in schools teach students to respect not only their own possessions, but also those of their peers.</small> </div>
					<div class="w3-container w3-left">
						</br>
						</br>
						<h1>Health and Safety</h1> <small>With research supporting the claim that heavy backpacks can cause back pain and related issues, school lockers play an important role in ensuring the health and wellbeing of students. For students carrying particularly heavy loads – including textbooks and electronic devices, on top of their everyday possessions – the strain of this collective weight can contribute to back pain and discomfort.</small> </div>
					<div class="w3-container w3-left">
						</br>
						</br>
						<h1>Personalisation</h1> <small>With many students following a uniform dress code, it can be difficult for students to express creativity and individualism outside of the classroom. Giving students a personal area they can call their own – and allowing them to personalise it with stickers, photos and other embellishments – is one way to let their unique personality shine through. While ground rules should be laid out regarding what students can and can’t do with their lockers, giving them the freedom to add their own finishing touches may seem small but can make a big difference to their overall wellbeing – particularly for students who struggle socially.</small> </div>
					<div class="w3-container w3-left">
						</br>
						</br>
						<h1>Privacy</h1> <small>Privacy is important. Whether you’re a student, teacher, parent or professor, privacy is something we all see as valuable – but why is that? The concept of privacy creates boundaries that teach students about mutual respect, defines value in their belongings, thoughts and ideas, and builds trust by giving them access to a space that’s theirs and theirs alone. A locker plays an essential role in guaranteeing privacy by creating a place in schools where students can house their personal belongings, rather than having them out in the open.</small> </div>
				</div>
			</div>
		</div>
	</section>
	<section id="services" class="bg-light">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mx-auto">
					<h2>Lockers Available Lockers</h2>
					<p class="lead">
						<ol>
							<li ng-repeat="x in dept">{{x.dept_code}}</li>
						</ol> Availble Lockers :
						<table class="table-striped">
							<thead>
								<tr>
									<th ng-repeat="d in label ">{{ d }}</th>
								</tr>
							</thead>
							<tbody>
								<tr ng-repeat="l in locker ">
									<td>{{ l.dept_id}} </td>
									<td>{{ l.NoOfLockers}} </td>
								</tr>
							</tbody>
						</table>
					</p>
				</div>
			</div>
		</div>
	</section>
	<section id="inquiries">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mx-auto">
					<h2>Inquires</h2>
					<p class="lead">Please Bring the Following to your respective departments
						<ul>
							<li>Present Photocopy of your studyload</li>
							<li>Present Photocopy of your ID</li>
							<li>Bring your own lock</li>
							<li>Duplicate key of your lock</li>
							<li>Locker payment</li>
						</ul> Locker application starts on every first two weeks of class semester. Please be guided accordingly. 
						</p>
				</div>
			</div>
		</div>
	</section>
	<section id="contact" class="bg-light">
		<div class="w3-container">
			<div class="w3-row-padding w3-grayscale">
				<h1 class="w3-center">Contact us</h1> </br>
				<div class="w3-col l2 m12 w3-margin-bottom"> <img src="image/famor.jpg" alt="famor" style="width:100%" class="w3-round w3-card-4">
					<h3 class="w3-center">Famor Calago</h3>
					<p class="w3-opacity w3-center">Project Manager</p>
					<p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
					<p><a href="https://www.facebook.com/famor.calago" class="w3-button w3-light-grey w3-block" style="text-decoration:none" target="_blank">Contact</a></p>
				</div>
				<div class="w3-col l2 m12 w3-margin-bottom"> <img src="image/segovia.jpg" alt="Segovia" style="width:100%" class="w3-round w3-card-4">
					<h3 class="w3-center">Segovia Humba</h3>
					<p class="w3-opacity w3-center">Systems Analyst</p>
					<p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
					<p><a href="https://www.facebook.com/segovia24" class="w3-button w3-light-grey w3-block" style="text-decoration:none" target="_blank">Contact</a></p>
				</div>
				<div class="w3-col l2 m12 w3-margin-bottom"> <img src="image/borong.jpg" alt="borong" style="width:100%" class="w3-round w3-card-4">
					<h3 class="w3-center">Francis Borong</h3>
					<p class="w3-opacity w3-center">Developer</p>
					<p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
					<p><a href="https://www.facebook.com/11Borong" class="w3-button w3-light-grey w3-block" style="text-decoration:none" target="_blank">Contact</a></p>
				</div>
				<div class="w3-col l2 m12 w3-margin-bottom"> <img src="image/butete.jpg" alt="butete" style="width:100%" class="w3-round w3-card-4">
					<h3 class="w3-center">Mariejoy Narciso</h3>
					<p class="w3-opacity w3-center">Technical Writer</p>
					<p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
					<p><a href="https://www.facebook.com/cherlynmallen.5" class="w3-button w3-light-grey w3-block" style="text-decoration:none" target="_blank">Contact</a></p>
				</div>
				<div class="w3-col l2 m12 w3-margin-bottom"> <img src="image/blank.png" alt="dokkaebi" style="width:100%" class="w3-round w3-card-4">
					<h3 class="w3-center">Vladimir Cres</h3>
					<p class="w3-opacity w3-center">UX Designer</p>
					<p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
					<p><a href="https://www.facebook.com/malldogxd" class="w3-button w3-light-grey w3-block" style="text-decoration:none" target="_blank">Contact</a></p>
				</div>
				<div class="w3-col l2 m12 w3-margin-bottom"> <img src="image/mam.jpg" alt="Mam" style="width:100%" class="w3-round w3-card-4">
					<h3 class="w3-center">Jennifer Amores</h3>
					<p class="w3-opacity w3-center">Instructor</p>
					<p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
					<p><a href="https://www.facebook.com/jennifer.garridoamores" class="w3-button w3-light-grey w3-block" style="text-decoration:none" target="_blank">Contact</a></p>
				</div>
			</div>
		</div>
	</section>
	<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Login</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
				</div>
				<div class="modal-body">
					
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-default submit" name="login">Login</button>
							<a href="loginstudent.php">log-in as student</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer -->
	<footer class="py-5 bg-dark">
		<div class="container">
			<p class="m-0 text-center text-white">Copyright &copy; LockItUp 2018</p>
		</div>
		<!-- /.container -->
	</footer>
	<!-- Bootstrap core JavaScript -->
	<script src="view/assets/vendor/jquery/jquery.min.js"></script>
	<script src="view/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="view/assets/js/angular.js"></script>
	<!-- Plugin JavaScript -->
	<script src="view/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
	<!-- Custom JavaScript for this theme -->
	<script src="view/assets/js/scrolling-nav.js"></script>
	<script>
	var myIndex = 0;
	carousel();

	function carousel() {
		var i;
		var x = document.getElementsByClassName("mySlides");
		for(i = 0; i < x.length; i++) {
			x[i].style.display = "none";
		}
		myIndex++;
		if(myIndex > x.length) {
			myIndex = 1
		}
		x[myIndex - 1].style.display = "block";
		setTimeout(carousel, 4000);
	}
	</script>
	<script>
	var app = angular.module("myApp", []);
	app.controller("myCtrl", function($http, $scope) {
		$http.get('controller/lockerController/countLocker.php').then(function(response) {
			$scope.label = ["Dept Code", "No. of Lockers"];
			$scope.locker = response.data;
		});
		$http.get('controller/departmentController/allDept.php').then(function(response) {
			$scope.dept_label = ["Dept ID ", "Dept Code"];
			$scope.dept = response.data;
		});
	});
	</script>
</body>
</html>