<?php


namespace App\Models;

use CodeIgniter\Model;

class Activate_Model extends Model
{
    // public function update_status(string $id)
    // {
    //     $db = \Config\Database::connect();
    //     $result = $db->query("update register set status='Active' where `unique_id`='" . $id . "'");
    //     return ($result);
    // }
    // public function verify_id(string $id)
    // {
    //     $db = \Config\Database::connect();
    //     $result = $db->query("select creation_dt,status,unique_id from register where `unique_id`='" . $id . "'");
    //     $count = $result->getNumRows();
    //     if ($count == 1) {
    //         return $result->getRow();
    //     } else {
    //         return false;
    //     }
    // }
    public function verify_id_password_token(string $id)
    {
        $db = \Config\Database::connect();
        $result = $db->query("select * from password_token where `unique_id`='" . $id . "'");
        $count = $result->getNumRows();
        if ($count == 1) {
            return $result->getRow();
        } else {
            return false;
        }
    }
    public function delete_token($email)
    {
        $db = \Config\Database::connect();
        $result = $db->query("delete from password_token where `email`='" . $email . "'");
        return $result;
    }
    public function remove_expired_tokens()
    {
        $db = \Config\Database::connect();
        $result = $db->query("delete FROM password_token WHERE time < DATE_SUB(NOW(), INTERVAL '1' HOUR)");;
        return $result;
    }
}
