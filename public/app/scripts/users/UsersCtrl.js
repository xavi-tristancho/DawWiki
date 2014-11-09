(function(){

  'use strict';

  angular.module('app')
    .controller('AllUsersCtrl', AllUsersCtrl)
    .controller('CreateUsersCtrl', CreateUsersCtrl)
    .controller('ShowUsersCtrl', ShowUsersCtrl);

    function AllUsersCtrl(Users)
    {
      var vm = this;

      vm.getUsers = function()
      {
        Users.all()
        .then(function(data)
        {
          vm.setUsers(data.data);
        });
      };

      vm.getUsers();

      vm.setUsers = function(users)
      {
        vm.users = users;

        vm.chunks = [];
          
          for ( var i = 0; i < vm.users.length; i += 2) {
              vm.chunks.push( vm.users.slice(i, i + 2) );
          }
      };
    }

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
