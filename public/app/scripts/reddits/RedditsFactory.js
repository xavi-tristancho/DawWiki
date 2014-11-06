(function(){

	'use strict';

	angular.module('app')
    .factory('Reddits', Reddits);

    function Reddits($http)
    {
    	return {

    		all : function()
    		{
    			return $http.get('api/reddits')
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
                return $http.post('api/reddits', newFamousObject)
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
                return $http.get('api/reddits/' +name)
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
                return $http.put('api/reddits/' + editFamousObject.id, editFamousObject)
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
                return $http.delete('api/reddits/' + id)
                    .then(function(data)
                    {
                        return data.data;
                    }, function(error)
                    {
                        console.log(error);
                        return error;
                    });
            },
            feed : function(name)
            {
                return $http.get('http://www.reddit.com/r/' + name + '.json')
                    .then(function(data)
                    {
                        return data.data.data.children;
                    }, function(error)
                    {
                        console.log(error);
                        return error;
                    });
            },

    	}
    }
})();