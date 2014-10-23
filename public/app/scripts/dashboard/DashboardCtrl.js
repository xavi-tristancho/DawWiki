(function(){

  'use strict';

  angular.module('app')
    .controller('DashboardCtrl', function (Activities, Answers) {

    var vm = this;

    Activities.latest()
      .then(function(data)
      {
        vm.activities = data.data;
      });

    Answers.latest()
      .then(function(data)
      {
        vm.answers = data.data;
      });

  });
})();