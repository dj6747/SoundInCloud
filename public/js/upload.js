var UploadModule = function() {
    this.input = null;
};

UploadModule.prototype = {
    init: function() {
        var self = this;
        this.loadTemplate(function(template) {
            var proto = Object.create(HTMLElement.prototype);

            proto.createdCallback = function() {
                var clone = document.importNode(template, true);
                this.createShadowRoot().appendChild(clone);
                this.classList.add("upload-container");
                this.classList.add("upload-container-h1");
                var input = document.createElement('input');
                input.setAttribute('id', 'file-input');
                input.setAttribute('type', 'file');
                this.appendChild(input);
                self.input = input;

                this.addEventListener('click', self.openDialog.bind(self));
                this.addEventListener('drop', self.onDrop.bind(self));
                this.addEventListener('dragover', function(e) {e.preventDefault()});
            };
            document.registerElement('upload-container', {prototype: proto});
        });

    },

    loadTemplate: function(callback) {
        var req = new XMLHttpRequest();
        req.addEventListener("load", function() {
            var parser = new DOMParser();
            var template = parser.parseFromString(this.responseText, "text/xml");
            callback(template.querySelector('#upload-template'));
        });
        req.open("GET", "templates/upload.template.html");
        req.send();
    },

    onDrop: function(event) {
        event.stopPropagation();
        event.preventDefault();
        var files = event.dataTransfer.files;
        console.log(files);
    },

    openDialog: function(event) {
        this.input.click();
    }
};

(function () {
    var uploadModule = new UploadModule();
    uploadModule.init();
})();