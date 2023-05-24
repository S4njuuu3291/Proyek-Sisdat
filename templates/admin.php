<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../styling/styleadmin.css" />

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
  <?php include '../connector/con_admin.php'; ?>
    <div class="background"></div>
    <nav>
      <a href="#" class="logoS">
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
          Sanjuuuu
        </h3>
        <ul class="">
          <li><img src="../img-stocks/user.png" alt=""></img><a href="">Profil</a></li>
          <li><img src="../img-stocks/edit.png" alt=""></img><a href="">Edit Profil</a></li>
          
          <li><img src="../img-stocks/settings.png" alt=""></img><a href="">Pengaturan</a></li>
          <li><img src="../img-stocks/log-out.png" alt=""></img><a href="../templates/login.php">Keluar</a></li>
        </ul>
      </div>
    </div>
    
    <h3 class="mt-4 text-center">Admin :D</h3>
    
    <div class="container container-tabel mb-4 p-3">
      <table id="myTable" class="table table-striped">
        <thead>
            <tr>
              <th>ID Admin</th>
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
                echo "<td>".$row["id_admin"]."</td>";
                echo "<td>".$row["nama"]."</td>";
                echo "<td>".$row["usia"]."</td>";
                echo "<td>".$row["gender"]."</td>";
                echo "<td>".$row["no_Hp"]."</td>";
                echo "<td>".$row["email"]."</td>";
                echo "<td>
                        <button class='btn btn-primary btn-sm btn-edit'>Edit</button>
                        <button class='btn btn-danger btn-sm btn-delete'>Delete</button>
                      </td>";
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editAIDI" class="modal-split">
                  <div class="left-column">
                    <div class="mb-3">
                      <label for="editID" class="form-label">ID Admin:</label>
                      <input type="text" class="form-control" id="editID" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="editNama" class="form-label">Nama:</label>
                        <input type="text" class="form-control" id="editNama">
                      </div>
                    <div class="mb-3">
                      <label for="editUsia" class="form-label">Usia:</label>
                      <input type="text" class="form-control" id="editUsia">
                    </div>
                    <div class="mb-3">
                      <label for="editGender" class="form-label">Gender:</label>
                      <select class="form-select" id="editGender">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                        <option value="Siluman">Siluman</option>
                      </select>
                  </div>
                </div>
                <div class="right-column">
                    <div class="mb-3">
                      <label for="editNoHp" class="form-label">No Hp:</label>
                      <input type="text" class="form-control" id="editNoHp">
                    </div>
                    <div class="mb-3">
                      <label for="editAlamat" class="form-label">Alamat:</label>
                      <input type="text" class="form-control" id="editAlamat">
                    </div>
                    <div class="mb-3">
                      <label for="editEmail" class="form-label">Email:</label>
                      <input type="email" class="form-control" id="editEmail">
                    </div>
                    
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="saveChanges">Simpan Perubahan</button>
              </div>
            </div>
    </div>
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
        $('#editID').val(data[0]);
        $('#editNama').val(data[1]);
        $('#editUsia').val(data[2]);
        $('#editGender').val(data[3]);
        $('#editNoHp').val(data[4]);
        $('#editAlamat').val(data[5]);
        $('#editEmail').val(data[6]);
        $('#editModal').modal('show');
    });

    // Save Changes Button Click
    $('#saveChanges').on('click', function() {
        var id = $('#editID').val();
        var aidi = $('#editAIDI').val();
        var nama = $('#editNama').val();
        var usia = $('#editUsia').val();
        var noHp = $('#editNoHp').val();
        var alamat = $('#editAlamat').val();
        var email = $('#editEmail').val();
        var gender = $('#editGender').val();

        var row = table.row('tr[data-id="' + aidi + '"]');
        var rowData = row.data();

        rowData[1] = nama;
        rowData[2] = usia;
        rowData[3] = gender;
        rowData[4] = noHp;
        rowData[5] = alamat;
        rowData[6] = email;

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

