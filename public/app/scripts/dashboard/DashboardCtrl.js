(function(){

  'use strict';

  angular.module('app')
    .controller('DashboardCtrl', function (Timeline) {

    var vm = this;

    vm.getTimeline = function()
    {
      Timeline.all()
      .then(function(data)
      {
        vm.setTimeline(data.data);
      });
    };

    vm.getTimeline();

    vm.setTimeline = function(timeline)
    {
      vm.timeline = timeline;
    };

    vm.DateForHumans = function(date)
    {
      return new Date(date).addHours(1).getTime();
    }

    Date.prototype.addHours= function(h)
    {
      this.setHours(this.getHours()+h);
      return this;
    }

  });
})();
