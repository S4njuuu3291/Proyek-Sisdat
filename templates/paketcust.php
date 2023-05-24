<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../styling/stylingpaketcust.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
  </head>

  <style>
    /* *{
      border: 1px solid black; 
    } */
  </style>
  <body>
    <?php include '../connector/mypaket.php'; ?>
    <div class="background"></div>
    <nav>
      <a href="" class="logoS">
        <img src="../img-stocks/anterinaja.png" class="logo" />
      </a>
      <ul>
        <li><a href="../templates/paketcust.html">Paket Saya</a></li>
        <li><a href="../templates/riwayat.html">Riwayat</a></li>
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
          Sanjuuuu
        </h3>
        <ul class="">
          <li><img src="../img-stocks/user.png" alt=""></img><a href="">Profil</a></li>
          <li><img src="../img-stocks/edit.png" alt=""></img><a href="">Edit Profil</a></li>
          
          <li><img src="../img-stocks/settings.png" alt=""></img><a href="">Pengaturan</a></li>
          <li><img src="../img-stocks/log-out.png" alt=""></img><a href="../templates/login.html">Keluar</a></li>
        </ul>
      </div>
    </div>

    <!-- Barangan -->
    <div class="title-barangan mt-4 text-center">
      <h3 class="">Paket On-going :D</h3>
    </div>
    <ul class="list-group container-fluid mt-4">
      <li class="head-tabel m-4">
          <span class='id_barang'>ID Barang</span>
          <span class='tanggal_kirim'>Tanggal Kirim</span>
          <span  class='alamat'>Alamat Penerima</span>
          <span class='status_barang'>Status Barang</span>
      </li>
        
<?php 
          if ($result->num_rows > 0){
              while ($row = $result->fetch_assoc()){
        echo "<li class=''>
        <div class='tentang-barang'>
            <div class='tentang-barang-isi'>

              <span class='id_barang'>".$row["id_barang"]."</span>
              <span class='tanggal_kirim'>".$row["tanggal_kirim"]."</span>
              <span class='alamat'>
              ".$row["alamat_penerima"]."              </span>
              <span class='status_barang'>".$row["status_barang"]." ".$row["alamat"]."</span>
            </div>

          <button type='button' class='btn text-white util-blue mt-2' data-bs-toggle='modal' data-bs-target='#exampleModal'>
            Detail Lengkap >
          </button>
      
          <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered  my-custom-dialog'>
              <div class='modal-content '>
                <div class='modal-header text-center d-flex justify-content-center'>
                  <h1 class='modal-title fs-5' id='exampleModalLabel'>Detail Paket 13478923888A78</h1>
                  
                </div>
                <div class='modal-body'>
                  <div class='modal-body'>
      
                  <ul class='list-group list-group-horizontal'>
                    <li class='list-group w-50 mt-3'>ID Barang :</li>
                    <li class='list-group w-75 mt-3'>134789238888A78</li>
                  </ul>
                  <ul class='list-group list-group-horizontal-sm'>
                    <li class='list-group w-50 mt-3'>Nama Penerima :</li>
                    <li class='list-group w-75 mt-3'>Nita</li>
                  </ul>
                  <ul class='list-group list-group-horizontal-sm'>
                    <li class='list-group w-50 mt-3'>Alamat Penerima :</li>
                    <li class='list-group w-75 mt-3'>Jln. Sentosa Raya</li>
                  </ul>
                  <ul class='list-group list-group-horizontal-sm'>
                    <li class='list-group w-50 mt-3'>No. HP Penerima :</li>
                    <li class='list-group w-75 mt-3'>08133366789</li>
                  </ul>
                  <ul class='list-group list-group-horizontal-sm'>
                    <li class='list-group w-50 mt-3'>Status Barang :</li>
                    <li class='list-group w-75 mt-3'>Sudah keluar dari gudang 12A42</li>
                  </ul>
                  <ul class='list-group list-group-horizontal-sm'>
                    <li class='list-group w-50 mt-3'>Tanggal Kirim :</li>
                    <li class='list-group w-75 mt-3'>23-05-2023 09.78 WIB</li>
                  </ul>
                  <ul class='list-group list-group-horizontal-sm'>
                    <li class='list-group w-50 mt-3'>Tanggal Sampai :</li>
                    <li class='list-group w-75 mt-3'>Belum</li>
                  </ul>
                </div>
                  <ul class='list-group list-group-horizontal'>
                    <li class='list-group w-50 mt-3'>ID Barang :</li>
                    <li class='list-group w-75 mt-3'>134789238888A78</li>
                  </ul>
                  <ul class='list-group list-group-horizontal-sm'>
                    <li class='list-group w-50 mt-3'>Nama Penerima :</li>
                    <li class='list-group w-75 mt-3'>Nita</li>
                  </ul>
                  <ul class='list-group list-group-horizontal-sm'>
                    <li class='list-group w-50 mt-3'>Alamat Penerima :</li>
                    <li class='list-group w-75 mt-3'>Jln. Sentosa Raya</li>
                  </ul>
                  <ul class='list-group list-group-horizontal-sm'>
                    <li class='list-group w-50 mt-3'>No. HP Penerima :</li>
                    <li class='list-group w-75 mt-3'>08133366789</li>
                  </ul>
                  <ul class='list-group list-group-horizontal-sm'>
                    <li class='list-group w-50 mt-3'>Status Barang :</li>
                    <li class='list-group w-75 mt-3'>Sudah keluar dari gudang 12A42</li>
                  </ul>
                  <ul class='list-group list-group-horizontal-sm'>
                    <li class='list-group w-50 mt-3'>Tanggal Kirim :</li>
                    <li class='list-group w-75 mt-3'>23-05-2023 09.78 WIB</li>
                  </ul>
                  <ul class='list-group list-group-horizontal-sm'>
                    <li class='list-group w-50 mt-3'>Tanggal Sampai :</li>
                    <li class='list-group w-75 mt-3'>Belum</li>
                  </ul>
                </div>
                <div class='modal-footer'>
                  <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Tutup</button>
                  
                </div>
              </div>
            </div>
          </div>
          
      </div>
      </li>";
              }
          } else {
              echo "<tr><td colspan='7'>Tidak ada data dalam tabel.</td></tr>";
          }
        ?>

    </ul>

    


  <script>
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
