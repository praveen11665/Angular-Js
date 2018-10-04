<html ng-app="myapp">
	<head>
	  	<meta charset="utf-8" />
	  	<title>AngularJS Datatable</title>

	    <!--CSS-->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	    <link rel="stylesheet" href="http://l-lin.github.io/angular-datatables/archives/vendor/datatables/media/css/jquery.dataTables.min.css" />
	    <link rel="stylesheet" href="http://l-lin.github.io/angular-datatables/archives/vendor/font-awesome/css/font-awesome.min.css">

	    <!--JS Files-->
		<script src="http://l-lin.github.io/angular-datatables/archives/vendor/jquery/dist/jquery.js"></script>
		<script src="http://l-lin.github.io/angular-datatables/archives/vendor/angular/angular.js"></script>
		<script src="http://l-lin.github.io/angular-datatables/archives/vendor/angular-resource/angular-resource.min.js"></script>
		<script src="http://l-lin.github.io/angular-datatables/archives/vendor/datatables/media/js/jquery.dataTables.js"></script>
	    <!--angular datatables JS-->
		<script src="http://l-lin.github.io/angular-datatables/archives/dist/angular-datatables.min.js"></script>
	</head>
	<body>
		<div ng-controller="datatTableCtrl">	    
		    <table datatable="ng" dt-option="vm.dtOptions" class="table table-bordered">
		    	<thead>
		    		<tr>
			    		<th>S.No</th>
			    		<th>Design</th>
			    		<th>Particular</th>
			    	</tr>
		    	</thead>
		    	<tbody>
		    		<tr ng-repeat="customer in customers">
		    			<td>{{ $index + 1 }}</td>
		    			<td>{{ customer.design_no }}</td>
		    			<td>{{ customer.particulars }}</td>
		    		</tr>
		    	</tbody>
		    </table>
		</div>
	</body>
</html>


	<script type="text/javascript">

		var app = angular.module('myapp', ['datatables']);

		app.controller('datatTableCtrl', function($scope, $http){
			$http.get('http://localhost/testAngular/Angular/takeRecords1').then(function(response){
					$scope.customers = response.data;
			});

		});

/*
		angular.module('myapp', ['datatables', 'ngResource']).controller('datatTableCtrl', datatTableCtrl);

		function datatTableCtrl($scope, $compile, DTOptionsBuilder, DTColumnBuilder) {
		    var vm 			= this;
		    vm.message 		= '';
		    vm.edit 		= edit;
		    vm.delete 		= deleteRow;
		    vm.dtInstance 	= {};
		    vm.persons 		= {};
		    vm.dtOptions 	= DTOptionsBuilder.fromSource('http://localhost/testAngular/Angular/takeRecords')
		        .withPaginationType('full_numbers')
		        .withOption('createdRow', createdRow);
		    vm.dtColumns 	= 	[
							        DTColumnBuilder.newColumn('username').withTitle('Username'),
							        DTColumnBuilder.newColumn('fullName').withTitle('Full name'),
							        DTColumnBuilder.newColumn('email').withTitle('Email'),
							        DTColumnBuilder.newColumn('phone_number').withTitle('Phone'),
							        DTColumnBuilder.newColumn('role_name').withTitle('Role'),							        
							        DTColumnBuilder.newColumn(null).withTitle('Status').notSortable().renderWith(statusButton),
							        DTColumnBuilder.newColumn(null).withTitle('Actions').notSortable().renderWith(commonButtons)
	    						];

	    	function createdRow(row, data, dataIndex) {
		        // Recompiling so we can bind Angular directive to the DT
		        $compile(angular.element(row).contents())($scope);
		    }

		    function edit(id) {
		    	alert('Edit');
		        vm.message = 'You are trying to edit the row: ' + JSON.stringify(id);
		        
		        //vm.dtInstance.reloadData();
		        //location.reload();
		    }

		    function deleteRow(id) {
		    	alert('Delete')
		        vm.message = 'You are trying to remove the row: ' + JSON.stringify(id);
		    }		    

		    function commonButtons(data, type, full, meta) {
		        vm.persons[data.user_id] = data;
		        return '<button class="btn btn-warning" ng-click="showCase.edit(showCase.persons[' + data.user_id + '])">' +
		            '   <i class="fa fa-edit"></i>' +
		            '</button>&nbsp;' +
		            '<button class="btn btn-danger" ng-click="showCase.delete(showCase.persons[' + data.user_id + '])" )"="">' +
		            '   <i class="fa fa-trash-o"></i>' +
		            '</button>';
		    }

		    function statusButton(data, type, full, meta) {
		        vm.persons[data.banned] = data;

		        if(data.banned == '0')
		        {
		        	status = '<span class="label text-success">Active</span>';
		        }else
		        {
		        	status = '<span class="label text-danger">Banned</span>';
		        }

		        return status;
		    }
		}
*/
	</script>