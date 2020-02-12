
<?php
   
    if(isset($_POST['cep'])){
        $cep = $_POST['cep'];
        $url='https://cep.awesomeapi.com.br/json/'.$cep;        
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($curl);
        curl_close($curl);
        echo $json;
    }