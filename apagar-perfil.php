<?php
  include 'layouts/header.php';
  include 'layouts/menu.php';
  include 'con.php';
  
    function deletar($id) {
      
      $erro = 0;
      $msg = '';
      
      $conn = conexao();
      
       if($conn->connect_error) {
            die("Falha de conexão " . $conn->connect_error);
            $msg = '<br><p class="text-center">Erro ao realizar solicitação de exclusão de cadastro!</p><br>';
        } else {
            $sql = "DELETE FROM usuarios WHERE id = ?";
            
    	      if(!$stmt = $conn->prepare($sql)) {
    	        $msg = "Prepare falhou: (" . $conn->errno . ") " . $conn->error;
	    	      $erro = 1;
    	      }
    					
            if(!$stmt->bind_param('i', $id)) {
    	        $msg =  "Binding parameters falhou: (" . $stmt->errno . ") " . $stmt->error;
    	        $erro = 1;
    	      }
    					
    	      if(!$stmt->execute()) {
    	        $msg =  "Execute falhou: (" . $stmt->errno . ") " . $stmt->error;
    	        $erro = 1;
        	  }
        	
    	      if($stmt->affected_rows == 0) {
    	        $msg = $msg . " " . $stmt->affected_rows . " registro removido";
    	        $erro = 1;
    	      }
    	
            $stmt->close();
		        $conn->close();

            if(isset($_SESSION['id']) && $_SESSION['id'] == 1) {
                header('Location: cadastros.php');
            } else {
                header('Location: perfil.php');
            }
        }
    }
  
    if(isset($_SESSION['id']) && $_SESSION['id'] == 1) {
?>
<div class="container cadastro col-md-6">
	<form class="form-group" method="POST"  action="val-alteracao.php">
        <input  type="button" class="btn btn-danger" value="Excluir Cadastro" onClick="<?php deletar($_POST['xid']) ?>"> </input>
    </form>
</div>
<?php
    include 'layouts/footer.php';
    } else {
        header('Location: perfil.php');
    }
?>