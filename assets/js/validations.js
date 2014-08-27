// VALIDATIONS
$(document).ready(function() {
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

// email
    $('#mail-form').bootstrapValidator({
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
                    regexp: {
                        regexp: /^[a-zA-Z]+$/i,
                        message: 'Your name can only consist of alphabetical characters'
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
            subject: {
                validators: {
                    stringLength: {
                        min: 5,
                        max: 50,
                        message: 'Your subject must be between 5 and 50 characters'
                    }
                }
            },
            message: {
                validators: {
                    stringLength: {
                        min: 10,
                        max: 500,
                        message: 'Your message must be between 10 and 500 characters'
                    }
                }
            }
        }
    });
});