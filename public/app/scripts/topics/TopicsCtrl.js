(function(){

  angular.module('app')
    .controller('ShowTopicsCtrl' , ShowTopicsCtrl);

    function ShowTopicsCtrl($http, $routeParams){

        var vm = this;

        $http.get('api/subjects/' + $routeParams.name + '?embed=topics').success(function(data){

          vm.subject = data.data[0];
        });
    }

})();
