<?php

use App\Models\KorisnikModel;

$controller = session()->get('controller');

$korisnikModel = new KorisnikModel();

if($controller){
    require_once 'header_'.$controller.'.php';
}

else{
    require_once 'header_Gost.php';
}
    
