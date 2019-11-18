$(function($) {
    $.validator.addMethod("notNumber", function(value, element) {
        var reg = /^[a-zA-Z]+$/;
        if(!reg.test(value)){
            return false;
        }else{
            return true;
        }
    });
    $.validator.addMethod("emailvalid", function(value, element) {
        var reg = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/;
        if(reg.test(value)){
            return true;
        }else{
            return false;
        }
    });
    $.validator.addMethod("carnetvalid", function(value, element) {
        $.ajax({
            url: urlcarnet,
            type: "GET",
            data: {id: value},
            dataType: 'JSON',
            success: function(data) {
                resp = data;
            },
            async: false,
            error: function(xhr, textStatus, thrownError) {
                alert('Problemas en el servidor LLAMA A BRAYANNNNN.. Vuelva a intentar, si el problema persiste comuniquese con soporte');
            }
        });
        if(resp.length > 0){
            return false
        } else {
            return true
        }
    });

    $.validator.addMethod("chosens",function(value, element){
        var r = true;
        if (value==null || value=='' || value.length==0) {
            $(element).siblings('.chosen-container').find("a.chosen-single").addClass("chosen-error");
            $(element).siblings('.chosen-container').find("ul.chosen-choices").addClass("chosen-error");
            r = false
        }
        $(element).change(function() {
            $('.chosen-container').removeClass('chosen-error');
            $(element).siblings('.chosen-container').find("a.chosen-single").removeClass('chosen-error');
            $(element).siblings('.chosen-container').find("ul.chosen-choices").removeClass("chosen-error");
            $('label.error').remove();
        });
        return r
    });

    $.validator.addMethod("phonevalid", function(value, element) {
        var reg = ["0212","0424","0414","0416","0426","0412"];
        var val=value
        var res = val.split("(");
        var cod = res[1].split(")");
        cod=cod[0];
        if(cod.length==4){
            if($.inArray(cod,reg)===-1){
                return false;
            }else{
                return true;
            }
        }
    });

    $.validator.addMethod("onlynumber", function(value, element) {
        var reg = /^[0-9]+$/;
        if(!reg.test(value)){
            return false;
        }else{
            return true;
        }
    });

    $.validator.addMethod("alphanumber", function(value, element) {
        var reg = /^[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]$/
        if(!reg.test(value)){
            return false;
        }else{
            return true;
        }
    });

    $.validator.addMethod("placavalid", function(value, element) {
        $.ajax({
            url: urlplaca,
            type: "GET",
            data: {id: value},
            dataType: 'JSON',
            success: function(data) {
                resp = data;
            },
            async: false,
            error: function(xhr, textStatus, thrownError) {
                alert('Problemas en el servidor LLAMA A BRAYANNNNN.. Vuelva a intentar, si el problema persiste comuniquese con soporte');
            }
        });
        if(resp.length > 0){
            return false
        } else {
            return true
        }
    });
});
