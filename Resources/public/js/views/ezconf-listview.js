YUI.add('ezconf-listview', function (Y) {
    Y.namespace('eZConf');

    Y.eZConf.ListView = Y.Base.create('ezconfListView', Y.eZ.ServerSideView, [], {
        initializer: function () {
            this.containerTemplate = '<div class="ez-view-ezconflistview"/>';
        }
    });
});
