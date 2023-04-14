<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Models;

class contact_Model extends Model
{
    
    protected $table = 'contact_master';
    protected $allowedFields = ['name','email','mo','massage'];
}
