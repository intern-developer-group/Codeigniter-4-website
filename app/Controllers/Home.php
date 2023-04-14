<?php

namespace App\Controllers;
use App\Models\Reg_Model;


class Home extends BaseController
{
    public function index()
    {
        return view('Home');
    }
    public function main_home()
    {
        return view('main_home');
    }
    public function register()
    {
        $session = \Config\Services::session();
        if ($session->has('my_email')) 
        {
            return view('register');
        }
        else
        {
            return redirect()->to("http://localhost/KJ/public/Login123");
        }
    }
    public function login()
    {
        return view('login');
    }
    public function register_ins()
    {
        
        
        helper('form');
        helper('url');
        $data = [];
        $session = \Config\Services::session();
        $rules = [
            'Owner_name' => [
                'rules' => 'required|max_length[25]',
                'errors' => [
                    'required' => 'Owner Name is a required field',
                    'max_length' => 'Maximum length is 25 characters',
                ],
            ],
            'Shop_name' => [
                'rules' => 'required|max_length[25]',
                'errors' => [
                    'required' => 'Shop Name is a required field',
                    'max_length' => 'Maximum length is 25 characters',
                ],
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email is a required field',
                    'valid_email' => 'Invalid email address',
                ],
            ],

            'mo' => [
                'rules' => 'required|min_length[10]|max_length[10]',
                'errors' => [
                    'required' => 'Mobile is a required field',
                    'min_length' => 'Please enter 10 number',
                    'max_length' => 'Enter 10 number only',
                ],
            ],
            'pwd' => [
                'rules' => 'required|min_length[8]|max_length[16]|check_small|check_capital|check_special|check_number',
                'errors' => [
                    'required' => 'Password is required',
                    'min_length' => 'Minimum 8 characters are Required',
                    'max_length' => 'Maximum 16 characters are allowed for password',
                    'check_small' => 'Password must contain at least one lower case letter',
                    'check_capital' => 'Password must contain at least one Uppercase letter',
                    'check_special' => 'Password must contain at least one special symbol',
                    'check_number' => 'Password must contain at least one number',
                ],
            ],

        

        ];
        // if ($this->request->getPost()) 
        // {
        //     if ($this->validate($rules)) 
        //     {
        //         // $fn = $this->request->getPostGet('nm');
        //         // $email = $this->request->getPostGet('em');
        //         // $pwd = $this->request->getPostGet('pwd');

        //         // $data1 = ['fullname' => $fn, 'email' => $email, 'password' => $pwd,];
        //         // $db = \Config\Database::connect();
        //         // $builder = $db->table('reg');
        //         // if ($builder->insert($data1)) 
        //         // {
        //         //     return view('register');
        //         // } 
        //         // else 
        //         // {
                    
        //         // }
        //     } 
        //     else 
        //     {
        //         $data['err'] = $this->validator;
        //         return view('register', $data);
        //     }
        // }

        if($this->request->getPost())
        {
            if($this->validate($rules))
            {
                //echo "error";
                $Owner_name=$this->request->getPostGet('Owner_name');
                $Shop_name=$this->request->getPostGet('Shop_name');
                $email=$this->request->getPostGet('email');
                $mo=$this->request->getPostGet('mo');
                $pwd=$this->request->getPostGet('pwd');

                //$email=md5(str_shuffle();'A to Z ';time());

                $data = ['Owner_name' => $Owner_name,
                        'Shop_name' => $Shop_name,
                        'email' => $email,
                        'mo' => $mo,
                        'pwd' => $pwd,
                        'status' => 'Active',
                    ];
                //$db=\Config\Database::connect();
                $t1 = new Reg_Model();
                $t1->insert($data);
                
                if(!isset($err))
                {?>
                  <!--   <script type="text/javascript">
                    alert("registration Successfull.");
                </script> -->
                <?php  
                return redirect()->to("http://localhost/KJ/public/ManageUsers");
                }
    
     
                // echo "registration succssfully";
            }
            else
            {
                $data['err']=$this->validator;
            }
            return view('register',$data);
            
        }
      
        
    }

}
