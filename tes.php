<?php
$pas ='$2y$10$krtuLeQmFqbt8J2scf8zMeRJUk.WlBKarRr01XJ58rq';
if (password_verify('edo', $pas)){
    echo "login";
}else{
    echo "try again";
}

echo md5('edo');
?>