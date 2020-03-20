<?php
require_once '../../functions/utils.php';
// Vérification de la connexion avant même toute sortie de code (require, doctype, etc...)
session_start();
if(isset($_SESSION['state']) && $_SESSION["state"] == "connected") {
  echo "Vous êtes connecté";
} else {
  redirect('/admin/login.php');
}

require_once '../../functions/voitures.php';
require_once '../../views/layout/header.php';


//pense bête: ajouter le active pour les admins 
$active = $_GET['active'] ?? "all";
$users = getUsers($active);
?>


<form>
  <div class="form-group">
    <label for="active">Filtrer</label>
    <select class="form-control" id="active" name="active">
      <option value="all" <?php if ($active == "all") { ?>selected="selected" <?php } ?>>
        All users
      </option>
      <option value="active" <?php if ($active == "active") { ?>selected="selected" <?php } ?>>
        Users with subscribe
      </option>
      <option value="not_active" <?php if ($active == "not_active") { ?>selected="selected" <?php } ?>>
       Users without subscribe
      </option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Aply</button>
</form>

<table class="table"> <!-- On fait une table qui range par collone ID,login,password,email,active -->
  <thead>
    <tr>
      <th></th>
      <th scope="col">ID</th>
      <th scope="col">login</th>
      <th scope="col">Password</th>
      <th scope="col">email</th>
      <th scope="col">active</th>
    </tr>
  </thead>
  <tbody>
<!-- foreach nous permets de parcourir TOUT les utilisateurs puis on les "range" selon l'ID et les autres données -->
    <?php foreach ($users as $users) { ?>
      <tr>
        <td><a href="/admin/edit.php?id=<?php echo $users['ID']; ?>" class="btn btn-warning">Editer</a></td>
        <td><?php echo $users['ID']; ?></td>
        <td><?php echo $users['Login']; ?></td>
        <td><?php echo $users['Password']; ?></td>
        <td><?php echo $users['email']; ?></td>
        <td>
        </td>
<!--Pense bête: afficher si il sont abonnées avec un button/span -->
      </tr>
    <?php } ?>
  </tbody>
</table>





<?php require_once '../../views/layout/footer.php';