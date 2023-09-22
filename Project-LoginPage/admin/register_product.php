<!DOCTYPE html>
<html lang="en">

<?php include "../template/head.php" ?>

<body>
    <h1 class="h1 text-center mt-3">Register Product</h1>
    <div class="container">
        <div class="row">
            <form action="" method="post" class="col-md-12">
                <label class="form-label col-md-12" for="name">Name:</label">
                    <input class="form-control col-md-12 mt-2 mb-3" type="text" name="name" id="name" required>
                    <label class="form-label col-md-12 mb-2" for="description">Description:</label>
                    <textarea class="form-control col-md-12 mt-2 mb-3" name="description" id="description" cols="30" rows="5" required></textarea>
                    <label class="form-label col-md-12" for="value">Value:</label>
                    <input class="form-control col-md-12 mt-2 mb-3" type="number" name="value" id="value" step="0.01" required>
                    <button type="submit" class="btn btn-success">Register</button>
            </form>
        </div>
    </div>
</body>

</html>

<?php
