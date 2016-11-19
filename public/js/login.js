var LoginModule = function() {
    this.forms = {
        login: document.getElementById("login-form"),
        signup: document.getElementById("register-form")
    };

    this.inputs = {
        firstname: document.getElementsByName("firstname")[0],
        lastname: document.getElementsByName("lastname")[0],
        email: document.getElementsByName("email")[0],
        password: document.getElementsByName("password")[0],
        repeat_password: document.getElementsByName("repeat_password")[0],
        gender: document.getElementsByName("gender")[0]
    };

    this.buttons = {
        signIn: document.getElementsByClassName("sign-in")[0],
        signUp: document.getElementsByClassName("sign-up")[0],
    };
};


LoginModule.prototype = {
    init: function() {
        if (this.forms.signup) {
            this.forms.signup.addEventListener('submit', this.signUp.bind(this));
        }

        if (this.forms.login) {
            this.forms.login.addEventListener('submit', this.signIn.bind(this));
        }
    },

    validateSignInForm: function() {
        var validate = new Validator();
        if (!validate.email(this.inputs.email.value)) {
            return "Check email";
        }

        if (!validate.password(this.inputs.password.value)) {
            return "Password must be longer than 5 chars.";
        }

        return null;
    },

    validateSignUpForm: function() {
        var validate = new Validator();
        if (!validate.name(this.inputs.firstname.value)) {
            return "Firstname is invalid.";
        }

        if (!validate.name(this.inputs.lastname.value)) {
            return "Lastname is invalid.";
        }

        if (!validate.email(this.inputs.email.value)) {
            return "Check email";
        }

        if (!validate.password(this.inputs.password.value)) {
            return "Password must be longer than 5 chars.";
        }

        if (this.inputs.password.value !== this.inputs.repeat_password.value) {
            return "Passwords don't match.";
        }

        return null;
    },

    signIn: function(event) {
        event.preventDefault();
        var errors = this.validateSignInForm();
        if (errors) {
            alert(errors);
            return;
        }

        this.redirectHome();
    },

    signUp: function(event) {
        event.preventDefault();
        var errors = this.validateSignUpForm();
        if (errors) {
            alert(errors);
            return;
        }
        this.redirectHome();
    },

    //TODO: remove when backend is implemented
    redirectHome: function() {
        if (this.inputs.email.value === 'admin@gmail.com') {
            window.location = "admin-home.html";
            return;
        }

        window.location = "home.html";
    }
};



(function() {
    var loginModule = new LoginModule();
    loginModule.init();
})();
