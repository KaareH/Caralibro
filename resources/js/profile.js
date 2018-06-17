App.ProfilePictureModel = Backbone.Model.extend({
    urlRoot: '/api/profile_picture/',

    defaults: {
        errors: null,
    },

    readFile: function(input) {
        this.file = input.files[0];
    },

    callback: function(xhr) {
        if(xhr.status == 200) {
            this.destroy();
        }
        else {
            console.log("Error uploading image: " + xhr.response);
            this.set({'errors': xhr.response});
        }
    },

    upload: function() {
        var formData = new FormData();
        formData.append("userfile", this.file);

        var xhr = new XMLHttpRequest();
        var self = this;
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
              self.callback(xhr);
            }
        }

        xhr.open("POST", '/api/profile_picture/');
        xhr.send(formData);
    }
});

App.ProfilePictureView = Backbone.View.extend({
    el: $('#page-modal'),

    events: {
        "click .btn-upload-picture": "upload",
    },

    initialize: function() {
		this.template = _.template($('.change-profile-picture-template').html());
        this.error_template = _.template($('.change-profile-picture-errors-template').html());
        this.model = new App.ProfilePictureModel();
        this.listenTo(this.model, "change:errors", this.render_errors);
        this.listenTo(this.model, "destroy", this.success);
	},
	render: function() {
		this.$el.html(this.template(this.model.toJSON()));
        console.log("Rendering profile picture modal");
        $('#changePictureModal').on('hidden.bs.modal', function (e) {
            this.remove();
        });

        this.show();
		return this;
	},
    render_errors: function() {
        this.$('.upload-errors').html(this.error_template(this.model.toJSON()));
    },
    upload: function() {
        this.model.upload();
    },
    show: function() {
        $('#changePictureModal').modal('show');
    },
    hide: function() {
        $('#changePictureModal').modal('hide');
    },
    success: function() {
        $('#changePictureModal').on('hidden.bs.modal', function (e) {
            this.remove();
            location.reload();
        });
        this.hide();
    }
});

$(document).ready(function() {
    $('.btn-update-profile-picture').on('click', function() {
        App.changeProfilePicture = new App.ProfilePictureView();
        App.changeProfilePicture.render();
        App.changeProfilePicture.show();
    })
})
