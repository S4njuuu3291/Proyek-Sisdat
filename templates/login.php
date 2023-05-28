<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
  </head>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

  <link rel="stylesheet" href="../styling/stylelogin.css" />

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

  <style>
    * {
      /* border: 1px solid black; */

    }


    .password-toggle-icon {
      position: absolute;
      right: 15px;
      top: 30%;
      cursor: pointer;
      font-size: 18px;
    }

    .password-toggle-icon i {
      color: rgb(139, 101, 6);
    }

  </style>

  <body>
    <section class="container-fluid text-center">
      <img src="../img-stocks/anterinaja.png" alt="" class="logo align-self-center mt-3 mb-3" />
      <div class="form-container">
        <div class="form-login">
          <form action="../connector/con_login.php" class="d-flex flex-column align-items-center m-lg-auto p-4" method="post">
            <?php if (isset($_GET['error'])){ ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <div class="inputan form-floating mb-3 mt-3">
              <input type="email" class="form-control" id="floatingInput" placeholder="anakbaik123" name="email" />
              <label for="floatingInput">Email</label>
            </div>
            <div class="inputan form-floating mb-3">
              <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" />
              <span class="password-toggle-icon float-end" onclick="togglePasswordVisibility()"><i class="fas fa-eye"></i></span>
              <label for="floatingPassword">Password</label>
            </div>

            <input class="btn btn-warning mb-3 w-50 text-white" type="submit" value="Masuk" />
            <p class="mb-3">Belum punya akun? <a href="../templates/daftar.php" class="m-lg-1 text-warning">Daftar</a></p>
          </form>
        </div>
        <div class="logo-img align-items-center justify-content-center p-4">
          <img src="../img-stocks/maskot.png" alt="" />
        </div>
      </div>
    </section>
    <script src="https://unpkg.com/scrollreveal"></script>

    <script>
      function togglePasswordVisibility() {
        const passwordField = document.querySelector("#floatingPassword");
        const passwordToggleIcon = document.querySelector(".password-toggle-icon");

        if (passwordField.getAttribute("type") === "password") {
          passwordField.setAttribute("type", "text");
          passwordToggleIcon.innerHTML = '<i class="fas fa-eye-slash"></i>';
        } else {
          passwordField.setAttribute("type", "password");
          passwordToggleIcon.innerHTML = '<i class="fas fa-eye"></i>';
        }
      }

      const sr = ScrollReveal({
        distance: "165px",
        duration: 1600,
        delay: 250,
        reset: true,
      });

      sr.reveal(".form-login", { delay: 2, origin: "left" });
      sr.reveal(".logo-img img", { delay: 100, origin: "right" });
      sr.reveal(".logo", { delay: 300, origin: "top" });
    </script>
  </body>
</html>
