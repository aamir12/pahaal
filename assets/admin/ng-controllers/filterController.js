var app = angular.module('myApp', []);
app.controller('filterController', function($scope,$http,$timeout) {
  $scope.filterOptions = [];
  $scope.addFilter = function(){
	$scope.filterOptions.push({
		filterOption:'',
		sortOrder:''
	})
  } 

  $scope.deleteFilter = function(index){
	$scope.filterOptions.splice(index, 1);
  }

  $scope.btnDisable = false
  $scope.saveFilter = function(){
	let filters =   $scope.filterOptions.filter(x=> x.filterOption.trim() !="");
	let data = {
		filtergroup: $scope.filtergroup,
		sortOrder: $scope.sortOrder,
		filters: filters
	}

	$scope.btnDisable = true

	$http({
		method: 'POST',
		url: $('#URL').val()+'/saveFilter',
		data:data,
		headers: {
			'Content-Type': "application/json"
		}
	}).then(function successCallback(res) {
		let data = res.data;
		if(data.status){
			Swal.fire({
				title: 'Success!',
				text: data.message,
				icon: 'success',
				confirmButtonText: 'Ok'
			}).then((result) => {
				location.replace($('#URL').val());
			})
		}
		
	}, function errorCallback(error) {
		console.log('Error');
		console.log(error);
		$scope.btnDisable = false;
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Something went wrong!',
		}).then(function(res){
			location.replace($('#URL').val());
		})
	});
  }

  $scope.initData = function(id){
	$scope.filterId = id;
	$http({
		method: 'POST',
		url: $('#URL').val()+'/getFilter',
		data:{id:id},
		headers: {
			'Content-Type': "application/json"
		}
	}).then(function successCallback(res) {
		let data = res.data;
		if(data.status){
			$scope.filtergroup = data.filter.filtergroup;
			$scope.sortOrder = data.filter.sortOrder;
			$scope.filterId = data.filter.id;
			$scope.filterOptions = data.filterOptions;
			$timeout(()=>{
				$("#mainContent").show();
			},200)
		}else{
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Access Invalid Filter',
			}).then(function(res){
				location.replace($('#URL').val());
			})
		}
		
	}, function errorCallback(error) {
		console.log('Error');
		console.log(error);
		$scope.btnDisable = false;
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Something went wrong!',
		}).then(function(res){
			location.replace($('#URL').val());
		})
	});
    
  }

  $scope.updateFilter = function(){
	let filters =   $scope.filterOptions.filter(x=> x.filterOption.trim() !="");
	let data = {
		filtergroup: $scope.filtergroup,
		sortOrder: $scope.sortOrder,
		id: $scope.filterId,
		filters: filters
	}
	$scope.btnDisable = true;
	$http({
		method: 'POST',
		url: $('#URL').val()+'/updateFilter',
		data:data,
		headers: {
			'Content-Type': "application/json"
		}
	}).then(function successCallback(res) {
		let data = res.data;
		console.log(data);
		if(data.status){
			Swal.fire({
				title: 'Success!',
				text: data.message,
				icon: 'success',
				confirmButtonText: 'Ok'
			}).then((result) => {
				location.replace($('#URL').val());
			})
		}
		
	}, function errorCallback(error) {
		console.log('Error');
		console.log(error);
		$scope.btnDisable = false;
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Something went wrong!',
		}).then(function(res){
			location.replace($('#URL').val());
		})
	});
  }

});


