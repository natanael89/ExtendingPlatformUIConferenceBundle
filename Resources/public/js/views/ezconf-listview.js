YUI.add('ezconf-listview', function (Y) {
    Y.namespace('eZConf');

    Y.eZConf.ListView = Y.Base.create('ezconfListView', Y.eZ.ServerSideView, [], {
        events: {
            '.ezconf-list-location': {
                'tap': '_navigateToLocation'
            },
            '.ezconf-list-page-link': {
                'tap': '_navigateToOffset'
            },
            '.ezconf-list-types': {
                'change': '_filterByType'
            }
        },

        initializer: function () {
            this.containerTemplate = '<div class="ez-view-ezconflistview"/>';
        },

        _filterByType: function (e) {
            var select = e.target;

            this.fire('navigateTo', {
                route: {
                    name: 'eZConfListOffsetTypeIdentifier',
                    params: {
                        offset: "0",
                        typeIdentifier: select.get('value')
                    }
                }
            });
        },

        _navigateToOffset: function (e) {
            var offset = e.target.getData('offset'),
                typeIdentifier = e.target.getData('typeIdentifier');

            e.preventDefault();
            this.fire('navigateTo', {
                route: {
                    name: 'eZConfListOffsetTypeIdentifier',
                    params: {
                        offset: offset,
                        typeIdentifier: typeIdentifier
                    }
                }
            });
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
