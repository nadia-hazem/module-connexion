<!--INDEX PAGE-->
<?php include 'header.php';?>

    <div class="container bw">
        <h1>CODER UN MODULE DE CONNEXION PHP/SQL</h1>
        <div class="row center wrap">
            <div class="col center flex2">
                <img src="img/module.jpg" alt="module de connexion" width="350px">
            </div> <!-- /col -->

            <div class="col center flex2">
                <ul class="f20">
                    <li><i class="fa-solid fa-circle-right"></i> Créer une base de données</li>
                    <li><i class="fa-solid fa-circle-right"></i> Créer une page d'accueil</li>
                    <li><i class="fa-solid fa-circle-right"></i> Créer une table utilisateurs</li>
                    <li><i class="fa-solid fa-circle-right"></i> Créer un utilisateur (admin)</li>
                    <li><i class="fa-solid fa-circle-right"></i> Créer un formulaire d'inscription</li>
                    <li><i class="fa-solid fa-circle-right"></i> Créer un formulaire de connexion</li>
                    <li><i class="fa-solid fa-circle-right"></i> Créer un formulaire de modification de profil</li>
                    <li><i class="fa-solid fa-circle-right"></i> Créer une page admin (contenu de la BDD)</li>
                </ul>
            </div> <!-- /col -->
        </div> <!-- /row -->    
    </div> <!-- /container -->

    <main>        
        <div class="row wrap">
            <div class="col flex2">
                <em>Cliquez sur les pages pour visualiser le code source</em>
                <h2>PAGES IMPOSEES</h2>
                <div class="row wrap">
                    <a href="index_source.php" class="card"><i class="fa-solid fa-magnifying-glass-arrow-right"></i> index.php</a>
                    <a href="inscription_source.php" class="card"><i class="fa-solid fa-magnifying-glass-arrow-right"></i> inscription.php</a>
                    <a href="profil_source.php" class="card"><i class="fa-solid fa-magnifying-glass-arrow-right"></i> profil.php</a>
                    <a href="connexion_source.php" class="card"><i class="fa-solid fa-magnifying-glass-arrow-right"></i> connexion.php</a>
                    <a href="admin_source.php" class="card"><i class="fa-solid fa-magnifying-glass-arrow-right"></i> admin.php</a>
                    <a href="style_source.css" class="card"><i class="fa-solid fa-magnifying-glass-arrow-right"></i> style.css</a>
                    <a href="sql_source.sql" class="card"><i class="fa-solid fa-magnifying-glass-arrow-right"></i> moduleconnexion.sql</a>
                </div> <!-- /row -->
                <h2>PAGES AJOUTEES</h2>
                <div class="row wrap">
                    <a href="header_source.php" class="card"><i class="fa-solid fa-magnifying-glass-arrow-right"></i> header.php</a>
                    <a href="footer_source.php" class="card"><i class="fa-solid fa-magnifying-glass-arrow-right"></i> footer.php</a>
                    <a href="verification_source.php" class="card"><i class="fa-solid fa-magnifying-glass-arrow-right"></i> verification.php</a>
                    <a href="dbconnect_source.php" class="card"><i class="fa-solid fa-magnifying-glass-arrow-right"></i> dbconnect.php</a>
                </div> <!-- /row -->
                <div class="col pan">
                    <ul>
                        <h3>BONUS</h3>
                        <li><i class="fa-solid fa-plus"></i> Chiffré le mot de passe</li>
                        <li><i class="fa-solid fa-plus"></i> Permis la modification de mot de passe</li>
                        <li><i class="fa-solid fa-plus"></i> Permis la suppression de compte</li>
                        <li><i class="fa-solid fa-plus"></i> externalisé : <br>- le header <br>- le footer <br>- la connexion BDD <br>- les codes sources</li>
                    </ul>
                </div> <!-- /col -->
            </div> <!-- /col -->
            <div class="col flex2">
                <ul class="f20">
                    <h2>CONSIGNES</h2>
                    <li><i class="fa-solid fa-thumbtack"></i> Champs de formulaire : <br>ID, login, nom, prénom, password</li><br>
                    <li><i class="fa-solid fa-thumbtack"></i> Accorder tous les droits à l'utilisateur admin</li><br>
                    <li><i class="fa-solid fa-thumbtack"></i> Ajouter une confirmation de mot de passe</li><br>
                    <li><i class="fa-solid fa-thumbtack"></i> insérer les nouvelles données et modifications dans la BDD</li><br>
                    <li><i class="fa-solid fa-thumbtack"></i> Créer une page admin.php accessible uniquement à l'utilisateur admin</li><br>
                    <li><i class="fa-solid fa-thumbtack"></i> Afficher les informations de tous les utilisateurs dans la page admin.php</li><br>
                    <li><i class="fa-solid fa-thumbtack"></i> Rediriger l'utilisateur vers la page connexion.php après inscription</li><br>
                    <li><i class="fa-solid fa-thumbtack"></i> Permettre à l'utilisateur de modifier ses données de profil et les updater dans la bdd</li><br>
                </ul>
                
            </div> <!-- /col -->
        </div> <!-- /row -->
    </main>

<?php include 'footer.php';?>
