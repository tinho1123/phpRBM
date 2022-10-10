<?php
require_once('../../php/routes/rup.routes.php');
$dadosRup = $rups->read();


if(isset($_POST['excluir'])) {
  $rups->delete();
  header('Location: /curso/views/ViewRup/');
}

if(isset($_POST['enviar_edit'])) {
    $rups->update();
    header('Location: /curso/views/ViewRup/');
}

if(isset($_POST['voltar'])) {
  header('Location: /curso/views/CadastroRup');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles.css?v=2" type="text/css">
  <title>Ver RUP</title>
</head>
<body>
  <form method="POST" enctype="multipart/form-data">
  <button type="submit" name='voltar' id='voltar'>Voltar</button>
  <div id='table_form'>
    <h1>RUP</h1>
    <table border="1">
          <thead name='test'>
              <tr>
                  <th name='asdasdsa'>Nome</th>
                  <th>Email</th>
                  <th colspan="2">Ações</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach ($dadosRup as $dado) : ?>
                  <tr>
                      <td><?= $dado->nome ?></td>
                      <td><?= $dado->email ?></td>
                    <td id='editar'><button type="submit" name='editar' value=<?= "$dado->cpf_cnpj" ?> >Editar</button></td>
                      <td id='excluir'><button type="submit" name='excluir' value=<?= "$dado->cpf_cnpj" ?> >Excluir</button></td>
                  </form>
                  </tr>
              <?php endforeach; ?>
          </tbody>
      </table>
    </div>
    </form>

    <?php 
    if(isset($_POST['editar'])) {
      $dado = $rups->readOne();

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
                <label>Nome</label>
                <input type='text' value='$dado->nome' name='nome' />
                <label>Data de Nascimento</label>
                <input type='text' value='$dado->data_nascimento' name='data_nascimento' />
                <label>Mensagem</label>
                <input type='text' value='$dado->mensagem' name='mensagem' />
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