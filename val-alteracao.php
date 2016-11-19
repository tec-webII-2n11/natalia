<?php

    $nome      = strip_tags(trim($_POST['nome']));
	$user      = strip_tags(trim($_POST['user']));
	$email     = strip_tags(trim($_SESSION['email']));
	$oldpass   = strip_tags($_POST['oldpass']);
	$newpass   = strip_tags(sha1($_POST['newpass']));
	$cnewpass  = strip_tags(sha1($_POST['cnewpass']));
	$tel       = strip_tags(trim($_POST['tel']));
	$end       = strip_tags(trim($_POST['end']));
	$pass      = $_SESSION['pass'];
   
    $erro = 0;
    $msg = '';
    
    include 'con.php';
    $conn = conexao();
    
    if($conn->connect_error) {
        die("Falha de conexão " . $conn->connect_error);
        $msg = '<br><p class="text-center">Erro ao realizar solicitação de atualização de cadastro!</p><br>';
    } else {
        $sql = "UPDATE usuarios SET nome = ?, apelido = ?, email = ?, senha = ?, endereco = ?, telefone = ? WHERE id = ?";

        if($pass == $oldpass) {
            if(empty($newpass) && empty($cnewpass)) {
                if($newpass == $cnewpass) {
                    $pass = $newpass;
                }
            }
        }
            
    	if(!$stmt = $conn->prepare($sql)) {
    	    $msg = "Prepare falhou: (" . $conn->errno . ") " . $conn->error;
	    	$erro = 1;
    	}
    					
        if(!$stmt->bind_param('ssssssi', $nome, $user, $_SESSION['email'], $pass, $end, $tel, $_SESSION['id'])) {
    	    $msg =  "Binding parameters falhou: (" . $stmt->errno . ") " . $stmt->error;
    	    $erro = 1;
    	}
    					
    	if(!$stmt->execute()) {
    	    $msg =  "Execute falhou: (" . $stmt->errno . ") " . $stmt->error;
    	    $erro = 1;
    	}
    	if($stmt->affected_rows == 0) {
    	    $msg = $msg . " " . $stmt->affected_rows . " registro atualizado";
    	    $erro = 1;
    	} else {
    	    $_SESSION['pass'] = $pass;
            $_SESSION['nome'] = $nome;
            $_SESSION['user'] = $user;
            $_SESSION['tel'] = $tel;
            $_SESSION['end'] = $end;
    	}

        $stmt->close();
		$conn->close();
		
	    include 'perfil.php';
	    if($erro == 0) {
		    echo '<br><p class="text-center">Cadastro atualizado com sucesso!</p><br>';
	    } else {
		    echo '<br><p class="text-center"> Não foi possível realizar atualização de cadastro! ' . $msg . '</p><br>';
		    echo 'PASS: ' . $_SESSION['pass'] . ' ID: ' . $_SESSION['id'] . ' Nome: ' . $_SESSION['nome'] . '  USER: ' . $_SESSION['user'] . ' TEL: ' . $_SESSION['tel'] . ' END: ' . $_SESSION['end'] . " MSG: " . $msg;
    	}
    }
?>
