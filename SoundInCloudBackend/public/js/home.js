var NewsFeedModule = function() {

    this.container = document.querySelector('.news-feed');

    this.buttons = {
        like_btn: document.querySelector('.like-btn'),
        share_btn: document.querySelector('.share-btn'),
        add_to_lib_btn: document.querySelector('.add-to-lib-btn')
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
        event.preventDefault();
        this.toggleButtonColor(event.target);
    },

    shareButtonClick: function(event) {
        event.preventDefault();
        this.toggleButtonColor(event.target);
    },

    addToLibraryButtonClick: function (event) {
        event.preventDefault();
        this.toggleButtonColor(event.target);
    },

    toggleButtonColor: function(button) {
        button.classList.toggle('active-action-btn');
    },

    addElement: function(files, message, location) {
        var element = document.createElement('newsfeed-element').shadowRoot;
        element = this.addElementData(element, files, message, location);
        this.bindElementButtons(element);
        if (this.container.firstElementChild) {
            this.container.insertBefore(element, this.container.firstElementChild);
        } else {
            this.container.appendChild(element);
        }
    },

    addElementData: function (element, files, message, location) {
        element.querySelector('.title').innerHTML = message;
        var documentsEl = element.querySelector('.documents');
        var documentEl = documentsEl.querySelector('.document').cloneNode(true);
        documentsEl.innerHTML = '';
        var audioElms = element.querySelector('.audio-files');
        var audioEl = audioElms.querySelector('.audio').cloneNode(true);
        audioElms.innerHTML = '';
        for (var i = 0; i < files.length; i++) {
            if (files[i].type.indexOf('audio') !== -1) {
                var newAudioEl = audioEl.cloneNode(true);
                newAudioEl.querySelector('source').setAttribute('src', files[i].name);
                var effectsTable = newAudioEl.querySelector('.effects');
                effectsTable.style.display = 'none';
                newAudioEl.querySelector('.effects-toggle').addEventListener('click',
                    this.onEffectToggle.bind(this, effectsTable));

                audioElms.appendChild(newAudioEl);
            } else {
                var newDocumentEl = documentEl.cloneNode(true);
                newDocumentEl.querySelector('.document-title').innerHTML = files[i].name;
                documentsEl.appendChild(newDocumentEl);
            }
        }

        var geoEl = element.querySelector('.geolocation .data');
        if (location.latitude) {
            geoEl.innerHTML = " latitude: " + parseFloat(location.latitude).toFixed(2)+
                ", longitude: "+parseFloat(location.longitude).toFixed(2);
        } else {
            geoEl.innerHTML = ' Location not available.';
        }

        return element;
    },

    onEffectToggle: function(effectsTable, event) {
        effectsTable.style.display = (effectsTable.style.display == 'none' ? 'block' : 'none');
    },

    bindElementButtons: function(element) {
        element.querySelector('.like-btn').addEventListener('click', this.likeButtonClick.bind(this));
        element.querySelector('.share-btn').addEventListener('click', this.shareButtonClick.bind(this));
        element.querySelector('.add-to-lib-btn').addEventListener('click', this.addToLibraryButtonClick.bind(this));
    },

    onPostCallback: function(files, text, location) {
        var data = new FormData();
        $.each(files, function(key, value) {
            data.append(key, value);
        });

        $.ajax({
            type: "POST",
            url: '/news-feed',
            data: data,
            success: function(res) {
                console.log(res);
            },
            dataType: 'json'
        });
    }

};


(function() {
    var newsFeedModule = new NewsFeedModule();
    newsFeedModule.init();

    window.addEventListener('WebComponentsReady', function() {
        var uploadModule = new UploadModule();
        uploadModule.init(newsFeedModule.onPostCallback.bind(newsFeedModule));

        var newsFeedElement = new NewsFeedElement();
        newsFeedElement.init();
    });
})();