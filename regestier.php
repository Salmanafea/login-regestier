

<?php 
$page_tittle= "Regestier Form";
include('includes/header.php');
 include('includes/navbar.php');
 include('connection.php');

 if(isset($_POST['register'])){
    $username =mysqli_real_escape_string( $conn ,$_POST['name']);
    $phone  =mysqli_real_escape_string( $conn,$_POST['phone']);
    $email  = mysqli_real_escape_string( $conn, $_POST['email']);
    $password =mysqli_real_escape_string( $conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string( $conn, $_POST['confirm-password']);
    
    $s = "SELECT *FROM users WHERE username='$username'";
    $result =mysqli_query($conn,$s);
    $num=mysqli_num_rows($result);


     if($num==0){
        if($password==$confirm_password){
            
    $hash=password_hash($password,PASSWORD_DEFAULT);
    $reg = "INSERT INTO users (`username`,`phone`,`email`,`password`)values('$username','$phone','$email','$hash')";
    $result=mysqli_query($conn,$reg);
    

     echo '<script>
            alert("Registration Successfull");
            window.location.href="index.php";
            </script';
    

        }else{
            echo '<script>
            alert("Password Not Match!!");
            window.location.href="regestier.php";
            </script';
        }

     }else{
           echo '<script>
            alert("Username Already taken");
            window.location.href="regestier.php";
            </script';

     }


















 }












 ?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Regestration Form</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control">

                            </div>
                            <div class="form-group mb-3">
                                <label for="">Phone Number</label>
                                <input type="text" name="phone" class="form-control">

                            </div>
                            <div class="form-group mb-3">
                                <label for="">Email Address</label>
                                <input type="text" name="email" class="form-control">

                            </div>
                            <div class="form-group mb-3">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control">

                            </div>
                            <div class="form-group mb-3">
                                <label for="">Confirm Password</label>
                                <input type="password" name="confirm-password" class="form-control">

                            </div>

                            <div class="form-group">
                                <button type="sumbit" name="register" class="btn btn-primary">Register Now</button>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>




<?php include('includes/footer.php');?>