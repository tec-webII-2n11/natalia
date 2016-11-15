		<?php
			$nome  = $_POST["nome"];
			$user  = $_POST["user"];
			$email = $_POST["email"];
			$pass  = $_POST["pass"];
			$tel   = $_POST["tel"];
			$end   = $_POST["end"];

			$erro = 0;
			/*
			echo "<p>" + $nome + "</p>";
			echo "<p>" + $user + "</p>";
			echo "<p>" + $email + "</p>";
			echo "<p>" + $pass + "</p>";
			echo "<p>" + $tel + "</p><";
			echo "<p>" + $end + "</p>";
            */
			if(empty($end) || strstr($end, ' ')==FALSE){
				echo "Voce deve preencher o endereço corretamente.<br>";
				$erro = 1;
			} 

			if(empty($tel)) {
				echo "Voce deve preencher o telefone corretamente.<br>";
				$erro = 1;
			}
				
		    if ($erro==0) {
		    		/*Gravar no bando*/
					include 'login.php';
				}
		?>