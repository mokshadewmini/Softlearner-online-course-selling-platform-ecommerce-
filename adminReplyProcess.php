<?php

    require "connection.php";



if (isset($_GET["c"])) {
    $c = $_GET["c"];


    $query = "SELECT * FROM `newmsg`";


    $newmsg_rs = Database::search($query);
    $newmsg_num = $newmsg_rs->num_rows;



    for ($x = 0; $x < $newmsg_num; $x++) {
        $newmsg_data = $newmsg_rs->fetch_assoc();










        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        Database::iud("INSERT INTO `reply` 
        (`reply`,`re_time`,`newmsg_id`) VALUES 
        ('" . $c . "','" . $date . "','" . $newmsg_data["id"] . "' )");
      
         
$reply_rs= Database::search("SELECT * FROM `reply` WHERE `newmsg_id`='" . $newmsg_data["id"] . "'");
$reply_num = $reply_rs->num_rows;
$reply_data = $reply_rs->fetch_assoc();



    
        echo ("success");

        Database::iud("DELETE FROM `newmsg` WHERE `id` ='".$reply_data["id"]."'");
    }

}

?>