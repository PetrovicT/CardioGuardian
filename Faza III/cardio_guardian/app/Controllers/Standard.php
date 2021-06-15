<?php

namespace App\Controllers;

use App\Models\KorisnikModel;

class Standard extends BaseController {

    public function index() {
        echo view("pocetna_stranica");
    }

    // analiza podataka
    public function modul1() {
        echo view("modul1.php");
    }

    // trening
    public function modul2() {
        echo view("modul2.html");
    }

    // ishrana
    public function modul3() {
        echo view("modul3.html");
    }

    public function prikazMerenja(){
        echo view("prikazMerenja.php");
    }

    public function trenutnoStanje() {
        echo view("trenutnoStanje.php");
    }
}
