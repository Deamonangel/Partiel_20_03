<?php
require_once 'C:/YNOV/PHP/Partiel_20_03/function/newsletter.php';
require_once 'C:/YNOV/PHP/Partiel_20_03/views/layout/header.php';

//------------------------------------------------------------------------
// Pour éviter les conflits(utf32_unicode), on met tout les champs null 
//---------------------------Début----------------------------------------
//------------------------------------------------------------------------
$insert = null;

if (!empty($_POST) && !empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['email'])) {
  $login = $_POST['login'];
  $password = $_POST['password'];
  $email = $_POST['email'];
}
?>

<h1>Nouvelle Utilisateurs</h1>
<!-------------------------------------------------------------------------->
<!----------------------Réception du Insert -------------------------------->
<!----------------Si valeur alors l'utilisateur = succès-------------------->
<!--------------------Sinon Une erreur est survenue------------------------->
<!-------------------------------------------------------------------------->
<?php if ($insert) { ?>
  <div class="alert alert-success" role="alert">
    L'Utilisateur a bien été enregistrée avec succès ! <a href="/">Retour à la liste</a>
  </div>
<?php } ?>

<?php if ($insert === false) { ?>
  <div class="alert alert-danger" role="alert">
    Une erreur est survenue
  </div>
<?php } ?>

<!-------------------------------------------------------------------------->
<!---------------------Formulaire New Utilisateur--------------------------->
<!---------------------------Méthode Post----------------------------------->
<!-------------------------------------------------------------------------->

<form method="POST">
    <div class="form-group">
    <label for="login">login</label>
    <input type="text" class="form-control" id="login" aria-describedby="emailHelp" placeholder="Enter your login">
  </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailmessage" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="active">
    <label class="form-check-label" for="exampleCheck1">active</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>



<?php require_once '../views/layout/footer.php'; ?>