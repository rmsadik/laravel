<!DOCTYPE html>
    <head>
        <title>Laravel</title>

        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <script src="/js/controllers/mainCtrl.js"></script> 
        <script src="/js/controllers/testJs.js"></script> 

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
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
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
 		 </div>
 		 
	<div ng-app="myApp" ng-controller="myCtrl">
          <h1>@{{ firstName + " " + lastName }}</h1>
    
        <div ng-app="">
            <p>Input something in the input box:</p>
            <p>Name : <input type="text" ng-model="name" placeholder="Enter name here"></p>
            <h1>H @{{name}}</h1>
        </div>
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
                	@{{ y.Country }}
                </td>
                <td ng-if="$even">
                	@{{ y.Country }}
                </td>              
              </tr>
          </table>
		</div>
    </div>
		           
                       
        
        
    
    </body>
</html>
