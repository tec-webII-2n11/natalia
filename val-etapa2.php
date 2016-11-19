		<?php
			$nome  = $_POST['nome'];
			$user  = $_POST['user'];
			$email = $_POST['email'];
			$pass  = $_POST['pass'];
			$tel   = strip_tags(trim($_POST["tel"]));
			$end   = strip_tags(trim($_POST["end"]));

			$erro = 0;
			$msg  = '';
			/*
			echo "<p>" . $nome . "</p>";
			echo "<p>" . $user . "</p>";
			echo "<p>" . $email . "</p>";
			echo "<p>" . $pass . "</p>";
			echo "<p>" . $tel . "</p>";
			echo "<p>" . $end . "</p>";
            */
			if(empty($end) || strstr($end, ' ')==FALSE){
				echo "Voce deve preencher o endereço corretamente.<br>";
				$erro = 1;
			} 

			if(empty($tel)) {
				echo "Voce deve preencher o telefone corretamente.<br>";
				$erro = 1;
			}
				
		    if($erro==0) {
		    		include 'con.php';
		    		$conn = conexao();
		    		 if ($conn->connect_error) {
        				die("Falha de conexão " . $conn->connect_error);
        				echo '<br><p class="text-center">Erro ao realizar cadastro!</p><br>';
    				} else {
    					
    					$sql = "INSERT INTO usuarios (nome, apelido, email, senha, endereco, telefone) VALUES (?, ?, ?, ?, ?, ?)";
    					
    					if(!$stmt = $conn->prepare($sql)) {
    						$msg = "Prepare falhou: (" . $conn->errno . ") " . $conn->error;
    						$erro = 1;
    					}
    					
    					if(!$stmt->bind_param("ssssss", $nome, $user, $email, $pass, $end, $tel)) {
    						$msg =  "Binding parameters falhou: (" . $stmt->errno . ") " . $stmt->error;
    						$erro = 1;
    					}
    					
    					if(!$stmt->execute()) {
    						$msg =  "Execute falhou: (" . $stmt->errno . ") " . $stmt->error;
    						$erro = 1;
    					}
    					
						$stmt->close();
						$conn->close();
					
						include 'login.php';
						if($erro == 0) {
							echo '<br><p class="text-center">Cadastro realizado com sucesso!</p><br>';
						} else {
							echo '<br><p class="text-center"> Erro ao realizar cadastro! ' . $msg . '!</p><br>';
						}
						
				}
		    }
		?>