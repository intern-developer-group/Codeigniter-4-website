<?php

namespace App\Controllers;

use CodeIgniter\View\Table;

class TableController extends BaseController
{
    public function display_data()
    {
        $session = \Config\Services::session();
        if ($session->has('my_email')) 
        {
            $db = \Config\Database::connect();
            $result = $db->query('Select * from register');
            $table1 = new Table();
            $template = [
                'table_open' => '<table border="1" cellpadding="3" cellspacing="3" class="table table-striped table-bordered container" style="margin-top: 7%;margin-bottom: 7%;" >',
    
                'thead_open'  => '<thead class="thead-dark">',
                'thead_close' => '</thead>',
    
                'heading_row_start'  => '<tr>',
                'heading_row_end'    => '</tr>',
                'heading_cell_start' => '<th>',
                'heading_cell_end'   => '</th>',
    
                'tfoot_open'  => '<tfoot>',
                'tfoot_close' => '</tfoot>',
    
                'footing_row_start'  => '<tr>',
                'footing_row_end'    => '</tr>',
                'footing_cell_start' => '<td>',
                'footing_cell_end'   => '</td>',
    
                'tbody_open'  => '<tbody>',
                'tbody_close' => '</tbody>',
    
                'row_start'  => '<tr>',
                'row_end'    => '</tr>',
                'cell_start' => '<td>',
                'cell_end'   => '</td>',
    
                'row_alt_start'  => '<tr>',
                'row_alt_end'    => '</tr>',
                'cell_alt_start' => '<td>',
                'cell_alt_end'   => '</td>',
    
                'table_close' => '</table>',
            ];
    
            $table1->setTemplate($template);
    
    
            $data['users'] = $table1->generate($result);
            return view('Table_register_view', $data);
        }
    
    
        else 
        {
            return redirect()->to("http://localhost/KJ/public/Login123");
        }
    }
}
   
        
    

