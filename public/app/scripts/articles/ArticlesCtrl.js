(function(){

  'use strict';

  angular.module('app')
    .controller('AllArticlesCtrl', AllArticlesCtrl)
    .controller('NewArticlesCtrl', NewArticlesCtrl)
    .controller('EditArticlesCtrl', EditArticlesCtrl);

    function AllArticlesCtrl(Articles)
    {
      var vm = this;

      vm.articles = {};

      vm.getArticles = function()
      {
        Articles.all()
        .then(function(data)
        {
          vm.setArticles(data.data);
        });
      }

      vm.getArticles();

      vm.setArticles = function(Articles)
      {
        vm.articles = Articles;
      }

      vm.destroy = function(id)
      {
        console.log(id);
        Articles.destroy(id)
          .then(function(data)
          {
            vm.getArticles();
          });
      }
    }

    function NewArticlesCtrl($location, Articles)
    {
      var vm = this;

      vm.newArticleObject = {
        title : '',
        link : '',
        tags : ''
      };

      vm.createArticleObject = function()
      {
        Articles.create(vm.newArticleObject)
          .then(function(data)
          {
            $location.url('articles');
          });
      }
    }

    function EditArticlesCtrl($routeParams, $http, $location, Articles)
    {
      var vm = this;

      Articles.show($routeParams.name)
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
