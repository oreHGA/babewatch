<?php

namespace App\Models;

class EmailModel
{
    public function statusUpdate( $user_email , $status, $picture_link){
        $msg = "Hey" . session('user_name') . "Someone just tried to access your babe.\n";

        if($status == "Pass"){
            $msg .= "We let them through because we realized ya'll are cool\n";
        }else{
            $msg .= "We didn't let them through, because we realized you realized ya'll weren't that cool\n";
            $msg .= "We're gonna have to call the 👮🏾‍♀️👮🏾‍♀️🚔🚔  If you don't mind.\n";
        }
        $msg .= "See? We've got your back 😉 \n Here's a picture of your 'friend'. Just for clarity\n";

        $image = "
        <html>
        <head>
        <title>Status Update</title>
        </head>
        <body style=\"width=320px; height: 160px;\">
            <img src=\" " . $picture_link ." \">
        </body>
        </html>
        ";

        $msg .= $image;
        $to = $user_email;
        $subject = "Status Update";

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $headers .= 'From: <support@babewatch.ng>' . "\r\n";
        $headers .= 'Cc: ore@ogtech.ng' . "\r\n";

        mail($to,$subject,$msg,$headers);

    }

    public function welcomeMail( $user_email ){
        $msg = "Hey" . session('user_name') . "Welcome to Babewatch. We promise to keep your babe safe.\n";

        $to = $user_email;
        $subject = "Status Update";

        $headers .= 'From: <support@babewatch.ng>' . "\r\n";
        $headers .= 'Cc: ore@ogtech.ng' . "\r\n";

        mail($to,$subject,$msg,$headers);
    }
}
