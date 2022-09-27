<?php 
include("includes/functions.php");
session_start();
page_header('Sign up | IDME ','Register an account to get your id card');
message_display();
?>
<div class="pre-loader collapse">
    <img src="assets/pre-loader.gif" alt="">
</div>
<div class="page">
    <div class="auth-wrapper">
        <div class="auth-header text-center mt-5">
            <h1 class="fw-bold mb-2">Sign Up</h1>
            <p class="mb-5">IDME | Data Management</p>
        </div>
        <form action="php/loginscript.php" method="POST">
            <div class="input-group">
                <label for="username" class="d-block">Username</label>
                <div class="d-flex align-items-center">
                    <i class="fi fi-rs-user me-2 ps-2"></i>
                    <input type="text" name="username" id="username" class="border-0 outline-0 w-100 transparent" >
                </div>
            </div>
            <div class="input-group">
                <label for="password" class="d-block">Password</label>
                <div class="d-flex align-items-center">
                <i class="fi fi-rr-fingerprint me-2 ps-2"></i>
                    <input type="text" name="password" id="password" class="border-0 outline-0 w-100" >
                </div>
            </div>
            <div class="submitBtn">
                <p class="mt-4 text-center">Have an account?<a href="sign-in.php">Sign in</a></p>
                <button name="submit-btn">Continue</button>
            </div>
        </form>
    </div>
</div>

<!-- <script>
    // fetch api for registration of data
    const submitBtn = document.querySelector('.submitBtn button')

</script> -->

<script src="https://cdn.jsdelivr.net/npm/apexcharts">
</script>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js' integrity='sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8' crossorigin='anonymous'></script>
<?php
footer();
?>