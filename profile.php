<?php

//profile.php



include('class/Appointment.php');

$object = new Appointment;

$object->query = "
SELECT * FROM patient_table 
WHERE patient_id = '".$_SESSION["patient_id"]."'
";

$result = $object->get_result();

include('header.php');

?>

<div class="container-fluid">
	<?php include('navbar.php'); ?>

	<div class="row justify-content-md-center">
		<div class="col col-md-6">
			<br />
			<?php
			if(isset($_GET['action']) && $_GET['action'] == 'edit')
			{
			?>
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-md-6">
							تعديل المعلومات
						</div>
						<div class="col-md-6 text-right">
							<a href="profile.php" class="btn btn-secondary btn-sm">View</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<form method="post" id="edit_profile_form">
						<div class="form-group">
							<label>ايميل الشخصي للمريض<span class="text-danger">*</span></label>
							<input type="text" name="patient_email_address" id="patient_email_address" class="form-control" required autofocus data-parsley-type="email" data-parsley-trigger="keyup" readonly />
						</div>
						<div class="form-group">
							<label>كلمه المرور للمريض<span class="text-danger">*</span></label>
							<input type="password" name="patient_password" id="patient_password" class="form-control" required  data-parsley-trigger="keyup" />
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>اسم الاول للمريض<span class="text-danger">*</span></label>
									<input type="text" name="patient_first_name" id="patient_first_name" class="form-control" required  data-parsley-trigger="keyup" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>اسم الاخير للمريض<span class="text-danger">*</span></label>
									<input type="text" name="patient_last_name" id="patient_last_name" class="form-control" required  data-parsley-trigger="keyup" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>تاريخ ولادة المريض<span class="text-danger">*</span></label>
									<input type="text" name="patient_date_of_birth" id="patient_date_of_birth" class="form-control" required  data-parsley-trigger="keyup" readonly />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>جنس المريض<span class="text-danger">*</span></label>
									<select name="patient_gender" id="patient_gender" class="form-control">
										<option value="Male">ذكر</option>
										<option value="Female">انثى</option>
										<option value="Other">اخرى</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>هاتف المريض<span class="text-danger">*</span></label>
									<input type="text" name="patient_phone_no" id="patient_phone_no" class="form-control" required  data-parsley-trigger="keyup" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>حاله الاجتماعيه للمريض<span class="text-danger">*</span></label>
									<select name="patient_maritial_status" id="patient_maritial_status" class="form-control">
										<option value="Single">اعزب</option>
										<option value="Married">مزوج</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>عنوان الكامل للمريض<span class="text-danger">*</span></label>
							<textarea name="patient_address" id="patient_address" class="form-control" required data-parsley-trigger="keyup"></textarea>
						</div>
						<div class="form-group text-center">
							<input type="hidden" name="action" value="edit_profile" />
							<input type="submit" name="edit_profile_button" id="edit_profile_button" class="btn btn-primary" value="Edit" />
						</div>
					</form>
				</div>
			</div>

			<br />
			<br />
			

			<?php
			}
			else
			{

				if(isset($_SESSION['success_message']))
				{
					echo $_SESSION['success_message'];
					unset($_SESSION['success_message']);
				}
			?>

			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-md-6">
							المعلومات الشخصية
						</div>
						<div class="col-md-6 text-right">
							<a href="profile.php?action=edit" class="btn btn-secondary btn-sm">Edit</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<table class="table table-striped">
						<?php
						foreach($result as $row)
						{
						?>
						<tr>
							<th class="text-right" width="40%">الاسم</th>
							<td><?php echo $row["patient_first_name"] . ' ' . $row["patient_last_name"]; ?></td>
						</tr>
						<tr>
							<th class="text-right" width="40%">البريد الالكتروني</th>
							<td><?php echo $row["patient_email_address"]; ?></td>
						</tr>
						<tr>
							<th class="text-right" width="40%">كلمة المرور</th>
							<td><?php echo $row["patient_password"]; ?></td>
						</tr>
						<tr>
							<th class="text-right" width="40%">العنوان</th>
							<td><?php echo $row["patient_address"]; ?></td>
						</tr>
						<tr>
							<th class="text-right" width="40%">الهاتف</th>
							<td><?php echo $row["patient_phone_no"]; ?></td>
						</tr>
						<tr>
							<th class="text-right" width="40%">تاريخ الولادة</th>
							<td><?php echo $row["patient_date_of_birth"]; ?></td>
						</tr>
						<tr>
							<th class="text-right" width="40%">الجنس</th>
							<td><?php echo $row["patient_gender"]; ?></td>
						</tr>
						
						<tr>
							<th class="text-right" width="40%">الحالة الاجتماعيه</th>
							<td><?php echo $row["patient_maritial_status"]; ?></td>
						</tr>
						<?php
						}
						?>	
					</table>					
				</div>
			</div>
			<br />
			<br />
			<?php
			}
			?>
		</div>
	</div>
</div>

<?php

include('footer.php');


?>

<script>

$(document).ready(function(){

	$('#patient_date_of_birth').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    });

<?php
	foreach($result as $row)
	{

?>
$('#patient_email_address').val("<?php echo $row['patient_email_address']; ?>");
$('#patient_password').val("<?php echo $row['patient_password']; ?>");
$('#patient_first_name').val("<?php echo $row['patient_first_name']; ?>");
$('#patient_last_name').val("<?php echo $row['patient_last_name']; ?>");
$('#patient_date_of_birth').val("<?php echo $row['patient_date_of_birth']; ?>");
$('#patient_gender').val("<?php echo $row['patient_gender']; ?>");
$('#patient_phone_no').val("<?php echo $row['patient_phone_no']; ?>");
$('#patient_maritial_status').val("<?php echo $row['patient_maritial_status']; ?>");
$('#patient_address').val("<?php echo $row['patient_address']; ?>");

<?php

	}

?>

	$('#edit_profile_form').parsley();

	$('#edit_profile_form').on('submit', function(event){

		event.preventDefault();

		if($('#edit_profile_form').parsley().isValid())
		{
			$.ajax({
				url:"action.php",
				method:"POST",
				data:$(this).serialize(),
				beforeSend:function()
				{
					$('#edit_profile_button').attr('disabled', 'disabled');
					$('#edit_profile_button').val('wait...');
				},
				success:function(data)
				{
					window.location.href = "profile.php";
				}
			})
		}

	});

});

</script>