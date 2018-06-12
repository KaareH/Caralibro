var Post = Backbone.Model.extend({
    url: '/api/post/',
});

var Posts = Backbone.Collection.extend({

});

var posts = new Posts();

var PostView = Backbone.View.extend({
	model: new Post(),
	tagName: 'tr',
	initialize: function() {
		this.template = _.template($('.posts-list-template').html());
	},
	render: function() {
		this.$el.html(this.template(this.model.toJSON()));
		return this;
	}
});

var PostsView = Backbone.View.extend({
	model: posts,
	el: $('.posts-list'),
	initialize: function() {
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

var postsView = new PostsView();

var CreatePostView = Backbone.View.extend({
    model: new Post(),
    initialize: function() {
		this.template = _.template($('#crate_post-template').html());
	},
    events: {
		'click .post-create-button': 'crate'
    },

    create: function() {
        this
    },

	render: function() {
		this.$el.html(this.template(this.model.toJSON()));
		return this;
	}
});

$(document).ready(function() {
    $('.post-create-button').on('click', function() {
		var post = new Post({
			body: $('.body-input').val(),
            location: '1'
		});
		$('.body-input').val('');
        post.save();
		console.log(post.toJSON());
		//blogs.add(blog);
    })
})
