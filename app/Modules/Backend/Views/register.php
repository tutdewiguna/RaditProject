<!doctype html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Admin Register | OutfiTR</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/inter@5.0.0/index.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />

  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f3f4f6;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .register-card {
      width: 100%;
      max-width: 400px;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
      padding: 2rem;
      border: 1px solid #e5e7eb;
    }

    .btn-primary {
      background-color: #111827;
      border-color: #111827;
      padding: 0.75rem;
    }
  </style>
</head>

<body>
  <div class="register-card">
    <div class="text-center mb-4">
      <h1 class="h3 fw-bold mb-1">Create Admin</h1>
      <p class="text-secondary small">Register a new administrator</p>
    </div>

    <form action="<?= base_url('/admin/register') ?>" method="post">
      <?= csrf_field() ?>

      <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger small mb-3">
          <ul class="mb-0 ps-3">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
              <li><?= esc($error) ?></li>
            <?php endforeach ?>
          </ul>
        </div>
      <?php endif ?>

      <div class="mb-3">
        <label class="form-label small fw-bold text-secondary">Full Name</label>
        <input type="text" class="form-control" name="name" value="<?= old('name') ?>" required />
      </div>

      <div class="mb-3">
        <label class="form-label small fw-bold text-secondary">Email</label>
        <input type="email" class="form-control" name="email" value="<?= old('email') ?>" required />
      </div>

      <div class="mb-3">
        <label class="form-label small fw-bold text-secondary">Password</label>
        <input type="password" class="form-control" name="password" required />
      </div>

      <div class="mb-4">
        <label class="form-label small fw-bold text-secondary">Confirm Password</label>
        <input type="password" class="form-control" name="confirmpassword" required />
      </div>

      <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary fw-bold">Register</button>
      </div>

      <div class="text-center mt-3">
        <a href="<?= base_url('/admin') ?>" class="small text-secondary text-decoration-none">Already have an account?
          Sign In</a>
      </div>
    </form>
  </div>
</body>

</html>