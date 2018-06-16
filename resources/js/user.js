App.UserModel = Backbone.Model.extend({
    urlRoot: '/api/user/',
});

App.UserCollection = Backbone.Collection.extend({
    url: '/api/user/'
});

//App.users = new App.UserCollection([{id: '1', firstname: 'Kåre'}, {id: '3', firstname: 'Lars'}, {id: '8', firstname: 'Monkey'}]);
App.users = new App.UserCollection();
