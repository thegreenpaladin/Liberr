<?php
require('dbconn.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Libra - Home</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    </head>
    <body class="vh-100 bg-dark text-light">
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary ps-2">
            <a class="navbar-brand text-dark fw-bold" href="#">Libra</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav ms-auto text-dark">
                <!-- <a class="nav-item nav-link text-dark" href="shome.html">Switch to Student</a> -->
                <a class="nav-item nav-link text-dark fw-bold" href="#">Librarian</a>
                <a class="navbar-brand border border-dark rounded-circle" href="#"><img src="../../user.svg" alt="hello" width="60" height="40"></a>
              </div>
            </div>
        </nav>
        <div class="d-flex">
            <div class="d-flex text-wrap w-50 ms-2 me-5 mt-5">
                <div class="h2">
                    Welcome to Libra, your one-stop destination to borrow and read the books you love!
                </div>
            </div>
            <div class="d-flex justify-content-center w-25 float-end pt-2 mt-3 rounded-3 text-dark bg-secondary">
                <form action="signup.php" method="post">
                    <div class="text-center mb-3">
                        <h2>Register</h2>
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example1">Name</label>
                        <input type="text" name="Name" id="form2Example1" class="form-control" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example1">Email address</label>
                        <input type="email" name="Email" id="form2Example1" class="form-control"required>
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example2">Password</label>
                        <input type="password" name="Password" id="form2Example2" class="form-control" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example1">Contact No.</label>
                        <input type="number" name="ContactNum" id="form2Example1" class="form-control" required>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-dark btn-block mb-2" name="signup" value="Sign up">
                    </div>
                    <div class="text-center">
                        <p>Already a member? <a class="text-dark" href="home.php">Sign in instead</a></p>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>

<?php
if(isset($_POST['signup'])) {
	$name=$_POST['Name'];
	$email=$_POST['Email'];
	$password=$_POST['Password'];
	$contact=$_POST['ContactNum'];

	$sql="insert into LMS.librarians (Name, Email,Password,ContactNo) values ('$name', '$email', '$password', '$contact')";

	if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>alert('Registration Successful')</script>";
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        echo "<script type='text/javascript'>alert('User Exists')</script>";
    }
}
?>