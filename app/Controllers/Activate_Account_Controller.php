<?php

namespace App\Controllers;

use App\Models\Activate_Model;
use App\Models\Edit_profile_model;

class Activate_Account_Controller extends BaseController
{
	public function forget_Password()
    {
        return view('forget_password_view');
    }
    public function forget_Password_action()
    {
        $this->delete_expired_tokens();
        helper('form');
        helper('url');
        $session = \Config\Services::session();
        if ($this->request->getPostGet()) {
            $email = $this->request->getPostGet('eid');
            $epm = new Edit_profile_model();
            $userdata = $epm->fetch_data($email);
            $unique_id = md5(str_shuffle('abcdefghijklmnopqrstuvwxyz' . time()));
            if ($userdata) {
                if ($userdata->status == "Active") {
                    $userpassword = $epm->fetch_data_password_token($email);
                    if (!$userpassword) {
                        $from = 'rzinzuvadiya865@rku.ac.in';
                        $to = $email;
                        $subject = 'Recover Password or Change Password';
                        $message = "Hiiiii " . $userdata->Owner_name . "<br><br>Click on the link given below to reset your password. The link is valid only for 1 hour.<a href='" . base_url() . "/public/foregtpwdpage?id=" . $unique_id . "' target='_blank'>Reset yor password</a>" . "<br/><br/>" . "Thanks!!!!!";
                        //  $filepath = 'writable\uploads\1658387124_21fcacaf373554ee43e0.jpg';
                        $em = \Config\Services::email();
                        //$em->setBCC('kansagrajanki@gmail.com');
                        $em->setFrom($from);
                        $em->setTo($to);
                        $em->setSubject($subject);
                        $em->setMessage($message);
                        //$em->attach($filepath);
                        //$em->setCC('janki.kansagra@rku.ac.in');
                        if ($em->send()) {
                            // echo "<script>alert('message sent successful');</script>";
                            $db = \Config\Database::connect();
                            $builder = $db->table('password_token');

                            $data1 = ['email' => $email, 'unique_id' => $unique_id];
                            if ($builder->insert($data1)) {
                                $session->setTempdata('success', 'Reset Password Link is sent to registered email address', 3);
                                return redirect()->to("http://localhost/KJ/public/ForgetPassword");
                            }
                        } else {
                            $session->setTempdata('error', 'Failedto send the activation link', 3);
                            return redirect()->to("http://localhost/KJ/public/ForgetPassword");
                        }
                    } else {
                        $session->setTempdata('error', 'Reset password link is sent to your account your account. New link will be generated once the old link expires', 3);
                        return redirect()->to("http://localhost/KJ/public/ForgetPassword");
                    }
                } else {
                    $session->setTempdata('error', 'Account is not activated. Kindly activate your account', 3);
                    return redirect()->to("http://localhost/KJ/public/ForgetPassword");
                }
            } else {
                $session->setTempdata('error', 'The email address is not registered', 2);
                return redirect()->to('http://localhost/KJ/public/ForgetPassword');
            }
        }
    }  
    public function delete_expired_tokens()
    {
        $a_acc = new Activate_Model();
        $a_acc->remove_expired_tokens();
    }
    public function forget_Password_update()
    {
        $data = [];
        $id = $this->request->getVar('id');
        if (!empty($id)) {
            $a_acc = new Activate_Model();
            $userdata = $a_acc->verify_id_password_token($id);
            if ($userdata) {
                if ($this->verifyExpirytime($userdata->time)) {
                    $session = \Config\Services::session();
                    $session->setTempdata('pwdemail', $userdata->email, 3600);
                    return redirect()->to('http://localhost/KJ/public/newPasswordForm');
                } else {
                    $data['error'] = "Sorry, Password reset link expired";
                }
            } else {
                $data['error'] = "Sorry, We are unable to find your account";
            }
        } else {
            $data['error'] = "Sorry Unable to process your request";
        }

        return view("activate_account", $data);
    }
    public function verifyExpirytime($registeredTime)
    {
        helper('date');
        $currenttime = now();
        $registeredTime = strtotime($registeredTime);
        $diff = (int)$currenttime - (int)$registeredTime;
        if ($diff > 3600) {
            return false;
        } else {
            return true;
        }
    }
    public function newPasswordForm()
    {
        return view('newPasswordForm');
    }
     public function updatenewPassword()
    {
        $session = \Config\Services::session();
        $session->getTempdata('pwdemail');
        helper('form');
        helper('url');
        $data = [];
        $data['validationError'] = null;
        $session = \Config\Services::session();
        if ($session->has('pwdemail')) {
            $rules = [
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
                    $epm = new Edit_profile_model();
                    $email = $session->getTempdata('pwdemail');
                    $result = $epm->edit_password($email, $pwd);

                    if ($result) {
                        //echo "password updated";
                        $a_acc = new Activate_Model();
                        $a_acc->delete_token($email);
                        $session->setTempdata('success', 'Password updated Successfully. Login using the new Password', 10);
                        return redirect()->to('http://localhost/KJ/public/Login123');
                    } else {
                        $session->setTempdata('error', 'Failed to update password try again later.', 10);
                        return redirect()->to("http://localhost/KJ/public/newPasswordForm");
                    }
                } else {
                    $data['validationError'] = $this->validator;
                    return view('newPasswordForm', $data);
                }
            }
        } else {
            return redirect()->to("http://localhost/KJ/public/Login123");
        }
    }
}