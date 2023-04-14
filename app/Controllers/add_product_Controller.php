<?php

namespace App\Controllers;
use App\Models\add_product_Model;
use App\Models\Manage_add_product_Model;
use App\Models\Edit_product_model;





class add_product_Controller extends BaseController
{
    public $usermodel;
    public function __construct()
    {
        helper('form');
        helper('url');
        $this->usermodel =  new Manage_add_product_Model();
    }
 
    public function Manage_Products()
    {
       
        $data['userdata'] = $this->usermodel->findAll();
        return view('manage_add_product', $data);
      
    }
    public function add_product_from()
    {
        $session = \Config\Services::session();
        if ($session->has('my_email')) 
        {
            return view('Admin_add_product_form');
        }
        else
        {
            return redirect()->to("http://localhost/KJ/public/Login123");
        }
    }
    public function add_prod_ins()
    {
        helper('form');
        helper('url');
        $data = [];
        $data['validationError'] = null;
        $session = \Config\Services::session();
        $rules = [
            'whight' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'whight is required'
                ],
            ],
            'netwhight' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'netwhight is required'
                ],
            ],
            'pic' => [
                'rules' => 'uploaded[pic]|max_size[pic,1024]|ext_in[pic,jpg,png,gif]',
                'errors' => [
                    'uploaded' => 'Please select a file to upload',
                    'max_size' => 'Maximum file size should be 10 KB',
                    'ext_in' => 'image file with extension jpg,png and gif are allowed',
                ],
            ]
        ];
        if ($this->request->getPost()) {
            if ($this->validate($rules)) {
                $whight = $this->request->getPostGet('whight');
                $netwhight = $this->request->getPostGet('netwhight');
                $file = $this->request->getFile('pic');
                $new_name = $file->getRandomName();

                if ($file->isValid() && !$file->hasMoved()) 
                    {
                        if ($file->move(FCPATH . 'uploads' , $new_name)) 
                        {
                        } 
                        else 
                        {
                            echo "<script>alert('File Upload Failed Try Again.');</script>";
                        }
                    } 
                    else 
                    {
                        echo $file->getErrorString() . " " . $file->getError();
                    }
                $data = ['whight' => $whight,
                        'netwhight' => $netwhight,
                       'productpic' => $new_name,
                    ];
                //$db=\Config\Database::connect();
                $t1 = new add_product_Model();
                $t1->insert($data);
                
                if(!isset($err))
                {?>
                    <!-- <script type="text/javascript">
                    alert("product add Successfully.");
                </script> -->
                <?php  
                return redirect()->to("http://localhost/KJ/public/Manage_Products");
                }
    
     
                // echo "registration succssfully";
            }
            else
            {
                $data['err']=$this->validator;
            }
            return view('Admin_add_product_form',$data);
            
        }

    }

    public function prod_delete()
    {
        $session = \Config\Services::session();
        if ($session->has('my_email')) 
        {
            $productpic = $this->request->getVar('productpic');
            $db = \Config\Database::connect();
            $q= $db->query("delete from add_product where productpic='$productpic'");
            if($q == true)
            {
                $session->setTempdata('delete_su', 'Your data deleted successfully',1);
                return redirect()->to("http://localhost/KJ/public/Manage_Products");
                  
            }
            else
            {
                $session->setTempdata('delete_no', 'Your data is not deleted, Try again',1);
                return redirect()->to("http://localhost/KJ/public/Manage_Products");
               
            }

        } 
        else 
        {
            return redirect()->to("http://localhost/KJ/public/Login123");
        }
    }


    public function EditproductForm()
    {
        $productpic = $this->request->getVar('productpic');
        // echo $email;
        $data['udata'] = $this->usermodel->find($productpic);
        //print_r($data['udata']);
        return view('edit_product_form', $data);
    }

    public function edit_product()
    {
        $session = \Config\Services::session();
        if ($session->has('my_email')) {
            $email = $session->getTempdata('my_email');
            $epm = new Edit_product_model();
            $userdata = $epm->fetch_data($email);
            $data['userdata'] = $userdata;
            return view('edit_product_form', $data);
        } 
        else
        {
            return redirect()->to("http://localhost/KJ/public/Login123");
        }
    }
    public function editProduct()
    {
        helper('form');
        helper('url');
        $data = [];
        $data['validationError'] = null;
        $session = \Config\Services::session();
        $rules = [
            'whight' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'whight is required'
                ],
            ],
            'netwhight' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'netwhight is required'
                ],
            ],
        ];
        if ($this->request->getPost()) {
            if ($this->validate($rules)) {
                $whight = $this->request->getPostGet('whight');
                $netwhight = $this->request->getPostGet('netwhight');
                // $p_id = $this->request->getVar('id');
                

                $p_id = 15;
               

// echo $p_id;
                $epm = new Edit_product_model();
                $result = $epm->update_data($whight,$netwhight,$p_id);
                    // echo $result;
                if ($result) {
                    $session->setTempdata('success', 'Profile Updated Successfully');
                    return redirect()->to("http://localhost/KJ/public/Manage_Products");
                } else {
                    $session->setTempdata('error', 'Error in updating profile');
                    return redirect()->to("http://localhost/KJ/public/edit_product");
                }
            } else {
                $data['validationError'] = $this->validator;
                return view('edit_product_form', $data);
            }
        }
    }
     





    public function fatch_product()
    {
       
        $data['userdata'] = $this->usermodel->findAll();
        return view('fatch_product_user',$data);
      
    }

}