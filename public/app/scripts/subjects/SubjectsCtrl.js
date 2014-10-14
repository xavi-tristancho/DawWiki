(function(){

  angular.module('app')
    .controller('SubjectsCtrl', SubjectsCtrl)
    .controller('ShowSubjectsCtrl' , ShowSubjectsCtrl);

    function SubjectsCtrl($http) {

      var vm = this;

      $http.get('api/subjects').success(function(data){

        vm.subjectsList = data.data;
      });
    }

    function ShowSubjectsCtrl($http, $routeParams){

        var vm = this;

        $http.get('api/subjects/' + $routeParams.name + '?embed=topics').success(function(data){

          vm.subject = data.data;
        });
    }

})();
