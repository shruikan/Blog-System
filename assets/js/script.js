$(document).ready(function() {

    // target _blank to all external links
    $('#content a').each(function() {
        if (this.href.indexOf(location.hostname) == -1) {
            $(this).attr('target', '_blank');
        }
    });

    // Debug Button
    $('#btn-debug').click(function() {
        $('#console-debug').toggleClass('hide');
    });

    // Delete Button
    $('.btn-delete').click(function() {
        var selected = $(this).attr('id');
        var postid = selected.split('del_').join('');

        if (confirm('Confirm delete?')) {
            $.get('../ajax/posts.php?id=' + postid);
            $('#post_' + postid).remove();
        }
    });

    (function() {
        
        // Show/Hide Comments
        $('.close').click(function() {
            $('.comment-' + $(this).attr('data-commentid')).slideToggle();
            $(this).toggleClass('fa-chevron-up fa-chevron-down');
        });
        
        $('.titleBox .close').click(function() {
            $('.commentList').slideToggle();
        });
        

        // Comments
        $('#post').click(function() {
            $.post('../ajax/comments.php?ajax=true', {
                name: $('#name').val(),
                email: $('#email').val(),
                comment: $('#comment').val()
            }, function(data) {
                $('#comments').html(data);
            });
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

// VALIDATIONS
    // 
    // login
    $('#login-form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                validators: {
                    notEmpty: {
                        message: 'The username is required'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'The username must be between 3 and 30 characters'
                    },
                    different: {
                        field: 'password',
                        message: 'The username cannot be same as password'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9]+$/i,
                        message: 'The username can only consist of alphabetical, number'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required'
                    },
                    stringLength: {
                        min: 5,
                        message: 'The password must be between more than 5 characters'
                    }
                }
            }
        }
    });

    // register
    $('#register-form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                validators: {
                    notEmpty: {
                        message: 'The username is required'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'The username must be between 3 and 30 characters'
                    },
                    different: {
                        field: 'password',
                        message: 'The username cannot be same as password'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9]+$/i,
                        message: 'The username can only consist of alphabetical, number'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The email address is not valid'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required'
                    },
                    stringLength: {
                        min: 5,
                        message: 'The password must be between more than 5 characters'
                    }
                }
            },
            password_v: {
                validators: {
                    notEmpty: {
                        message: 'The password is required'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm must be the same'
                    }
                }
            }
        }
    });

    // edit
    $('#edit-form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    stringLength: {
                        min: 2,
                        max: 30,
                        message: 'Your name must be between 2 and 30 characters'
                    },
                    different: {
                        field: 'password',
                        message: 'Your name cannot be same as password'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/i,
                        message: 'Your name can only consist of alphabetical characters'
                    }
                }
            },
            family: {
                validators: {
                    stringLength: {
                        min: 2,
                        max: 30,
                        message: 'Your name must be between 2 and 30 characters'
                    },
                    different: {
                        field: 'password',
                        message: 'Your name cannot be same as password'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/i,
                        message: 'Your name can only consist of alphabetical characters'
                    }
                }
            },
            site: {
                group: '.col-md-6',
                validators: {
                    uri: {
                        message: 'The URL address is not valid'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The email address is not valid'
                    }
                }
            },
            password: {
                validators: {
                    stringLength: {
                        min: 5,
                        message: 'The password must be between more than 5 characters'
                    }
                }
            },
            password_v: {
                validators: {
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm must be the same'
                    }
                }
            }
        }
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