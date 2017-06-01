YUI.add('ezconf-listapplugin', function (Y) {
    Y.namespace('eZConf.Plugin');

    Y.eZConf.Plugin.ListAppPlugin = Y.Base.create('ezconfListAppPlugin', Y.Plugin.Base, [], {
        initializer: function () {
            var app = this.get('host');

            app.views.ezconfListView = {
                type: Y.eZConf.ListView
            };

            app.route({
                name: "eZConfList",
                path: "/ezconf/list",
                view: "ezconfListView",
                service: Y.eZConf.ListViewService,
                sideViews: {'navigationHub': true, 'discoveryBar': false},
                callbacks: ['open', 'checkUser', 'handleSideViews', 'handleMainView']
            });

            app.route({
                name: "eZConfListOffset",
                path: "/ezconf/list/:offset/",
                view: "ezconfListView",
                service: Y.eZConf.ListViewService,
                sideViews: {'navigationHub': true, 'discoveryBar': false},
                callbacks: ['open', 'checkUser', 'handleSideViews', 'handleMainView']
            });

            app.route({
                name: "eZConfListOffsetTypeIdentifier",
                path: "/ezconf/list/:offset/:typeIdentifier",
                view: "ezconfListView",
                service: Y.eZConf.ListViewService,
                sideViews: {'navigationHub': true, 'discoveryBar': false},
                callbacks: ['open', 'checkUser', 'handleSideViews', 'handleMainView']
            });
        }
    }, {
        NS: 'ezconfTypeApp'
    });

    Y.eZ.PluginRegistry.registerPlugin(
        Y.eZConf.Plugin.ListAppPlugin, ['platformuiApp']
    );
});
