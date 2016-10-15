<!<!DOCTYPE html>
<html lang = "es">
<head>
</head>
<body>
	<?php
        require("connection.php");
        require("./PHPMailer/PHPMailerAutoload.php");
        $connection=connect();
        $uname=$_POST["usernamesignup"];
        $email=$_POST["emailsignup"];
        $pwd=$_POST["passwordsignup"];
        $hash=md5($uname);
        $query="insert into usuario(IdUsuario,Username,Email,Password,Hash,IdTipoUsuario) values(DEFAULT,'".$uname."','".$email."',md5('".$pwd."'),'".$hash."',3);";
        $connection->query($query);
        $activateLink=md5($email . $hash);
        $from ="noreplysithec@gmail.com";
        $subject="Tu cuenta de Sithec ha sido creada";
        $message='
        ¡Gracias por elegirnos!
        Tu cuenta ha sido creada, con las siguientes credenciales.

        ------------------------
        Username: ' .$uname. '
        Password: ' .$pwd. '
        ------------------------

        Por favor haz clic en el siguiente enlace para completar el registro:
        localhost/Sithec/Procesos/verify.php?activateCode='. $activateLink .'

        ';
        $mail=new PHPMailer();
        $mail->IsSMTP();
        $mail->Host="smtp.gmail.com";
        $mail->SMTPDebug=0;
        $mail->SMTPAuth=true;
        $mail->SMTPSecure="tls";
        $mail->Port=587;
        $mail->Username="noreplysithec@gmail.com";
        $mail->Password='Admin$A2016';
        $mail->SetFrom('noreplysithec@gmail.com',"Sithec NoReply");
        $mail->AddAddress($email);
        $mail->Subject=$subject;
        $mail->MsgHTML($message);
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        if (!$mail->Send()) {
            echo('<p>Error: '.$mail->ErrorInfo.'</p>');
        } else {
            header("Location: revisaCorreo.php");
            exit();
        }
    ?>
</body>
</html>