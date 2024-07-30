<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Welcome, <?= $employee['name'] ?></h1>
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Employee Details</h5>
                <p class="card-text">Name: <?= $employee['name'] ?></p>
                <p class="card-text">Email: <?= $employee['email'] ?></p>
                
                <h5 class="card-title mt-4">Company Details</h5>
                <p class="card-text">Company: <?= $company['name'] ?></p>
                <p class="card-text">Address: <?= $company['address'] ?></p>
                <p class="card-text">Phone: <?= $company['phone'] ?></p>
            </div>
        </div>

        <div class="mt-5">
            <a href="<?= base_url('login/logout') ?>" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
