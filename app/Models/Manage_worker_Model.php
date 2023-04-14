<?php

namespace App\Models;

use CodeIgniter\Model;

class Manage_worker_Model extends Model
{
    protected $table = 'worker_master';
    protected $primaryKey = 'email';

    //protected $useAutoIncrement = false;

    protected $returnType     = 'array';

    protected $allowedFields = ['worker_name','worker_surname','email','mo','address','gold'];

    // protected $createdField  = 'creation_dt';
    // protected $updatedField  = 'updated_dt';
    // protected $deletedField  = 'deleted_dt';

    protected $validationRules    = [
        'worker_name' => 'required',
        'worker_surname' => 'required',
        'mobile' => 'required|numeric|exact_length[10]',
        'email' => 'required|valid_email|is_unique[register.email]',
        'Address' =>  'required',
        'gold' =>  'required',

        
    ];
    protected $validationMessages = [
        'worker_name' => [
            'required' => 'Worker Name is required'
        ],
        'worker_surname' => [
            'required' => 'Worker Surname is required'
        ],
        'mobile' =>  [
            'required' => 'Mobile Number is required',
            'numeric' => 'Mobile number contains only Digits',
            'exact_length' => 'Mobile number must contain 10 characters'
        ],
        'email' => [
            'required' => 'Email is required',
            'valid_email' => 'Enter Valid Email address',
            'is_unique' => 'Email is already regsitered',
        ],
        'Address' => [
            'required' => 'Address is required',
        ],
        'gold' => [
            'required' => 'gold is required',
        ],
        
    ];
}
