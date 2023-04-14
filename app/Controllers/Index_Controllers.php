<?php

namespace App\Controllers;

use App\Models\Login_Model;

class Index_Controllers extends BaseController
{
        public function index()
        { 
            // echo"hiii";
            return view('Login');
        }
    public function master_admin()
    { 
        // echo"hiii";
        return view('master_admin');
    }
    public function logout()
    {
        $session = \Config\Services::session();
        $session->remove('email');
        $session->destroy();
        return redirect()->to("http://localhost/KJ/public/Login123");
    }
    
 public function login()
 {
     helper('form');
     helper('url');
     if ($this->request->getPost()) 
     {
         $data = [];
         $session = \Config\Services::session();
        
             $email = $this->request->getPostGet('your_email');
             $pass = $this->request->getPostGet('password');
             $lm = new Login_Model();
             $userdata = $lm->verify_email($email);
             if ($userdata) 
             {
                
                if ($pass == $userdata->pwd) 
                 {
                     if ($userdata->status == 'Active') 
                     {
                         $session->setTempdata('email', $userdata->email);
                         // $session->setTempdata('password', $pass);

                         return redirect()->to("http://localhost/KJ/public/main_home");
                     }

                     else if ($userdata->status == 'Admin') 
                     {
                         $session->setTempdata('my_email', $userdata->email);
                         // $session->setTempdata('my_password', $pass);

                         return redirect()->to("http://localhost/KJ/public/ManageUsers");
                     }

                     else 
                     {
                         $session->setTempdata('error', 'Account is not Activated. Contact Admin');
                         return redirect()->to("http://localhost/KJ/public/Login123");
                     }
                 } 
                 else 
                 {
                     $session->setTempdata('error', 'Incorrect Password');
                     return redirect()->to("http://localhost/KJ/public/Login123");
                 }
             } 
             else 
             {
                 $session->setTempdata('error', 'Email Id is not registered');
                 return redirect()->to("http://localhost/KJ/public/Login123");
             }
             return view('Login', $data);           
         }

 }

}