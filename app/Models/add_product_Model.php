<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Models;

class add_product_Model extends Model
{
    protected $table = 'add_product';
    protected $allowedFields = ['whight','netwhight','productpic'];
}
