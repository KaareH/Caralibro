App.UserModel = Backbone.RelationalModel.extend(
{

    urlRoot: '/api/user/',
    defaults: {
        id: '',
        firstname: '',
        lastname: '',
    }

});

/*App.UserCollection = Backbone.Collection.extend({
    url: '/api/user/'
});*/
