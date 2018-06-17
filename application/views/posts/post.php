<script type="text/template" class="posts-list-template">
    <div class="card mt-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-2">
                    <% if (owner != null) {%>
                    <img src="<%= owner.picture %>" alt="..." class="img-thumbnail">
                    <% } %>
                </div>
                <div class="col-md-10">
                    <% if (owner != null) {%>
                    <h5 class="card-title"><a href="/user/<%= owner.id%>"><%= owner.firstname + " " + owner.lastname %></a></h5>
                    <% } %>
                    <p class="tex-muted">Posted: <%= timestamp %></p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <p class="card-text"><%= body %></p>
        </div>
    </div>
</script>
