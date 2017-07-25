$(function() {
    $("#frmProgram").bootstrapValidator({
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
            name: {
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