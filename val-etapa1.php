		<?php
			$nome   = strip_tags($_POST["nome"]);
			$user   = strip_tags($_POST["user"]);
			$email  = strip_tags($_POST["email"]);
			$cemail = strip_tags($_POST["cemail"]);
			$pass   = strip_tags(sha1($_POST["pass"]));
			$cpass  = strip_tags(sha1($_POST["cpass"]));

			$erro = 0;
			/*
			echo "<p>" . $nome . "</p>";
			echo "<p>" . $user . "</p>";
			echo "<p>" . $email . "</p>";
			echo "<p>" . $cemail . "</p>";
			echo "<p>" . $pass . "</p>";
			echo "<p>" . $cpass . "</p>";
            */
			if(empty($nome) || strstr($nome, ' ')==FALSE){
				echo "Voce deve preencher o nome corretamente.<br>";
				$erro = 1;
			} 

			if(empty($user)) {
				echo "Voce deve preencher a nome de usuario corretamente.<br>";
				$erro = 1;
			}
				
				
			if(empty($pass) || empty($cpass)) {
				echo "Voce deve preencher a senha corretamente.<br>";
				$erro = 1;
			} else { 
				if($pass != $cpass) {
					echo "As senhas não são identicas.<br>";
					$erro = 1;
				}
			}
			
			if(empty($email) || empty($cemail)) {
				echo "Voce deve preencher o email corretamente.<br>";
				$erro = 1;
			} else {
				if ($email != $cemail) {
					echo "Os E-mails não são identicos.<br>";
					$erro = 1;
				}
			}
				
			if ($erro==0) {
				include 'cadastro2.php';
			}
		?>