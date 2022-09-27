<?php 
session_start();
if(!($_SESSION['logged_in'])){
    // meaning user is not logged in
    $error = "Session Expired Login!";
    $_SESSION['error'] = $error;
    header('location:../sign-in.php');
}
include("includes/functions.php");
page_header('Dashboard | IDME ','Save information that matters');
message_display();
preloader();
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
        <section class="mb-4 mb-0-md">
            <div class="container">
                <div class="row g-5">
                    <div class="col-md-8 ">
                        <h2>My Profile</h2>
                        <hr>
                        <div class="profile-details">
                            <form action="" id="formElementText">
                                <div class="input-group">
                                    <label for="fName" class="d-block">First Name</label>
                                    <div class="d-flex align-items-center">
                                        <i class="fi fi-rs-user me-2 ps-2"></i>
                                        <input type="text" name="firstname" id="fName" class="border-0 outline-0 w-100 transparent" >
                                    </div>
                                </div>
                                <div class="input-group">
                                    <label for="pName" class="d-block">Other Names</label>
                                    <div class="d-flex align-items-center">
                                        <i class="fi fi-rs-user me-2 ps-2"></i>
                                        <input type="text" name="othername" id="oName" class="border-0 outline-0 w-100 transparent" >
                                    </div>
                                </div>
                                <div class="input-group">
                                    <label for="lName" class="d-block">Surname</label>
                                    <div class="d-flex align-items-center">
                                        <i class="fi fi-rs-user me-2 ps-2"></i>
                                        <input type="text" name="lastname" id="lName" class="border-0 outline-0 w-100 transparent" >
                                    </div>
                                </div>    
                                <div class="input-group">
                                    <label for="school">Choose School</label>
                                    <div class="d-flex align-items-center">
                                        <i class="fi fi-rr-presentation me-2 ps-2"></i>
                                        <select name="schoolID" id="school" class="w-100 border-0">
                                        </select>
                                    </div>
                                </div>                                
                                <div class="input-group">
                                    <label for="regNo" class="d-block">Matric No</label>
                                    <div class="d-flex align-items-center">
                                        <i class="fi fi-rr-id-badge me-2 ps-2"></i>
                                        <input type="number" name="regNo" id="regNo" class="border-0 outline-0 w-100 transparent" >
                                    </div>
                                </div>      
                                <div class="d-flex align-items-center flex-md-row flex-column">
                                    <div class="input-group">
                                        <label for="department">Choose Department</label>
                                        <div class="d-flex align-items-center">
                                            <i class="fi fi-rr-presentation me-2 ps-2"></i>
                                            <select name="departmentID" id="department" class="w-100 border-0"></select>
                                        </div>
                                    </div>      
                                    <div class="input-group ms-md-3">
                                        <label for="department">Choose Level</label>
                                        <div class="d-flex align-items-center">
                                            <i class="fi fi-rr-presentation me-2 ps-2"></i>
                                            <select name="levelID" id="level" class="w-100 border-0"></select>
                                        </div>
                                    </div>                                                                   
                                </div>
                                <div class="input-group">
                                    <label for="adyear" class="d-block">Admission Year</label>
                                    <div class="d-flex align-items-center">
                                        <i class="fi fi-rr-calendar me-2 ps-2"></i>
                                        <input type="date" name="adyear" id="adyear" class="border-0 outline-0 w-100 transparent" >
                                    </div>
                                </div>                                                                                      
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- for passport image -->
                        <div class="showImage">
                            <img src="assets/pre-loader.gif" alt="">
                        </div>
                        <div class="msgPanel text-danger"></div>
                        <form action="" method="POST" enctype="multipart/form-data" id="pictureForm">
                            <input type="file" name="uploadFile" class="form-control" id="uploadFile">   
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
<script>
        let formElementText = document.querySelector('#formElementText')
        let formInput = formElementText.querySelectorAll(':scope input, :scope select')
        let firstName = formElementText.querySelector(':scope #fName')
        let otherName = formElementText.querySelector(':scope #oName')
        let lastName = formElementText.querySelector(':scope #lName')
        let school_name = formElementText.querySelector(':scope #school')
        let regNo = formElementText.querySelector(':scope #regNo')
        let department = formElementText.querySelector(':scope #department')
        let level = formElementText.querySelector(':scope #level')
        let adyear = formElementText.querySelector(':scope #adyear')
        let userImage = document.querySelector('.showImage img')
        let pictureUploadForm = document.querySelector('#pictureForm')
        let pictureUploadBtn = document.querySelector('#uploadBtn')
        let pictureFile = document.querySelector('#uploadFile')
        let populateSelect = (elem) =>{
            fetch(`fetchPHP/fetchTableData.php?tablename=${elem.id}`)
            .then(response => response.json())
            .then(data => {
                for (const x of data) {
                    let option = document.createElement('option')
                    option.textContent = x[`${elem.id}_name`]
                    option.value = x[`id`]
                    elem.append(option)
                }

            })
            .catch(error => console.log(error))
        }      
        // populate select fields 
        // school options

        populateSelect(school_name)
        populateSelect(department)
        populateSelect(level)  
        let chooseOption = (elem,actual)=> {
            let child_element = elem.querySelectorAll(':scope option')
            // console.log(child_element)
            for (let x of child_element) {
                if( x.value == actual){
                    x.selected = true
                }
            }
        }
        let show_data = ()=>{
        fetch('fetchPHP/getData.php?getALL')
            .then(response => response.json())
            .then(data => {
                    firstName.value = data[0]['firstname']
                    otherName.value = data[0]['othername']
                    lastName.value = data[0]['lastname']
                    regNo.value = data[0]['regNo']
                    adyear.value = data[0]['adyear'] 
                    userImage.src = `../assets/img/${data[0]['picturename']}`
                    chooseOption(school_name,data[0]['schoolID'])       
                    chooseOption(department,data[0]['departmentID'])       
                    chooseOption(level,data[0]['levelID'])       
            })
            .catch(error => console.log(error))
        }
    show_data();
// add data to database
    let addData = (elem)=>{
        elem.onchange = ()=>{          
            // alert(elem.name)
            // when input changes 
            let pre_loader = document.querySelector('.pre-loader')
            pre_loader.classList.remove('collapse')
            fetch(`fetchPHP/addData.php?field=${elem.name}&fieldvalue=${elem.value}`,{
            })
            .then(response => response.text())
            .then(message => {
                pre_loader.classList.add('collapse'),
                console.log(message)})
            .catch(error => console.log(error))
        }
    }
    for (const x of formInput) {
        addData(x)        
    }

// ----------------------------------------------------------
// upload image


// ---------------------uploadFile Function
let msgPanel = document.querySelector('.msgPanel')
let uploadFiles = (file) =>{
    msgPanel.innerHTML = ""    
    if(!['image/jpeg', 'image/png'].includes(file.type)){
        msgPanel.innerHTML = "File Type must be JPEG/ PNG only"
        pictureFile.value = ""
        return
    }
    if(file.size > 1024*1024){
        msgPanel.innerHTML = "File size can't me more than 1mb"
        pictureFile.value = ""
        return
    }
    const formData = new FormData()
    formData.append('userImg',file)
    fetch('fetchPHP/uploadPicture.php',{
        method:"POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        msgPanel.innerHTML = `<p class='text-success'>${data}</p>`
    })
    .catch(error => console.log(error))
}
pictureFile.onchange = ()=>{
    uploadFiles(pictureFile.files[0]) 
    show_data()  
}

</script>
<?php
footer();
?>