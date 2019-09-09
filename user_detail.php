<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(function() {
        $(".user_del_btn").click(function() {
            var user_id = $(this).attr("id");
            var info = 'id=' + user_id;
            if (confirm("Sure you want to delete this user? This cannot be undone later.")) {
                $.ajax({
                    type : "POST",
                    url : "delete_user.php",
                    data : info,
                    success : function() {
                    	$("#row"+user_id).remove();
                    }
                });
                $(this).parents(".record").animate("fast").animate({
                    opacity : "hide"
                });
            }
            return false;
        });
    });
</script>
<style>
	table th, .del-btn{
		text-align: center;
	}
	#user_delete_form i{
		margin-left: 5px;
	}
</style>

<?php

include 'db.php';

$show_user_tbl = $_POST["show_tbl_val"];

if (isset($show_user_tbl)) {
	$sql_users = "SELECT * FROM users";
	$sql_user_rslt = mysqli_query($conn,$sql_users);
?>
	<table class="table table-hover table-bordered table-sm" id="user_table">
		<thead class="thead-light">
			<tr>
				<th scope="col">Name</th>
		      	<th scope="col">Tel No.</th>
		      	<th scope="col">NIC No.</th>
		      	<th scope="col">Gender</th>
		      	<th scope="col">Email</th>
		      	<th scope="col">Profession</th>
		      	<th scope="col">User Type</th>
		      	<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody class="">
		<?php
			while ($row = mysqli_fetch_array($sql_user_rslt)) {
		?>
			<tr id="row<?php echo $row['id']; ?>">
				<td><?php echo $row["first_name"]." ".$row["second_name"]; ?></td>
				<td><?php echo $row["tel"] ?></td>
				<td><?php echo $row["nic"] ?></td>
				<td><?php echo $row["gender"] ?></td>
				<td><?php echo $row["email"] ?></td>
				<td><?php echo $row["profession"] ?></td>
				<td><?php echo $row["type"] ?></td>
				<td class="del-btn">
					<form id="user_delete_form">
						<button class="btn btn-danger btn-sm user_del_btn" id="<?php echo $row['id']; ?>"><i class="fas fa-user-times"></i></button>
                </form>
				</td>
			</tr>
		<?php				
			}
		?>
		</tbody>
	</table>
<?php
}
?>