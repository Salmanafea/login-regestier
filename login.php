

<?php 
$page_tittle= "Login Form";
include('includes/header.php');
include('includes/navbar.php');
include ('connection.php');


if(isset($_POST['login'])){
    $username =mysqli_real_escape_string($conn,$_POST['username']);
    $password =mysqli_real_escape_string($conn,$_POST['password']);

    $sql = "select *from users where username='$username'or email='$username'";
    $result=mysqli_query($conn,$sql);
    $row =mysqli_fetch_array($result,MYSQLI_ASSOC);
 

    if($row){
        if(password_verify($password,$row["password"])){
            
    $sql = "select username from users where username='$username'or email='$username'";
    $r =mysqli_fetch_array(mysqli_query($conn,$sql));
    session_start();
    $_SESSION['username']=$r['username'];

            header("Location:welcome.php");
        }
    }
    else{
        echo '<script>
           alert("Invalied username/email or password !!");
           window.location.href="login.php";

         </script>';
    }

}















 ?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Login Form</h5>
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="POST">
                         
                            <div class="form-group mb-3">
                                <label for="">Enter UserName/Email</label>
                                <input type="text" name="username" class="form-control">

                            </div>
                            <div class="form-group mb-3">
                                <label for=""> Enter Password</label>
                                <input type="password" name="password" class="form-control">

                            </div>
                           

                            <div class="form-group">
                                <button type="sumbit" name="login" class="btn btn-primary">Login Now</button>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>




<?php include('includes/footer.php');?>