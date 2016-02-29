/**
 * 
 */

/*var mainCtrl = angular.module('mainCtrl',[]);
mainCtrl.controller('mainController',['$scope',function($scope){
	
	$scope.name = 'Name'
	
}]);
*/
var app = angular.module("myApp", []);

app.controller("myCtrl", function($scope) {
	$scope.firstName = "John";
	$scope.lastName = "Doe";
});

app.controller('customersCtrl', function($scope, $http) {
	$http.get("http://www.w3schools.com/angular/customers.php")
	.then(function (response) {
		$scope.names = response.data.records;
	});
});

app.controller('carCtrl', function($scope) {
    $scope.cars = [
        {model : "Ford Mustang", color : "red"},
        {model : "Fiat 500", color : "white"},
        {model : "Volvo XC90", color : "black"}
    ];
});
app.controller('domCtrl', function($scope) {
	$scope.master = {firstName:"John", lastName:"Doe"};
	$scope.user = angular.copy($scope.master);
//    $scope.reset = function() {
//        $scope.user = angular.copy($scope.master);
//    };
//    $scope.reset();
	$scope.myClick=function(){window.alert('Hello world');};
	$scope.myRandomClick=function(){window.alert('Hello random world');};
	
});
