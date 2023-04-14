<?php

namespace App\Models;

use CodeIgniter\Model;

class Manage_add_product_Model extends Model
{
    protected $table = 'add_product';
    protected $primaryKey = 'productpic';

    //protected $useAutoIncrement = false;

    protected $returnType     = 'array';

    protected $allowedFields = ['whight','netwhight','productpic'];

    // protected $createdField  = 'creation_dt';
    // protected $updatedField  = 'updated_dt';
    // protected $deletedField  = 'deleted_dt';

    protected $validationRules    = [
        'whight' => 'required',
        'netwhight' => 'required',
    ];
    protected $validationMessages = [
        'whight' => [
            'required' => 'whight is required'
        ],
        'netwhight' => [
            'required' => 'netwhight is required'
        ],
      
    ];
}
