jQuery(document).ready(($) => {
    $("#registerform").submit(function (e) { 
        
        let status = $("#registerform .msg-status");
        let useremail = $("#registerform #user_email");
        let username = $("#registerform #user_name");
        let password = $("#registerform #user_pass");
        
        e.preventDefault();
        $.post(staby_reg_ajax_object.ajax_url, {
            _ajax_nonce: staby_reg_ajax_object.nonce,
            action: "staby_registration_message",
            useremail: useremail.val(),
            username: username.val(),
            password: password.val()
        }, (response) => {
            if (response.created == true) {
                status.text(response.message);
                status.addClass("success");
                window.location.replace(staby_reg_ajax_object.home_url);
            }
            else {
                status.text(response.message);
                status.addClass("error");
            }
        });
    });
});

