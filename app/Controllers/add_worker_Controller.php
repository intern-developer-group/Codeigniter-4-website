<?php

namespace App\Controllers;
use App\Models\worker_Model;
use App\Models\Manage_worker_Model;


class add_worker_Controller extends BaseController
{
    public $usermodel;
    public function __construct()
    {
        helper('form');
        helper('url');
        $this->usermodel =  new Manage_worker_Model();
    }

    public function AddWorker()
    {
        $session = \Config\Services::session();
        if ($session->has('my_email')) 
        {
            return view('AddWorker');
        }
        else
        {
            return redirect()->to("http://localhost/KJ/public/Login123");
        }
    }

    public function worker_ins()
    {
        helper('form');
        helper('url');
        $data = [];
        $session = \Config\Services::session();
        $rules = [
            'worker_name' => [
                'rules' => 'required|max_length[25]',
                'errors' => [
                    'required' => 'Worker Name is a required field',
                    'max_length' => 'Maximum length is 25 characters',
                ],
            ],
            'worker_surname' => [
                'rules' => 'required|max_length[25]',
                'errors' => [
                    'required' => 'Worker Surname is a required field',
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
            'address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Worker Address is required',
                   ],
            ],
            'gold' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'How much gold is worker tacking',
                   ],
            ],
            

        

        ];
        if($this->request->getPost())
        {
            if($this->validate($rules))
            {
                //echo "error";
                $worker_name=$this->request->getPostGet('worker_name');
                $worker_surname=$this->request->getPostGet('worker_surname');
                $email=$this->request->getPostGet('email');
                $mo=$this->request->getPostGet('mo');
                $address=$this->request->getPostGet('address');
                $gold=$this->request->getPostGet('gold');


                //$email=md5(str_shuffle();'A to Z ';time());

                $data = ['worker_name' => $worker_name,
                        'worker_surname' => $worker_surname,
                        'email' => $email,
                        'mo' => $mo,
                        'address' => $address,
                        'gold' => $gold,

                    ];
                //$db=\Config\Database::connect();
                $t1 = new worker_Model();
                $t1->insert($data);
                
                if(!isset($err))
                {?>
                  <!--   <script type="text/javascript">
                    alert("registration Successfull.");
                </script> -->
                <?php  
                return redirect()->to("http://localhost/KJ/public/AddWorker");
                }
    
     
                // echo "registration succssfully";
            }
            else
            {
                $data['err']=$this->validator;
            }
            return view('AddWorker',$data);
            
        }
      
        
    }

   
    public function worker_details()
    {
        $session = \Config\Services::session();
        if ($session->has('my_email')) 
        {
            $data['userdata'] = $this->usermodel->findAll();
            return view('Manage_worker_details',$data);
        }
        else
        {
            return redirect()->to("http://localhost/KJ/public/Login123");
        }
    }

    public function delete_worker()
    {
        $session = \Config\Services::session();
        if ($session->has('my_email')) 
        {
            $email = $this->request->getVar('email');
            $db = \Config\Database::connect();
            $q= $db->query("delete from worker_master where email='$email'");
            if($q == true)
            {
                $session->setTempdata('delete_su', 'Your data deleted successfully',1);
                return redirect()->to("http://localhost/KJ/public/worker_details");
                  
            }
            else
            {
                $session->setTempdata('delete_no', 'Your data is not deleted, Try again',1);
                return redirect()->to("http://localhost/KJ/public/worker_details");
               
            }

        } 
        else 
        {
            return redirect()->to("http://localhost/KJ/public/Login123");
        }
    }



    public function EditWorkerForm()
    {
        $email = $this->request->getVar('email');
        // echo $email;
        $data['udata'] = $this->usermodel->find($email);
        //print_r($data['udata']);
        return view('Edit_Worker_view', $data);
    }
    public function EditWorker()
    {
        if ($this->request->getPost()) {
            $worker_name = $this->request->getPostGet('worker_name');
            $worker_surname = $this->request->getPostGet('worker_surname');
            $mo = $this->request->getPostGet('mo');
            $email = $this->request->getPostGet('email');
            // echo $email;
            $address = $this->request->getPostGet('address');
            $gold = $this->request->getPostGet('gold');

            // $unique_id = md5(str_shuffle('abcdefghijklmnopqrstuvwxyz' . time()));
            helper('url');
            $data = [
                'worker_name' => $worker_name,'worker_surname' => $worker_surname, 'mo' => $mo, 'address' => $address, 'gold' => $gold,
            ];
            if ($this->usermodel->update($email, $data)) {

                return redirect()->to("http://localhost/KJ/public/worker_details");
            }
        }
        return view('AddWorker', ['errors' => $this->usermodel->errors()]);
    }


    public function Adminclearworker()
    {
        // echo hello;
        $email = $this->request->getVar('email');
        $data = ['gold' => '0gm'];
        if ($this->usermodel->update($email, $data)) {
            return redirect()->to("http://localhost/KJ/public/worker_details");
        }
    }
}