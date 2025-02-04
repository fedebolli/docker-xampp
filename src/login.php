<?php

if($_GET == null){
    echo $_GET['userename'];
    echo $_GET['pw'];
}
    
else if($_POST == null)
    echo "richiesta non tramite POST";
