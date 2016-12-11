<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class TicketManager extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (check_TicketManager() == false) {   // nếu không phải TicketManager -> trở về trang chủ
            redirect(base_url());
        }
    }

    // thêm bài viết mới
   
    public function tickets_manager($page = 1) {
        $per_page = 5;
       
        $data['title'] = 'Tickets_manager';
        $this->load->model('tickets_model');
        $mount = 10;
        config_paginator('admin/tickets_manager',$mount,$per_page);

        $data['list_tickets'] =  $this->tickets_model->getTicket($per_page, ($page - 1) * $per_page);
        $data['nav_admin'] = 'tickets_manager';
        $this->load->view('template/header', $data);
        $this->load->view('template/nav_bar_ticketmanager', $data);
        $this->load->view('admin/tickets_manager', $data);
        $this->load->view('template/footer', $data);
    }
    
    public function add_ticket(){
        $this->load->helper('form');
        if ($this->input->post()) {
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

            // các luật
            $this->form_validation->set_rules('name', 'Ten ve', 'trim|required');
            $this->form_validation->set_rules('name_url', 'Duong dan den Ve', 'trim|required');
            $this->form_validation->set_rules('img', 'Anh', 'trim|required');
            $this->form_validation->set_rules('title',"Title: ", 'trim|required');
            $this->form_validation->set_rules('content', 'Nội dung', 'trim|required');
            $this->form_validation->set_rules('price',"Gia",'trim|required');

            // kiểm tra các luật
            if ($this->form_validation->run() === true) {
                // Thông báo thành công
                $this->load->model('tickets_model');
                if ($this->tickets_model->addTicket() == true) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success">Thêm ve mới thành công!</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">Đã có lỗi xảy ra!</div>');
                }
                redirect(current_url());
            }
        }

        // lấy dữ liệu cho dropdown
        $this->load->model('tickets_model');
        $data['dropdownlist'] = $this->tickets_model->getTicket();

        $data['title'] = 'Add a new Ticket';
        $data['nav_admin'] = 'add_ticket';
        $this->load->view('template/header', $data);
        $this->load->view('template/nav_bar_ticketmanager', $data);
        $this->load->view('admin/add_ticket', $data);
        $this->load->view('template/footer', $data);

    }
    public function edit_ticket($id=""){

   
        $this->load->model('tickets_model');
        $this->load->helper('form');
        if ($this->input->post()) {

            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

            // các luật
            $this->form_validation->set_rules('name', 'Ten ve', 'trim|required');
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('price', 'Price', 'trim|required');
            $this->form_validation->set_rules('img', 'Image', 'trim|required');

            // kiểm tra các luật
           
            if ($this->form_validation->run() === true) {
                // Thông báo thành công
               
                $this->load->model('tickets_model');
                if ($this->tickets_model->updateTicket($id) == true) {

                    $this->session->set_flashdata('message', '<div class="alert alert-success">Sửa vé thành công!</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">Đã có lỗi xảy ra!</div>');
                }
               redirect('admin/tickets_manager');
            }
        }

        // lấy dữ liệu cho form
        $this->load->model('tickets_model');
        $data['ticket'] = $this->tickets_model->getTicketForAdmin($id);
        $data['id'] = $id;
        // lấy dữ liệu cho dropdown
        $this->load->model('tickets_model');
        $data['dropdownlist'] = $this->tickets_model->getTicket();

        $data['title'] = 'Edit Ticket';
        $data['nav_admin'] = 'tickets_manager';
        $this->load->view('template/header', $data);
        $this->load->view('template/nav_bar_ticketmanager', $data);
        $this->load->view('admin/edit_ticket', $data);
        $this->load->view('template/footer', $data);
    }
    public function delete_ticket($id) {
        if (!isset($id) || empty($id)) {
            redirect('admin/tickets_manager');
        }
        $this->load->model('tickets_model');
        if ($this->tickets_model->delete_ticket($id) == true) {
            $this->session->set_flashdata('message', '<div class="alert alert-success">Đã xoá bài viết!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Đã có lỗi xảy ra!</div>');
        }
        redirect('admin/tickets_manager');
    }
    
}
