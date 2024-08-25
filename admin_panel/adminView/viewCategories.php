<div>
  <h3>Materi Pelajaran</h3>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Title</th>
        <th class="text-center">Level</th>
        <th class="text-center">Descripstion</th>
        <th class="text-center" colspan="2">Aksi</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from tbl_courses";
      $result=$conn->query($sql);
      $count=1;
      if ($result->num_rows > 0){
        while ($row=$result->fetch_assoc()) {
    ?>
    <tr>
      <td class="text-center"><?=$row["course_id"]?></td>
      <td class="text-center"><?=$row["title"]?></td>
      <td class="text-center"><?=$row["level"]?></td>
      <td class="text-center"><?=$row["description"]?></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="categoryDelete('<?=$row['course_id']?>')">Delete</button></td>
    </tr>
    <?php
          $count=$count+1;
        }
      }
    ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
    Tambah Materi
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Materi Pelajaran Baru</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form enctype='multipart/form-data' action="./controller/addCatController.php" method="POST">
            <div class="form-group">
              <label for="hanzi">Hanzi:</label>
              <input type="text" class="form-control" name="hanzi" required>
            </div>
            <div class="form-group">
              <label for="pinyin">Pinyin:</label>
              <input type="text" class="form-control" name="pinyin" required>
            </div>
            <div class="form-group">
              <label for="bahasa_indonesia">Bahasa Indonesia:</label>
              <input type="text" class="form-control" name="bahasa_indonesia" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Tambah Materi</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
