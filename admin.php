<html>
	<head>
		<title>Admin page</title>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
		<style>
			.b{
				width:150px;
				height:100px;
				background-color:#1F3E6E;
				background-size:cover;
				color:white;
				border:1px white solid;
			}
			body{
				background-image:url("ab5.jpg");
				background-size:cover;
			}
			td,tr,th{
				border:2px #393836 solid;
			}
			table{
				border-collapse:collapse;
				color:#1F3E6E;
				font-size:20px;
			}
		</style>
	</head>
	<body ng-app="admin" ng-controller="adminctrl">
		<div>
			<h1 align="center">Logged in as admin</h1>
		</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
		<button id="log" class="b" ng-click="displaylog()">Log details</button>
		<div class="container"><br><br><br><br><br>
		<div class="R">
			<table class="table table-bordered">
				<tr>
					<th>Email</th>
					<th>Time</th>
					<th>Latitude</th>
					<th>Longitude</th>
					<th>Status</th>
				</tr>
				<tr ng-repeat="x in log">
					<td>{{x.Email}}</td>
					<td>{{x.Time}}</td>
					<td>{{x.Latitude}}</td>
					<td>{{x.Longitude}}</td>
					<td>{{x.Status}}</td>
				</tr>
			</table>
		</div>
		</div>		
<script>
    var app = angular.module("admin", []);
    app.controller("adminctrl", function($scope, $http) {
        $scope.displaylog = function() {
            $http.get("displaylog.php")
                .success(function(data) {
                    $scope.log = data;
                });
        }
    });
</script> 


	</body>
</html>
