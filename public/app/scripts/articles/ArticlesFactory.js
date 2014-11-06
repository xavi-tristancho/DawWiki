(function(){

	'use strict';

	angular.module('app')
    .factory('Articles', Articles);

    function Articles($http)
    {
    	return {

            create : function(newArticleObject)
            {
                return $http.post('api/articles', newArticleObject)
                    .then(function(data)
                    {
                        return data.data;
                    }, function(error)
                    {
                        console.log(error);
                        return error;
                    });
            },
            show : function(name)
            {
                return $http.get('api/articles/' +name)
                    .then(function(data)
                    {
                        return data.data;
                    }, function(error)
                    {
                        console.log(error);
                        return error;
                    });
            },
            update : function(editArticleObject)
            {
                return $http.put('api/articles/' + editArticleObject.id, editArticleObject)
                    .then(function(data)
                    {
                        return data.data;
                    }, function(error)
                    {
                        console.log(error);
                        return error;
                    });
            },
            destroy : function(id)
            {
                return $http.delete('api/articles/' + id)
                    .then(function(data)
                    {
                        return data.data;
                    }, function(error)
                    {
                        console.log(error);
                        return error;
                    });
            },

    	}
    }
})();