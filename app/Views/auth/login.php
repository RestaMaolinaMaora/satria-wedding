<?= $this->extend('admin/layout/auth') ?>

<?= $this->section('content') ?>
  <div class="login-container">
    <!-- Kiri -->
    <div class="login-left"></div>

    <!-- Kanan -->
    <div class="login-right">
      <h2>Log In</h2>
      <form action="<?= base_url('/auth/prosesLogin') ?>" method="post">
        
        <div class="form-group">
          <label for="username">Username</label>
          <div class="input-group">
            <i class="fa-solid fa-user"></i>
            <input type="text" id="username" name="username" placeholder="Masukkan username" required>
          </div>
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <div class="input-group">
            <i class="fa-solid fa-lock"></i>
            <input type="password" id="password" name="password" placeholder="Masukkan password" required>
          </div>
        </div>

        <button type="submit">Login</button>
      </form>
    </div>
  </div>
<?= $this->endSection() ?>