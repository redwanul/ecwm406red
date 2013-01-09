<?php
class Posts_model extends CI_Model {
 
    function addPost($emp_no, $first_name) {
        $data = array(
            'emp_no' => $emp_no,
            'first_name' => $first_name
        );
 
        $this->db->insert('employees', $data);
    }
	
	function update($emp_no, $first_name) {
    $data = array(
        'emp_no' => $emp_no,
        'first_name' => $first_name
    );
 
    $this->db->where('emp_no', $emp_no);
    $this->db->update('employees', $data);
}

}