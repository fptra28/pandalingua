<div id="progressBtn">
    <h2>Learning Progress</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Level</th>
                <th>Progress</th>
                <th>Status</th>
                <th>More Details</th>
            </tr>
        </thead>
        <?php
        include_once "../config/dbconnect.php";
        $sql = "SELECT * FROM tbl_usercourses"; // Update with actual table name
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?=$row["user_id"]?></td>
                <td><?=$row["name"]?></td>
                <td><?=$row["level"]?></td>
                <td><?=$row["status"]?></td>
                <?php 
                    if ($row["status"] == "In Progress") {
                ?>
                    <td><button class="btn btn-warning" onclick="ChangeProgressStatus('<?=$row['user_id']?>')">In Progress</button></td>
                <?php
                    } else {
                ?>
                    <td><button class="btn btn-success" onclick="ChangeProgressStatus('<?=$row['user_id']?>')">Completed</button></td>
                <?php
                    }
                ?>
                <td><a class="btn btn-primary openPopup" data-href="./adminView/viewUserProgress.php?userID=<?=$row['user_id']?>" href="javascript:void(0);">View</a></td>
            </tr>
        <?php
            }
        }
        ?>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">User Progress Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="order-view-modal modal-body">
                <!-- Dynamic content will be loaded here -->
            </div>
        </div><!--/ Modal content-->
    </div><!-- /Modal dialog-->
</div>

<script>
    // For view progress modal  
    $(document).ready(function(){
        $('.openPopup').on('click',function(){
            var dataURL = $(this).attr('data-href');

            $('.order-view-modal').load(dataURL,function(){
                $('#viewModal').modal({show:true});
            });
        });
    });
</script>
