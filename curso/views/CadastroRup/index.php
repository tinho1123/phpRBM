<!DOCTYPE html>
<html lang="en">
<?php 
require_once('../../php/routes/rup.routes.php');
require_once('../../php/routes/estados.routes.php');

$consulta = $estados->read();

        if (isset($_POST['criar_rup'])) {
          $rups->create();
          header('Location: /curso/views/CadastroRup/');
        }  

        if (isset($_POST['ver_rup'])) {
            header('Location: /curso/views/ViewRup/');
          }  

          if (isset($_POST['ver_empresas'])) {
            header('Location: /curso/views/VerEmpresa/');
          } 
          
          if(isset($_POST['deslogar'])) {
            header('Location: /curso/views/Login/');
          }
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css?v=2" type="text/css">
    <title>Cadastro de RUP</title>
</head>

<body>
    <div id='content'>
        <div id='rup_img'>
            <img src="../../php/assets/img/horizontal-shot-of-pretty-dark-skinned-woman-with-afro-hairstyle-has-broad-smile-white-teeth-shows-something-nice-to-friend-points-at-upper-right-corner-stands-against-wall.jpg"/>
        </div>
        <div id='rup_form'>
            <form id="contact_form" method="POST" enctype="multipart/form-data">
            <button type="submit" name='deslogar' id='deslogar' >Deslogar</button>
            <h1>Cadastro RUP</h1>
                <div id='form'>
                    <div class="row">
                        <label class="required" for="email">CPF/CNPJ:</label><br />
                        <input id="email" class="input" name="cpfcnpj" type="text" value="" size="30" /><br />
                    </div>
                    <div class="row">
                        <label class="required" for="name">Nome:</label><br />
                        <input id="name" class="input" name="name" type="text" value="" size="30" /><br />
                    </div>
                    <div class="row">
                        <label class="required" for="email">E-mail:</label><br />
                        <input id="email" class="input" name="email" type="text" value="" size="30" /><br />
                    </div>
                    <div class="row">
                        <label class="required" for="email">Idade:</label><br />
                        <input id="email" class="input" name="idade" type="text" value="" size="30" /><br />
                    </div>
                    <div class="row">
                        <label class="required" for="email">Nascimento:</label><br />
                        <input id="email" class="input" name="nascimento" type="text" value="" size="30" /><br />
                    </div>
                    <div class="row">
                        <label class="required" for="email">UF:</label><br />
                        <select name="uf" id="uf">
                            <?php foreach ($consulta as $uf) { ?>
                                <option value='<?= $uf->uf ?>'><?php echo $uf->uf ?></option>
                            <?php } ?>
                        </select>
                        <br />
                    </div>
                    <div class='row'>
                        <label class='required' for='email'>Sexo:</label><br />
                        <select name='sexo' id='sexo'>
                            <option value='M'>Masculino</option>
                            <option value='F'>Feminino</option>
                        </select>
                    </div>
                    <div class="row">
                        <label class="required" for="message">Mensagem:</label><br />
                        <textarea id="message" class="input" name="message" rows="7" cols="30"></textarea><br />
                    </div>

                    <button id="submit_button" type="submit" value="Enviar" name='criar_rup'>Enviar</button>

                    <button type="submit" name='ver_rup'>Ver RUP</button>
                    <button type="submit" name='ver_empresas'>Ver empresas</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>