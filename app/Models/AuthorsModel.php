<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthorsModel extends Model
{
    protected $table = 'authors';

    protected $allowedFields = ['name'];

    public function getAuthors()
    {
        
            return $this->findAll();
        

    }

    
}