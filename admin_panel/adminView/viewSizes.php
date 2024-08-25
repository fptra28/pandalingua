<div>
  <h3>Available Quizzes</h3>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Question</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql = "SELECT * from quizzes";
      $result = $conn->query($sql);
      $count = 1;
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
    <tr>
      <td class="text-center"><?=$count?></td>
      <td><?=$row["question"]?></td>   
      <td class="text-center"><button class="btn btn-danger" style="height:40px" onclick="quizDelete('<?=$row['quiz_id']?>')">Delete</button></td>
    </tr>
    <?php
            $count = $count + 1;
          }
        }
    ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Quiz
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Quiz Question</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form enctype='multipart/form-data' action="./controller/addQuizController.php" method="POST">
            <div class="form-group">
              <label for="question">Question:</label>
              <textarea class="form-control" name="question" required></textarea>
            </div>
            <div class="form-group">
              <label for="optionA">Option A:</label>
              <input type="text" class="form-control" name="optionA" required>
            </div>
            <div class="form-group">
              <label for="optionB">Option B:</label>
              <input type="text" class="form-control" name="optionB" required>
            </div>
            <div class="form-group">
              <label for="optionC">Option C:</label>
              <input type="text" class="form-control" name="optionC" required>
            </div>
            <div class="form-group">
              <label for="optionD">Option D:</label>
              <input type="text" class="form-control" name="optionD" required>
            </div>
            <div class="form-group">
              <label for="correctOption">Correct Option:</label>
              <select class="form-control" name="correctOption" required>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
              </select>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Add Quiz</button>
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
