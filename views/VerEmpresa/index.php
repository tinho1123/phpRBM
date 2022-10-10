<?php
require_once('../../php/routes/empresas.routes.php');
  $empresas_read = $empresas->read();
 if(isset($_POST['voltar'])) {
  header('Location: /curso/views/CadastroRup/');
 }

 if(isset($_POST['excluir'])) {
  $empresas->delete();
 }

 if(isset($_POST['enviar_edit'])) {
  $empresas->update();
  header('Location: /curso/views/VerEmpresa/');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles.css" type="text/css">
  <title>Cadastrar Empresa</title>
</head>
<body>
  <form method="POST" enctype="multipart/form-data">
  <button type="submit" name='voltar' id='voltar'>Voltar</button>
  <div id='table_form'>
    <h1>Empresas</h1>
      <table border="1">
          <thead name='test'>
              <tr>
                  <th name='asdasdsa'>Nome</th>
                  <th>Email</th>
                  <th colspan="2">Ações</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach ($empresas_read as $dado) : ?>
                  <tr>
                      <td><?= $dado->razao_social ?></td>
                      <td><?= $dado->email ?></td>
                      <td><button type="submit" name='editar' value=<?= "$dado->id" ?> >Editar</button></td>
                      <td><button type="submit" name='excluir' value=<?= "$dado->id" ?> >Excluir</button></td>
                  </form>
                  </tr>
              <?php endforeach; ?>
          </tbody>
      </table>
    </div>
    </form>

    <?php 
    if(isset($_POST['editar'])) {
      $dado = $empresas->readOne();

      if(isset($_POST['fechar'])) {
        header('Location: /curso/views/ViewRup');
      }
      echo "
      <div id='modal-overlay'>
        <div id='modal'>
        <form method='POST'>
        <div id='modal_header'>
                <label>Editar cliente</label>
                <button id='fechar' type='submit' name='fechar'>X</button>
            </div>
            <div id='modal_form'>
                <label>Razão Social</label>
                <input type='text' value='$dado->razao_social' name='razao_social' />
                <label>Fundação</label>
                <input type='text' value='$dado->fundacao' name='fundacao' />
                <label>Data_abertura</label>
                <label>$dado->data_abertura</label>
                <button type='submit' id='modal_enviar_form' name='enviar_edit' value='$dado->id'>Enviar</button>
            </div>
            </form>
        </div>
      </div>
      ";
    }
    ?>
</body>
</html>