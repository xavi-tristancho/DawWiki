(function(){

  'use strict';

  angular.module('app')
    .factory('Notifications', Notifications);

    function Notifications()
    {

      toastr.options = {
        "closeButton": false,
        "debug": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }

      return {

        success : function(text)
        {
          return toastr.success(text);
        }
      }
    }
})();
