(function($) {
    "use strict";


    /*==================================================================
    [ Validate ]*/
    var name = $('input[name="name"]');
    var email = $('input[name="email"]');
    var message = $('textarea[name="message"]');
    console.log("isim:", $(name).val());

    $('.validate-form').on('submit', function() {
        var check = true;

        if ($(name).val().trim() == '') {
            showValidate(name);
            check = false;
        }



        if ($(email).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
            showValidate(email);
            check = false;
        }

        if ($(message).val().trim() == '') {
            showValidate(message);
            check = false;
        }

        return check;
    });


    $('.validate-form .u-input').each(function() {
        $(this).focus(function() {
            hideValidate(this);
        });
    });

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }



})(jQuery);

function temizle() {
    $("#name-3b9a")[0].value = "";
    $("#email-3b9a")[0].value = "";
    $("#message-3b9a")[0].value = ""
}

var request;
let returnDiv=document.getElementById("message_return");
// Bind to the submit event of our form
$("#iletisim_form").submit(function(event) {

    // Prevent default posting of form - put here to work in case of errors
    event.preventDefault();

    // Abort any pending request
    if (request) {
        request.abort();
    }
    // setup some local variables
    var $form = $(this);

    // Let's select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");

    // Serialize the data in the form
    var serializedData = $form.serialize();

    // Let's disable the inputs for the duration of the Ajax request.
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.
    $inputs.prop("disabled", true);

    // Fire off the request to /form.php
    request = $.ajax({
        url: "util/mail.php",
        type: "post",
        data: serializedData
    });

    // Callback handler that will be called on success
    request.done(function(response, textStatus, jqXHR) {
        returnDiv.classList.remove("d-none");
        returnDiv.innerText = "Mesaj Gönderildi";
        returnDiv.classList.add("message-return-success");
        setTimeout(function() {
            temizle();
            returnDiv.classList.add("d-none");
        }, 2000);
    });

    // Callback handler that will be called on failure
    request.fail(function(jqXHR, textStatus, errorThrown) {
        returnDiv.classList.remove("d-none");
        returnDiv.innerText = "Mesaj Gönderilemedi";
        returnDiv.classList.add("message-return-error");
        setTimeout(function() {
            returnDiv.classList.add("d-none");
        }, 2000);
        /*alert(
            "Mesajınız Gönderilemedi Lütfen Tekrar Deneyin: " +
            textStatus, errorThrown
        );*/
    });

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function() {
        // Reenable the inputs
        $inputs.prop("disabled", false);
    });

});