<!-- jQuery -->
<script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>

<!-- jQuery UI JS -->
<script type="text/javascript" src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>

<!-- Bootstrap JS -->
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- TinyMce -->
<script type="text/javascript" src="../assets/vendor/js/tinymce/tinymce.min.js"></script> <!-- TODO: Use site URL -->

<script type="text/javascript">
    $(document).ready(function() {
        $('#btn-debug').click(function() {
            $('#console-debug').toggleClass('hide');
        });
    });

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
</script>