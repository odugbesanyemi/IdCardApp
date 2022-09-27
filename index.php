<?php 
session_start();
include("includes/functions.php");
include("includes/dbconnect.php");
if(!($_SESSION['logged_in'])){
    // meaning user is not logged in
    $error = "Session Expired Login!";
    $_SESSION['error'] = $error;
    header('location:../sign-in.php');
}
page_header('Dashboard | IDME ','Save information that matters');
$sql = "SELECT * FROM user";
mysqli_query($conn,$sql);
?>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">IDME </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>            
        </div>
    </nav>
    <div class="page-content">
        <?php sidebar()?>
        <section>
            <div class="container">
                <div class="row g-2">
                    <div class="col-md-6 mb-4 mb-0-md">
                        <div class="card-display p-5 text-white shadow">
                            <h2>Hello</h2>
                            <h6 id="user_name"></h6>
                            <div class="py-3 collapse" id="other_info">
                                <p class="text-warning m-0 fs-5" id="matric_info">No information Yet!</p>
                                <p id="fullname_info"><small>Visit Profile to Add Data</small></p>
                                <a href="profile.php" class="text-white" id="inst"><i class="fi fi-rr-interrogation me-3"></i> Submit Data now</a>
                                <a href="#" class="text-white">Status: <span id="check-status" class="text-muted"></span></a>
                            </div>                            
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="shadow shadow-sm p-5 rounded-3 rounded">
                            <h2>Calendar</h2>
                            <hr>
                            <div class="calendar-section">
                                <h4 class="text-danger">coming Soon!</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row"></div>
            </div>
        </section>
    </div>

<script>
    let show_data = ()=>{
        fetch('fetchPHP/getData.php?getALL')
        .then(response => response.json())
        .then(data => {
            console.log(data[0])
            let user_name = document.querySelector('#user_name')
            let user_info = document.querySelector('#other_info')
            let checkStatus = document.querySelector('#check-status')
            
            user_name.textContent = data[0]['username']
            if(data[0]['firstname']==""){
                user_info.classList.remove('collapse')
            }else{
                let matric_info = document.querySelector('#matric_info')
                let fullname_info = document.querySelector('#fullname_info')
                let inst = document.querySelector('#inst')

                matric_info.textContent = `JPTS/DIP ASICUK/BSC/ ${data[0]['regNo']}`
                checkStatus.textContent = `${data[0]['id_status']}`
                fullname_info.textContent = `${data[0]['lastname']} ${data[0]['firstname']}  ${data[0]['othername']}`
                inst.classList.add('collapse')
                user_info.classList.remove('collapse')                  
            }
        })
        .catch(error => console.log(error))
    }
    show_data();
</script>
<?php
footer();
?>