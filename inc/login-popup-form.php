<!-- LoginPopUp -->
<dialog class="dialogPopUpLogin" id="dialogPopUpLogin" close>
    <button class="btnDialogPopUpLoginClose"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path fill="#959595" fill-rule="evenodd"
                d="M15.78 14.36a1 1 0 0 1-1.42 1.42l-2.82-2.83-2.83 2.83a1 1 0 1 1-1.42-1.42l2.83-2.82L7.3 8.7a1 1 0 0 1 1.42-1.42l2.83 2.83 2.82-2.83a1 1 0 0 1 1.42 1.42l-2.83 2.83 2.83 2.82z">
            </path>
        </svg></button>
    <div class="login-wrapper">
        <!-- Login -->
        <div class="form-container form-container-login login-form-active">
            <h2>Logga in</h2>

            <form name="loginform" id="loginform" method="post">
            <p class="msg-status"></p>
                <p class="login-username">
                    <label for="user_login">Användarnamn </label>
                    <input type="text" name="username" id="user_name" class="input" required>
                </p>
                <p class="login-password">
                    <label for="user_pass">Lösenord</label>
                    <input type="password" name="password" id="user_pass" class="input" required>
                </p>
                <p class="login-remember"><label><input name="rememberme" type="checkbox" id="rememberme"
                            value="forever"> Kom ihåg</label></p>
                <p class="login-submit">
                    <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary" value="Logga in">
                    <input type="hidden" name="redirect_to" value="<?php esc_url(home_url( '/' )); ?>">
                </p>
                
            </form>
            <!-- <span><button class="dialogToggle-name">Glömt användarnamn?</button></span> -->
            <span><button class="dialogToggle-pass">Glömt lösenord?</button></span>
        </div>

        
<!-- Glömt lösenord -->
        <div class="form-container form-container-pass">
            <h2>Glömt lösenord</h2>
            <p class="msg-status"></p>
            
            <form method="post">
                <p class="login-email">
                    <label for="user_login">Email</label>
                    <input type="email" name="emailToReceive" id="user_email" class="input" value=""
                        size="20">
                </p>

                <p class="login-submit">
                    <input type="hidden" name="form_forgot_pass">
                    <input type="submit" name="staby_registration_submit" id="wp-submit" class="button button-primary"
                        value="Skicka">
                </p>

            </form>
            <span><button class="dialogToggle-login">Tillbaka</button></span>
            
        </div>
<!-- Glömt användarnamn
<div class="form-container form-container-name">
            <h2>Glömt lösenord</h2>
            <p class="msg-status"></p>
            
            <form method="post">
                <div class="login-email">
                    <label for="user_login">Email</label>
                    <input type="email" name="emailToReceive" id="user_email" class="input" value=""
                        size="20">
                </div>

                <div class="login-submit">
                    <input type="hidden" name="form_forgot_name">
                    <input type="submit" name="staby_registration_submit" id="wp-submit" class="button button-primary"
                        value="Skicka">
                </div>

            </form>
            <span><button class="dialogToggle-login">Tillbaka</button></span>
            
        </div> -->
    </div>
</dialog>