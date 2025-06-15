<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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
    </style>
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm mx-auto">
                    <div class="card-header bg-success text-white text-center">
                        <h4 class="mb-0">Forgot Password</h4>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    {{ $errors->first() }}
                                </div>
                            @endif

                            @if(session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" value="{{ old('email') }}" class="form-control" id="email" name="email" required autofocus>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success">Send Reset Link</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>