(function(){

	angular.module('app')
	  .controller('SharesCtrl', SharesCtrl);

	  function SharesCtrl($http) {

	  	var vm = this;

	  	$http.get('api/shares').success(function(data){

	  		vm.sharesList = data.data;
	  	});

	  	this.isExecutable = function(executable){

	  		return (executable) ? 'Si' : 'No';
	  	}
	  }

})();