<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Models;

class Reg_Model extends Model
{
    protected $table = 'register';
    protected $allowedFields = ['Owner_name','Shop_name','email','mo','pwd','status'];
}
