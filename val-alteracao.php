<?php
    include 'layouts/header.php';
    include 'layouts/menu.php';
    
    $id        = strip_tags(trim($_POST['id']));
    $nome      = strip_tags(trim($_POST['nome']));
	$user      = strip_tags(trim($_POST['user']));
	$oldpass   = strip_tags(sha1($_POST['oldpass']));
	$newpass   = strip_tags(sha1($_POST['newpass']));
	$cnewpass  = strip_tags(sha1($_POST['cnewpass']));
	$tel       = strip_tags(trim($_POST['tel']));
	$end       = strip_tags(trim($_POST['end']));
	$pass      = '';
   
    $erro = 0;
    $msg = '';
    
    include 'con.php';
    $conn = conexao();
    
    if($conn->connect_error) {
        die("Falha de conexão " . $conn->connect_error);
        $msg = '<br><p class="text-center">Erro ao realizar solicitação de atualização de cadastro!</p><br>';
    } else {
        /**PASSWORD**/
        $sql = "SELECT senha FROM usuarios WHERE id = ?";
        
        if(!$stmt = $conn->prepare($sql)) {
            $msg = "Prepare falhou [pass]: (" . $conn->errno . ") " . $conn->error;
            $erro = 1;
    	}
    	
    	if(!$stmt->bind_param("i", $id)) {
    	    $msg =  "Binding parameters falhou [pass]: (" . $stmt->errno . ") " . $stmt->error;
    	    $erro = 1;
    	}
    	
    	if(!$stmt->execute()) {
    	    $msg =  "Execute falhou [pass]: (" . $stmt->errno . ") " . $stmt->error;
            $erro = 1;
    	}
    	
    	if(!($res = $stmt->get_result())) {
            $msg = "Falha ao obter resultados[pass] : (" . $stmt->errno . ") " . $stmt->error;
            $erro = 1;
    	} else {
    	    $row = $res->fetch_assoc();
    	    $pass  = $row['senha'];
    	}
    	/**UPDATE**/
        $sql = "UPDATE usuarios SET nome = ?, apelido = ?, senha = ?, endereco = ?, telefone = ? WHERE id = ?";

        if($pass == $oldpass) {
            $msg = $msg . ' Password antigo confere!';
            if(!empty($newpass) && empty(!$cnewpass)) {
                $msg = $msg . ' Password novo confere!';
                if($newpass == $cnewpass) {
                    $msg = $msg . ' Atribuido novo password!';
                    $pass = $newpass;
                }
            }
        }
        
    	if(!$stmt = $conn->prepare($sql)) {
    	    $msg = "Prepare falhou: (" . $conn->errno . ") " . $conn->error;
	    	$erro = 1;
    	}
        
        if(!$stmt->bind_param("sssssi", $nome, $user, $pass, $end, $tel, $id)) {
    	    $msg =  "Binding parameters falhou: (" . $stmt->errno . ") " . $stmt->error;
    	    $erro = 1;
    	}
    					
    	if(!$stmt->execute()) {
    	    $msg =  "Execute falhou: (" . $stmt->errno . ") " . $stmt->error;
    	    $erro = 1;
    	}
    	if($stmt->affected_rows == 0) {
    	    $msg = $msg . ' Nenhum registro foi atualizado.';
    	    $erro = 1;
    	} else {
    	    if ($id == $_SESSION['id']) {
    	        $_SESSION['pass'] = $pass;
                $_SESSION['nome'] = $nome;
                $_SESSION['user'] = $user;
                $_SESSION['tel'] = $tel;
                $_SESSION['end'] = $end;
    	    }
    	}
        echo '<p>Query: ' . $stmt->fullQuery . '</p>';
        $stmt->close();
		$conn->close();
		
	    if($erro == 0) {
		    echo '<br><p class="text-center">Cadastro atualizado com sucesso!</p><br>';
		    if (isset($_SESSION['id']) && $_SESSION['id'] == 1) {
		        header('Location: cadastros.php');
		    } else {
		         header('Location: perfil.php');
		    }
	    } else {
		    echo '<br><p class="text-center"> Não foi possível realizar atualização de cadastro! ' . $msg . '</p><br>';
		    
		    echo '<p>ID:     ' . $_SESSION['id']    . '</p>' . 
		         '<p>PASS S: ' . $_SESSION['pass']  . '</p>' .
		         '<p>PASS P: ' . $pass              . '</p>' .
		         '<p>PASS O: ' . $oldpass           . '</p>' .
		         '<p>PASS N: ' . $newpass           . '</p>' .
		         '<p>PASS C: ' . $cnewpass          . '</p>' .
		         '<p>Nome:   ' . $_SESSION['nome']  . '</p>' .
		         '<p>USER:   ' . $_SESSION['user']  . '</p>' .
		         '<p>EMAIL:  ' . $_SESSION['email'] . '</p>' .
		         '<p>TEL:    ' . $_SESSION['tel']   . '</p>' .
		         '<p>END:    ' . $_SESSION['end']   . '</p>' .
		         '<p>MSG:    ' . $msg               . '</p>' .
		         '<p>Query:  ' . $query             . '</p>' ;
    	}
    }
?>
