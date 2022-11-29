<?php include 'header.php';?>
<?php include 'dbconnect.php';?>
<?php
    $login = $_SESSION['login'];
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];
    $password = $_SESSION['password']; 
?>

<div class="module">
    <form action="" method="post">
    <p>Votre profil</p>

        <label><b>Nom d'utilisateur</b></label>
        <input type="text" value="<?=$login?>" name="login" required>

        <label><b>Nom</b></label>
        <input type="text" value="<?=$nom?>" name="nom" required>

        <label><b>Prénom</b></label>
        <input type="text" value="<?=$prenom?>" name="prenom" required>

        <label><b>Mot de passe</b></label>
        <input type="password" placeholder="Saisissez mot de passe" name="password" required>

        <input type="submit" id='submit' value="Valider" >
    </form>
</div>
<?php
    var_dump($_POST);
if(isset ($_POST ['login']) && isset ($_POST ['password']) && isset ($_POST ['nom']) && isset ($_POST ['prenom'])){
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
        header('Location: profil.php');
    } else {
        echo "Mot de passe incorrect";
    }
}
?>
<div class="module">
    <form action="" method="post">
        <h3>Changer de mot de passe</h3>
        <label>Ancien mot de passe</label>
        <input type="password" placeholder="Saisissez ancien mot de passe" name="oldpassword" required>
        <label><b>Nouveau mot de passe</b></label>
        <input type="password" placeholder="Saisissez nouveau mot de passe" name="password1" required>
        <br />
        <label>Confirmez le mot de passe : </label>
        <input type="password" name="password2">
        <input type="submit" id='submit' value="Valider" >
    </form>
</div>

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
            header('Location: profil.php');
        }
        else {
            echo "Les mots de passe ne correspondent pas";
        }
    }
    else {
        echo "L'ancien mot de passe est incorrect";
    }
}
?>

<?php include 'footer.php';?>