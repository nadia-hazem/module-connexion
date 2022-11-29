<?php include 'header.php';?>
<?php include 'dbconnect.php';?>    <!--connexion à la base de données-->
<div class="container">
    <?php
        /* page: inscription.php */
        //par défaut, on affiche le formulaire
        $AfficherFormulaire=1;
        //traitement du formulaire:
        if(isset($_POST['login'],$_POST['password']) && isset($_POST['nom'],$_POST['prenom'])){
            $login = mysqli_real_escape_string($conn, htmlspecialchars($_POST['login']));
            $password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['password']));
            $nom = mysqli_real_escape_string($conn, htmlspecialchars($_POST['nom']));
            $prenom = mysqli_real_escape_string($conn, htmlspecialchars($_POST['prenom']));
            
            if($_POST['login'] = ""){
                echo "Le champ nom d'utilisateur est vide.";
            } elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM utilisateurs WHERE login='".$_POST['login']."'"))==1){//on vérifie que ce pseudo n'est pas déjà utilisé par un autre membre
                echo "Ce pseudo est déjà utilisé.";
            } elseif($_POST['password']== "" || $_POST['password2']== ""){
                echo "Le champs Mot de passe est vide.";
            } elseif ($_POST['password'] != $_POST['password2']) { 
                echo "Les mots de passe ne correspondent pas.";
            } else {
                //toutes les vérifications sont faites, on passe à l'enregistrement dans la base de données:
                //cryptage du mot de passe
                $password = password_hash($password, PASSWORD_DEFAULT);
                if(!mysqli_query($conn,"INSERT INTO utilisateurs (login, nom, prenom, password) values('".$login."', '".$nom."', '".$prenom."', '".$password."')")) {
                    echo "Une erreur s'est produite: ".mysqli_error($conn);
                } else {
                    echo "Vous êtes inscrit(e) avec succès!";
                    //on n'affiche plus le formulaire
                    $AfficherFormulaire=0;
                    header('Location: connexion.php');
                }
            }
            mysqli_close($conn);
        }
        if($AfficherFormulaire==1){
            ?>
            <div class="module">
                <br />
                <form method="post" action="">
                    Nom d'utilisateur (a-z0-9) : <input type="text" name="login">
                    <br />
                    Nom : <input type="text" name="nom">
                    <br />
                    Prénom : <input type="text" name="prenom">
                    <br />
                    Mot de passe : <input type="password" name="password">
                    <br />
                    Confirmez le mot de passe : <input type="password" name="password2">
                    <input type="submit" value="Inscription">
                </form>
            </div> <!-- /module -->

            <?php
        }
    ?>
</div>

<?php include 'footer.php';?>