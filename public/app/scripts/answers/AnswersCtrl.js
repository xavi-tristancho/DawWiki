(function(){

  'use strict';

  angular.module('app')
    .controller('CreateAnswersCtrl', CreateAnswersCtrl);

    function CreateAnswersCtrl($routeParams, Answers, $location) {

      var vm = this;

      vm.newAnswerObject = {
        activity_id : $routeParams.activity,
        statement : ''
      };

      var back = 'subjects/' + $routeParams.subject + '/topics/' + $routeParams.topic + '/activities/' + $routeParams.activity;


      vm.createAnswerObject = function()
      {
        Answers.create(vm.newAnswerObject)
          .then(function(data)
          {
            $location.url(back);
          });
      }

    }

})();
