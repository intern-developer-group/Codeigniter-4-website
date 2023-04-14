<?php

namespace App\Controllers;
//use App\Controllers\BaseController;
use App\Models\User_Manage_Model;

class UserController extends BaseController
{

    public $usermodel;
    public function __construct()
    {
        helper('form');
        helper('url');
        $this->usermodel =  new User_Manage_Model();
    }
    public function ManageUsers()
    {
        $data['userdata'] = $this->usermodel->findAll();
        return view("Manage_Users", $data);
    }
    //public function add
    public function addUserform()
    {
        return view('AddUser_adminView');
    }
    public function addUser()
    {
        if ($this->request->getPost()) {
            $session = \Config\Services::session();
            $Owner_name = $this->request->getPostGet('Owner_name');
            $Shop_name = $this->request->getPostGet('Shop_name');
            $mobile = $this->request->getPostGet('mobile');
            $email = $this->request->getPostGet('email');
            $password = $this->request->getPostGet('password');
            helper('url');
            $data = [
                'Owner_name' => $Owner_name,'Shop_name'=> $Shop_name, 'email' => $email, 'password' => $password, 'mobile' => $mobile, 
            ];
            if ($this->usermodel->insert($data)) {
                return redirect()->to("http://localhost/KJ/public/ManageUsers");
            }
        }
        return view('AddUser_adminView', ['errors' => $this->usermodel->errors()]);
    }
    public function EditUserForm()
    {
        $email = $this->request->getVar('email');
        // echo $email;
        $data['udata'] = $this->usermodel->find($email);
        //print_r($data['udata']);
        return view('Edit_user_view', $data);
    }
    public function viewUser()
    {
        return view('Manage_users');
    }
    public function EditUser()
    {
        if ($this->request->getPost()) {
            $Owner_name = $this->request->getPostGet('Owner_name');
            $Shop_name = $this->request->getPostGet('Shop_name');
            $mo = $this->request->getPostGet('mo');
            $email = $this->request->getPostGet('email');
            echo $email;
            $pwd = $this->request->getPostGet('pwd');
            // $unique_id = md5(str_shuffle('abcdefghijklmnopqrstuvwxyz' . time()));
            helper('url');
            $data = [
                'Owner_name' => $Owner_name,'Shop_name' => $Shop_name, 'mo' => $mo, 'pwd' => $pwd, 
            ];
            if ($this->usermodel->update($email, $data)) {

                return redirect()->to("http://localhost/KJ/public/ManageUsers");
            }
        }
        return view('AddUser_adminView', ['errors' => $this->usermodel->errors()]);
    }
    public function AdminDeleteUser()
    {
        // echo hello;
        $email = $this->request->getVar('email');
        $data = ['status' => 'Deleted'];
        if ($this->usermodel->update($email, $data)) {
            return redirect()->to("http://localhost/KJ/public/ManageUsers");
        }
    }
}
