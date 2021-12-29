<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="icon" href="public/img/brain.png">
    <title>SuperQuiz -  Tintin</title>
    <script src="public/js/hideNavbar.js"></script>
</head>

<body>
<?php require ("navbar.php"); ?>
<?php
echo '<form method="get" action="index.php?page=quiz&" >';
echo "<fieldset><legend>Question n° <B>" . $nq . "</b> - Votre score actuel : <b>" . $score . " / ".($nq - 1) ."</B></legend>\n";
echo "<table><tr>";
echo "<th>" . $resultat['question'] . "</th>\n";  // question
echo "<tr><td><input type=\"radio\" name=\"rep\" value=\"1\"checked=\"checked\">"  . $resultat['r1'] . "</td></tr>\n";
echo "<tr><td><input type=\"radio\" name=\"rep\" value=\"2\">" . $resultat['r2'] . "</td></tr>\n";
echo "<tr><td><input type=\"radio\" name=\"rep\" value=\"3\">" . $resultat['r3'] . "</td></tr>\n";
echo "<tr><td><input type=\"radio\" name=\"rep\" value=\"4\">" . $resultat['r4'] . "</td></tr>\n";
echo "<tr><td><input type=\"submit\" Value=\"GO\" ></td></tr>\n";
echo "</table>";
echo "</fieldset></form>";
$_SESSION["ok"] = $resultat['reponse'];  //memo de la bonne réponse
?>
</body>
</html>