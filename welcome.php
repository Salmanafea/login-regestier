<?php include('includes/header.php');
 include('includes/navbar.php');
 
 $page_tittle= "welcome page";
 session_start();

 ?>


  <div class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Welcome <?php echo $_SESSION['username'];?></h4>

            </div>
            <div class="card-body">
            <h2>You have been logged in successfully</h2>
        

            </div>

        </div>



    
      </div>
    </div>
  </div>
</div>

   



<?php include('includes/footer.php');?>