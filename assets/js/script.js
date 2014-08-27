$(document).ready(function() {

    // target _blank to all external links
    $('body a').each(function() {
        if (this.href.indexOf(location.hostname) == -1) {
            $(this).attr('target', '_blank');
        }
    });

    // Debug Button
    $('#btn-debug').click(function() {
        $('#console-debug').toggleClass('hide');
    });

    // Comments
    (function() {

        // Show/Hide Comments
        $('.close').click(function() {
            $('.comment-' + $(this).attr('id')).slideToggle();
            $(this).toggleClass('fa-chevron-up fa-chevron-down');
        });

        $('.titleBox .close').click(function() {
            $('.commentList').slideToggle();
        });

        // Delete Post
        $('.delete').click(function() {

            var commentid = $(this).attr('data-commentid'),
                    comment = $('.comment-' + commentid);

            if (confirm('Confirm delete?')) {
                $.get('../ajax/del-comment.php?ajax=true&id=' + commentid);
                $(comment).fadeOut();
                $(this).fadeOut();
                $('#' + commentid).fadeOut();
            }
        });


        var template = Handlebars.compile($('#comment-template').html()),
                status = $('#status'),
                comments = $('.commentList'),
                well = $('.well');


        // Posting TODO: Snippet
        $('#comment-form').on('submit', function() {
            var that = $(this),
                    url = that.attr('action'),
                    type = that.attr('method'),
                    data = {};

            that.find('[name]').each(function() {
                var that = $(this),
                        name = that.attr('name'),
                        value = that.val();
                data[name] = value;
            });

            $.ajax({
                url: url,
                type: type,
                data: data,
                success: function() {
                    status.attr('class', 'alert alert-success');
                    status.html('Thank you for the comment!');
                    comments.prepend(template(data));
                    well.remove();
                },
                error: function() {
                    status.attr('class', 'alert alert-warning');
                    status.html('Something went wrong!');
                }
            });

            return false;
        });
    }());


    // Search
    $('#search').keyup(function(event) {

        $.ajax({
            url: 'ajax/search.php',
            success: function(data) {

            }
        });

        event.preventDefault();
    });

}); // END document.ready();

tinymce.init({
    selector: ".editor",
    theme: "modern",
    plugins: [
        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "save table contextmenu directionality emoticons template paste textcolor"
    ],
    content_css: "css/content.css",
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
    style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
});