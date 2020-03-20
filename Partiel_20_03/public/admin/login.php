<?php
require_once 'C:/YNOV/PHP/Partiel_20_03/function/db.php';
require_once 'C:/YNOV/PHP/Partiel_20_03/function/utilis.php';

$pdo = getPdo();
$login = ""; 
$error = false;
//------------------------------------------------------------------------
//---------------If permet de vérifier qu'il y du contenu-----------------
//------------------------------------------------------------------------
if (!empty($_POST['login']) && !empty($_POST['password'])) {
  session_start();
  $login = $_POST['login']; 
  $password = $_POST['password'];
 //------------on passe login en paramètre--------------------------------
  $query = "SELECT * FROM users WHERE login = :login";
  $stmt = $pdo->prepare($query);
  $stmt->execute([
    'login' => $login
  ]);
 //----------------------Puis on vérifie le mdp en sachant que la session est ouverte------------------------------------------
 //----------------------Si les mdp corresponds alors on est rediriger sur admin-----------------------------------------------
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($row && password_verify($password, $row['password'])) {
    $_SESSION['state'] = 'connected';
    $_SESSION['user_id'] = $row['ID'];
    redirect('/admin');
  } else {
    $error = true;
  }
}
require_once 'C:/YNOV/PHP/Partiel_20_03/views/layout/header.php';
?>

<h1>Connexion</h1>
<h4>Identifiez-vous pour accéder à l'administration</h4>
<!---------------------------Deuxième chance--------------------------------------------->
<?php if ($error) { ?>
  <div class="alert alert-danger" role="alert">
    Les informations fournies n'ont pas permis de vous identifier
  </div>
<?php } ?>
<!------------------------formulaire pour admin------------------------------------------>
<form method="POST">
  <div class="form-group">
    <label for="login">Login</label>
    <input type="text" class="form-control" id="login" name="login" placeholder="Login..." value="<?php echo $login; ?>" />
  </div>
  <div class="form-group">
    <label for="password">Mot de passe</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe..." />
  </div>
  <button type="submit" class="btn btn-primary">Connexion</button>
</form>

<?php require_once 'C:/YNOV/PHP/Partiel_20_03/views/layout/footer.php'; ?>