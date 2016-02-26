/**
 * 
 */

/*var mainCtrl = angular.module('mainCtrl',[]);
mainCtrl.controller('mainController',['$scope',function($scope){
	
	$scope.name = 'Name'
	
}]);
*/

var app2 = angular.module('myApp2', []);
app2.controller('customersCtrl', function($scope, $http) {
	$http.get("http://www.w3schools.com/angular/customers.php")
	.then(function (response) {
		$scope.names = response.data.records;
	});
});
