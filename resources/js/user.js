App.UserModel = Backbone.RelationalModel.extend({
    urlRoot: '/api/user/',
    defaults: {
        id: '',
        firstname: '',
        lastname: '',
    }
});
