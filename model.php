<?php

if($_POST['action'] == 'keluar'){
    $response = array(
        'result' => false
    );
    return json_encode($response);
}