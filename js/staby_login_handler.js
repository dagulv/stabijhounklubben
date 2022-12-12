jQuery(document).ready(($) => {
    $("#loginform").submit(function (e) { 
        
        let status = $("#loginform .msg-status");
        let username = $("#loginform #user_name");
        let password = $("#loginform #user_pass");
        
        // if (username.hasClass('invalidStyle')) {
        //     username.after('<p class="error">Användarnamn saknas</p>');
        //     return false;
        // }
        // if (password) {
        //     password.after('<p class="error">Lösenord saknas</p>');
        //     return false;
        // }
        e.preventDefault();
        $.post(staby_login_ajax_object.ajax_url, {
            _ajax_nonce: staby_login_ajax_object.nonce,
            action: "staby_login_message",
            username: username.val(),
            password: password.val()
        }, (response) => {
            if (response.loggedIn == true) {
                status.text(response.message);
                status.addClass("success");
                window.location.replace(staby_login_ajax_object.home_url);
            }
            else {
                status.text(response.message);
                status.addClass("error");
            }
        });
    });
});

