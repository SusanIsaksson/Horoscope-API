<?php
try {

    session_unset();

    require("/addhoroscope");

    if(isset($_SERVER['REQUEST_METHOD'])) {

        if($_SERVER['REQUEST_METHOD'] === "DELETE") {

            if(isset($_SESSION["birthDate"])) {

                unset($_SESSION['']);

                echo json_encode(true)

            
            } elseif {
                
                echo json_encode(false) 
            }
        }
    }
    exit;

} catch(ErrorException $err) {
    echo json_encode(
        array(
            "Message" => $err -> getMessage(),
            "Status" => $err -> getCode())
    );
}

?>