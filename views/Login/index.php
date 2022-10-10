
<?php
include_once('../../php/routes/users.routes.php');

  if(isset($_POST['logar'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $result = $usuarios->login($email, $senha);
    if (isset($result)) {
      header('Location: /curso/views/CadastroRup');
    }
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles.css?v=2" type="text/css">
  <title>Login</title>
</head>
<body>
  <div id='container'>
    <div id='login_img'>
      <img src="../../php/assets/img/4957136.jpg" alt='Imagem de login' />
    </div>
    <div id='formLogin' >
      <form method="POST" >
        <div>
          <label>Email</label>
          <input type="text" name='email' />
        </div>
        <div>
          <label>Senha</label>
          <input type="password" name='senha' />
        </div>
        <button type="submit" name='logar'>Logar</button>
      </form>
    </div>
  </div>
</body>
</html>