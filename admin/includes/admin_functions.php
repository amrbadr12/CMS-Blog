 <?php
function showAuthor(){
                     if(isset($_SESSION['username'])&&$_SESSION['role']=="admin"){
                    echo $_SESSION['username'];
                                }
}

function showNotification($initalMsg){
    echo "<p class='bg-success'><span class='glyphicon glyphicon-exclamation-sign'></span> ";
    echo $initalMsg." successfully.";
    echo "</p>";
}


?>