<?php namespace App\Models;

use CodeIgniter\Model;

class PolModel extends Model
{
        protected $table      = 'pol';
        protected $primaryKey = 'idPol';
        protected $returnType = 'object';

        protected $useAutoIncrement = true;
        protected $allowedFields = [];

        // vraca string pol ciji id prosledimo
        public function nadjiPol($idPol){
        return $this->find($idPol)->pol;
        }
}

