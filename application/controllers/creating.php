<?php
class creating extends CI_Controller {
 
    function index() {
        // Check if form is submitted
        if ($this->input->post('submit')) {
            $emp_no = $this->input->xss_clean($this->input->post('emp_no'));
            $first_name = $this->input->xss_clean($this->input->post('first_name'));
 
            // Adding  the post
            $this->creating_model->add($emp_no, $first_name);
        }
 
        $this->load->view('creating_view');
		
    }
	
	function update() {
    $emp_no = $this->uri->segment(3);
 
    if ($this->input->post('submit')) {
        $emp_no = $this->input->xss_clean($this->input->post('emp_no'));
        $first_name = $this->input->xss_clean($this->input->post('first_name'));
 
        $this->creating_model->update($emp_no, $emp_no, $first_name);
 
        $data['posts'] = $this->creating_model->getPosts();
        $this->load->view('creating_view', $data);
		}	
	else {
        $data = array('emp_no' => $emp_no);
        $this->load->view('updateform', $data);
    }
}
 
}