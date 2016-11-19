<?php
    $user = strip_tags(trim($_POST["user"]));
    $pass = strip_tags(sha1($_POST["pass"]));
    
    $erro = 0;
    $msg = '';
    
    include 'con.php';
    
    session_start();
    
    $conn = conexao();
    
    if($conn->connect_error) {
        die("Falha de conexão " . $conn->connect_error);
        echo '<br><p class="text-center">Erro ao realizar login!</p><br>';
    } else {
        $sql = "SELECT * FROM usuarios WHERE apelido = ?";
        
        if(!$stmt = $conn->prepare($sql)) {
            $msg = "Prepare falhou: (" . $conn->errno . ") " . $conn->error;
            $erro = 1;
    	}
    	
    	if(!$stmt->bind_param("s", $user)) {
    	    $msg =  "Binding parameters falhou: (" . $stmt->errno . ") " . $stmt->error;
    	    $erro = 1;
    	}
    	
    	if(!$stmt->execute()) {
    	    $msg =  "Execute falhou: (" . $stmt->errno . ") " . $stmt->error;
            $erro = 1;
    	}
    	
    	if(!($res = $stmt->get_result())) {
            $msg = "Falha ao obter resultados: (" . $stmt->errno . ") " . $stmt->error;
            $erro = 1;
    	} else {
    	    $row = $res->fetch_assoc();
    	    
    	    if($pass == $row['senha']) {
    	    
    	        $_SESSION['id']    = $row['id'];
                $_SESSION['nome']  = $row['nome'];
                $_SESSION['user']  = $row['apelido'];
                $_SESSION['end']   = $row['endereco'];
                $_SESSION['tel']   = $row['telefone'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['pass'] = $row['senha'];
    	    } else {
    	        include 'login.php';
    	        echo '<br><p class="text-center"> Usuário ou senha inválido!</p><br>';
    	        exit;
    	    }
    	    
        $stmt->close();
		$conn->close();
        
		if($erro == 0) {
		        if ($_SESSION["id"] != 1) {
                    header('Location: perfil.php');    
                } else {
                    header('Location: cadastros.php');
                }
		    } else {
		        include 'login.php';
		    	echo '<br><p class="text-center"> Erro ao realizar login! ' . $msg . '</p><br>';
		    }
		}
    }
?>