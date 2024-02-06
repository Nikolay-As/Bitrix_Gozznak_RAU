  <?php

        require 'constants.php';
        $array = array(
            'tel'    => $_POST["tel"],
            'email'    => $_POST["email"],
            'number_order'    => $_POST["number_order"]
        );

        $array_2 = json_encode($array);

        $ch = curl_init($url_1c . '/hs/RAU_info_for_site/cansel_reservation');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $array_2);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Basic 0J/QvtC00YDRj9C00YfQuNC6OjE0NTgq'
        ));

        $response = curl_exec($ch);
        curl_close($ch);
        if ($response === "Да") {
            echo 1;
        } else{
            echo 0;
        }
    ?>
<?php
/*header("Location: index.php");*/

?>