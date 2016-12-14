<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('users_model');
        if (check_admin() == false) {
            redirect(base_url());

        }
    }

    public function index(){
        $data['count_users'] = $this->users_model->countUsers();
        $this->load->view('backend/index', $data);
    }

    // thêm bài viết mới
    public function add_article() {
        $this->load->helper('form');
        if ($this->input->post()) {
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

            // các luật
            $this->form_validation->set_rules('title', 'Tiêu đề', 'trim|required');
            $this->form_validation->set_rules('category', 'Phân loại', 'trim|required');
            $this->form_validation->set_rules('description', 'Mô tả', 'trim|required');
            $this->form_validation->set_rules('content', 'Nội dung', 'trim|required');

            // kiểm tra các luật
            if ($this->form_validation->run() === true) {
                // Thông báo thành công
                $this->load->model('articles_model');
                if ($this->articles_model->addArticle() == true) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success">Thêm bài viết mới thành công!</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">Đã có lỗi xảy ra!</div>');
                }
                redirect(current_url());
            }
        }

        // lấy dữ liệu cho dropdown
        $this->load->model('categories_model');
        $data['dropdownlist'] = $this->categories_model->getListCategories();

        $data['title'] = 'Add a new article';
        $data['nav_admin'] = 'add_article';
//        $this->load->view('backend/templates/header', $data);
//        $this->load->view('backend/templates/leftside', $data);
        $this->load->view('backend/article/add', $data);
//        $this->load->view('backend/templates/footer', $data);
    }

    // thêm video mới
    public function add_video() {
        $this->load->helper('form');
        if ($this->input->post()) {
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

            // các luật
            $this->form_validation->set_rules('title', 'Tiêu đề', 'trim|required');
            $this->form_validation->set_rules('description', 'Mô tả', 'trim|required');

            // kiểm tra các luật
            if ($this->form_validation->run() === true) {

                $upload_dir = './uploads/videos/';
                if (is_dir($upload_dir) && is_writable($upload_dir)) {  // kiểm tra thư mục
                    // xử lý tên file
                    $name = explode('.', $_FILES['video']['name']);     // tách tên theo ký tự dot
                    $ext = strtolower(end($name));                      // lấy phần mở rộng trong tên
                    array_pop($name);                                   // bỏ phần đuôi trong tên
                    $name = implode("_", $name);                        // gộp lại các phần của tên bằng dấu underscore
                    $name = url_title($name, '_', true);                // chuẩn hoá tên
                    // chuyển file về thư mục $upload_dir
                    $video_file = $upload_dir . $name . '.' . $ext;
                    move_uploaded_file($_FILES['video']['tmp_name'], $video_file);

                    // lưu ảnh thumbnail
                    $ffmpeg = 'assets\\ffmpeg\\ffmpeg';
                    $image_file = $upload_dir . $name . '.' . 'jpg';
                    $second = 5;
                    $cmd = "$ffmpeg -itsoffset -$second -i $video_file -vcodec mjpeg -vframes 1 -an -f rawvideo $image_file";
                    exec($cmd);

                    // insert vào database
                    $this->load->model('videos_model');
                    $link = substr($video_file, 2);                 // loại bỏ 2 ký tự đầu tiên './'
                    $image = substr($image_file, 2);
                    if ($this->videos_model->addVideo($link, $image) == true) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success">Thêm video mới thành công!</div>');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger">Đã có lỗi xảy ra!</div>');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">Thư mục upload không tồn tại hoặc không có quyền ghi!</div>');
                }
                redirect(current_url());
            }
        }

        $data['title'] = 'Add a new video';
        $data['nav_admin'] = 'add_video';
//        $this->load->view('template/header', $data);
//        $this->load->view('template/nav_bar_admin', $data);
        $this->load->view('backend/videos/add', $data);
//        $this->load->view('template/footer', $data);
    }

    public function articles_manager($page = 1) {
        $per_page = 10;
        $this->load->model('articles_model');
        $mount = $this->articles_model->countArticles();
        config_paginator('admin/articles_manager', $mount, $per_page);
        $data['list_articles'] = $this->articles_model->getListArticlesForManager($per_page, ($page - 1) * $per_page);
        
        $data['title'] = 'Articles Manager';
        $data['nav_admin'] = 'articles_manager';
//        $this->load->view('template/header.php', $data);
//        $this->load->view('template/nav_bar_admin', $data);
//        $this->load->view('admin/articles_manager', $data);
//        $this->load->view('template/footer.php', $data);
        $this->load->view('backend/article/list',$data);
    }

    public function edit_article($alias = '') {
        if (!isset($alias) || empty($alias)) {
            redirect('admin/articles_manager');
        }
        $this->load->model('articles_model');
        $data['article'] = $this->articles_model->getArticleByAlias($alias);

        $this->load->helper('form');
        if ($this->input->post()) {
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

            // các luật
            $this->form_validation->set_rules('title', 'Tiêu đề', 'trim|required');
            $this->form_validation->set_rules('category', 'Phân loại', 'trim|required');
            $this->form_validation->set_rules('description', 'Mô tả', 'trim|required');
            $this->form_validation->set_rules('content', 'Nội dung', 'trim|required');

            // kiểm tra các luật
            if ($this->form_validation->run() === true) {
                // Thông báo thành công
                $this->load->model('articles_model');
                if ($this->articles_model->updateArticle($alias) == true) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success">Sửa bài viết mới thành công!</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">Đã có lỗi xảy ra!</div>');
                }
                redirect('admin/articles_manager');
            }
        }

        // lấy dữ liệu cho form
        $this->load->model('articles_model');
        $data['article'] = $this->articles_model->getArticleByAlias($alias);

        // lấy dữ liệu cho dropdown
        $this->load->model('categories_model');
        $data['dropdownlist'] = $this->categories_model->getListCategories();

        $data['title'] = 'Edit Article';
        $data['nav_admin'] = 'articles_manager';
//        $this->load->view('template/header', $data);
//        $this->load->view('template/nav_bar_admin', $data);
        $this->load->view('backend/article/edit', $data);
//        $this->load->view('template/footer', $data);
    }

    // xoá bài viết
    public function delete_article($alias) {
        if (!isset($alias) || empty($alias)) {
            redirect('admin/articles_manager');
        }
        $this->load->model('articles_model');
        if ($this->articles_model->delete_article($alias) == true) {
            $this->session->set_flashdata('message', '<div class="alert alert-success">Đã xoá bài viết!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Đã có lỗi xảy ra!</div>');
        }
        redirect('admin/articles_manager');
    }
    public function delete_ticket($id) {
        if (!isset($id) || empty($id)) {
            redirect('admin/tickets_manager');
        }
        $this->load->model('tickets_model');
        if ($this->tickets_model->delete_ticket($id) == true) {
            $this->session->set_flashdata('message', '<div class="alert alert-success">Đã xoá vé!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Đã có lỗi xảy ra!</div>');
        }
        redirect('admin/tickets_manager');
    }

    public function videos_manager($page = 1) {
        $per_page = 10;      // số bài viết trên một trang
        $this->load->model('videos_model');
        $mount = $this->videos_model->countVideos();
        // cấu hình phân trang
        config_paginator('view/all_videos', $mount, $per_page);
        $data['list_videos'] = $this->videos_model->getListVideos($per_page, ($page - 1) * $per_page);

        $data['title'] = 'Video Manager';
        $data['nav_admin'] = 'videos_manager';
//        $this->load->view('template/header.php', $data);
//        $this->load->view('template/nav_bar_admin', $data);
//        $this->load->view('admin/videos_manager', $data);
//        $this->load->view('template/footer.php', $data);
        $this->load->view('backend/videos/list',$data);
    }
    
    // xoá bài viết
    public function delete_video($alias) {
        if (!isset($alias) || empty($alias)) {
            redirect('admin/articles_manager');
        }
        $this->load->model('videos_model');
        if ($this->videos_model->delete_video($alias) == true) {
            
            $this->session->set_flashdata('message', '<div class="alert alert-success">Đã xoá video!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Đã có lỗi xảy ra!</div>');
        }
        redirect('admin/articles_manager');
    }

    public function users_manager($page = 1) {
        $per_page = 20;
       
        $data['title'] = 'Users_manager';
        $this->load->model('users_model');
        $mount = $this->users_model->countUsers();
        config_paginator('admin/users_manager',$mount,$per_page);
        $data['list_users'] = $this->users_model->getListUsers($per_page, ($page - 1) * $per_page);
        $data['nav_admin'] = 'users_manager';
//        $this->load->view('template/header', $data);
//        $this->load->view('template/nav_bar_admin', $data);
//        $this->load->view('admin/users_manager', $data);
//        $this->load->view('template/footer', $data);
        $this->load->view('backend/users/list', $data);
    }
    public function edit_user($user_id = ""){
   
        $this->load->model('users_model');
        $this->load->helper('form');
        if ($this->input->post()) {

            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

            // các luật
            $this->form_validation->set_rules('username', 'Ten thanh vien', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('user_level', 'Doi tuong su dung', 'trim|required');

            // kiểm tra các luật
           
            if ($this->form_validation->run() === true) {
                // Thông báo thành công
               
                $this->load->model('users_model');
                if ($this->users_model->updateUser($user_id) == true) {

                    $this->session->set_flashdata('message', '<div class="alert alert-success">Sửa thanh vien thành công!</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">Đã có lỗi xảy ra!</div>');
                }
               redirect('admin/users_manager');
            }
        }

        // lấy dữ liệu cho form
        $this->load->model('users_model');
        $data['user'] = $this->users_model->getUserForAdmin($user_id);

        // lấy dữ liệu cho dropdown
        $this->load->model('categories_model');
        $data['dropdownlist'] = $this->categories_model->getListCategories();

        $data['title'] = 'Edit Article';
        $data['nav_admin'] = 'users_manager';
//        $this->load->view('template/header', $data);
//        $this->load->view('template/nav_bar_admin', $data);
//        $this->load->view('admin/edit_user', $data);
//        $this->load->view('template/footer', $data);
        $this->load->view('backend/users/edit', $data);
    }
    
    public function delete_user($user_id = 1){
    if (!isset($user_id) || empty($user_id)) {
            redirect(base_url().'admin/users_manager');
        }
        $this->load->model('users_model');
        $this->users_model->deleteUser($user_id);
        if ($this->users_model->deleteUser($user_id) == true) {
            
            $this->session->set_flashdata('message', '<div class="alert alert-success">Đã xoá thanh vien!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Đã có lỗi xảy ra!</div>');
        }
        redirect(base_url().'admin/users_manager');
    }
    public function tickets_manager($page = 1) {
        $per_page = 5;
       
        $data['title'] = 'Tickets_manager';
        $this->load->model('tickets_model');
        $mount = 10;
        config_paginator('admin/tickets_manager',$mount,$per_page);

        $data['list_tickets'] =  $this->tickets_model->getTicket($per_page, ($page - 1) * $per_page);
        $data['nav_admin'] = 'tickets_manager';
//        $this->load->view('template/header', $data);
//        $this->load->view('template/nav_bar_admin', $data);
//        $this->load->view('admin/tickets_manager', $data);
//        $this->load->view('template/footer', $data);
        $this->load->view('backend/tickets/list',$data);
    }
    public function add_user(){
        $this->load->helper('form');
        if ($this->input->post()) {
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

            // các luật
            $this->form_validation->set_rules('username', 'Ten nguoi su dung', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('user_level', 'UserLevel', 'trim|required');

            // kiểm tra các luật
            if ($this->form_validation->run() === true) {
                // Thông báo thành công
                $this->load->model('users_model');
                if ($this->users_model->addUser() == true) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success">Thêm thanh vien mới thành công!</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">Đã có lỗi xảy ra!</div>');
                }
                redirect(current_url());
            }
        }

        // lấy dữ liệu cho dropdown
        $this->load->model('users_model');
        $data['dropdownlist'] = $this->users_model->getListUsers();

        $data['title'] = 'Add a new member';
        $data['nav_admin'] = 'add_member';
//        $this->load->view('template/header', $data);
//        $this->load->view('template/nav_bar_admin', $data);
//        $this->load->view('admin/add_user', $data);
//        $this->load->view('template/footer', $data);
        $this->load->view('backend/users/add', $data);

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
//        $this->load->view('template/header', $data);
//        $this->load->view('template/nav_bar_admin', $data);
//        $this->load->view('admin/add_ticket', $data);
//        $this->load->view('template/footer', $data);
        $this->load->view('backend/tickets/add',$data);

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
//        $this->load->view('template/header', $data);
//        $this->load->view('template/nav_bar_admin', $data);
//        $this->load->view('admin/edit_ticket', $data);
//        $this->load->view('template/footer', $data);
        $this->load->view('backend/tickets/edit',$data);
    }
    
}
