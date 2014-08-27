<script id="comment-template" type="text/x-handlebars-template">
<li class="comment-{{id}}">
    <div class="commenterImage">
        <img class="post-avatar" src="{{thumbnail}}" />
    </div>
    
    <div class="commentText">
        <p class="content">{{comment}}</p>
        <span class="date sub-text">{{date}}</span>
        <span class="author sub-text">{{name}}</span>
    </div>
</li>
</script>

<script id="about-template" type="text/x-handlebars-template">
{{#each member}}}
<div class="col-md-4">
    <div class="thumbnail">
        <a href="{{link}}">
            <img src="{{link}}" alt="{{name}}" class="img-responsive" />
        </a>
        <div class="caption text-center">
            <h4>{{name}}</h4>
            <p>{{nick}}</p>
            <a href="{{link}}" class="btn btn-sm btn-success">Read More</a>
        </div>
    </div>
</div>
{{#each}}
</script>