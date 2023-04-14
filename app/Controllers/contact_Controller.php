<?php

namespace App\Controllers;
use App\Models\contact_Model;
use App\Models\contact_Manage_Model;



class contact_Controller extends BaseController
{
public function contact()
    {
        $session = \Config\Services::session();
        if ($session->has('email')) 
        {
            return view('main_contact');
        }
        else
        {
            return redirect()->to("http://localhost/KJ/public/Login123");
        }
    }

    public function contact_ins()
    {
        
        
        helper('form');
        helper('url');
        $data = [];
        $session = \Config\Services::session();
        $rules = [
            'name' => [
                'rules' => 'required|max_length[25]',
                'errors' => [
                    'required' => 'Name is a required field',
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
            
            'massage' => [
                'rules' => 'required|max_length[20]',
                'errors' => [
                    'required' => 'Massage is a required field',
                    'max_length' => 'Maximum length is 200 characters',
                ],
            ],
        

        ];
        

        if($this->request->getPost())
        {
            if($this->validate($rules))
            {
                //echo "error";
                $name=$this->request->getPostGet('name');
                $email=$this->request->getPostGet('email');
                $mo=$this->request->getPostGet('mo');
                $massage=$this->request->getPostGet('massage');

                //$email=md5(str_shuffle();'A to Z ';time());

                $data = ['name' => $name,
                        'email' => $email,
                        'mo' => $mo,
                        'massage' => $massage,
                    ];
                //$db=\Config\Database::connect();
                $t1 = new contact_Model();
               $abc= $t1->insert($data);
                
                if(!isset($err))
                {?>
                    <script type="text/javascript">
                    alert("Massage Sand Successfull.");
                </script>
                <?php  
                // return redirect()->to("http://localhost/KJ/public/contact");
                }
    
     
                // echo "registration succssfully";
            }
            else
            {
                $data['err']=$this->validator;

            }
            return view('main_contact',$data);
            
        }
      
        
    }


    public $usermodel;
    public function __construct()
    {
        helper('form');
        helper('url');
        $this->usermodel =  new contact_Manage_Model();
    }
    public function ManageContact()
    {
        $data['userdata'] = $this->usermodel->findAll();
        return view("Manage_contact", $data);
    }
    public function AdminDeleteContact()
    {
        $session = \Config\Services::session();
        if ($session->has('my_email')) 
        {
            $email = $this->request->getPostget('email');
            $db = \Config\Database::connect();
            $q= $db->query("delete from contact_master where email='$email'");
            if($q == true)
            {
                $session->setTempdata('delete_su', 'Your data deleted successfully',1);
                return redirect()->to("http://localhost/KJ/public/ManageContact");
                  
            }
            else
            {
                $session->setTempdata('delete_no', 'Your data is not deleted, Try again',1);
                return redirect()->to("http://localhost/KJ/public/ManageContact");
               
            }

        } 
        else 
        {
            return redirect()->to("http://localhost/KJ/public/Login123");
        }
    }


}