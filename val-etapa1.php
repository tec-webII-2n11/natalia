		<?php
			$nome  = $_POST["nome"];
			$user  = $_POST["user"];
			$email = $_POST["email"];
			$cemail = $_POST["cemail"];
			$pass  = $_POST["pass"];
			$cpass  = $_POST["cpass"];

			$erro = 0;
			/*
			echo "<p>" . $nome . "</p>";
			echo "<p>" . $user . "</p>";
			echo "<p>" . $email . "</p>";
			echo "<p>" . $pass . "</p>";
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
				if($pass == $cpass) {
					echo "As senhas não são identicas.<br>";
					$erro = 1;
				}
			}
			
			if(empty($email) || empty($cmail)) {
				echo "Voce deve preencher o email corretamente.<br>";
				$erro = 1;
			} else {
				if ($email == $cmail) {
					echo "Os E-mails não são identicos.<br>";
					$erro = 1;
				}
			}
				
			if ($erro==0) {
				include 'cadastro2.php';
			}
		?>