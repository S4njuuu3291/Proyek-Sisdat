<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../styling/styleriwayat.css" />

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
    .id_barang {
      width: 10%;
    }
    .tanggal_sampai {
      width: 25%;
    }
    .alamat {
      width: 35%;
    }
    .status_barang,
    .status_barang_ket {
      width: 20%;
    }
    .tentang-barang .table-isi {
      
    }
  </style>
  <body>
  <?php include '../connector/myriwayat.php'; ?>
    <div class="background"></div>
    <nav>
      <a href="" class="logoS">
        <img src="../img-stocks/anterinaja.png" class="logo" />
      </a>
      <ul>
        <li><a href="../templates/paketcust.php">Paket Saya</a></li>
        <li><a href="../templates/riwayat.php">Riwayat</a></li>
        <!-- <li><a href="#">Hubungi</a></li> -->
        <!-- <li><a href="#">FAQ</a></li> -->
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
          <li><img src="../img-stocks/user.png" alt=""></img><a href="profilcustomer.php">Profil</a></li>
          <li><img src="../img-stocks/edit.png" alt=""></img><a href="profileditcustomer.php">Edit Profil</a></li>
          <li><img src="../img-stocks/settings.png" alt=""></img><a href="">Pengaturan</a></li>
          <li><img src="../img-stocks/log-out.png" alt=""></img><a href="../templates/login.php">Keluar</a></li>
        </ul>
      </div>
    </div>
    
    <h3 class="mt-4 text-center">Paket Selesai</h3>
    <ul class="list-group container-fluid mt-4 pb-4 w-75">
    <?php
        if ($result->num_rows > 0){
          while ($row = $result->fetch_assoc()){
        echo '
      <div class="tentang-barang mb-3">
        <li class="table-head">
            <p class="id_barang">ID Barang</p>
            <p class="tanggal_sampai">Tanggal Sampai</p>
            <p  class="alamat">Alamat Penerima</p>
            <p class="status_barang">Status Barang</p>
        </li>
        <li class="table-isi">
            <p class="id_barang">'.$row["id_barang"].'</p>
            <p class="tanggal_sampai">'.$row["tanggal_sampai"].'</p>
            <p class="alamat">
            '.$row["alamat_penerima"].'
            </p>
            <p class="status_barang_ket">
            <span>'.$row["status_barang"].'</span>
            <i class="fa-regular fa-circle-check"></i></p>
        
          </li>
          
          <button type="button" class="btn util-oren" data-bs-toggle="modal" data-bs-target="#exampleModal'.$row["id_barang"].'">
            Detail Lengkap >
          </button>
      
          <div class="modal fade" id="exampleModal'.$row["id_barang"].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered  my-custom-dialog">
              <div class="modal-content ">
                <div class="modal-header text-center d-flex justify-content-center">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Paket '.$row["id_barang"].'</h1>
                  
                </div>
                <div class="modal-body">
      
                  <ul class="list-group list-group-horizontal">
                    <li class="list-group w-50 mt-3">ID Barang :</li>
                    <li class="list-group w-75 mt-3">'.$row["id_barang"].'</li>
                  </ul>
                  <ul class="list-group list-group-horizontal-sm">
                    <li class="list-group w-50 mt-3">Nama Penerima :</li>
                    <li class="list-group w-75 mt-3">'.$row["nama_penerima"].'</li>
                  </ul>
                  <ul class="list-group list-group-horizontal-sm">
                    <li class="list-group w-50 mt-3">Alamat Penerima :</li>
                    <li class="list-group w-75 mt-3">'.$row["alamat_penerima"].'</li>
                  </ul>
                  <ul class="list-group list-group-horizontal-sm">
                    <li class="list-group w-50 mt-3">No. HP Penerima :</li>
                    <li class="list-group w-75 mt-3">'.$row["no_Hp_penerima"].'</li>
                  </ul>
                  <ul class="list-group list-group-horizontal-sm">
                    <li class="list-group w-50 mt-3">Status Barang :</li>
                    <li class="list-group w-75 mt-3">'.$row["status_barang"].'</li>
                  </ul>
                  <ul class="list-group list-group-horizontal-sm">
                    <li class="list-group w-50 mt-3">Tanggal Kirim :</li>
                    <li class="list-group w-75 mt-3">'.$row["tanggal_kirim"].'</li>
                  </ul>
                  <ul class="list-group list-group-horizontal-sm">
                    <li class="list-group w-50 mt-3">Tanggal Sampai :</li>
                    <li class="list-group w-75 mt-3">'.$row["tanggal_sampai"].'</li>
                  </ul>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>                 
                </div>
              </div>
            </div>
          </div>        
      </div>
      ';}}
        else {
          echo "<tr><td colspan='7'>Tidak ada data dalam tabel.</td></tr>";
        }
        ?>

    </ul>

  <script>
    const sr = ScrollReveal({
      distance: "1165px",
      duration: 1600,
      delay: 250,
      reset: true,
    });
    sr.reveal("ul.list-group", { delay: 102, origin: "left" });

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
