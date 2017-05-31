YUI.add('ezconf-listview', function (Y) {
    Y.namespace('eZConf');

    Y.eZConf.ListView = Y.Base.create('ezconfListView', Y.eZ.View, [], {
        render: function () {
            this.get('container').setContent(
                "Hey, I'm the listView and I was rendered it seems"
            );
            this.get('container').setStyles({
                background: '#fff',
                fontSize: '200%'
            });
            return this;
        }
    });
});
