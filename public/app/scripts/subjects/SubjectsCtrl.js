(function(){

  'use strict';

  angular.module('app')
    .controller('AllSubjectsCtrl', SubjectsCtrl)
    .controller('ShowSubjectsCtrl', ShowSubjectsCtrl);

    function SubjectsCtrl(Subjects) {

      var vm = this;

      vm.allSubjects = {};

      Subjects.all()
        .then(function(data)
        {
          vm.allSubjects = data.data;
        });
    }

    function ShowSubjectsCtrl($routeParams, Subjects) {

      var vm = this;

      vm.subject = {};

      Subjects.withTopics($routeParams.subject)
        .then(function(data)
        {
          vm.subject = data.data;
        });
    }

})();
