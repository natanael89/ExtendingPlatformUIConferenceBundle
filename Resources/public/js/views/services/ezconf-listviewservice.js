YUI.add('ezconf-listviewservice', function (Y) {
    Y.namespace('eZConf');

    Y.eZConf.ListViewService = Y.Base.create('ezconfListViewService', Y.eZ.ServerSideViewService, [], {
        initializer: function () {
            this.on('*:navigateTo', function (e) {
                this.get('app').navigateTo(
                    e.route.name,
                    e.route.params
                );
            });
        },

        _load: function (callback) {
            var offset = this.get('request').params.offset,
                typeIdentifier = this.get('request').params.typeIdentifier,
                uri;

            if ( !offset ) {
                offset = 0;
            }
            uri = this.get('app').get('apiRoot') + 'list/' + offset;
            if ( typeIdentifier ) {
                uri += '/' + typeIdentifier;
            }

            Y.io(uri, {
                method: 'GET',
                on: {
                    success: function (tId, response) {
                        this._parseResponse(response);
                        callback(this);
                    },
                    failure: this._handleLoadFailure
                },
                context: this
            });
        }
    });
});
