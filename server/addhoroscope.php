<?php

try {

    session_start();

    if(isset($_SERVER['REQUEST_METHOD'])) {

        if($_SERVER['REQUEST_METHOD'] === "POST") {

            //key monthDate set in the request-body *** ($_POST["month"]) && ($_POST["date"])
            //if(isset($_POST["birthDate"])) 
            if(isset($_POST["month"]) && ($_POST["day"]) {
                //saving value of key 'monthDate' from request into key 'monthDate' in $_SESSION
                //$_SESSION["birthDate"] = serialize($_POST["birthDate"]);
            }

                //sending succes (true) back to client
                //***ändrat "mm" = "month" och "dd" = "day" + if nedan till elseif
                echo json_encode(true);
                 
                if (("month" == 12 && "day" >= 22) || ("month" == 01 && "day" <=20)) {
                    return "Stenbock ";
                }
                elseif (("month" == 01 && "day" >= 21) || ("month" == 02 && "day" <=18)) {
                    return "Vattuman";
                }
                elseif (("month" == 02 && "day" >= 19) || ("month" == 03 && "day" <=20)) {
                    return "Fiskar";
                }
                elseif (("month" == 03 && "day" >= 21) || ("month" == 04 && "day" <=20)) {
                    return "Vädur";
                }
                elseif (("month" == 04 && "day" >= 21) || ("month" == 05 && "day" <=21)) {
                    return "Oxe";
                }
                elseif (("month" == 05 && "day" >= 22) || ("month" == 06 && "day" <=21)) {
                    return "Tvillingar";
                }
                elseif (("month" == 06 && "day" >= 22) || ("month" == 07 && "day" <=22)) {
                    return "Kräfta";
                }
                elseif (("month" == 07 && "day" >= 23) || ("month" == 08 && "day" <=23)) {
                    return "Lejon";
                }
                elseif (("month" == 08 && "day" >= 24) || ("month" == 09 && "day" <=22)) {
                    return "Jungfru";
                }
                elseif (("month" == 09 && "day" >= 23) || ("month" == 10 && "day" <=23)) {
                    return "Våg";
                }
                elseif (("month" == 10 && "day" >= 24) || ("month" == 11 && "day" <=22)) {
                    return "Skorpion";
                }
                elseif (("month" == 11 && "day" >= 23) || ("month" == 12 && "day" <=21)) {
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