(function(){

  'use strict';

  angular.module('app')
    .controller('NewArticlesCtrl', NewArticlesCtrl)
    .controller('EditArticlesCtrl', EditArticlesCtrl);

    function NewArticlesCtrl($routeParams, $location, Articles)
    {
      var vm = this;

      vm.newArticleObject = {
        title : '',
        link : '',
        tags : '',
        famous_id : $routeParams.name 
      };

      vm.createArticleObject = function()
      {
        Articles.create(vm.newArticleObject)
          .then(function(data)
          {
            $location.url('famouses/' + $routeParams.name);
          });
      }
    }

    function EditArticlesCtrl($routeParams, $http, $location, Articles)
    {
      var vm = this;

      Articles.show($routeParams.id)
        .then(function(data)
        {
          vm.editArticleObject = data.data;
        });

      vm.updateArticleObject = function (){

        Articles.update(vm.editArticleObject)
          .then(function(data)
          {
            $location.url('articles');
          });        
      }
    }

})();
