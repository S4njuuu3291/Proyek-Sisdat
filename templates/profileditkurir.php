<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../styling/stylekuriredit.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
  </head>

  <style>
    *{
      /* border: 1px solid black;  */
    }
    *{
      /* border: 1px solid black;  */
      text-decoration: none !important;

    }

    .profil-judul {
  font-size: 30px;
}

.profil-container {
  background-color: #fff;
  padding: 20px 10px;
  border-radius: 30px;
  width: 400px;
  box-shadow: 0px 0px 0px 2px rgba(11, 136, 219, 0.2);
}

.modal-split {
  display: flex;
  flex-direction: row;
  justify-content: space-around;
}

.left-column {
  width: 47%;
}

.right-column {
  width: 47%;
}

.btn-primary {
  border-radius: 15px !important;
}
  </style>
  <body>
  <?php include '../connector/con_myjob.php'; ?>
  <?php include '../connector/myprofile.php'; ?>
    <div class="background"></div>
    <nav>
      <a href="" class="logoS">
        <img src="../img-stocks/anterinaja.png" class="logo" />
      </a>
      <ul>
        <li><a href="../templates/kuriredit.php">Paket Antar</a></li>
        <li><a href="#">Hubungi</a></li>
        <li><a href="#">FAQ</a></li>
      </ul>
    </nav>

    <div class="action">
      <div class="profile" onclick="menuToggle();">
        <img src="../img-stocks/maskot.png" alt="">
      </div>
      <div class="menu " >
        <h3>
        <?php
          $nama = $namaD->fetch_assoc();
          echo $nama["nama"];
          ?>
        </h3>
        <ul class="">
          <li><img src="../img-stocks/user.png" alt=""></img><a href="profilkurir.php">Profil</a></li>
          <li><img src="../img-stocks/edit.png" alt=""></img><a href="profileditkurir.php">Edit Profil</a></li>
          
          <li><img src="../img-stocks/settings.png" alt=""></img><a href="">Pengaturan</a></li>
          <li><img src="../img-stocks/log-out.png" alt=""></img><a href="../templates/login.php">Keluar</a></li>
        </ul>
      </div>
    </div>

    <h5 class="text-center mt-3"  id="editModalLabel">Edit Profil</h5>
<div class="profil-container container-fluid bg-white w-75 m-auto mt-5">

  <form id="editAIDI" class="modal-dialog" action="../connector/profiledit.php" method="post">
    <div class="modal-content">
      <div class="modal-header">
      </div>
        <div class="modal-body">
          <div class="modal-split">
            <div class="left-column">

              <div class="mb-3">
                <label for="editID" class="form-label">ID Kurir:</label>
                <input type="text" class="form-control" id="editID" readonly name="id" value="<?php echo $row['id_kurir']?>">
              </div>
              <div class="mb-3">
                <label for="editEmail" class="form-label" >Email:</label>
                <input type="email" class="form-control" id="editEmail" name="email" value="<?php echo $row['email']?>">
              </div>

              <div class="mb-3">
                <label for="editNama" class="form-label">Nama:</label>
                  <input type="text" class="form-control" id="editNama" name="nama" value="<?php echo $row['nama']?>">
              </div>

              </div>
              <div class="right-column">
                <div class="mb-3">
                  <label for="editGender" class="form-label">Gender:</label>
                  <input type="text" class="form-control" id="editGender" name="gender" value="<?php echo $row['gender']?>">
                  
              </div>
                <div class="mb-3">
                  <label for="editNoHp" class="form-label">No Hp:</label>
                  <input type="text" class="form-control" id="editNoHp" name="no_Hp" value="<?php echo $row['no_Hp']?>">
                </div>
                <div class="mb-3">
                  <label for="editUsia" class="form-label">Usia:</label>
                  <input type="number" class="form-control" id="editUsia" name="usia" value="<?php echo $row['usia']?>">
                </div>
                
                
              </div>
      </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="status" value="kurir">
            <input class="btn btn-primary mt-3 text-white text-center" type="submit" value="Simpan Perubahan"/>
          </div>
      </div>
      </div>
</form>
  </div>
    


  <script>
    function tandaiSelesai() {
    var statusBarang = document.querySelector(".status_barang_isi");
    var ceklisHijau = document.createElement("i");
    ceklisHijau.classList.add("fas", "fa-check", "text-success", "ms-2");
    
    statusBarang.textContent = "Barang sudah sampai ke tujuan";
    statusBarang.appendChild(ceklisHijau);
  }
    const sr = ScrollReveal({
      distance: "165px",
      duration: 1600,
      delay: 250,
      reset: true,
    });

    sr.reveal("body", { delay: 102, origin: "left" });

    function menuToggle(){
      const toggleMenu = document.querySelector('.menu');
      toggleMenu.classList.toggle('active');
    }

    function modalToggle(){
      const section = document.querySelector("section"),
        overlay = document.querySelector(".overlay"),
        showBtn = document.querySelector(".show-modal"),
        closeBtn = document.querySelector(".close-btn");
  
      section.classList.toggle('active2')
      overlay.classList.toggle('active2')
      closeBtn.classList.toggle('active2')
    }
    </script>
</html>
