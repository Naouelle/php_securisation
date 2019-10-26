<!DOCTYPE HTML>
<html>

    <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Formulaire</title>

    </head>
    <body>


<?php
$nameErr = $first_NameErr = $emailErr = $phoneErr = $messageErr = $subjectErr = "";
$name = $first_NameErr = $email = $phone = $message = $subject = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["name"]))) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }
    if (empty(trim($_POST["first_Name"]))) {
        $first_NameErr = "first_Name is required";
    } else {
        $first_Name = test_input($_POST["first_Name"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$first_Name)) {
            $first_NameErr = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
    if (empty($_POST['subject'])){
        $subjectErr = "Please select a subject";
    }
    if (empty($_POST["message"])) {
        $messageErr = "Enter a message please";
    } else {
        $message = test_input($_POST["message"]);
    }
    if (empty($_POST["phone"])) {
        $phoneErr = "Phone number is required";
    } else {
        $phone = test_input($_POST["phone"]);
    }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

echo $name;
echo "<br>";
echo $first_Name;
echo "<br>";
echo $email;
echo "<br>";
echo $phone;
echo "<br>";
echo $message;

?>


    <form action="thankssecu.php"  method="post">
        <p>
        <label  for="name">Nom :</label>
        <input  type="text"  id="name"  name="name" value="<?php if (isset($_POST['name'])) { echo $_POST['name' ];} ?>" required>
            <span class="error"><?php echo $nameErr;?></span>
        </p>

        <p>
        <label for="first_Name">Prénom :</label>
        <input type="text" id="first_Name" name="first_Name" value="<?php if (isset($_POST['first_Name'])) { echo $_POST['first_Name' ];} ?>" required>
            <span class="error"><?php echo $first_NameErr; ?></span>
        </p>

        <p>
        <label for="subject">Sélectionner votre sujet
            <select name="subject" id="subject">
            <option value="choix 2">choix 1</option>
            <option value="choix 2">choix 2</option>
            <option value="choix 3">choix 3</option>
            </select>
            <span class="error"><?php echo $subjectErr; ?></span>
        </label>
        </p>

        <p>
        <label  for="email">Email :</label>
        <input  type="email"  id="courriel"  name="email" value="<?php if (isset($_POST['email'])) { echo $_POST['email' ];} ?>"required>
            <span class="error"><?php echo $emailErr;?></span>
        </p>

        <p>
        <label for="phone">téléphone</label>
        <input type="tel" id="phone" name="phone" value="<?php if (isset($_POST['phone'])) { echo $_POST['phone' ];} ?>"
               pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" required>
            <span class="error"><?php echo $phoneErr;?></span>
        </p>

        <p>
        <label for="message">Message</label>
        <textarea id="message" name="message" value="<?php if (isset($_POST['message'])) { echo $_POST['message'];} ?>"required></textarea>
            <span class="error"><?php echo $messageErr;?></span>
        </p>

        <input type="submit" value="Envoyer">

    </form>
    </body>
</html>
