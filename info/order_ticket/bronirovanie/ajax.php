<?php
        $array = array(
            'fio'    => $_POST["fio"],
            'tel'    => $_POST["tel"],
            'email'    => $_POST["email"],
            'select'    => $_POST["select"],
            'date_doc'    => $_POST["date_doc"],
            'number_doc'    => $_POST["number_doc"]
        );	
        
        $array_2 = json_encode($array);	
         
        $ch = curl_init('https://1c-devs.rauit.ru/goznak_popurey/hs/RAU_info_for_site/reservation');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $array_2);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Basic 0J/QvtC00YDRj9C00YfQuNC6OjE0NTgq'
          ));
        
       
    

$response = curl_exec($ch);
curl_close($ch);
$response = json_decode($response);
?>
<script>
   
</script>
<?php
    header("Location: index.php");

?>