<?php

namespace App\Models;

use CodeIgniter\Model;

class User_Manage_Model extends Model
{
    protected $table = 'register';
    protected $primaryKey = 'email';

    //protected $useAutoIncrement = false;

    protected $returnType     = 'array';

    protected $allowedFields = ['Owner_name','Shop_name','email','mo','pwd','status'];

    // protected $createdField  = 'creation_dt';
    // protected $updatedField  = 'updated_dt';
    // protected $deletedField  = 'deleted_dt';

    protected $validationRules    = [
        'Owner_name' => 'required',
        'Shop_name' => 'required',
        'mobile' => 'required|numeric|exact_length[10]',
        'email' => 'required|valid_email|is_unique[register.email]',
        'password' =>  'required|min_length[8]|max_length[16]|check_small|check_capital|check_special|check_number',
        
    ];
    protected $validationMessages = [
        'Owner_name' => [
            'required' => 'Owner name is required'
        ],
        'Shop_name' => [
            'required' => 'Shop name is required'
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
        'password' => [
            'required' => 'Password is required',
            'min_length' => 'Minimum 8 characters are Required',
            'max_length' => 'Maximum 16 characters are allowed for password',
            'check_small' => 'Password must contain at least one lower case letter',
            'check_capital' => 'Password must contain at least one Uppercase letter',
            'check_special' => 'Password must contain at least one special symbol',
            'check_number' => 'Password must contain at least one number',
        ],
    ];
}
