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