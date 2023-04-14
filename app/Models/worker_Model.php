<?php

namespace App\Models;

use CodeIgniter\Model;

class worker_Model extends Model
{
    protected $table = 'worker_master';
    protected $allowedFields = ['worker_name','worker_surname','email','mo','address','gold'];
}
