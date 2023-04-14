<?php

namespace App\Controllers;

use App\Models\Edit_profile_model;
// use App\Models\Activate_Model;

class UserDashboardController extends BaseController
{
    public function edit_profile()
    {
        $session = \Config\Services::session();
        if ($session->has('email')) {
            $email = $session->getTempdata('email');
            $epm = new Edit_profile_model();
            $userdata = $epm->fetch_data($email);
            $data['userdata'] = $userdata;
            return view('edit_profile_form', $data);
        } 
        else if($session->has('my_email')) {
            $email = $session->getTempdata('my_email');
            $epm = new Edit_profile_model();
            $userdata = $epm->fetch_data($email);
            $data['userdata'] = $userdata;
            return view('Admin_edit_profile_form', $data);
        }
        else
        {
            return redirect()->to("http://localhost/KJ/public/Login123");
        }
    }
    public function editProfile()
    {
        helper('form');
        helper('url');
        $data = [];
        $data['validationError'] = null;
        $session = \Config\Services::session();
        $rules = [
            'Owner_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Owner_name is required'
                ],
            ],
            'Shop_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Shop_name is required'
                ],
            ],
            'mo' => [
                'rules' => 'required|numeric|exact_length[10]',
                'errors' => [
                    'required' => 'Mobile Number is required',
                    'numeric' => 'Mobile number contains only Digits',
                    'exact_length' => 'Mobile number must contain 10 characters'
                ],
            ],
        ];
        if ($this->request->getPost()) {
            if ($this->validate($rules)) {
                $Owner_name = $this->request->getPostGet('Owner_name');
                $Shop_name = $this->request->getPostGet('Shop_name');
                $email = $this->request->getPostGet('email');
                $mo = $this->request->getPostGet('mo');
                $epm = new Edit_profile_model();
                $result = $epm->update_data($email, $Shop_name, $mo, $Owner_name);
                    // echo $result;
                if ($result) {
                    $session->setTempdata('success', 'Profile Updated Successfully');
                    return redirect()->to("http://localhost/KJ/public/edit_profile");
                } else {
                    $session->setTempdata('error', 'Error in updating profile');
                    return redirect()->to("http://localhost/KJ/public/edit_profile");
                }
            } else {
                $data['validationError'] = $this->validator;
                return view('edit_profile_form', $data);
            }
        }
    }
    public function change_password()
    {
        $session = \Config\Services::session();
        if ($session->has('email')) {

            return view('changePassword');
        } else if($session->has('my_email')){
             return view('Admin_changePassword');
        }else{
            return redirect()->to("http://localhost/KJ/public/Login123");
        }
    }
    public function updatepassword()
    {
        
        helper('form');
        helper('url');
        $data = [];
        $data['validationError'] = null;
        $session = \Config\Services::session();
        if ($session->has('email')) {
            $rules = [
                'pwd' => [
                    'rules' => 'required|max_length[25]|min_length[8]|check_special|',
                    'errors' => [
                        'required' => 'Password is a required field',
                        'max_length' => 'Maximum length is 25 characters',
                        'min_length' => 'Minimum length is 8 Characters',
                        'check_special' => 'use /[!@#$%^&*()\-_=+{};:,<.>~]/',
                    ],
                ],
                'repwd' => [
                    'rules' => 'required|matches[pwd]',
                    'errors' => [
                        'required' => 'Confirm Password is required',
                        'matches' => 'Password and Confirm Password must be same',
                    ],
                ],
            ];
            if ($this->request->getPost()) {
                if ($this->validate($rules)) {
                   
                    $pwd = $this->request->getPostGet('pwd');
                    $cpwd = $this->request->getPostget('pwdold');
                    $epm = new Edit_profile_model();
                    $email = $session->getTempdata('email');
                    echo $email;
                    $userdata = $epm->check_password($email);
                    echo $userdata->pwd;
                    if ($userdata) {
                            
                        if ($userdata->pwd == $cpwd) {
echo $userdata->pwd;
                            $result = $epm->edit_password($email, $pwd);
                            echo $result;

                            if ($result) {
                                echo "password updated";
                                $session->setTempdata('success', 'Password updated Successfully');
                                return redirect()->to('http://localhost/KJ/public/changePassword');
                            } 
                            else {
                                $session->setTempdata('error', 'Failed to update password try again later.');
                                return redirect()->to("http://localhost/KJ/public/changePassword");
                            }
                        } else {
                            $session->setTempdata('error', 'Incorrect old Password');
                            return redirect()->to("http://localhost/KJ/public/changePassword");
                        }
                    } else {
                        $session->setTempdata('error', 'Unable to find record please try again after sometime');
                        return redirect()->to("http://localhost/KJ/public/changePassword");
                    }
                } else {
                    $data['validationError'] = $this->validator;
                    return view('changePassword', $data);
                }
            }
        } else if ($session->has('my_email')) {
            $rules = [
                'pwd' => [
                    'rules' => 'required|max_length[25]|min_length[8]|check_special|',
                    'errors' => [
                        'required' => 'Password is a required field',
                        'max_length' => 'Maximum length is 25 characters',
                        'min_length' => 'Minimum length is 8 Characters',
                        'check_special' => 'use /[!@#$%^&*()\-_=+{};:,<.>~]/',
                    ],
                ],
                'repwd' => [
                    'rules' => 'required|matches[pwd]',
                    'errors' => [
                        'required' => 'Confirm Password is required',
                        'matches' => 'Password and Confirm Password must be same',
                    ],
                ],
            ];
            if ($this->request->getPost()) {
                if ($this->validate($rules)) {
                   
                    $pwd = $this->request->getPostGet('pwd');
                    $cpwd = $this->request->getPostget('pwdold');
                    $epm = new Edit_profile_model();
                    $email = $session->getTempdata('my_email');
                    echo $email;
                    $userdata = $epm->check_password($email);
                    echo $userdata->pwd;
                    if ($userdata) {
                            
                        if ($userdata->pwd == $cpwd) {
echo $userdata->pwd;
                            $result = $epm->edit_password($email, $pwd);
                            echo $result;

                            if ($result) {
                                echo "password updated";
                                $session->setTempdata('success', 'Password updated Successfully');
                                return redirect()->to('http://localhost/KJ/public/changePassword');
                            } 
                            else {
                                $session->setTempdata('error', 'Failed to update password try again later.');
                                return redirect()->to("http://localhost/KJ/public/changePassword");
                            }
                        } else {
                            $session->setTempdata('error', 'Incorrect old Password');
                            return redirect()->to("http://localhost/KJ/public/changePassword");
                        }
                    } else {
                        $session->setTempdata('error', 'Unable to find record please try again after sometime');
                        return redirect()->to("http://localhost/KJ/public/changePassword");
                    }
                } else {
                    $data['validationError'] = $this->validator;
                    return view('Admin_changePassword', $data);
                }
            }
        }else{
            return redirect()->to("http://localhost/KJ/public/Login123");
        }


    }
}






