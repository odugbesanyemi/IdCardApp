<?php 

function page_header($title,$desc){
 echo"
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <meta name = 'description' content='$desc'>
        <title>$title</title>
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'> 
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>                               
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>                
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT' crossorigin='anonymous'>
        <link rel='stylesheet' href='../CSS/main.css'/>        
    </head>
    <body> 
 ";
}

function footer(){
    echo "
        </body>
        <script src='../js/script.js'</script>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js' integrity='sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8' crossorigin='anonymous'></script>
        <script src='https://cdn.jsdelivr.net/npm/apexcharts'></script>
        </html>    
    ";
}
    
function sidebar(){
    echo "
        <aside>
            <div class='navitem'>
                <a href='../index.php'>
                    <i class='fi fi-rr-id-badge'></i>
                <!-- Cards -->
                </a>
            </div>
            <div class='navitem'>
                <a href='profile.php'>
                    <i class='fi fi-rr-settings-sliders'></i>
                    <!-- Profile -->
                </a>
            </div> 
            <div class='navitem'>
                <a href='logout.php'>
                    <i class='fi fi-rs-sign-out-alt'></i>
                    <!-- Profile -->
                </a>
            </div>                          
        </aside>    
    ";
}

function message_display(){
    if(isset($_SESSION ['error'])&& $_SESSION['error'] !== ""){
        echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>Error!</strong> {$_SESSION['error']}
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>        
        ";
        $_SESSION['error']="";        
    }
    if(isset($_SESSION ['message']) && $_SESSION['message'] !== ""){
        echo "
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Succes!</strong> {$_SESSION['message']}
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>        
        ";
        $_SESSION['message']="";
    }    
}

function preloader(){
    echo"
    <div class='pre-loader collapse'>
        <img src='../assets/pre-loader.gif' alt=''>
    </div>    
    ";
}
?>