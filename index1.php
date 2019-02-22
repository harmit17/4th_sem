<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="robots" content="noindex">
        <title>Signup</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
		<style>
			body{
				background-image:url('ab6.jpg');
				background-size:cover;
			}
		</style>
    </head>
<body ng-app="Signup" ng-controller="Signupctrl as sctrl">
	<div class="container" style="margin-left:0px;">
		<div style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
			<div class="panel panel-info" >
				<div class="panel-heading">
					<div class="panel-title" style="height:40px;font-size:30px;">Sign up </div>
				</div>
				<div style="padding-top:30px" class="panel-body" >
					<form name="login" ng-submit="signupForm()" class="form-horizontal" method="POST">
						<div style="margin-bottom: 25px" class="input-group">
							<span class="input-group-addon" style="width:140px;">First name</span>
							<input type="text" id="fname" class="form-control" style="width:350px;" required ng-model="firstname">
						</div>
						<div style="margin-bottom: 25px" class="input-group">
							<span class="input-group-addon" style="width:140px;">Last name</span>
							<input type="text" id="lname" class="form-control" style="width:350px;" required ng-model="lastname">
						</div>
						<div style="margin-bottom: 25px" class="input-group">
							<span class="input-group-addon" style="width:140px;"> Email</span>
							<input type="email" id="emailid" class="form-control" style="width:350px;" required ng-model="email">
						</div>
						<div style="margin-bottom: 25px" class="input-group">
							<span class="input-group-addon" style="width:140px;">Password</span>
							<input type="password" id="password" class="form-control" style="width:350px;" required ng-model="password">
						</div>
						<div style="margin-bottom: 25px" class="input-group">
							<span class="input-group-addon" style="width:140px;">Confirm Password</span>
							<input type="password" id="cpassword" class="form-control" style="width:350px;" required ng-model="cpassword">
						</div>
						<div class="form-group">
							<!-- Button -->
							<div class="col-sm-12 controls">
								<button type="submit" class="btn btn-primary pull-left">&nbsp;&nbsp; Sign up&nbsp;&nbsp;</button>
							</div>
						</div>	
						<div>
							Already have a account,<a href="index2.php"> Log in</a>
						</div>
						<div class="alert alert-danger" ng-show="errorMsg">
                            <span class="glyphicon glyphicon-hand-right"></span>&nbsp;&nbsp;{{errorMsg}}
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script>
		angular.module('Signup', [])
		.controller('Signupctrl',function($scope, $http) {
			$scope.signupForm = function() {
				$http.post("signup.php",{
					'firstname':$scope.firstname,'lastname':$scope.lastname,'email':$scope.email,'password':$scope.password,'cpassword':$scope.cpassword,
				})
				.success(function(data) {
					console.log(data);
					if ( data.trim() === 'Inserted') {
						window.location.href = 'index2.php';
					} 
					else if(data.trim() === 'NoMatch'){
						$scope.errorMsg = "Password and confirm password did not match.";
					}
					else if(data.trim() === 'NoF'){
						$scope.errorMsg = "First name should be alphabetical.";
					}
					else if(data.trim() === 'NoL'){
						$scope.errorMsg = "Last name should be alphabetical.";
					}
					else if(data.trim() === 'NoE'){
						$scope.errorMsg = "Please enter email in valid format.";
					}
					else if(data.trim() === 'NoP'){
						$scope.errorMsg = "Please enter valid password.";
					}
					else {
						$scope.errorMsg = "Invalid Email or Password";
					}
				});
			}
		});
	</script>
	 
</body>
</html>
