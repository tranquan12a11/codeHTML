<?php
include "connect.php"; 

$email = $_POST['email'];
$pass = $_POSTư['pass'];
$username = $_POST['username'];
$mobile = $_POST['mobile'];

$query = 'SELECT * FROM `user` WHERE `email` ="'.$email.'"';
$data = mysqli_query($conn, $query);
$numrow = mysqli_num_rows($data);

if ($numrow > 0) {
    $arr = [
            'success' => false,
             'message' => "Email tồn tại"
    ];
}else{

        $query = 'INSERT INTO `user`( `email`, `pass`, `username`, `mobile`) VALUES ("'.$email.'","'.$pass.'","'.$username.'","'.$mobile.'")';
        $data = mysqli_query($conn, $query);

        if ($data == true) {
             $arr = [
              'success' => true,
                 'message' => "thành công"
       
    ];
}else {
    $arr = [
        'success' => false,
        'message' => "ko thành công"
        
    ];
}

}

print_r(json_encode($arr));

?>
