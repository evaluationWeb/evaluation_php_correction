<?php
//demarrage la session
session_start();
//imports
include "utils/tools.php";
include "env.php";
include "utils/bdd.php";
include "model/book.php";
//test si l'utilisateur n'est pas connecté
if (!isset($_SESSION["connected"])) {
    header("Location: index.php");
}
//récupération de l'idUser
$idUser = $_SESSION["idUser"];
//récupération des livres de l'utilisateur
$books = findAllBook($idUser);

?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/pico.min.css">
    <link rel="stylesheet" href="public/style.css">
    <title>Liste des livres</title>
</head>

<body>
    <header class="container-fluid">
        <?php include "navbar.php"; ?>
    </header>
    <main class="container-fluid">
        <h2>Liste des livres</h2>
        <table class="striped">
            <thead data-theme="dark">
                <th>Title</th>
                <th>description</th>
                <th>Auteur</th>
                <th>Date de publication</th>
                <th>Categorie</th>
            </thead>
            <!-- Boucler sur le tableau de books -->
            <?php foreach ($books as $book): ?>
                <tr>
                    <td><?= $book["title"] ?> </td>
                    <td>
                        <?= $book["description"] ?>
                    </td>
                    <td>
                        <?= $book["author"] ?>
                    </td>
                    <td>
                        <?= $book["publication_date"] ?>
                    </td>
                    <td>
                        <?= $book["name"] ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </main>
</body>

</html>