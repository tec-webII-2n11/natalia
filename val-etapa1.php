		<?php
			$nome  = $_POST["nome"];
			$user  = $_POST["user"];
			$email = $_POST["email"];
			$pass  = $_POST["pass"];

			$erro = 0;
			/*
			echo "<p>" + $nome + "</p>";
			echo "<p>" + $user + "</p>";
			echo "<p>" + $email + "</p>";
			echo "<p>" + $pass + "</p>";
            */
			if(empty($nome) || strstr($nome, ' ')==FALSE){
				echo "Voce deve preencher o nome corretamente.<br>";
				$erro = 1;
			} 

			if(empty($user)) {
				echo "Voce deve preencher a nome de usuario corretamente.<br>";
				$erro = 1;
			}
				
				
				if(empty($pass)) {
					echo "Voce deve preencher a senha corretamente.<br>";
					$erro = 1;
				}
				
				if ($erro==0) {
					include 'cadastro2.php';
				}
		?>