<?php

namespace App\Controllers;

use App\Models\KorisnikModel;

class Standard extends BaseController {

    public function index() {
        echo view("pocetna_stranica");
    }
}
