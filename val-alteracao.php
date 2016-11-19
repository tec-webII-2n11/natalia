<?php

    $nome      = strip_tags($_POST['nome']);
	$user      = strip_tags(trim($_POST['user']));
	$email     = strip_tags($_SESSION['email']);
	$oldpass   = strip_tags($_POST['oldpass']);
	$newpass   = strip_tags($_POST['newpass']);
	$cnewpass  = strip_tags($_POST['cnewpass']);
	$tel       = strip_tags($_POST['tel']);
	$end       = strip_tags($_POST['end']);
	$pass      = $_SESSION['pass'];
   
    $erro = 0;
    
    include 'con.php';
    $conn = conexao();
    
    if($conn->connect_error) {
        die("Falha de conexão " . $conn->connect_error);
        $msg = '<br><p class="text-center">Erro ao realizar solicitação de atualização de cadastro!</p><br>';
    } else {
        $sql = "UPDATE usuarios SET nome = ?, apelido = ?, senha = ?, endereco = ?, telefone = ? WHERE id = ?;";

        if($pass == $oldpass) {
            if(!empty($newpass) && !empty($cnewpass)) {
                if($newpass = $cnewpass) {
                    $pass = $newpass;
                }
            }
        }
            
    	if(!$stmt = $conn->prepare($sql)) {
    	    $msg = "Prepare falhou: (" . $conn->errno . ") " . $conn->error;
	    	$erro = 1;
    	}
    					
        if(!$stmt->bind_param("sssssi", $nome, $user, $pass, $end, $tel, $_SESSION['id'])) {
    	    $msg =  "Binding parameters falhou: (" . $stmt->errno . ") " . $stmt->error;
    	    $erro = 1;
    	}
    					
    	if(!$stmt->execute()) {
    	    $msg =  "Execute falhou: (" . $stmt->errno . ") " . $stmt->error;
    	    $erro = 1;
    	}
    					
        $stmt->close();
		$conn->close();
		
	    include 'perfil.php';
					
	    if($erro == 0) {
		    echo '<br><p class="text-center">Cadastro atualizado com sucesso!</p><br>';
	    } else {
		    echo '<br><p class="text-center"> Erro ao realizar atualização de cadastro! ' . $msg . '</p><br>';
    	}
    }
?>
