<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Register</h1>
        <form id="registerForm">
            <!-- Employee Fields -->
            <div class="form-group">
                <input type="text" name="employee_name" class="form-control" placeholder="Employee Name" required>
            </div>
            <div class="form-group">
                <input type="email" name="employee_email" class="form-control" placeholder="Employee Email" required>
            </div>
            <div class="form-group">
                <input type="password" name="employee_password" class="form-control" placeholder="Password" required>
            </div>
            
            <!-- Company Fields -->
            <div class="form-group">
                <input type="text" name="company_name" class="form-control" placeholder="Company Name" required>
            </div>
            <div class="form-group">
                <input type="text" name="company_address" class="form-control" placeholder="Company Address" required>
            </div>
            <div class="form-group">
                <input type="text" name="company_phone" class="form-control" placeholder="Company Phone" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script>
$(document).ready(function(){
    $('#registerForm').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: '<?= base_url('registration/register') ?>',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if (response.status === 'success') {
                    alert('Registration successful');
                    window.location.href = '<?= base_url('login') ?>';
                } else {
                    alert('Registration failed: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
                alert('An error occurred during registration.');
            }
        });
    });
});
</script>


</body>
</html>
