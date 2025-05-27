<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .card {
            width: 100%;
            max-width: 400px;
        }
        .alert p:last-child {
            margin-bottom: 0;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm mx-auto">
                    <div class="card-header bg-success text-white text-center">
                        <h4 class="mb-0">Register</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="register_db.php" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password_1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password_1" name="password_1" required>
                            </div>
                            <div class="mb-3">
                                <label for="password_2" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="password_2" name="password_2" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" name="reg_user" class="btn btn-success">Register</button>
                            </div>
                            <p class="mt-3 mb-0 text-center">Already a member? <a href="login.html">Sign in</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>