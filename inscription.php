<?php
include("./bdd/connection_bdd.php");

if(isset($_POST['forminscription'])) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']);
    $date = htmlspecialchars($_POST['age']);

    if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
        if(strlen($pseudo) <= 255) {

            $reqpseudo = $bdd->prepare("SELECT pseudo FROM membres WHERE pseudo = ?");
            $reqpseudo->execute(array($pseudo));
            $pseudoexist = $reqpseudo->fetch();
            if($pseudoexist == 0) {
                if (strlen($_POST['mdp']) >= 8) {
                    $mdp = md5($_POST['mdp']);
                    $mdp2 = md5($_POST['mdp2']);
                    if ($mail == $mail2) {
                        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                            $reqmail = $bdd->prepare("SELECT mail FROM membres WHERE mail = ?");
                            $reqmail->execute(array($mail));
                            $mailexist = $reqmail->fetch();
                            if ($mailexist == 0) {
                                if ($mdp == $mdp2) {
                                    $aujourdhui = date("Y-m-d");
                                    $diff = date_diff(date_create($date), date_create($aujourdhui));
                                    $age = $diff->format('%y');
                                    if ($age >= 16) {
                                        $insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, mail, motdepasse, birthdate) VALUES(?, ?, ?, ?)");
                                        $insertmbr->execute(array($pseudo, $mail, $mdp, $date));
                                        header("Location: vgs-connect.php");
                                    } else {
                                        $erreur = 'Vous avez moins de 16 ans, inscription annulé !';
                                    }
                                } else {
                                    $erreur = "Vos mots de passes ne correspondent pas !";
                                }
                            } else {
                                $erreur = "Adresse mail déjà utilisée !";
                            }
                        } else {
                            $erreur = "Votre adresse mail n'est pas valide !";
                        }
                    } else {
                        $erreur = "Vos adresses mail ne correspondent pas !";
                    }

                } else {
                    $erreur = "Votre mot de passe doit faire au minimum 8 caractères !";
                }
            } else {
                $erreur = "Votre pseudo est déja utilisé! Veuillez le changer. Si c'est une erreur veuillez contacter l'administrateur !";
            }
        } else {
            $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
        }
    } else {
        $erreur = "Tous les champs doivent être complétés !";
    }
}

require 'complements/header.php';
?>

<html class="" id="toggle_page">
<head>
    <title>Inscription</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="img/vgs.png">
    <link rel="stylesheet" type="text/css" href="css/admin/upload.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script>
        codebinaire= 111111111111111111111;

        var myString = "somestring et test";
        var myNum =parseInt(codebinaire,2); /* 2913141654103084 */
        var binaire = myString.toString(2);
        console.log(myNum);
        console.log(binaire);


        var digit = parseInt(myString, 36);

        result = myNum.toString(36);

        console.log(result);
    </script>
</head>
<style>
    html{
        margin-top: 150px;
    }
</style>

<body>
<div align="center">
    <h2><u>Inscription :</u></h2>
    <br><br>
    <form method="POST" autocomplete="on">
        <table>
            <tr>
                <td align="right">
                    <label for="pseudo">Pseudo :</label>
                </td>
                <td>
                    <input class="text" autocomplete="off" type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" minlength="3" required />
                </td>
            </tr>
            <tr>
                <td align="right ">
                    <label for="mail">Mail :</label>
                </td>
                <td>
                    <input class="text" autocomplete="off" type="email" placeholder="Votre mail" id="mail" name="mail" required />
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="mail2">Confirmation du mail :</label>
                </td>
                <td>
                    <input class="text" autocomplete="off" type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2" required/>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="mdp">Mot de passe :</label>
                </td>
                <td>
                    <input class="text" autocomplete="off" type="password" minlength="8" placeholder="Votre mot de passe" id="mdp" name="mdp" required/>
                </td>
            </tr>
            <tr>
                <td></td>
                <td align="center">
                    <p class="note"><strong>Note : Votre mot de passe doit contenir au moins 8 caractères</strong></p>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="mdp2">Confirmation du mot de passe :</label>
                </td>
                <td>
                    <input class="text" autocomplete="off" type="password" minlength="8" placeholder="Confirmez votre mdp" id="mdp2" name="mdp2" required/>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="age">Date de naissance :</label>
                </td>
                <td>
                    <input class="text" type="date" id="dage" name="age" value="2020-01-01" min="1950-01-01" max="2050-12-31" required>
                </td>
            </tr>
        </table>
        <br><br>
        <input class="button" type="submit" name="forminscription" value="Inscription" />
    </form>

    <?php
    if(isset($erreur)) {
        echo '<font color="red">'.$erreur."</font>";
    }
    ?>
</div>

<br>
<div align="center" style="color: red;">
    <p><u>Si t'as déjà un compte clique <a style="color: darkred" href="vgs-connect.php">ici</a></u></p>
</div>
<?php require 'complements/footer.php'; ?>
<script type="text/javascript" src="js/toogle_theme.js"></script>
</body>
</html>
