(function(){

  'use strict';

  angular.module('app')
    .controller('ShowActivitiesCtrl', ShowActivitiesCtrl);

    function ShowActivitiesCtrl($routeParams, $location, Activities) {

      var vm = this;

      vm.activity = {};

      Activities.withAnswers($routeParams.activity)
        .then(function(data)
        {
          vm.activity = data.data;
        });

      vm.route = $location.path();

    }

})();
