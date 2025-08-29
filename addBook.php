<?php
//demarrage la session
session_start();
//imports
include "utils/tools.php";
include "env.php";
include "utils/bdd.php";
include "model/category.php";
include "model/book.php";
//Liste de category
$categories = findAllCategory();
//Appel de la méthode pour ajouter un compte
$message = addBook();
//Méthode pour ajouter un livre en BDD
function addBook(): string
{
    //test si l'utilisateur n'est pas connecté
    if (!isset($_SESSION["connected"])) {
        header("Location: index.php");
    }

    //Test si le formulaire est submit
    if (isset($_POST["submit"])) {
        //test si les champs sont remplis
        if (
            !empty($_POST["title"]) && !empty($_POST["description"]) && !empty($_POST["publication_date"])
            && !empty($_POST["author"]) && !empty($_POST["category"])
        ) {
            //récupération du user depuis la session
            $idUser = sanitize($_SESSION["idUser"]);
            //nettoyage des informations du livre (formulaire)
            $title = sanitize($_POST["title"]);
            $description = sanitize($_POST["description"]);
            $publicationDate = sanitize($_POST["publication_date"]);
            $author = sanitize($_POST["author"]);
            $category = sanitize($_POST["category"]);
            //Tableau du livre
            $book = [];
            $book["title"] = $title;
            $book["description"] = $description;
            $book["publicationDate"] = $publicationDate;
            $book["author"] = $author;
            $book["category"] = $category;
            $book["idUser"] = $idUser;
            saveBook($book);
            return "Le livre a été ajouté en BDD";
        } else {
            return "Veuillez remplir tous les champs du formulaire";
        }
    }
    return "";
}

?>


<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/pico.min.css">
    <link rel="stylesheet" href="public/style.css">
    <title>Ajouter un livre</title>
</head>

<body>
    <header class="container-fluid">
        <?php include "navbar.php"; ?>
    </header>
    <main class="container-fluid">
        <form action="" method="post" enctype="multipart/form-data">
            <h2>Ajouter un livre à la collection</h2>
            <p class="error"><?= $message ?? "" ?></p>
            <input type="text" name="title" placeholder="saisir le titre" require>
            <textarea name="description" rows="5" cols="30" placeholder="saisir la description du livre" require></textarea>
            <label for="publication_date">Saisir la date de publication du livre</label>
            <input type="date" name="publication_date" require>
            <input type="text" name="author" placeholder="saisir l'auteur du livre">
            <label for="category">Saisir la category du livre</label>
            <select name="category" require>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category["id_category"] ?>"><?= $category["name"] ?></option>
                <?php endforeach ?>
            </select>
            <input type="submit" value="Ajouter" name="submit">
        </form>
    </main>
</body>

</html>