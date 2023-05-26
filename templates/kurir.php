<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../styling/stylekurir.css" />

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
    <?php include '../connector/con_kurir.php'; ?>
    <div id="background"></div>
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
    
    <h3 class="mt-4 text-center">Kurir :D</h3>
    
    <div class="container container-tabel mb-4 p-3">
      <table id="myTable" class="table table-striped">
        <thead>
            <tr>
                <th>ID Kurir</th>
                <th>Nama</th>
                <th>Usia</th>
                <th>Gender</th>
                <th>No. Hp</th>
                <th>Email</th>
                <th>Edit :)</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if ($result->num_rows > 0){
              while ($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$row["id_kurir"]."</td>";
                echo "<td>".$row["nama"]."</td>";
                echo "<td>".$row["usia"]."</td>";
                echo "<td>".$row["gender"]."</td>";
                echo "<td>".$row["no_Hp"]."</td>";
                echo "<td>".$row["email"]."</td>";
                echo '<td>
                  <button class="btn btn-primary btn-sm btn-edit" type="submit">Edit</button>
                  <button class="btn btn-sm btn-tambah"><i class="fa fa-plus-circle text-info btn-tambah"></i></button>
                  
                  <form action="../connector/hapus.php" method="post">
                  <input type="hidden" name="email" value="'; echo $row["email"]; echo '">
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
    
    <form id="editAIDI" class="modal-dialog" action="../connector/edit.php" method="post">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
            <div class="modal-body">
              <div class="modal-split">
                <div class="left-column">
                  <div class="mb-3">
                    <label for="editID" class="form-label">ID Kurir:</label>
                    <input type="text" class="form-control" id="editID" readonly name="id">
                    </div>
                  <div class="mb-3">
                    <label for="editNama" class="form-label">Nama:</label>
                      <input type="text" class="form-control" id="editNama" name="nama">
                  </div>
                  <div class="mb-3">
                    <label for="editUsia" class="form-label">Usia:</label>
                    <input type="number" class="form-control" id="editUsia" name="usia">
                  </div>
                  </div>
                  <div class="right-column">
                    <div class="mb-3">
                      <label for="editGender" class="form-label">Gender:</label>
                      <select class="form-select" id="editGender" name="gender">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                      </select>
                  </div>
                    <div class="mb-3">
                      <label for="editNoHp" class="form-label">No Hp:</label>
                      <input type="text" class="form-control" id="editNoHp" name="no_Hp">
                    </div>
                    
                    <div class="mb-3">
                      <label for="editEmail" class="form-label">Email:</label>
                      <input type="email" class="form-control" id="editEmail" name="email">
                    </div>
                    
                  </div>
          </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary mt-3" data-bs-dismiss="modal">Tutup</button>
                <input class="btn btn-primary mt-3 text-white text-center" type="submit" value="Simpan Perubahan" />
              </div>
          </div>
          </div>
    </form>
</div>
<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    
    <form id="editAIDI" class="modal-dialog" action="../connector/tambahuser.php" method="post">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="tambahModalLabel">Tambah Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
            <div class="modal-body">
              <div class="modal-split">
                <div class="left-column">
                  <div class="mb-3">
                    <label for="editEmail" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="editEmail" name="email">
                  </div>
                  <div class="mb-3">
                      <label for="editEmail" class="form-label">password:</label>
                      <input type="text" class="form-control" id="editEmail" name="password">
                  </div>
                  
                  <div class="mb-3">
                    <label for="editNama" class="form-label">Nama:</label>
                      <input type="text" class="form-control" id="editNama" name="nama">
                  </div>
                  
                  </div>
                  <div class="right-column">
                    <div class="mb-3">
                      <label for="editGender" class="form-label">Gender:</label>
                      <select class="form-select" id="editGender" name="gender">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                      </select>
                  </div>
                    <div class="mb-3">
                      <label for="editNoHp" class="form-label">No Hp:</label>
                      <input type="text" class="form-control" id="editNoHp" name="no_Hp">
                    </div>
                    <div class="mb-3">
                      <label for="editUsia" class="form-label">Usia:</label>
                      <input type="number" class="form-control" id="editUsia" name="usia">
                    </div>
                    
                    
                  </div>
          </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary mt-3" data-bs-dismiss="modal">Tutup</button>
                <input type="hidden" name="status" value="kurir">
                <input class="btn btn-primary mt-3 text-white text-center" type="submit" value="Tambah"/>
              </div>
          </div>
          </div>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
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

$(document).ready(function() {
    var table = $('#myTable').DataTable();

    // Edit Button Click
    $('#myTable').on('click', '.btn-edit', function() {
        var row = $(this).closest('tr');
        var aidi = row.data('id');
        var data = table.row(row).data();

        $('#editAIDI').val(aidi);
        $('#editID').val(data[0]);
        $('#editNama').val(data[1]);
        $('#editUsia').val(data[2]);
        $('#editGender').val(data[3]);
        $('#editNoHp').val(data[4]);
        $('#editEmail').val(data[5]);
        $('#editModal').modal('show');
    });

    $('#myTable').on('click', '.btn-tambah', function() {
        var row = $(this).closest('tr');
        var aidi = row.data('id');
        var data = table.row(row).data();

        $('#tambahModal').modal('show');
    });

    // Save Changes Button Click
    $('#saveChanges').on('click', function() {
        var id = $('#editID').val();
        var aidi = $('#editAIDI').val();
        var nama = $('#editNama').val();
        var usia = $('#editUsia').val();
        var noHp = $('#editNoHp').val();
        var email = $('#editEmail').val();
        var gender = $('#editGender').val();

        var row = table.row('tr[data-id="' + aidi + '"]');
        var rowData = row.data();

        rowData[1] = nama;
        rowData[2] = usia;
        rowData[3] = gender;
        rowData[4] = noHp;
        rowData[5] = email;

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

</script>
</html>
