<div class="container">
  <div class="row">
    <div class="register-container m-auto">
      <h2 class="text-center"><strong>Register Form</strong></h2>
      <form action="<?=site_url('register')?>" method="post">
          <div class="data">
            <label>Email</label>
            <input type="email" name="email" required>
          </div>
      <div class="data">
            <label>Password</label>
            <input type="password" name="password" required>
          </div>
      <div class="data">
            <label>Confirm Password</label>
            <input type="password" name="password_confirm" required>
          </div>
      <div class="btn rounded">
            <div class="inner">
      </div>
      <button>Register</button>
          </div>
      </form>
    </div>
  </div>
</div>
