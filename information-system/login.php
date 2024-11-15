<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="login.css"/>
    <title>login</title>
  </head>

  <body>
    <div class="wrapper">
      <div class="logo">
        <img src="bayan ehub.webp" alt="" />
      </div>
      <div class="container" id="container">
        <div class="form-container login">
          <form action="/login.php" method="POST">
            <h1>Login</h1>
            <div class="input-container">
              <input
                class="input-placeholder"
                type="email"
                placeholder="Email"
                required
              />
              <input
                class="input-placeholder"
                type="password"
                placeholder="Password"
                required
              />

              <div class="btn-container">
                <input
                  type="submit"
                  value="login"
                  class="sign-in-btn"
                  name="login"
                />
                <span class="border"><hr /></span>
                <a class="create-acc-btn" href="register.php"
                  >Create an account</a
                >
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    
  </body>
</html>
