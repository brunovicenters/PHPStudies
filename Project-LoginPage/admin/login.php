<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="h2 text-center mb-5">Login do Administrador</h2>
                <form action="process_login.php" method="post" class="col-md-12">
                    <label class="form-label col-md-12" for="user">User:</l class="form-label">
                        <input class="form-control col-md-12 mt-2 mb-3" type="text" name="user" id="user" required>
                        <label class="form-label col-md-12 mb-2" for="password">Password:</label>
                        <input class="form-control col-md-12 mt-2 mb-3" type="password" name="password" id="password" required>
                        <button type="submit" class="btn btn-success">Login</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>

<?php

?>