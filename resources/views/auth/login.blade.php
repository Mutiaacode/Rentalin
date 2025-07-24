<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Rentalin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        .register-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .register-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            padding: 40px;
        }

        .brand {
            text-align: center;
            margin-bottom: 40px;
        }

        .brand h1 {
            font-size: 28px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 8px;
        }

        .brand p {
            color: #6c757d;
            font-size: 14px;
            margin: 0;
        }

        .form-control {
            border: 1px solid #dee2e6;
            border-radius: 6px;
            padding: 12px 16px;
            font-size: 15px;
            margin-bottom: 16px;
            transition: border-color 0.15s ease-in-out;
        }

        .form-control:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.1);
        }

        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
            border-radius: 6px;
            padding: 12px;
            font-size: 15px;
            font-weight: 500;
            width: 100%;
            margin-top: 8px;
        }

        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }

        .login-link {
            text-align: center;
            margin-top: 24px;
            padding-top: 24px;
            border-top: 1px solid #e9ecef;
        }

        .login-link a {
            color: #3498db;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .form-label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 6px;
        }
    </style>
</head>

<body>
    <div class="register-container">
        <div class="register-card">
            <div class="brand">
                <h1><i class="fas fa-car me-2"></i>Rentalin</h1>
                <p>Daftar untuk memulai</p>
            </div>

            <form action="/login" method="POST">
                @csrf



                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                        placeholder="nama@email.com" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Minimal 8 karakter" required>
                </div>
                <div class="mb-3">


                    <button type="submit" class="btn btn-primary">
                        Masuk
                    </button>
            </form>

            <div class="login-link">
                <p class="mb-0 text-muted">Belum punya akun? <a href="/register">Register disini</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
