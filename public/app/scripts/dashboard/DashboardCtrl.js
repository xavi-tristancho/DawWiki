(function(){

  'use strict';

  angular.module('app')
    .controller('DashboardCtrl', function (Activities, Answers, Reddits) {

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

    vm.getRecommendedReddits = function()
    {
      Reddits.recommended()
      .then(function(data)
      {
        vm.setRecommendedReddits(data.data);
      });
    };

    vm.getRecommendedReddits();

    vm.setRecommendedReddits = function(recommendedReddits)
    {
      vm.recommendedReddits = recommendedReddits;
    };

  });
})();