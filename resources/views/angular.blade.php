<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Laravel</title>

        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

        <script src="/js/controllers/mainCtrl.js"></script> 
        <script src="/js/controllers/testJs.js"></script> 

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: left;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: left;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
<!--             <div class="content">
                <div class="title">Angular</div>
            </div>
 -->       
        	<div ng-app="myApp" ng-controller="myCtrl">
	            <!--  Hello World -->
                  <h1>@{{ firstName + " " + lastName }}</h1>
	            
	            <!--  Text input example -->
                <div ng-app="">
                    <p>Input something in the input box:</p>
                    <p>Name : <input type="text" ng-model="name" placeholder="Enter name here"></p>
                    <h1>H @{{name}}</h1>
                </div>
                
	            <!--  Json input example -->
                <div ng-app="" ng-init="names=[
                    {name:'Jani',country:'Norway'},
                    {name:'Hege',country:'Sweden'},
                    {name:'Kai',country:'Denmark'}]">
                    
                    <ul>
                      <li ng-repeat="x	in names">
                        @{{ x.name + ', ' + x.country }}
                      </li>
                    </ul>
                </div>    
                
	            <!--  $http, ng-if, filter input example -->
                <div ng-app="" ng-controller="customersCtrl"> 
                    <table>
                      <tr ng-repeat="y in names">
                        <td ng-if="$odd" style="background-color:#f1f1f1">
                        	@{{ y.Name }}
                        </td>
                        <td ng-if="$even">
                        	@{{ y.Name }}
                        </td>
                        <td ng-if="$odd" style="background-color:#f1f1f1">
                        	@{{ y.City }}
                        </td>
                        <td ng-if="$even">
                        	@{{ y.City }}
                        </td>              
                        <td ng-if="$odd" style="background-color:#f1f1f1">
                        	@{{ y.Country | uppercase }}
                        </td>
                        <td ng-if="$even">
                        	@{{ y.Country | uppercase }}
                        </td>              
                      </tr>
                  </table>
        		</div>
        		
	            <!--  select input input example -->
        		<div ng-app="" ng-controller="carCtrl">
                    <p>Select a car:</p>

                    <select ng-model="selectedCar" ng-options="x.model for x in cars">
                    </select>
                    
                    <h1>You selected: @{{selectedCar.model}}</h1>
                    <p>It's color is: @{{selectedCar.color}}</p>
                </div>
                
	            <!--  DOM -->
                <div ng-app="" ng-init="hour=13;mySwitch=true;firstname='first name'" ng-controller="domCtrl">
	                <p ng-show="hour > 12">I am visible.</p>
	                <p ng-hide="true">I am not visible.</p>
					<p ng-hide="false">I am visible. </p>
					<p>
						<button ng-click="myClick()" ng-disabled="mySwitch">Click Me!</button>
						<button ng-dblclick="myRandomClick()" >Click Me!</button>
					</p>
					<formag >
						<input type="text" ng-model="firstname">
						<input type="text" ng-model="user.lastName">
					</form>					
                </div>                
                
        		
            </div>
 		 </div>
        
    
    </body>
</html>
