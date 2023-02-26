<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class HomeContent extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('select_model');
        $this->load->model('update_model');
        $this->load->model('Common_function_model','common');
        $this->load->model('StaticPages_model','static_pages');
        $this->load->model('Home_page_content_model','home_page_content');
        $this->load->helper('string');
    }

    public function edit($id = '') { //this is use for edit records start
        if (isset($this->session->userdata['is_admin_login'])) {
            $data['page'] = 'Home Page Content';
            $data['ckeditor'] = true;
            $data['gridTable'] = false;
            if ($id != '') {
                $this->form_validation->set_rules('special_content', 'special content', 'required');
                $this->form_validation->set_rules('discount_content', 'discount content', 'required');
                $this->form_validation->set_rules('star_content', 'star content', 'required');
                $this->form_validation->set_rules('left_box_content', 'left box content', 'required');
                $this->form_validation->set_rules('center_box_content', 'center box content', 'required');
                $this->form_validation->set_rules('right_box_content', 'right box content', 'required');
                
                $formSubmit = $this->input->post('Submit');
                $id=1;
                if ($formSubmit == "Update") {
                    if ($this->form_validation->run() === TRUE) {
                        
                        $data = array(
                            'special_content' => $this->input->post('special_content'),
                            'discount_content' => $this->input->post('discount_content'),
                            'star_content' => $this->input->post('star_content'),
                            'left_box_content' => $this->input->post('left_box_content'),
                            'center_box_content' => $this->input->post('center_box_content'),
                            'right_box_content' => $this->input->post('right_box_content')
                        );
                        $tblName = "home_page_content";
                        $this->common->update_record("id", $id, $tblName, $data);
                        
                        $this->session->set_flashdata('msg', 'Home Page Content has been updated successfully.');
                        
                        redirect('/admin/home-content/edit/'.$id, 'refresh');
                    }
                }
                
                $data['content_page'] = $this->home_page_content->get_home_page_content_by_id($id);
                $this->load->view('admin/controls/vwHeader');
                $this->load->view('admin/controls/vwLeft', $data);
                $this->load->view('admin/vwEditHomePage', $data);
                $this->load->view('admin/controls/vwFooter');
                $this->load->view('admin/controls/vwFooterJavascript', $data);
            } else {
                redirect('admin/home-content/edit/1');
            }
        } else {
            
        }
    }

}

