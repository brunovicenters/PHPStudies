<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms</title>
</head>

<body>
    <form action="" method="get">
        <label for="name">Name</label>
        <input type="text" name="name" id="name"> <br>
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email"> <br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>
<?php
// isset() verifies if exists --
if (isset($_GET['name']) && isset($_GET['email'])) {
    // It stores the $_GET value into a variable --
    $name = $_GET['name'];
    $email = $_GET['email'];
    echo "Nome: $name <br> E-mail: $email";
}
?>