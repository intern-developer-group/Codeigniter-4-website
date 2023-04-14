<?php

namespace App\Models;

use CodeIgniter\Model;

class Edit_product_model extends Model
{
    public function fetch_data(string $p_id)
    {
        $db = \Config\Database::connect();
        $result = $db->query("select * from add_product where p_id='" . $p_id . "'");
        if ($result) {
            return $result->getRow();
        } else {
            return false;
        }
    }
    public function update_data(string $whight,string $netwhight,string $p_id)
    {
        $db = \Config\Database::connect();
     $result = $db->query("update add_product set whight='" . $whight . "',netwhight='" . $netwhight . "' where p_id='" . $p_id . "'");

        return $result;
    }
    // public function check_password(String $p_id)
    // {
    //     $db = \Config\Database::connect();
    //     $result = $db->query("select * from add_product where p_id='" . $p_id . "'");
    //     if ($result) {
    //         return $result->getRow();
    //     } else {
    //         return false;
    //     }
    // }
   
}
