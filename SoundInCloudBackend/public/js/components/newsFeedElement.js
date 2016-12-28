var NewsFeedElement = function() {};

NewsFeedElement.prototype = {
    init: function() {
        var templateSource = document.querySelector('link[href="/components/newsFeedElement.template.html"]').import;
        var template = templateSource.querySelector('#newsFeedElement-template');
        var proto = Object.create(HTMLElement.prototype);

        proto.createdCallback = function() {
            var clone = document.importNode(template.content, true);
            this.createShadowRoot().appendChild(clone);
        };

        document.registerElement('newsfeed-element', {prototype: proto});
    }
};