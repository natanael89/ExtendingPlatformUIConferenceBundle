YUI.add('ezconf-listviewservice', function (Y) {
    Y.namespace('eZConf');

    Y.eZConf.ListViewService = Y.Base.create('ezconfListViewService', Y.eZ.ServerSideViewService, [], {
        _load: function (callback) {
            var uri = this.get('app').get('apiRoot') + 'list';

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
