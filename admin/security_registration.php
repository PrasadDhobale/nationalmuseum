<?php
require "admin_navbar.php";

require "../connection.php";

date_default_timezone_set('Asia/Kolkata');
$dt=date("Y-m-d H:i:s");

?>

    <div class="container p-4 mt-4 mb-5 shadow border rounded w-75">
    <h2 class="text-info m-4 text-center">Register Security..!</h2>

        <?php
        if(isset($_POST['register'])){
            
            $sec_email = $_POST['sec_email'];

            $check_sec_email = "select sec_email from security where sec_email ='$sec_email'";
            $email = mysqli_query($con, $check_sec_email)->fetch_assoc();
            if($con->affected_rows > 0){
                echo "<script>alert('Security Email Already Exist..!')</script>";
            }else{
            
                $sec_id = $_POST['sec_id'];
                $sec_name =  $_POST['sec_name'];            
                $sec_passwd = $_POST['sec_passwd'];
                $sec_mobile = $_POST['sec_mobile'];
                
                $reg_sec_query = "insert into security values ('$sec_id', '$sec_name', '$sec_email', '$sec_passwd', '$sec_mobile', '$dt')";

                mysqli_query($con, $reg_sec_query);
                if($con->affected_rows > 0){
                    
                    echo "<script>alert('Security Registered Successfully..!')</script>";
                }
            }
        }
        ?>
        
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="mt-5">
                <label for="sec_name" class="mb-2"><b>Name</b></label>
                <input type="text" placeholder="John Martin" name="sec_name" id="sec_name" class="form-control" required>
            </div>
            <div class="mt-5">
                <label for="sec_email" class="mb-2"><b>Email ID</b></label>
                <input type="hidden" name="sec_id" value="<?php echo rand(0000, 100000); ?>">
                <input type="email" placeholder="john@gmail.com" name="sec_email" id="sec_email" class="form-control" required>
            </div>
            <div class="mt-4">
                <label for="passwd" class="mb-2"><b>Password</b></label>
                <input type="password" placeholder="********" name="sec_passwd" id="sec_passwd" class="form-control" required>
            </div>
            <div class="mt-5">
                <label for="sec_mobile" class="mb-2"><b>Mobile</b></label>
                <input type="number" placeholder="+91 9078565623" name="sec_mobile" id="sec_mobile" class="form-control" required>
            </div>
            <div class="text-center pt-4">
                <button  class="btn btn-primary" name="register" value="true"><b>Register </b><i class="fa fa-arrow-right"></i></button>
            </div>
        </form>
    </div>
</body>
</html>