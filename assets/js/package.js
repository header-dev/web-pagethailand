$(function() {
    $("#frmPackage").bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            lang: {
                validators: {
                    notEmpty: {
                        message: 'The language is required and cannot be empty'
                    },
                }
            },
            program_id: {
                validators: {
                    notEmpty: {
                        message: 'The program is required and cannot be empty'
                    },
                }
            },
            province_id:{
                validators: {
                    notEmpty: {
                        message: 'The province is required and cannot be empty'
                    },
                }
            },
            name:{
                validators: {
                    notEmpty: {
                        message: 'The name is required and cannot be empty'
                    },
                }
            },
            description:{
                validators: {
                    notEmpty: {
                        message: 'The description is required and cannot be empty'
                    },
                    stringLength: {
                        max: 255,
                        message: 'The description must not than 255 characters long'
                    },
                }
            },
            detail:{
                validators: {
                    notEmpty: {
                        message: 'The detail is required and cannot be empty'
                    },
                    stringLength: {
                        max: 255,
                        message: 'The detail must not than 255 characters long'
                    },
                }
            },
            period_detail:{
                validators: {
                    notEmpty: {
                        message: 'The period detail is required and cannot be empty'
                    },
                }
            },
            thumbnail:{
                validators: {
                    notEmpty: {
                        message: 'The thumbnail is required and cannot be empty'
                    },
                }
            }
        }
    });
});