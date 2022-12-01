<!--PROFIL PAGE-->
<?php include 'header.php';?>
<?php include 'dbconnect.php';?>

<?php
    $login = $_SESSION['login'];
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];
    $password = $_SESSION['password']; 
?>

<main>
    <div class="row">
        <div class="col flex2 mod">
            <div class="module2">
                <form action="" method="post">
                    <div class="row">
                        <h3>Modifier mon profil</h3>
                        <i class="fa-solid fa-2x fa-user-lock"></i>
                    </div>

                    <label>Nom d'utilisateur</label>
                    <input type="text" value="<?=$login?>" name="login" required>

                    <label>Nom</label>
                    <input type="text" value="<?=$nom?>" name="nom" required>

                    <label>Prénom</label>
                    <input type="text" value="<?=$prenom?>" name="prenom" required>

                    <label>Mot de passe</label>
                    <input type="password" placeholder="Saisissez mot de passe" name="password" required>

                    <input type="submit" name='submit' value="Valider" >
                    <input type="submit" name="delete" value="Supprimer mon compte" />
                </form>

            </div> <!-- /module2 -->

            <?php

            if(isset($_POST ['submit']) && isset ($_POST ['login']) && isset ($_POST ['password']) && isset ($_POST ['nom']) && isset ($_POST ['prenom'])){
                $nom = $_POST ['nom'];
                $prenom = $_POST ['prenom'];
                if (password_verify($_POST ['password'], $password)) {
                    $requete = "UPDATE utilisateurs SET login = '".$_POST ['login']."', nom = '".$nom."', prenom = '".$prenom."' WHERE login = '".$login."' ";
                    $resultat = mysqli_query($conn, $requete);
                    // stockage des nouvelles informations dans la session
                    $login = $_POST ['login'];
                    $_SESSION['login'] = $login;
                    $_SESSION['nom'] = $nom;
                    $_SESSION['prenom'] = $prenom;
                    $_SESSION['password'] = $password;
                    echo "Modification effectuée avec succès !";

                } else {
                    echo "<p style='color:red'>Mot de passe incorrect</p>";
                }
            }
            else if (isset($_POST['delete'])) {
                if (isset ($_POST ['password'])) {
                    if (password_verify($_POST['password'], $password)) {
                        $del = "DELETE FROM utilisateurs WHERE login = '$login'";
                        if ($result = mysqli_query($conn, $del)) {
                            echo "<b>Utilisateur supprimé</b>";
                            header('Location: index.php?deconnexion=true');
                        } else {
                            echo "<p style='color:red'>Erreur de suppression</p>";
                        }
                    } else {
                        echo "<p style='color:red'>Mot de passe incorrect</p>";
                    }
                } else {
                    echo "<p style='color:red'>Veuillez saisir votre mot de passe</p>";
                }
            }

            ?>
        </div> <!-- /col -->

        <div class="col flex2 mod">
            <div class="module2">
                <h2>Mon profil</h2>    
                <form action="" method="post">
                    <div class="row">
                        <h3>Changer de mot de passe</h3>
                        <i class="fa-solid fa-2x fa-lock"></i>
                    </div>
                    <label>Ancien mot de passe</label>
                    <input type="password" placeholder="Saisissez ancien mot de passe" name="oldpassword" required>
                    <label>Nouveau mot de passe</label>
                    <input type="password" placeholder="Saisissez nouveau mot de passe" name="password1" required>
                    <br />
                    <label>Confirmez le mot de passe</label>
                    <input type="password" name="password2">
                    <input type="submit" id='submit' value="Valider" >
                </form>
            </div> <!-- /module2 -->

            <?php

                if(isset ($_POST ['oldpassword']) && isset ($_POST ['password1']) && isset ($_POST ['password2'])){
                    $oldpassword = $_POST ['oldpassword'];
                    $password1 = $_POST ['password1'];
                    $password2 = $_POST ['password2'];

                    if (password_verify($oldpassword, $password)) {
                        if ($password1 == $password2) {
                            $password = password_hash($password1, PASSWORD_DEFAULT);

                            $requete = "UPDATE utilisateurs SET password = '".$password."' WHERE login = '".$login."' ";
                            $resultat = mysqli_query($conn, $requete);
                            // stockage des nouvelles informations dans la session
                            $_SESSION['password'] = $password;

                            echo "Mot de passe modifié avec succès";

                        }
                        else {
                            echo "<p style='color:red'>Les mots de passe ne correspondent pas</p>";
                        }
                    }
                    else {
                        echo "<p style='color:red'>L'ancien mot de passe est incorrect</p>";
                    }
                }
            ?>

        </div> <!-- /col -->
    </div> <!-- /row -->

</main>

<?php include 'footer.php';?>