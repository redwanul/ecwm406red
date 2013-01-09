<?php
class Hr extends CI_Controller {

	// num of records per page
	private $limit = 5000;
	
	function hr(){
		parent::__construct();

		// load library
		$this->load->library(array('table','validation','authlib'));
		
		// load helper
		$this->load->helper('url');

    	// load model
		$this->load->model('hrModel','',TRUE);
	
}

	function index($offset = 0)
	{



		$is_logged_in = $this->session->userdata('is_logged_in');
		// load view

		$data['main_content'] = 'hrList';
		$data['is_logged_in'] = $is_logged_in;
		$this->load->view('includes/template', $data);
	}
	
	function add(){
		// set validation properties
		$is_logged_in = $this->session->userdata('is_logged_in');
		$this->_set_fields();
		
		// set common properties
		$data['title'] = 'Add new hr';
		$data['message'] = '';
		$data['action'] = site_url('hr/addhr');
		$data['link_back'] = anchor('hr/index/','Back to list of hrs',array('class'=>'back'));
	
		// load view
				$data['main_content'] = 'hrEdit';
		$data['is_logged_in'] = $is_logged_in;
		$this->load->view('includes/template', $data);
	}
	
	function addhr(){
		// set common properties
		$data['title'] = 'Add new hr';
		$data['action'] = site_url('hr/addhr');
		$data['link_back'] = anchor('hr/index/','Back to list of hrs',array('class'=>'back'));
		
		// set validation properties
		$this->_set_fields();
		$this->_set_rules();
		
		// run validation
		if ($this->validation->run() == FALSE){
			$data['message'] = '';
		}else{
			// save data
			var_dump($_POST);
			$hr = array('first_name' => $this->input->post('first_name'),
							'last_name' => $this->input->post('last_name'),
							'gender' => $this->input->post('gender'),
							'birth_date' => date('Y-m-d', strtotime($this->input->post('birth_date'))),
							'hire_date' => date('Y-m-d', strtotime($this->input->post('hire_date'))));
			$id = $this->hrModel->save($hr);
			
			// set form input name="id"
			$this->validation->id = $id;
			
			// set user message
			$data['message'] = '<div class="success">add new hr success</div>';
		}
		
		// load view
		$is_logged_in = $this->session->userdata('is_logged_in');
			$data['main_content'] = 'hrEdit';
		$data['is_logged_in'] = $is_logged_in;
		$this->load->view('includes/template', $data);
	}
	
	function view($id){
		// set common properties
		$data['title'] = 'hr Details';
		$data['link_back'] = anchor('hr/index/','Back to list of hrs',array('class'=>'back'));
		
		// get hr details
		$data['hr'] = $this->hrModel->get_by_id($id)->row();
		
		// load view
		$is_logged_in = $this->session->userdata('is_logged_in');
			$data['main_content'] = 'hrView';
		$data['is_logged_in'] = $is_logged_in;
		$this->load->view('includes/template', $data);
	}
	

	function update_noempno()
	{

			
		$is_logged_in = $this->session->userdata('is_logged_in');
		$data['main_content'] = 'noempno_view';
		$data['is_logged_in'] = $is_logged_in;
		$this->load->view('includes/template', $data);	


	}
		

	function update_withempno(){
		// set validation properties

		$id = $this->input->get('id');
		$this->_set_fields();
		
		// prefill form values
		$hr = $this->hrModel->get_by_id($id)->row();
		$this->validation->id = $id;
		$this->validation->first_name = $hr->first_name;
		$this->validation->last_name = $hr->last_name;
		$_POST['gender'] = strtoupper($hr->gender);
		$this->validation->birth_date = date('d-m-Y',strtotime($hr->birth_date));
		$this->validation->hire_date = date('d-m-Y',strtotime($hr->hire_date));
		
		// set common properties
		$data['title'] = 'Update hr';
		$data['message'] = '';
		$data['action'] = site_url('hr/updatehr');
		$data['link_back'] = anchor('hr/index/','Back to list of hrs',array('class'=>'back'));
	
		// load view
		$is_logged_in = $this->session->userdata('is_logged_in');
			$data['main_content'] = 'hrEdit';
		$data['is_logged_in'] = $is_logged_in;
		$this->load->view('includes/template', $data);
	}
	
		function update($id){
		// set validation properties

	
		$this->_set_fields();
		
		// prefill form values
		$hr = $this->hrModel->get_by_id($id)->row();
		$this->validation->id = $id;
		$this->validation->first_name = $hr->first_name;
		$this->validation->last_name = $hr->last_name;
		$_POST['gender'] = strtoupper($hr->gender);
		$this->validation->birth_date = date('d-m-Y',strtotime($hr->birth_date));
		$this->validation->hire_date = date('d-m-Y',strtotime($hr->hire_date));
		
		// set common properties
		$data['title'] = 'Update hr';
		$data['message'] = '';
		$data['action'] = site_url('hr/updatehr');
		$data['link_back'] = anchor('hr/index/','Back to list of hrs',array('class'=>'back'));
	
		// load view
		$is_logged_in = $this->session->userdata('is_logged_in');
			$data['main_content'] = 'hrEdit';
		$data['is_logged_in'] = $is_logged_in;
		$this->load->view('includes/template', $data);}
	
	
	function updatehr(){
		// set common properties
		$data['title'] = 'Update hr';
		$data['action'] = site_url('hr/updatehr');
		$data['link_back'] = anchor('hr/index/','Back to list of hrs',array('class'=>'back'));
		
		// set validation properties
		$this->_set_fields();
		$this->_set_rules();
		
		// run validation
		if ($this->validation->run() == FALSE){
			$data['message'] = '';
		}else{
			// save data
			$id = $this->input->post('id');
			$hr = array('first_name' => $this->input->post('first_name'),
							'last_name' => $this->input->post('last_name'),
							'gender' => $this->input->post('gender'),
							'birth_date' => date('Y-m-d', strtotime($this->input->post('birth_date'))),
							'hire_date' => date('Y-m-d', strtotime($this->input->post('hire_date'))));
			$this->hrModel->update($id,$hr);
			
			// set user message
			$data['message'] = '<div class="success">update hr success</div>';
		}
		
		// load view
		$is_logged_in = $this->session->userdata('is_logged_in');
			$data['main_content'] = 'hrEdit';
		$data['is_logged_in'] = $is_logged_in;
		$this->load->view('includes/template', $data);
	}
	
	function delete($id){
		// delete hr
		$this->hrModel->delete($id);
		
		// redirect to hr list page
		$is_logged_in = $this->session->userdata('is_logged_in');
		$data['main_content'] = 'search_full';
		$data['is_logged_in'] = $is_logged_in;
		$this->load->view('includes/template', $data);
	}

	function delete_withempno(){
		// delete hr
		$id = $this->input->get('id');
		
		
		$this->hrModel->delete($id);
		// redirect to hr list page
		$is_logged_in = $this->session->userdata('is_logged_in');
		$data['main_content'] = 'search_full';
		$data['is_logged_in'] = $is_logged_in;
		$this->load->view('includes/template', $data);
	}

	function delete_noempno()
	{

			
		$is_logged_in = $this->session->userdata('is_logged_in');
		$data['main_content'] = 'noempnodelete_view';
		$data['is_logged_in'] = $is_logged_in;
		$this->load->view('includes/template', $data);	


	}
	
	// validation fields
	function _set_fields(){
		$fields['id'] = 'id';
		$fields['emp_no'] = 'emp_no';
		$fields['first_name'] = 'first_name';
		$fields['last_name'] = 'last_name';
		$fields['gender'] = 'gender';
		$fields['birth_date'] = 'birth_date';
		$fields['hire_date'] = 'hire_date';
		
		$this->validation->set_fields($fields);
	}
	
	// validation rules
	function _set_rules(){
		
		$rules['first_name'] = 'trim|required';
		$rules['last_name'] = 'trim|required';
		$rules['gender'] = 'trim|required';
		$rules['birth_date'] = 'trim|required|callback_valid_date';
		$rules['hire_date'] = 'trim|required|callback_valid_date';
		
		$this->validation->set_rules($rules);
		
		$this->validation->set_message('required', '* required');
		$this->validation->set_message('isset', '* required');
		$this->validation->set_error_delimiters('<p class="error">', '</p>');


		
	}

	function updep()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
			$data['main_content'] = 'deptEdit';
		$data['is_logged_in'] = $is_logged_in;
		$this->load->view('includes/template', $data);
	}
	
 function updtitle() 
{   
    $data = array(
        'titles' => 'titles', // pass the real table name
        'id' => $this->input->post('id'),
        'title' => $this->input->post('title')
        
    );

    $this->load->model('updateModel'); // load the model first
    if($this->updateModel->upddata($data)) // call the method from the model
    {
        	$is_logged_in = $this->session->userdata('is_logged_in');
			$data['main_content'] = 'hrList';
		$data['is_logged_in'] = $is_logged_in;
		$this->load->view('includes/template', $data);
    }
}

function updept()
{
	$this->load->view('moveEdit');$is_logged_in = $this->session->userdata('is_logged_in');
			$data['main_content'] = 'moveEdit';
		$data['is_logged_in'] = $is_logged_in;
		$this->load->view('includes/template', $data);
	}

 function movedept() 
{   
    $emp_no = $this->input->get('emp_no');
    $dept_no = $this->input->get('dept_no');

    $this->load->model('updateDept'); // load the model first
    if($this->updateDept->upedit($emp_no, $dept_no)) // call the method from the model
    {
        	$is_logged_in = $this->session->userdata('is_logged_in');
			$data['main_content'] = 'hrList';
		$data['is_logged_in'] = $is_logged_in;
		$this->load->view('includes/template', $data);
    }
}
   
     function upsalary()
{
	$is_logged_in = $this->session->userdata('is_logged_in');
			$data['main_content'] = 'salaryEdit';
		$data['is_logged_in'] = $is_logged_in;
		$this->load->view('includes/template', $data);

}

function editsal() 
{   
    $emp_no = $this->input->get('emp_no');
    $salary = $this->input->get('salary');

    $this->load->model('salary_model'); // load the model first
    if($this->salary_model->upsalary($emp_no, $salary)) // call the method from the model
    {
        	$is_logged_in = $this->session->userdata('is_logged_in');
			$data['main_content'] = 'hrList';
		$data['is_logged_in'] = $is_logged_in;
		$this->load->view('includes/template', $data);
    }
 

}

function promoteMan(){

$is_logged_in = $this->session->userdata('is_logged_in');
			$data['main_content'] = 'promoteMan';
		$data['is_logged_in'] = $is_logged_in;
		$this->load->view('includes/template', $data);
}

function manPromote(){
	$emp_no = $this->input->post('emp_no');
	$dept_no = $this->input->post('dept_no');
	$this->load->model('hrModel'); 
	$this->hrModel->promoMan($emp_no, $dept_no);
	
	$is_logged_in = $this->session->userdata('is_logged_in');
			$data['main_content'] = 'success';
		$data['is_logged_in'] = $is_logged_in;
		$this->load->view('includes/template', $data);
}

function removeMan()
{
$is_logged_in = $this->session->userdata('is_logged_in');
			$data['main_content'] = 'salaryEdit';
		$data['is_logged_in'] = $is_logged_in;
		$this->load->view('includes/template', $data);
}
	
	function deleteMan($id){
		// delete hr
		$this->hrModel->deleteMan($id);

		
		// redirect to hr list page
		$is_logged_in = $this->session->userdata('is_logged_in');
			$data['main_content'] = 'hrList';
		$data['is_logged_in'] = $is_logged_in;
		$this->load->view('includes/template', $data);
	}

}