(function(){

  'use strict';

  angular.module('app')
    .controller('CreateUsersCtrl', CreateUsersCtrl)
    .controller('ShowUsersCtrl', ShowUsersCtrl);

    function CreateUsersCtrl($routeParams, Users, $location) {

      var vm = this;

      vm.newUserObject = {
        username : '',
        email : '',
        role : 'member'
      };

      vm.createUserObject = function()
      {

        vm.disableCreateButton = true;

        Users.create(vm.newUserObject)
          .then(function()
          {
            $location.url('/');
          });
      };

    }

    function ShowUsersCtrl($rootScope, $filter, $routeParams, Users, FavoritedReddits) {

      var vm = this;

      vm.getFavoritedReddits = function()
      {
        Users.favoritedReddits($routeParams.name)
        .then(function(data)
        {
          vm.setFavoritedReddits(data.data);
        });
      };

      vm.getFavoritedReddits();

      vm.setFavoritedReddits = function(favoritedReddits)
      {
        vm.favoritedReddits = favoritedReddits;
      };

      vm.destroyFavoritedReddit = function(id)
      {
        var username = $filter('slugify')($rootScope.currentUser.username);

        FavoritedReddits.destroy(username, id)
          .then(function()
          {
            vm.getFavoritedReddits();
          });
      };

    }

})();
