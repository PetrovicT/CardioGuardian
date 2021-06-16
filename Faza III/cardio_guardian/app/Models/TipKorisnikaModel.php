<?php

namespace App\Models;

use CodeIgniter\Model;

class TipKorisnikaModel extends Model {
    const korisnikNaziv = 'Standard';
    const premiumNaziv = 'Premium';
    const administratorNaziv = 'Administrator';
    
    protected $table = 'tip_korisnika';
    protected $primaryKey = 'idTipKorisnika';
    protected $returnType = 'object';
    
    // Vraca ID  tipa obicnog korisnika
    public function getKorisnikId() {
        return $this->where('tip', self::korisnikNaziv)->first()->idTipKorisnika;
    }    
}
