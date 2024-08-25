<div >
  <h2>Users</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Username </th>
        <th class="text-center">Email</th>
        <th class="text-center">Nama</th>
        <th class="text-center">Joining Date</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from tbl_users";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
           
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["username"]?></td>
      <td><?=$row["email"]?></td>
      <td><?=$row["name"]?></td> <!-- Displaying full name -->
      <td><?=$row["created_at"]?></td>
    </tr>
    <?php
            $count=$count+1;
           
        }
    }
    ?>
  </table>