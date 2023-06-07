<?php 



   $requestmode = $_SERVER['REQUEST_METHOD'];
    if($requestmode ==='PUT') {
        http_response_code(200);
        echo 'hello success';
    } else {
        echo 'failed ';
        
    }
