<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="robots" content="noindex">
        <title>login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
		<style>
			body{
				background-image:url('ab1.jpg');
				background-size:cover;
			}
		</style>
	</head>
<body ng-app="login" ng-controller="loginctrl as lctrl">
	<div class="container">
		<div style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
			<div class="panel panel-info" >
				<div class="panel-heading">
					<div class="panel-title" style="height:40px;font-size:30px;">Log in</div>
				</div>
				<div style="padding-top:30px" class="panel-body">
					<form name="login" ng-submit="loginForm()" class="form-horizontal" method="POST">
						<div style="margin-bottom: 25px" class="input-group">
							<span class="input-group-addon" style="width:140px;"> Email</span>
							<input type="email" id="emailid" class="form-control" style="width:350px;" required ng-model="email">
						</div>
						<div style="margin-bottom: 25px" class="input-group">
							<span class="input-group-addon" style="width:140px;">Password</span>
							<input type="password" id="password" class="form-control" style="width:350px;" required ng-model="password">
						</div>
						<div class="form-group">
							<!-- Button -->
							<div class="col-sm-12 controls">
								<button type="submit" class="btn btn-primary pull-left">&nbsp;&nbsp; Log in&nbsp;&nbsp;</button>
							</div>
						</div>	
						<div>
							Create new account <a href="index1.php">click here</a>
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
		angular.module('login', [])
		.controller('loginctrl',function($scope, $http) {
			var pos;
			window.navigator.geolocation.getCurrentPosition(function(position) {
				console.log("Get2");
				$scope.$apply(function() {
					pos = position;
					console.log(pos.coords.latitude);
				});
			}, function(error) {
				alert(error);
			});
			$scope.loginForm = function() {
				$http.post("login.php",{
					'email':$scope.email,'password':$scope.password,'lat':pos.coords.latitude,'long':pos.coords.longitude,
				})
				.success(function(data) {
					
					if ( data.trim() === 'Admin') {
						window.location.href = 'admin.php';
					} 
					else if(data.trim() === 'login'){
						console.log(data);
						window.location.href = 'news.html';
					}
					else {
						console.log(data);
						$scope.errorMsg = "Invalid Email or Password";
					}
				});
			}
		});
	</script>
</body>
</html>
