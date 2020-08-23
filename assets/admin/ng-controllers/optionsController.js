var app = angular.module('myApp', []);
app.controller('optionController', function($scope,$http,$timeout) {
  $scope.Options = [];
  $scope.optionType = 'select';
  $scope.addOption = function(){
	$scope.Options.push({
		optionKey:'',
		sortOrder:''
	})
  } 

  $scope.deleteOption = function(index){
	$scope.Options.splice(index, 1);
  }

  $scope.btnDisable = false
  $scope.saveOption = function(){
	let options =   $scope.Options.filter(x=> x.optionKey.trim() !="");
	let data = {
		optionName: $scope.optionName,
		optionType: $scope.optionType,
		options: options
	}
	
	$scope.btnDisable = true
	$http({
		method: 'POST',
		url: $('#URL').val()+'/saveOption',
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
	$scope.optionId = id;
	$http({
		method: 'POST',
		url: $('#URL').val()+'/getOption',
		data:{id:id},
		headers: {
			'Content-Type': "application/json"
		}
	}).then(function successCallback(res) {
		let data = res.data;
		console.log(data)
		if(data.status){
			$scope.optionName = data.option.optionName;
			$scope.optionType = data.option.optionType;
			$scope.optionId = data.option.id;
			$scope.Options = data.Options;
			$timeout(()=>{
				$("#mainContent").show();
			},200)
		}else{
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Access Invalid Option',
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

  $scope.updateOption = function(){
	let options =   $scope.Options.filter(x=> x.optionKey.trim() !="");
	let data = {
		optionName: $scope.optionName,
		optionType: $scope.optionType,
		id: $scope.optionId,
		options: options
	}

	$scope.btnDisable = true;
	$http({
		method: 'POST',
		url: $('#URL').val()+'/updateOption',
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


