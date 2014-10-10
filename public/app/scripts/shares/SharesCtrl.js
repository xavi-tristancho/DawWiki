(function(){

	angular.module('app')
	  .controller('SharesCtrl', SharesCtrl)
	  .controller('NewSharesCtrl', NewSharesCtrl);

	  function SharesCtrl($http, $location) {

	  	var vm = this;

	  	vm.sharesList = {};

	  	$http.get('api/shares').success(function(data){

	  		vm.sharesList = data.data;
	  	});

	  	vm.isExecutable = function(executable){

	  		return (executable) ? 'Si' : 'No';
	  	}

	  	vm.delteShareObject = function(id){

	  		$http.delete('api/shares/' + id).success(function(){

	  			$http.get('api/shares').success(function(data){

	  				vm.sharesList = data.data;
	  			});
	  		});
	  	}
	  }

	  function NewSharesCtrl($http, $location){

	  	var vm = this;

	  	vm.newShareObject = { name: '', language: '', executable: false, link: ''};

	  	vm.createShareObject = function (){

	  		$http.post('api/shares', vm.newShareObject);
	  		$location.url('shares');
	  	}
	  }

})();