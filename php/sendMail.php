<?php

	$name = $_POST['name'];
	$mail = $_POST['mail'];
	$subject = $_POST['subject'];
	$msg = $_POST['msgContent'];
	
	$to = 'falkner.dominik@gmail.com';
	
	mail($to, $subject, $msg);
	
	header('Location: http://falkner.devhut.org/html/contact.html');
?>