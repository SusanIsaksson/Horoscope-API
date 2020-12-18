<?php
try {
    session_start();

    require("./addhoroscope.php");

    if(isset($_SERVER['REQUEST_METHOD'])) {

        if($_SERVER['REQUEST_METHOD'] === "POST") {

            
            if(isset($_POST["birthDate"])) {

                
                $_SESSION["birthDate"] = serialize($_POST["birthDate"]);

                
                echo json_encode(true);

            } else {

                throw new ErrorException("name is not set in body", 500);
            }
        }
    }

} catch(ErrorException $err) {
    echo json_encode(
        array(
            "Message" => $err -> getMessage(),
            "Status" => $err -> getCode()
        )
    );
    }
?>