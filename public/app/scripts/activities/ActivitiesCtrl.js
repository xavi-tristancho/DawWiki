(function(){

  'use strict';

  angular.module('app')
    .controller('ShowActivitiesCtrl', ShowActivitiesCtrl)
    .controller('CreateActivitiesCtrl', CreateActivitiesCtrl);

    function ShowActivitiesCtrl($routeParams, $location, Activities, Answers) {

      var vm = this;

      vm.activity = {};

      vm.listActivities = function()
      {
        Activities.withAnswers($routeParams.activity)
          .then(function(data)
          {
            vm.activity = data.data;
          });
      }

      vm.listActivities();

      vm.route = $location.path();

      vm.deleteAnswerObject = function(id)
      {
        Answers.destroy(id)
          .then(function(data)
          {
            vm.listActivities();
          })
      }

    }

    function CreateActivitiesCtrl($routeParams, Activities, $location) {

      var vm = this;

      vm.newActivityObject = {
        topic : $routeParams.topic,
        title : '',
        statement : ''
      };

      var back = 'subjects/' + $routeParams.subject + '/topics/' + $routeParams.topic;


      vm.createActivityObject = function()
      {
        Activities.create(vm.newActivityObject)
          .then(function(data)
          {
            $location.url(back);
          });
      }

    }

})();
