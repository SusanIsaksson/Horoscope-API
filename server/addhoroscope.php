<?php

try {

    session_start();

    if(isset($_SERVER['REQUEST_METHOD'])) {

        if($_SERVER['REQUEST_METHOD'] === "POST") {

            //key monthDate set in the request-body
            if(isset($_POST["birthDate"])) {

                //saving value of key 'monthDate' from request into key 'monthDate' in $_SESSION
                $_SESSION["birthDate"] = serialize($_POST["birthDate"]);

                //sending succes (true) back to client
                echo json_encode(true);
                 
                if (("mm" == 12 && "dd" >= 22) || ("mm" == 01 && "dd" <=20)) {
                    return "Stenbock ";
                }
                if (("mm" == 01 && "dd" >= 21) || ("mm" == 02 && "dd" <=18)) {
                    return "Vattuman";
                }
                if (("mm" == 02 && "dd" >= 19) || ("mm" == 03 && "dd" <=20)) {
                    return "Fiskar";
                }
                if (("mm" == 03 && "dd" >= 21) || ("mm" == 04 && "dd" <=20)) {
                    return "Vädur";
                }
                if (("mm" == 04 && "dd" >= 21) || ("mm" == 05 && "dd" <=21)) {
                    return "Oxe";
                }
                if (("mm" == 05 && "dd" >= 22) || ("mm" == 06 && "dd" <=21)) {
                    return "Tvillingar";
                }
                if (("mm" == 06 && "dd" >= 22) || ("mm" == 07 && "dd" <=22)) {
                    return "Kräfta";
                }
                if (("mm" == 07 && "dd" >= 23) || ("mm" == 08 && "dd" <=23)) {
                    return "Lejon";
                }
                if (("mm" == 08 && "dd" >= 24) || ("mm" == 09 && "dd" <=22)) {
                    return "Jungfru";
                }
                if (("mm" == 09 && "dd" >= 23) || ("mm" == 10 && "dd" <=23)) {
                    return "Våg";
                }
                if (("mm" == 10 && "dd" >= 24) || ("mm" == 11 && "dd" <=22)) {
                    return "Skorpion";
                }
                if (("mm" == 11 && "dd" >= 23) || ("mm" == 12 && "dd" <=21)) {
                    return "Skytt";
                }

            } else {

                throw new ErrorException("birthdates is not set in body", 500);
            }
            exit;

        } else {

            throw new ErrorException("Not a valid requestmethod...", 405);
        }
    }

} catch(ErrorException $err) {
   
    echo json_encode(
        array(
            "Message" => $err -> getMessage(),
            "Status" => $err -> getCode())
    );
}

?>