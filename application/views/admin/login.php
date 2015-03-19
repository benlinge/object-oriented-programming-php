<?php

    echo '<h1>'.$name.'</h1>';

    if(isset($error)) {
        echo '<div>'.$error.'</div>';
    }

echo form_open();

echo validation_errors();

    $username = array(
        'name' => 'uname'
    );
    echo form_input($username);

    $password = array(
        'name' => 'pword'
    );
    echo form_password($password);

    $button = array(
        'name' => 'login',
        'value' => 'Login'
    );
    echo form_submit($button);

echo form_close();