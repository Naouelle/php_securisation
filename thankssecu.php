<!DOCTYPE html>
<html lang=fr>
<head>
    <meta charset="UTF-8">
    <title>thanks</title>
</head>
<body>



<?php



       echo 'Merci ' . $_POST['name'] . " " . $_POST['first_Name'] .' de nous avoir contacté à propos de ' . $_POST['subject']. '.'

        . 'Un de nos conseiller vous contactera soit à l adresse ' . $_POST['mail'] .' ou par téléphone au ' . $_POST['phone'].' dans les plus brefs délais pour traiter votre demande: ' . $_POST['message'];
?>