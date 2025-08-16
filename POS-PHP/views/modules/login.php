<div id="back" class="login-background"></div>

<div class="login-container">
  <div class="login-card">
    <div class="login-header">
      <img class="login-logo" src="views/img/template/logo-blanco-bloque.png" alt="Company Logo">
      <h1 class="login-title">Welcome Back</h1>
      <p class="login-subtitle">Please log in to start your session</p>
    </div>

    <div class="login-body">
      <form method="post" class="login-form">
        <div class="form-group">
          <label for="loginUser" class="sr-only">Username</label>
          <div class="input-with-icon">
            <span class="input-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
              </svg>
            </span>
            <input type="text" class="form-control" id="loginUser" name="loginUser" placeholder="Username" required autocomplete="username" autofocus>
          </div>
        </div>

        <div class="form-group">
          <label for="loginPass" class="sr-only">Password</label>
          <div class="input-with-icon">
            <span class="input-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
              </svg>
            </span>
            <input type="password" class="form-control" id="loginPass" name="loginPass" placeholder="Password" required autocomplete="current-password">
            <button type="button" class="password-toggle" aria-label="Show password">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
              </svg>
            </button>
          </div>
        </div>

        <div class="form-options">
          <div class="remember-me">
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Remember me</label>
          </div>
          <a href="#forgot-password" class="forgot-password">Forgot password?</a>
        </div>

        <button type="submit" class="btn btn-primary btn-block">
          Log In
          <span class="btn-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
            </svg>
          </span>
        </button>

        <?php
          $login = new ControllerUsers();
          $login -> ctrUserLogin();
        ?>
      </form>
    </div>

    <!-- <div class="login-footer">
      <p>Don't have an account? <a href="#signup">Sign up</a></p>
    </div> -->
  </div>
</div>

<style>
  :root {
    --primary-color: #4e73df;
    --primary-hover: #3a5ec0;
    --text-color: #333;
    --light-gray: #f8f9fa;
    --medium-gray: #e9ecef;
    --dark-gray: #6c757d;
    --white: #ffffff;
    --shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    --transition: all 0.3s ease;
  }

  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    line-height: 1.6;
    color: var(--text-color);
    background-color: var(--light-gray);
  }

  .login-background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    z-index: -1;
  }

  .login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 20px;
  }

  .login-card {
    background: var(--white);
    border-radius: 10px;
    box-shadow: var(--shadow);
    width: 100%;
    max-width: 420px;
    overflow: hidden;
    transition: var(--transition);
  }

  .login-card:hover {
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
  }

  .login-header {
    text-align: center;
    padding: 30px 30px 20px;
    background: linear-gradient(135deg, var(--primary-color) 0%, #224abe 100%);
    color: var(--white);
  }

  .login-logo {
    width: 120px;
    height: auto;
    margin-bottom: 15px;
  }

  .login-title {
    font-size: 1.8rem;
    font-weight: 600;
    margin-bottom: 5px;
  }

  .login-subtitle {
    font-size: 0.9rem;
    opacity: 0.9;
  }

  .login-body {
    padding: 25px 30px;
  }

  .form-group {
    margin-bottom: 20px;
  }

  .input-with-icon {
    position: relative;
    display: flex;
    align-items: center;
  }

  .input-icon {
    position: absolute;
    left: 12px;
    color: var(--dark-gray);
    pointer-events: none;
  }

  .form-control {
    width: 100%;
    padding: 12px 12px 12px 40px;
    border: 1px solid var(--medium-gray);
    border-radius: 6px;
    font-size: 1rem;
    transition: var(--transition);
  }

  .form-control:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(78, 115, 223, 0.25);
    outline: none;
  }

  .password-toggle {
    position: absolute;
    right: 12px;
    background: none;
    border: none;
    color: var(--dark-gray);
    cursor: pointer;
    padding: 5px;
  }

  .password-toggle:hover {
    color: var(--primary-color);
  }

  .form-options {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 20px 0;
    font-size: 0.9rem;
  }

  .remember-me {
    display: flex;
    align-items: center;
  }

  .remember-me input {
    margin-right: 8px;
  }

  .forgot-password {
    color: var(--primary-color);
    text-decoration: none;
    transition: var(--transition);
  }

  .forgot-password:hover {
    text-decoration: underline;
  }

  .btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 12px;
    border: none;
    border-radius: 6px;
    font-size: 1rem;
    font-weight: 500;
    cursor: pointer;
    transition: var(--transition);
  }

  .btn-primary {
    background-color: var(--primary-color);
    color: var(--white);
  }

  .btn-primary:hover {
    background-color: var(--primary-hover);
    transform: translateY(-2px);
  }

  .btn-block {
    width: 100%;
  }

  .btn-icon {
    margin-left: 8px;
  }

  .login-footer {
    text-align: center;
    padding: 15px 30px;
    border-top: 1px solid var(--medium-gray);
    font-size: 0.9rem;
  }

  .login-footer a {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 500;
  }

  .login-footer a:hover {
    text-decoration: underline;
  }

  .sr-only {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border-width: 0;
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Toggle password visibility
    const passwordToggle = document.querySelector('.password-toggle');
    if (passwordToggle) {
      passwordToggle.addEventListener('click', function() {
        const passwordInput = document.getElementById('loginPass');
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        
        // Toggle icon
        this.innerHTML = type === 'password' ? 
          '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/></svg>' :
          '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/><path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299l.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/><path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709z"/><path d="M8 5.5a2.5 2.5 0 0 0-2.5 2.5c0 .676.216 1.3.589 1.816l.845-.845a1.5 1.5 0 0 1 2.12-2.12l.844.845A2.516 2.516 0 0 0 8 5.5z"/><path d="M8 8.5a1.5 1.5 0 0 1 1.5-1.5c.352 0 .686.123.95.332l.854-.854A2.5 2.5 0 0 0 8 5.5a2.5 2.5 0 0 0-2.5 2.5c0 .352.123.686.332.95l-.854.854A1.5 1.5 0 0 1 8 8.5z"/></svg>';
      });
    }
    
    // Add focus styles for better accessibility
    const inputs = document.querySelectorAll('input');
    inputs.forEach(input => {
      input.addEventListener('focus', function() {
        this.parentElement.querySelector('.input-icon').style.color = 'var(--primary-color)';
      });
      
      input.addEventListener('blur', function() {
        this.parentElement.querySelector('.input-icon').style.color = 'var(--dark-gray)';
      });
    });
  });
</script>