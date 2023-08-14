<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';

    protected $allowedFields = ['title','author_id' ,'image', 'description','date'];

    public function getNews()
    {
        
            return $this->findAll();
        

    }

    public function getNewsById($id)
    {
        return $this->find($id);
    }

    
}