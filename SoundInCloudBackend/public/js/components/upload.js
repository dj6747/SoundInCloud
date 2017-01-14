var UploadModule = function() {
    this.input = null;
    this.container = null;
    this.onPostCallback = null;
    this.files = [];
    this.posting = false;
    this.coordinates = {};
    this.canPost = false;
};

UploadModule.prototype = {
    init: function(onPostCallback) {
        var self = this;
        self.onPostCallback = onPostCallback || function() {};

        var templateSource = document.querySelector('link[href="/components/upload.template.html"]').import;
        var template = templateSource.querySelector('#upload-template');
        var proto = Object.create(HTMLElement.prototype);

        proto.createdCallback = function() {
            var clone = document.importNode(template.content, true);
            this.createShadowRoot().appendChild(clone);
            self.input = this.shadowRoot.querySelector('#file-input');
            self.container = this.shadowRoot.querySelector('.upload-container');

            self.container.addEventListener('click', self.openDialog.bind(self), false);
            self.input.addEventListener('change', self.getFiles.bind(self));
            self.container.addEventListener('drop', self.onDrop.bind(self));
            self.container.addEventListener('dragover', function(e) {e.preventDefault()});
        };

        document.registerElement('upload-container', {prototype: proto});

        /*var post_btn = this.container.querySelector('.btn-post');
        post_btn.addEventListener('click', this.onPost.bind(this), false);*/
    },

    onDrop: function(event) {
        event.stopPropagation();
        event.preventDefault();
        this.updateContainer(event.dataTransfer.files);
    },

    openDialog: function(event) {
        this.input.click();
    },

    getFiles: function(event) {
        this.updateContainer(this.input.files);
    },

    disableClick: function(event) {
        event.preventDefault();
    },

    updateContainer: function(files) {
        this.container.addEventListener('click', this.disableClick, false);
        var block1 = this.container.querySelector('.block1');
        var block2 = this.container.querySelector('.block2');
        var file_list = this.container.querySelector('#file-list');
        this.populateFileList(files, file_list);
        block1.classList.add('hidden');
        block2.classList.remove('hidden');
        this.container.classList.add('after-upload');
        this.getGeolocation();
    },

    populateFileList: function(files, file_list) {
        this.files = files;
        for (var i = 0; i < files.length; i++) {
            var li = document.createElement("li");
            li.appendChild(document.createTextNode(files[i].name));
            file_list.appendChild(li);
        }
    },

    onPost: function(event) {
        var input = this.container.querySelector('.comment-box');
        if (input.value.length) {
            this.onPostCallback(this.files, input.value, this.coordinates);
            this.reset();
        } else {
            alert('Please insert message.');
        }
    },

    reset: function() {
        var self = this;
        setTimeout(function() {
            self.container.querySelector('#file-list').innerHTML = '';
            var block1 = self.container.querySelector('.block1');
            var block2 = self.container.querySelector('.block2');
            self.container.classList.remove('after-upload');
            block2.classList.add('hidden');
            block1.classList.remove('hidden');
            self.container.querySelector('.comment-box').value = '';
            self.container.removeEventListener('click', self.disableClick, false);
        }, 200);

    },

    getGeolocation: function() {
        var geoEl = this.container.querySelector('.geolocation .data');
        var self = this;
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                self.coordinates = position.coords;
                geoEl.innerHTML = " latitude: " + parseFloat(position.coords.latitude).toFixed(2)+
                    ", longitude: "+parseFloat(position.coords.longitude).toFixed(2);
                self.canPost = true;
            });
        } else {
            geoEl.innerHTML = "Geolocation is not supported in your browser. Check security preferences.";
            self.coordinates = {};
            self.canPost = true;
        }

        setTimeout(function() {
            self.canPost = true;
            if (!self.coordinates.longitude) {
                geoEl.innerHTML = " Geolocation is currently not working in your browser.";
            }
        }, 5000);
    }
};