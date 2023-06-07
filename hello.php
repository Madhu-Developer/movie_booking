<?php 


if(isset($_POST['name'])) {
   echo $_POST['name']; 
   $requestmode = $_SERVER['REQUEST_METHOD'];
    if($requestmode ==='POST') {
        http_response_code(200);
        echo 'hello success';
    } else {
        echo 'failed ';
        
    }
}else{
    ?>
    <form action="" method='post'>
        <input type="text" name='name'>
        <input type="submit" value="submit">
    </form>
<?php }
?>