(function(){

  'use strict';

  angular.module('app')
    .controller('RedditsCtrl', RedditsCtrl)
    .controller('NewRedditsCtrl', NewRedditsCtrl)
    .controller('ShowRedditsCtrl', ShowRedditsCtrl)
    .controller('EditRedditsCtrl', EditRedditsCtrl);

    function RedditsCtrl(Reddits)
    {
      var vm = this;

      vm.reddits = {};

      vm.getReddits = function()
      {
        Reddits.all()
        .then(function(data)
        {
          vm.setReddits(data.data);
        });
      };

      vm.getReddits();

      vm.setReddits = function(reddits)
      {
        vm.reddits = reddits;
      };

      vm.destroy = function(id)
      {
        Reddits.destroy(id)
          .then(function()
          {
            vm.getReddits();
          });
      };
    }

    function NewRedditsCtrl($location, Reddits)
    {
      var vm = this;

      vm.newRedditObject = {
        name : ''
      };

      vm.createRedditObject = function()
      {
        Reddits.create(vm.newRedditObject)
          .then(function()
          {
            $location.url('reddits');
          });
      };
    }

    function ShowRedditsCtrl($rootScope, $filter, $routeParams, Reddits)
    {
      var vm = this;

      Reddits.show($routeParams.name)
        .then(function(data)
        {
          vm.reddit = data.data;
        });

      Reddits.feed($routeParams.name)
        .then(function(data)
        {
          vm.feed = data;
        });

      vm.favorite = function(redditId,title,permalink,postedAt)
      {
        var username = $filter('slugify')($rootScope.currentUser.username);

        var newFavoritedRedditObject = {

          reddit_id : redditId,
          title : title,
          permalink : permalink,
          posted_at : postedAt
        };

        console.log(newFavoritedRedditObject);

        Reddits.favorite(username, newFavoritedRedditObject)
          .then(function()
          {

          });
      };
    }

    function EditRedditsCtrl($routeParams, $location, Reddits)
    {
      var vm = this;

      Reddits.show($routeParams.name)
        .then(function(data)
        {
          vm.editRedditObject = data.data;
        });

      vm.updateRedditObject = function()
      {
        Reddits.update(vm.editRedditObject)
          .then(function()
          {
            $location.url('Reddits');
          });        
      };
    }

})();
