YUI.add('ezconf-listview', function (Y) {
    Y.namespace('eZConf');

    Y.eZConf.ListView = Y.Base.create('ezconfListView', Y.eZ.TemplateBasedView, [], {
        render: function () {
            this.get('container').setHTML(
                this.template({
                    "name": "listView"
                })
            );
            return this;
        }
    });
});
