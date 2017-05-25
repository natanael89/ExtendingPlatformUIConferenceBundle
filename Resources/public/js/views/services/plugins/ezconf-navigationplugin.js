YUI.add('ezconf-navigationplugin', function (Y) {
    Y.namespace('eZConf.Plugin');

    Y.eZConf.Plugin.NavigationPlugin = Y.Base.create('ezconfNavigationPlugin', Y.eZ.Plugin.ViewServiceBase, [], {
        initializer: function () {
            var service = this.get('host');

            service.addNavigationItem({
                Constructor: Y.eZ.NavigationItemView,
                config: {
                    title: "List contents",
                    identifier: "ezconf-list-contents",
                    route: {
                        name: "eZConfList"
                    }
                }
            }, 'platform');
        }
    }, {
        NS: 'ezconfNavigation'
    });

    Y.eZ.PluginRegistry.registerPlugin(
        Y.eZConf.Plugin.NavigationPlugin, ['navigationHubViewService']
    );
});
