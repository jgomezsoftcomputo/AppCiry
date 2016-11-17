<?php
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Max-Age: 3600');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

$data = json_decode(file_get_contents('php://input'), true);

$acudiente = @trim(stripslashes($data['acudiente'])); 
$email = @trim(stripslashes($data['email']));
$curso = @trim(stripslashes($data['curso']));
$estudiante = @trim(stripslashes($data['estudiante']));
$asunto = @trim(stripslashes($data['asunto']));
$mensaje = @trim(stripcslashes($data['mensaje']));
$email_destino = @trim(stripslashes($data['email_destino']));


$message = "<strong>Acudiente: </strong>". $acudiente . "<br/>" .
"<strong>Email: </strong>". $email ."<br/>".
"<strong>Estudiante: </strong>". $estudiante . "<br/>" .
"<strong>Curso: </strong>". $curso."<br/><br/>" .
$mensaje;

$headers = 'From: '.$acudiente.'<'.$email.'>'."\r\n" .
'Reply-To: '.$acudiente.'<'.$email.'>' . "\r\n" .
'Content-Type: text/html; charset=UTF-8\r\n'.
'X-Mailer: PHP/' . phpversion();

mail($email_destino, $asunto, $message, $headers);

die;