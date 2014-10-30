(function(){

	'use strict';

	angular.module('app')
    .factory('Articles', Articles);

    function Articles($http)
    {
    	return {

    		all : function()
    		{
    			return $http.get('api/articles')
    				.then(function(data)
    				{
    					return data.data;
    				}, function(error)
    				{
    					console.log(error);
    					return error;
    				});
    		},
            create : function(newFamousObject)
            {
                return $http.post('api/articles', newFamousObject)
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
            update : function(editFamousObject)
            {
                return $http.put('api/articles/' + editFamousObject.id, editFamousObject)
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