<?php
require_once __DIR__ .'/db.php';

/** 
 * @var string $active "all"|"active"|"not_active"
 * @return void
 */
//------------------------------------------------------------------------
// la fonction getUsers va servire a mettre en forme le container/tableau 
// pour les administrateurs qui pourront modifier les utilisateurs simples
//avec une fonction search par login
//---------------------------Début----------------------------------------
//------------------------------------------------------------------------
function getUsers(string $active, ?string $search = null): array
{
  $pdo = getPdo();
  $query = "SELECT * FROM users";

  if ($active == "active") {
    $query .= " WHERE active = 1";
  }

  if ($active == 'not_active') {
    $query .= " WHERE active = 0";
  }

  if ($search !== null) {
    $query = $query . " AND nom LIKE :search";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['search' => "%$search%"]);
  } else {
    $stmt = $pdo->query($query);
  }
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
//------------------------------------------------------------------------
//------------------------------FIN---------------------------------------
//------------------------------------------------------------------------

/**
 * Récupère un nouvelle utilisateur sous forme de tableau ASSOC
 *
 * @param integer $id
 * @return array
 */
//------------------------------------------------------------------------
// Function qui créer un utilisateur avec un requête préparer 
//---------------------------Début----------------------------------------
//------------------------------------------------------------------------
function insertUsers(string $login, string $password, string $email, bool $active): bool{
  $pdo = getPdo();

  $query = "INSERT INTO users (login, password, email, active) VALUES (:nom, :password, :email, :active)";
  $stmt = $pdo->prepare($query);
  return $stmt->execute([
    'nom' => $login,
    'password' => $password,
    'email' => $email,
    'active' => $active
  ]);
//------------------------------------------------------------------------
//------------------------------FIN---------------------------------------
//------------------------------------------------------------------------
}
?>