<?php

try {

    session_start();

    require("./addhoroscope.php");

    if(isset($_SERVER['REQUEST_METHOD'])) {

        if($_SERVER['REQUEST_METHOD'] === 'GET') {

            if(isset($_SESSION["birthDate"])) {

                echo json_encode(unserialize($_SESSION["birthDate"]));

            } else {

                echo json_encode(false);
            }
            exit;
        }
    }
    

} catch(Exception $err) {
    echo json_encode(
        array(
            "Message" => $err -> getMessage(),
            "Status" => $err -> getCode())
    );
}
?>