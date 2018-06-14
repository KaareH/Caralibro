var Post = Backbone.Model.extend({
    url: '/api/post/',
});

var Posts = Backbone.Collection.extend({
    initialize: function(models, options) {
        this.options = options;
    },
    url: '/api/post/',

    fetch: function() {
        return Backbone.Collection.prototype.fetch.call(this, this.options);
    }
});

var PostView = Backbone.View.extend({
	model: new Post(),
	initialize: function() {
		this.template = _.template($('.posts-list-template').html());
	},
	render: function() {
		this.$el.html(this.template(this.model.toJSON()));
		return this;
	}
});

var PostsView = Backbone.View.extend({
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
			self.$el.append((new PostView({model: post})).render().$el);
		});
		return this;
	}
});

$(document).ready(function() {
    posts.fetch();
    $('.post-create-button').on('click', function() {
		var post = new Post({
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
