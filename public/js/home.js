var NewsFeedModule = function() {

    this.container = document.querySelector('.news-feed');

    this.buttons = {
        like_btn: document.querySelector('.like-btn'),
        share_btn: document.querySelector('.share-btn'),
        add_to_lib_btn: document.querySelector('.add-to-lib-btn')
    };

    this.buttonStates = {
        like_btn: false,
        share_btn: false,
        add_to_lib_btn: false
    };
};

NewsFeedModule.prototype = {
    init: function() {
        if (this.buttons.like_btn) {
            this.buttons.like_btn.addEventListener('click', this.likeButtonClick.bind(this));
            this.buttons.share_btn.addEventListener('click', this.shareButtonClick.bind(this));
            this.buttons.add_to_lib_btn.addEventListener('click', this.addToLibraryButtonClick.bind(this));
        }
    },

    likeButtonClick: function(event) {
        this.toggleButtonColor('like_btn');
    },

    shareButtonClick: function(event) {
        this.toggleButtonColor('share_btn');
    },

    addToLibraryButtonClick: function (event) {
        this.toggleButtonColor('add_to_lib_btn');
    },

    toggleButtonColor: function(buttonName) {
        this.buttonStates[buttonName] = !this.buttonStates[buttonName];
        this.buttons[buttonName].style.color = (this.buttonStates[buttonName] ? '#448AFF' : '#212121');
    },

    addElement: function(files, message) {
        var element = document.createElement('newsfeed-element').shadowRoot;
        element.querySelector('.title').innerHTML = message;
        if (this.container.firstElementChild) {
            this.container.insertBefore(element, this.container.firstElementChild);
        } else {
            this.container.appendChild(element);
        }

    }
};


(function() {
    var newsFeedModule = new NewsFeedModule();
    newsFeedModule.init();

    var uploadModule = new UploadModule();
    uploadModule.init(newsFeedModule.addElement.bind(newsFeedModule));

    var newsFeedElement = new NewsFeedElement();
    newsFeedElement.init();
})();