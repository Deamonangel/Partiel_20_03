<?php
require_once 'C:/YNOV/PHP/Partiel_20_03/function/newsletter.php';
require_once 'C:/YNOV/PHP/Partiel_20_03/views/layout/header.php';
?>

<h1>Editer un utilisateur</h1>

<!-- check Id -->
<?php if (!isset($_GET['id'])) { ?>
  <div class="alert alert-danger" role="alert">
    Paramètre manquant : id
  </div>
  <?php
  exit;
}
?>
<!--A FAIRE: Condition pour le ID(check); update; +update en cas d'erreur, +autre formulaire methode POST -->
<?php
require_once 'C:/YNOV/PHP/Partiel_20_03/views/layout/footer.php';