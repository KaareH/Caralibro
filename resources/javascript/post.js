var Post = Backbone.Model.extend({
    url: '/api/post/get',
    defaults: {
        body: 'No body',
        test: 'This is a test!',
        owner: 'Kaare',
        timestamp: '20 jan'
    }
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

$(document).ready(function() {
    $('.get-post').on('click', function() {
		var post = new Post({id: $('.post_id-input').val()}).fetch();
		$('.post_id-input').val('');

		console.log(post.toJSON());
		posts.add(post);
})
})
