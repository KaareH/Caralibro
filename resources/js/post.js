App.PostModel = Backbone.RelationalModel.extend(
{
    urlRoot: '/api/post/',
    defaults: {
        id: '',
        body: '',
        timestamp: '',
    },

    relations: [{
        type: Backbone.HasOne,
        key: 'owner',
        autoFetch: true,
        relatedModel: App.UserModel
    }]

});

App.PostCollection = Backbone.Collection.extend(
{
    model: App.PostModel,

    initialize: function(models, options) {
        this.options = options;
    },
    url: '/api/post/',

    fetch: function() {
        return Backbone.Collection.prototype.fetch.call(this, this.options);
    }

});

App.PostView = Backbone.View.extend({
	initialize: function() {
		this.template = _.template($('.posts-list-template').html());
        _.bindAll(this, 'render');
	},
	render: function() {
		this.$el.html(this.template(this.model.toJSON()));
		return this;
	}
});

App.PostsView = Backbone.View.extend({
    model: null,
	el: $('.posts-list'),
	initialize: function(posts) {
        this.model = posts;
		var self = this;
		this.model.on('add', this.render, this);
		this.model.on('change', function() {
			setTimeout(function() {
				self.render();
			}, 30);
		},this);
		this.model.on('remove', this.render, this);
	},
	render: function() {
		var self = this;
		this.$el.html('');
		_.each(this.model.toArray(), function(post) {
			self.$el.append((new App.PostView({model: post})).render().$el);
		});
		return this;
	}
});

$(document).ready(function() {
    $('.post-create-button').on('click', function() {
		var post = new App.PostModel({
			body: $('.body-input').val(),
            location: $('.location-input').val()
		});
		$('.body-input').val('');
        post.save();
		console.log(post.toJSON());
        posts.fetch();
		//posts.add(post);
    })
})
