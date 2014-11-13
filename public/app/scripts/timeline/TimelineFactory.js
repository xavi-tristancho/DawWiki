(function(){

  'use strict';

  angular.module('app')
    .factory('Timeline', Timeline);

    function Timeline($http)
    {
      return {

        all : function()
        {
          return $http.get('api/timeline?embed=user')
            .then(function(data)
            {
              return data.data;
            }, function(error)
            {
              console.log(error);
              return error;
            });
        }
      }
    }
})();
