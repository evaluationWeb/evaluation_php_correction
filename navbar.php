<nav>
    <ul>
        <!-- Menu commun -->
        <li><strong><a href="index.php" data-tooltip="Page Accueil">Accueil</a></strong></li>    
    </ul>
        <!-- Menu connecté -->
        <?php if (isset($_SESSION["connected"])) :?>
    <ul>
        <li><a href="showAllBook.php" data-tooltip="Profil">Liste des livres</a></li>
        <li><a href="addBook.php" data-tooltip="Profil">Ajouter un livre</a></li>
        <li><a href="deconnexion.php" data-tooltip="Déconnexion">deconnexion</a></li>
        <?php else : ?>
        <!-- Menu déconnecté -->
        <li><a href="register.php" data-tooltip="Créer un compte">Inscription</a></li>
        <li><a href="connexion.php" data-tooltip="Se connecter">Connexion</a></li>
        <?php endif ?>
    </ul>
</nav>
