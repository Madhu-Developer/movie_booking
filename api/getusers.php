<?php


include_once '/var/www/html/madhu/form/libs/includes/database.class.php';
// if($requestmode==='GET') {

    database::db_connect();
    $query_fetch = "SELECT user_name,user_phone,user_email FROM signup order by user_id desc";
    $fetch = database::$conn->prepare($query_fetch);
    $fetch->execute();
    $user_data = array();
    $user_data['data'] = array();
    while($result=$fetch->fetch(PDO::FETCH_ASSOC)) {
        if(extract($result)) {
            $array = array(
                'username'=>$user_name,
                'user_phone'=>$user_phone,
                'user_email'=>$user_email  );
        } else {
            echo 'not in';
        }

        array_push($user_data['data'], $array);
    }
    $json =  json_encode($user_data, JSON_PRETTY_PRINT);

    echo '<pre>'.$json.'</pre>';

// }else{
//     http_response_code(405);
// }
