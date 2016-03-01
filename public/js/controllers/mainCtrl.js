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

app.factory('currencyConverter', ['$http', function($http) {
	  var YAHOO_FINANCE_URL_PATTERN =
	        '//query.yahooapis.com/v1/public/yql?q=select * from '+
	        'yahoo.finance.xchange where pair in ("PAIRS")&format=json&'+
	        'env=store://datatables.org/alltableswithkeys&callback=JSON_CALLBACK';
	  var currencies = ['USD', 'EUR', 'CNY'];
	  var usdToForeignRates = {};

	  var convert = function (amount, inCurr, outCurr) {
	    return amount * usdToForeignRates[outCurr] / usdToForeignRates[inCurr];
	  };

	  var refresh = function() {
	    var url = YAHOO_FINANCE_URL_PATTERN.
	               replace('PAIRS', 'USD' + currencies.join('","USD'));
	    return $http.jsonp(url).then(function(response) {
	      var newUsdToForeignRates = {};
	      angular.forEach(response.data.query.results.rate, function(rate) {
	        var currency = rate.id.substring(3,6);
	        newUsdToForeignRates[currency] = window.parseFloat(rate.Rate);
	      });
	      usdToForeignRates = newUsdToForeignRates;
	    });
	  };

	  refresh();

	  return {
	    currencies: currencies,
	    convert: convert
	  };
}]);

app.controller('InvoiceController', ['currencyConverter', function(currencyConverter) {
	  this.qty = 1;
	  this.cost = 2;
	  this.inCurr = 'EUR';
	  this.currencies = currencyConverter.currencies;

	  this.total = function total(outCurr) {
	    return currencyConverter.convert(this.qty * this.cost, this.inCurr, outCurr);
	  };
	  this.pay = function pay() {
	    window.alert("Thanks!");
	  };
	  
}]);


