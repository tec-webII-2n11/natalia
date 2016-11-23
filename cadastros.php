<?php
  include 'layouts/header.php';
  include 'layouts/menu.php';
  include 'con.php';
  
    if(isset($_SESSION['id']) && $_SESSION['id'] == 1) {
      
      $conn = conexao();
    
      if($conn->connect_error) {
        die("Falha de conexão " . $conn->connect_error);
        $msg = '<br><p class="text-center">Erro ao realizar solicitação de atualização de cadastro!</p><br>';
      } else {
        $sql = "SELECT id, nome, apelido, email, telefone, endereco FROM usuarios;";

    	if(!$stmt = $conn->prepare($sql)) {
    	    $msg = "Prepare falhou: (" . $conn->errno . ") " . $conn->error;
	    	$erro = 1;
    	}
    					
    	if(!$stmt->execute()) {
    	    $msg =  "Execute falhou: (" . $stmt->errno . ") " . $stmt->error;
    	    $erro = 1;
    	}
    	
      if (!$stmt->bind_result($id, $nome, $user, $email, $tel, $end)) {
        echo "Binding output parameters falhou: (" . $stmt->errno . ") " . $stmt->error;
      }

      echo
      '<div class="container horario">
        <table class="table table-striped">
          <thead>
            <h2 class="text-center">Cadastro de Usuários</h2>
          </thead>
          <tr>
            <td>ID</td>
            <td>Nome Completo</td>
            <td>Apelido</td>
            <td>E-mail</td>
            <td>Telefone</td>
            <td>Endereço</td>
            <td></td>
            <td></td>
          </tr>';
    
      while ($stmt->fetch()) {
        if ($id > 1) {
              echo '<form class="form-group" method="POST"  action="admin-perfil.php">';
            } else {
              echo '<form class="form-group" method="POST"  action="alterar-perfil.php">';
            }
?>
	        <input type="hidden" name="id"    value=" <?php echo $id;    ?> ">
	        <input type="hidden" name="nome"  value=" <?php echo $nome;  ?> ">
		      <input type="hidden" name="user"  value=" <?php echo $user;  ?> ">
		      <input type="hidden" name="email" value=" <?php echo $email; ?> ">
		      <input type="hidden" name="tel"   value=" <?php echo $tel;   ?> ">
		      <input type="hidden" name="end"   value=" <?php echo $end;   ?> ">
<?php
		      echo
          '<tr>
            <td>' . $id    . '</td>
            <td>' . $nome  . '</td>
            <td>' . $user  . '</td>
            <td>' . $email . '</td>
            <td>' . $tel   . '</td>
            <td>' . $end   . '</td>';
            if ($id != 1) {
            echo '<td><button type="submit" class="btn btn-default">Editar</button></td>
                  </form>';
            echo '<form class="form-group" method="POST"  action="apagar-perfil.php">';
?>
            <input type="hidden" name="xid" value="<?php echo $id;?>">
<?php
            echo '
                  <td><button type="submit" class="btn btn-danger">Deletar</button></td>
                  </form>';
            } else {
              echo '<td><button type="submit" class="btn btn-warning">Editar</button></td><td></td>
                  </form>';
            }
          echo
          '</tr>';
      }
      
      echo
        '</table>
      </div>';
    					
      $stmt->close();
		  $conn->close();
		
    }
   
 } else {
  if(!isset($_SESSION['id'])) {
    header('Location: ./home.php');
   } else {
     header('Location: ./perfil.php');
   }
 }
?>