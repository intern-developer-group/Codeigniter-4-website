<?php

namespace App\Models;

use CodeIgniter\Model;

class contact_Manage_Model extends Model
{
    protected $table = 'contact_master';
    protected $primaryKey = 'email';

    //protected $useAutoIncrement = false;

    protected $returnType     = 'array';

    protected $allowedFields = ['name','email','mo','massage'];

    // protected $createdField  = 'creation_dt';
    // protected $updatedField  = 'updated_dt';
    // protected $deletedField  = 'deleted_dt';

    protected $validationRules    = [
        'name' => 'required',
        'mo' => 'required|numeric|exact_length[10]',
        'email' => 'required|',
        'massage' =>  'required',
        
    ];
    protected $validationMessages = [
        'Owner_name' => [
            'required' => 'name is required'
        ],
        'mobile' =>  [
            'required' => 'Mobile Number is required',
            'numeric' => 'Mobile number contains only Digits',
            'exact_length' => 'Mobile number must contain 10 characters'
        ],
        'email' => [
            'required' => 'Email is required',
        ],
        'password' => [
            'required' => 'Password is required',
        ],
    ];
}
