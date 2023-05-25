<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
  </head>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />

  <link rel="stylesheet" href="../styling/styledaftar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

  <style>
    /* * {
      border: 1px solid black;
    } */
  </style>

  <body>
    <section class="regis">
      <img src="../img-stocks/anterinaja.png" alt="" class="logo align-self-center mt-3 mb-3" />
      <form action="../connector/connector.php" class="regis-akun" method="post">
        <section class="regis1 regis-akun">
          <div class="d-flex align-items-center justify-content-evenly text-center">
            <div class="bungkus h-25 w-50 tingginya">Daftar dulu yaa..</div>
            <img src="../img-stocks/maskot.png" alt="" class="maskot w-25" />
          </div>
          <?php if (isset($_GET['error'])){ ?>
              <p class="error"><?php echo $_GET['error']; ?></p> 
          <?php } ?>
          <div class="align-items-center w-100">
            <div class="col-auto">
              <label for="inputEmail" class="col-form-label">Email : </label>
            </div>
            <div class="col-auto">
              <input type="email" id="inputEmail" class="form-control" name="email"/>
            </div>
          </div>
          
          <div class="align-items-center w-100 mt-2">
            <div class="col-auto">
              <label for="inputPassword" class="col-form-label">Password : </label>
            </div>
            <div class="col-auto">
              <input type="text" id="inputPassword" class="form-control" name="password"/>
            </div>
          </div>

          <div class="align-items-center w-100 mt-2">
            <div class="col-auto">
              <label for="ulangiPassword" class="col-form-label">Ulangi Password : </label>
            </div>
            <div class="col-auto">
              <input type="text" id="ulangiPassword" class="form-control" name="ulang"/>
            </div>
          </div>
          <a href="#section-id" class="scroll-down text-primary mt-3"><i class="fas fa-arrow-down"></i></a>
        </section>

        <section class="regis2 regis-akun mt-4 mb-4" id="section-id">
          <div class="align-items-center w-100">
            <div class="col-auto">
              <label for="inputNama" class="col-form-label">Nama : </label>
            </div>
            <div class="col-auto">
              <input type="text" id="inputNama" class="form-control" name="nama"/>
            </div>
          </div>

          <div class="g-1 align-items-center mt-2 w-100">
            <div class="col-auto">
              <label for="inputUsia" class="col-form-label">Usia : </label>
            </div>
            <div class="col-auto">
              <input type="number" id="inputUsia" class="form-control" name="usia"/>
            </div>

            <div class="csol-auto">
              <span id="Usia" class="form-text">Tahun</span>
            </div>
          </div>

          <div class="align-items-center w-100">
            <div class="col-auto">
              <label for="inputJK" class="col-form-label">Jenis Kelamin : </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="inputJK" value="L" />
              <label class="form-check-label" for="inputJK">Laki - laki</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="P" />
              <label class="form-check-label" for="inlineRadio2">Perempuan</label>
            </div>
          </div>

          <div class="align-items-center w-100">
            <div class="col-auto">
              <label for="inputNoHp" class="col-form-label">No. Handphone : </label>
            </div>
            <div class="col-auto">
              <input type="text" id="inputNoHp" class="form-control" name="no_Hp"/>
            </div>
          </div>

          <div class="align-items-center w-100">
            <div class="col-auto">
              <label for="inputAlamat" class="col-form-label">Alamat : </label>
            </div>
            <div class="col-auto">
              <input type="text" id="inputAlamat" class="form-control" name="alamat"/>
            </div>
          </div>

          <input class="btn btn-warning mt-3 text-white text-center" type="submit" value="Daftar" />
        </section>
      </form>
    </section>

    <script src="https://unpkg.com/scrollreveal"></script>

    <script>
      const sr = ScrollReveal({
        distance: "65px",
        duration: 1600,
        delay: 250,
        reset: true,
      });
      const sr2 = ScrollReveal({
        distance: "100px",
        duration: 1600,
        delay: 150,
        reset: true,
      });

      sr.reveal("form.regis-bio", { delay: 50, origin: "right" });
      sr.reveal("form.regis-akun", { delay: 50, origin: "left" });
      sr.reveal("img", { delay: 100, origin: "top" });
      sr.reveal(".logo", { delay: 200, origin: "top" });
      sr.reveal(".bungkus", { delay: 150, origin: "top" });

      // function submitFormandScroll(event) {
      //   // const form = document.getElementsByClassName("regis-bioX");
      //   event.preventDefault();

      // }
      function submitFormAndScroll(event) {
        const form = document.querySelectorAll("form");
        form.event.preventDefault();
        const regisBio = document.getElementById("regisBio");
        regisBio.scrollIntoView({ behavior: "smooth" });
      }
    </script>
  </body>
</html>
