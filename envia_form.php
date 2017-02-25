<?php 

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		date_default_timezone_set('America/Sao_Paulo');
		
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$assunto2 = $_POST['assunto'];
		$mensagem = $_POST['mensagem'];

		$assunto = '=?UTF-8?B?'.base64_encode('Formulário de contato - gionava!meow').'?=';
		$mensagem = '
	<!DOCTYPE html>
		<html>
			<body>
				<table border="0">	
				 	<tr>
				 		<td colspan="2"><b>Dados do contato</b></td>
				 		
				 	</tr>
				 	<tr><td>&nbsp;</td></tr>
				 	<tr>
				 		<td>Nome: </td>
				 		<td>'.$nome.'</td>
				 	</tr>
				 	<tr>
				 		<td>E-mail: </td>
				 		<td>'.$email.'</td>
				 	</tr>
				 	<tr>
				 		<td>Assunto: </td>
				 		<td>'.$assunto2.'</td>
				 	</tr>
				 	<tr>
				 		<td>Mensagem: </td>
				 		<td>'.$mensagem.'</td>
				 	</tr>
				 	<tr>
				 		<td>Enviado em: </td>
				 		<td>'.date("d/m/Y H:i:s ").'</td>
				 	</tr>
			 	</table>
			</body>
		</html>';

		$destinatario = "giovana@meowdesign.com.br";
		$random_hash = md5(date('r', time())); 
		$headers = "From: giovana!meow <" . $destinatario . ">\n";
		$headers .= "Return-Path: <" . $destinatario . ">\n";
		$headers .= "Reply-To: <" . $destinatario . ">\n";
		$headers .= "X-Errors-To: <" . $destinatario . ">\n";
		$headers .= "X-Sender: <" . $destinatario . ">\n";
		$headers .= "X-Mailer:PHP/".phpversion()."\n";
		$headers .= "MIME-Version: 1.1\n";
		$headers .= "Content-Type: text/html; charset=UTF-8; boundary=\"PHP-alt-".$random_hash."\""; 

		if(mail($destinatario,$assunto,$mensagem,$headers)){

			echo "<script>alert('Mensagem enviada com sucesso!'); window.location='index.html';</script>";
		}else{
			echo "<script>alert('A mensagem não pode ser enviada'); window.location='index.html';</script>";
		}
	}

 ?>