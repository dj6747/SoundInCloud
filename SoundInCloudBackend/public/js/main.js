var Validator = function() {};

Validator.prototype = {
    email: function(string) {
        var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,10}$/;
        return regex.test(string);
    },

    password: function(string) {
        return (string.length > 5);
    },

    name: function(string) {
        return (string.length > 2);
    }
};

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});