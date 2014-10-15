(function(){

  'use strict';

  angular.module('app')
    .controller('ShowTopicsCtrl', ShowTopicsCtrl);

    function ShowTopicsCtrl($routeParams, Topics) {

      var vm = this;

      vm.topic = {};

      Topics.withActivities($routeParams.topic)
        .then(function(data)
        {
          vm.topic = data.data;
        });
    }

})();
