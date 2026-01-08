<!doctype html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Admin Login | OutfiTR</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/inter@5.0.0/index.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />

  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f3f4f6;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-card {
      width: 100%;
      max-width: 400px;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
      padding: 2rem;
      border: 1px solid #e5e7eb;
    }

    .btn-primary {
      background-color: #111827;
      border-color: #111827;
      padding: 0.75rem;
    }

    .btn-primary:hover {
      background-color: #000;
    }

    .form-control {
      padding: 0.75rem;
      border-radius: 6px;
    }
  </style>
</head>

<body>
  <div class="login-card">
    <div class="text-center mb-4">
      <h1 class="h3 fw-bold mb-1">Admin Panel</h1>
      <p class="text-secondary small">Sign in to manage your store</p>
    </div>

    <form action="<?= base_url('/admin/login') ?>" method="post">
      <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger text-center small py-2 mb-3">
          <?= session()->getFlashdata('error') ?>
        </div>
      <?php endif ?>

      <div class="mb-3">
        <label class="form-label small fw-bold text-secondary">Email Address</label>
        <input type="email" class="form-control" name="email" required placeholder="admin@example.com" />
      </div>

      <div class="mb-4">
        <label class="form-label small fw-bold text-secondary">Password</label>
        <input type="password" class="form-control" name="password" required placeholder="••••••••" />
      </div>

      <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary fw-bold">Sign In</button>
      </div>

      <!-- Remove Register link for production safety if desired, or keep minimal -->
      <div class="text-center mt-3">
        <a href="<?= base_url('/admin/register') ?>" class="small text-secondary text-decoration-none">No account?
          Register</a>
      </div>
    </form>
  </div>
</body>

</html>