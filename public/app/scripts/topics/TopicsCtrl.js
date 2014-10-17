(function(){

  'use strict';

  angular.module('app')
    .controller('ShowTopicsCtrl', ShowTopicsCtrl)
    .controller('CreateTopicsCtrl', CreateTopicsCtrl);

    function ShowTopicsCtrl($routeParams, Topics) {

      var vm = this;

      vm.topic = {};

      Topics.withActivities($routeParams.topic)
        .then(function(data)
        {
          vm.topic = data.data;
        });
    }

    function CreateTopicsCtrl($routeParams, Topics, $location) {

      var vm = this;

      vm.newTopicObject = {
        subject : $routeParams.subject,
        name : ''
      };

      var back = 'subjects/' + $routeParams.subject;


      vm.createTopicObject = function()
      {
        Topics.create(vm.newTopicObject)
          .then(function(data)
          {
            $location.url(back);
          });
      }

    }

})();
