$(document).ready(function() {
    
    // Debug Button
    $('#btn-debug').click(function() {
        $('#console-debug').toggleClass('hide');
    });
    
    // Delete Button
    $('.btn-delete').on('click', function() {
        var selected = $(this).attr('id');
        var postid = selected.split('del_').join('');

        if (confirm('Confirm delete?')) {
            $.get('ajax/posts.php?id=' + postid);
            $('#post_' + postid).remove();
        }
    });

    // Sort Menu
    $('#sort-nav').sortable({
        cursor: 'move',
        update: function() {
            var order = $(this).sortable('serialize');
            $.get('ajax/sort-list.php', order);
        }
    });
    
    // Navigation
    $('.nav-form').submit(function(event) {
        var navData = $(this).serializeArray();
        var navLabel = $('input[name=label]').val();
        var navID = $('input[name=id]').val();

        $.ajax({
            url: 'ajax/navigation.php',
            type: 'POST',
            data: navData
        }).done(function() {
            $('#label_' + navID).html(navLabel);
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

