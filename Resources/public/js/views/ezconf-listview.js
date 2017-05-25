YUI.add('ezconf-listview', function (Y) {
    Y.namespace('eZConf');

    Y.eZConf.ListView = Y.Base.create('ezconfListView', Y.eZ.ServerSideView, [], {
        events: {
            '.ezconf-list-location': {
                'tap': '_navigateToLocation'
            }
        },

        initializer: function () {
            this.containerTemplate = '<div class="ez-view-ezconflistview"/>';
        },

        _navigateToLocation: function (e) {
            var link = e.target;

            e.preventDefault();

            this.fire('navigateTo', {
                route: {
                    name: link.getData('route-name'),
                    params: {
                        id: link.getData('route-id'),
                        languageCode: link.getData('route-languagecode')
                    }
                }
            });
        }
    });
});
