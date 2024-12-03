<?php

        
        $API_KEY = '8fuv602kx9d12o6t8btmw3lcrkvgoh3p';
        $data = array(
            'email' => 'a@yopmail.com',
            'password' => 'Web@12345678',
            'repeat_password' => 'Web@12345678',
            'update_password' => true,
            'form_id' => 'default0',
            'name' => 'Deepali',
            'nationality' => 'es',
            'phone' => array(
                'country_code' => '91',
                'number' => '1234567806'
            )
        );
        $signature = hash_hmac('sha256', json_encode($data), $API_KEY);
        $trusted = 'sha256='.$signature;

        
        $url = 'https://b-api.broctagon.com/public/v1/users/create';
        $data_string = json_encode($data);
        
        
        $headers = array(
            'Content-Type: application/json',
            'key: ' . $API_KEY,
            'signature: ' . $trusted
        );
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


        $result = curl_exec($ch);

    
        if ($result === false) {
            echo 'Error: ' . curl_error($ch);
        } else {
            echo $result;
        }
        curl_close($ch);


   
?>