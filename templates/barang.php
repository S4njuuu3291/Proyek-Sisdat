<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../styling/stylebarang.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
  </head>

  <style>
    /* *{
      border: 1px solid black; 
    } */
  </style>
  <body>
  <?php include '../connector/con_barang.php'; ?>
    <div class="background"></div>
    <nav>
      <a href="" class="logoS">
        <img src="../img-stocks/anterinaja.png" class="logo" />
      </a>
      <ul>
        <li><a href="./user.php">Login User</a></li>
        <li><a href="./customer.php">Customer</a></li>
        <li><a href="./kurir.php">Kurir</a></li>
        <li><a href="./admin.php">Admin</a></li>
        <li><a href="./barang.php">Barang</a></li>
        <li><a href="./gudang.php">Gudang</a></li>
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
          <li><img src="../img-stocks/user.png" alt=""></img><a href="">Profil</a></li>
          <li><img src="../img-stocks/edit.png" alt=""></img><a href="">Edit Profil</a></li>
          <li><img src="../img-stocks/settings.png" alt=""></img><a href="">Pengaturan</a></li>
          <li><img src="../img-stocks/log-out.png" alt=""></img><a href="../templates/login.php">Keluar</a></li>
        </ul>
      </div>
    </div>
    
    <h3 class="mt-4 text-center">Barang :D</h3>
    
    <div class="container-fluid container-tabel mb-4 p-3">
      <table id="myTable" class="table table-striped">
        <thead>
            <tr>
              <th>ID Barang</th>
              <th>ID Customer</th>
              <th>Alamat Penerima</th>
              <th>Nama Penerima</th>
              <th>No. Hp Penerima</th>
              <th>Tanggal Kirim</th>
              <th>Tanggal Sampai</th>
              <th>ID Kurir</th>
              <th>ID Gudang</th>
              <th>Status</th>
              <th>Edit :)</th>
            </tr>
        </thead>
        <tbody>
        <?php 
          if ($result->num_rows > 0){
              while ($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$row["id_barang"]."</td>";
                echo "<td>".$row["id_customer"]."</td>";
                echo "<td>".$row["alamat_penerima"]."</td>";
                echo "<td>".$row["nama_penerima"]."</td>";
                echo "<td>".$row["no_Hp_penerima"]."</td>";
                echo "<td>".$row["tanggal_kirim"]."</td>";
                echo "<td>".$row["tanggal_sampai"]."</td>";
                echo "<td>".$row["id_kurir"]."</td>";
                echo "<td>".$row["id_gudang"]."</td>";
                echo "<td>".$row["status_barang"]."</td>";
                echo '<td>
                        <button class="btn btn-primary btn-sm btn-edit">Edit</button>
                        <form action="../connector/hapusbarang.php" method="post">
                          <input type="hidden" name="id_barang" value="'; echo $row["id_barang"]; echo '">
                          <button class="btn btn-danger btn-sm btn-hapus" type="Delete">Delete</button>
                        </form>
                      </td>';
                echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='7'>Tidak ada data dalam tabel.</td></tr>";
          }
        ?>
          
        </tbody>
    </table>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <form id="editAIDI" class="modal-dialog" action="../connector/editbarang.php" method="post">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="modal-split">
          <div class="left-column">
            <div class="mb-2">
              <label for="editidBarang" class="form-label">ID Barang:</label>
              <input type="text" class="form-control" id="editidBarang" readonly name="id_barang">
            </div>
            <div class="mb-2">
              <label for="editidCustomer" class="form-label">ID Customer:</label>
              <input type="text" class="form-control" id="editidCustomer" name="id_customer">
            </div>
            <div class="mb-2">
              <label for="editAlamat" class="form-label">Alamat Penerima:</label>
              <input type="text" class="form-control" id="editAlamat"  name="alamat_penerima" >
            </div>           
            <div class="mb-2">
              <label for="editNama" class="form-label">Nama Penerima:</label>
              <input type="text" class="form-control" id="editNama"  name="nama_penerima" >
            </div>           
            <div class="mb-2">
              <label for="editNoHp" class="form-label">No. Hp Penerima:</label>
              <input type="text" class="form-control" id="editNoHp" name="no_Hp_penerima"  >
            </div>           
          </div>
          <div class="right-column">
            <div class="mb-2">
              <label for="editTglKirim" class="form-label">Tanggal Kirim:</label>
              <input type="text" class="form-control" id="editTglKirim"  name="tanggal_kirim" >
            </div>
            <div class="mb-2">
              <label for="editTglSampai" class="form-label">Tanggal Sampai:</label>
              <input type="text" class="form-control" id="editTglSampai" name="tanggal_sampai" >
            </div>
           
            <div class="mb-2">
              <label for="editIDKurir" class="form-label">ID Kurir:</label>
              <input type="text" class="form-control" id="editIDKurir"  name="id_kurir" >
            </div>           
            <div class="mb-2">
              <label for="editIDGudang" class="form-label">ID Gudang:</label>
              <input type="text" class="form-control" id="editIDGudang"  name="id_gudang" >
            </div>           
                     
            <div class="mb-2">
              <label for="status" class="form-label">Status Barang:</label>
              <input type="text" class="form-control" id="status" name="status_barang"  >
            </div>           
          </div>
        </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary mt-3" data-bs-dismiss="modal">Tutup</button>
            <input class="btn btn-primary mt-3 text-white text-center" type="submit" value="Simpan Perubahan" />
          </div>
        </div>
        </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

  <script>
  
  $(document).ready(function() {
    var table = $('#myTable').DataTable();

    // Edit Button Click
    $('#myTable').on('click', '.btn-edit', function() {
        var row = $(this).closest('tr');
        var aidi = row.data('id');
        var data = table.row(row).data();

        $('#editAIDI').val(aidi);
        $('#editidBarang').val(data[0]);
        $('#editidCustomer').val(data[1]);
        $('#editAlamat').val(data[2]);
        $('#editNama').val(data[3]);
        $('#editNoHp').val(data[4]);
        $('#editTglKirim').val(data[5]);
        $('#editTglSampai').val(data[6]);
        $('#editIDKurir').val(data[7]);
        $('#editIDGudang').val(data[8]);
        $('#status').val(data[9]);
        $('#editModal').modal('show');
    });

    // Save Changes Button Click
    $('#saveChanges').on('click', function() {
        var aidi = $('#editAIDI').val();
        var id = $('#editidBarang').val();
        var idCustomer = $('#editidCustomer').val();
        var alamat = $('#editAlamat').val();
        var nama = $('#editNama').val();
        var noHp = $('#editNoHp').val();
        var tglKirim = $('#editTglKirim').val();
        var tglSampai = $('#editTglSampai').val();
        var idKurir = $('#editIDKurir').val();
        var idGudang = $('#editIDGudang').val();
        var status = $('#status').val();

        var row = table.row('tr[data-id="' + aidi + '"]');
        var rowData = row.data();

        rowData[1] = idCustomer;
        rowData[2] = alamat;
        rowData[3] = nama;
        rowData[4] = noHp;
        rowData[5] = tglKirim;
        rowData[6] = tglSampai;
        rowData[7] = idKurir;
        rowData[8] = idGudang;
        rowData[9] = status;

        row.data(rowData).draw();

        $('#editModal').modal('hide');
    });
    $('#myTable').on('click', '.btn-delete', function() {
      var row = $(this).closest('tr');
      deleteRow = row;
      table.row(deleteRow).remove().draw();
    
      $('#confirmModal').modal('show');
    });
  });

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

