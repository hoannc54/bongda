<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class View extends CI_Controller {
    
    function __construct() {
        parent::__construct();

        $this->load->model('articles_model');
        $this->load->model('videos_model');
        $this->load->model('categories_model');
    }

    // trang chủ
    public function index() {
        $data['slider_articles'] = $this->articles_model->getListArticles(6, 0);
        $data['popular_articles'] = $this->articles_model->getListArticles(4, 7);
        $data['lastest_articles'] = $this->articles_model->getListArticles(4, 7);

        $data['videos'] = $this->videos_model->getListVideos(6,0);
        $categories = $this->categories_model->getCategories();
        $categories_articles = array();
        foreach ($categories as $category){
            $category_articles = $this->articles_model->getArticleCategory($category->category_id);

            $list["articles"] = $category_articles;
            $list["category"] = $category;
            $categories_articles[] = $list;
        }

        $data['categories_articles'] = $categories_articles;
        
        $this->load->view('frontend/home/content', $data);
        
    }
    
    // xem danh sách các bài viết
    public function all_articles($page = 1) {
        $per_page = 6;      // số bài viết trên một trang
        
        $mount = $this->articles_model->countArticles();
        
        // cấu hình phân trang
        config_paginator('view/all_articles', $mount, $per_page);
        
        $data['list_articles'] = $this->articles_model->getListArticles($per_page, ($page - 1) * $per_page);
        
        // lấy dữ liệu cho side bar
        $data['articles_sidebar'] = $this->articles_model->getArticlesForSideBar(5);
        $data['videos_sidebar'] = $this->videos_model->getVideosForSideBar(5);
        
        $this->load->view('template/header.php', $data);
        $this->load->view('template/slide_bar', $data);
        $this->load->view('articles/all_articles', $data);
        $this->load->view('template/side_bar', $data);
        $this->load->view('template/footer.php', $data);
    }
    
    // xem chi tiết article
//    public function article($alias = '') {
//        if (!isset($alias) || empty($alias)) {
//            redirect('view/all_articles');
//        }
//        $data['article'] = $this->articles_model->getArticleByAlias($alias);
//
//        // lấy dữ liệu cho side bar
//        $data['articles_sidebar'] = $this->articles_model->getArticlesForSideBar(5);
//        $data['videos_sidebar'] = $this->videos_model->getVideosForSideBar(5);
//
//        $this->load->view('template/header.php', $data);
//        $this->load->view('template/slide_bar', $data);
//        $this->load->view('articles/article', $data);
//        $this->load->view('template/side_bar', $data);
//        $this->load->view('template/footer.php', $data);
//    }
    
    // xem danh sách các video
    public function all_videos($page = 1) {
        $per_page = 6;      // số bài viết trên một trang
        
        // cấu hình phân trang
        $mount = $this->videos_model->countVideos();
        config_paginator('view/all_videos', $mount, $per_page);
        
        $data['list_videos'] = $this->videos_model->getListVideos($per_page, ($page - 1) * $per_page);
        
        // lấy dữ liệu cho side bar
        $data['articles_sidebar'] = $this->articles_model->getArticlesForSideBar(5);
        $data['videos_sidebar'] = $this->videos_model->getVideosForSideBar(5);
        
        $this->load->view('template/header.php', $data);
        $this->load->view('template/slide_bar', $data);
        $this->load->view('videos/all_videos', $data);
        $this->load->view('template/side_bar', $data);
        $this->load->view('template/footer.php', $data);
    }
    
    // xem chi tiết video
    public function video($alias = '') {
        if (!isset($alias) || empty($alias)) {
            redirect('view/all_videos');
        }

        $data['video'] = $this->videos_model->getVideoByAlias($alias);
        
        // lấy dữ liệu cho side bar
        //Du lieu sidebar
        $data['popular_articles'] = $this->articles_model->getListArticles(4, 7);
        $data['lastest_articles'] = $this->articles_model->getListArticles(4, 7);

        $this->load->view('frontend/video/display', $data);
    }
    
    //Xem bang xep hang
    public function ranking($regional_id = 1){
      $data['mua_giai'] = "93_94";
        $this->load->helper('form');
        if($this->input->post('submit')){
            $this->load->library('form_validation');
            $data['mua_giai'] = $this->input->post('mua_giai');
        }    
        $this->load->model('ranking_model');
        $data['regionals'] = $this->ranking_model->getRegional();
        $data['ranking'] = $this->ranking_model->getRankingDataByRegional($regional_id);
        $data['regional'] = $this->ranking_model->getRegionalById($regional_id);
        $data['year'] = $this->ranking_model->getYear();
        // lấy dữ liệu cho side bar
        $data['articles_sidebar'] = $this->articles_model->getArticlesForSideBar(5);
        $data['videos_sidebar'] = $this->videos_model->getVideosForSideBar(5);
      
        $this->load->view('template/header.php', $data);
        $this->load->view('template/slide_bar', $data);
        $this->load->view('ranking/ranking_table', $data);
        $this->load->view('template/side_bar', $data);
        $this->load->view('template/footer.php', $data);
    }
    
    //Xem thong tin vé của trận đáu bóng.
    public function ticket($match_id = 1) {
        $this->load->model('tickets_model');
        $data['matchs'] = $this->tickets_model->getMatch();
        $data['tickets'] = $this->tickets_model->getTicketForMatch($match_id);
        $data['match'] = $this->tickets_model->getMatchById($match_id);
        
        // lấy dữ liệu cho side bar
        $data['articles_sidebar'] = $this->articles_model->getArticlesForSideBar(5);
        $data['videos_sidebar'] = $this->videos_model->getVideosForSideBar(5);
        
        $this->load->view('template/header.php', $data);
        $this->load->view('template/slide_bar', $data);
        $this->load->view('tickets/ticket_information', $data);
        $this->load->view('template/side_bar', $data);
        $this->load->view('template/footer.php', $data);
    }
    // In ra phieu thanh toan
    public function details_book(){
        $this->load->model('tickets_model');
        $data['tickets'] = $this->tickets_model->getTicket();
        // lấy dữ liệu cho side bar
        $data['articles_sidebar'] = $this->articles_model->getArticlesForSideBar(5);
        $data['videos_sidebar'] = $this->videos_model->getVideosForSideBar(5);
        $this->load->view('template/header.php', $data);
        $this->load->view('template/slide_bar', $data);
        $this->load->view('tickets/details_book', $data);
        $this->load->view('template/side_bar', $data);
        $this->load->view('template/footer.php', $data);
    }
     public function guess($time = '2016-11-15'){
      $data['doi1'] = "";
      $data['doi2'] = "";
        //Lay lich su doi dau
        $this->load->helper('form');
        if($this->input->post('submit')){
            $this->load->library('form_validation');
            $data['doi1'] = $this->input->post('doi1');
            $data['doi2'] = $this->input->post('doi2');
        }
        $this->load->model('guess_model');
        $data['list_team'] = $this->guess_model->getListTeam();
        //Lay du lieu cho side bar
        $data['articles_sidebar'] = $this->articles_model->getArticlesForSideBar(5);
        $data['videos_sidebar'] = $this->videos_model->getVideosForSideBar(5);
        $this->load->view('template/header.php', $data);
        $this->load->view('template/slide_bar', $data);
        $this->load->view('guess/main', $data);
        $this->load->view('template/side_bar', $data);
        $this->load->view('template/footer.php', $data);
     }
     public function guess_result(){
        $doi1= "";
        $doi2= "";
         $this->load->helper('form');
            if($this->input->post('submit')){
            $this->load->library('form_validation');
            $doi1 = $this->input->post('doi1');
            $doi2= $this->input->post('doi2');
            $ngay = $this->input->post('ngay');
            $thang = $this->input->post('thang');
            $nam = $this->input->post('nam');
            $data['doi1'] = $doi1;
            $data['doi2'] = $doi2;
            $data['ngay'] = $ngay;
            $data['thang'] = $thang;
            $data['nam'] = $nam;
        }
        $this->load->model('guess_model');
        $this->load->model('ranking_model');
        $data['history1'] = $this->guess_model->getHistoryDataHomeTeam($data['doi1'],$data['doi2']);
        $data['history2'] = $this->guess_model->getHistoryDataHomeTeam($data['doi2'],$data['doi1']);
        $data['date'] = $this->guess_model->getTime($data['doi1'],$data['doi2']);
        if($thang==='8'||$thang==='9'||$thang=='10'||$thang==='11'||$thang==='12'){
            $nam = substr($nam,2,2);
            $year = intval($nam)+1;
            $year = $nam."_".$year;
            $data['year']= $year;
        } else{
             $nam = substr($nam,2,2);
            $year = intval($nam)-1;
            $year = $year."_".$nam;
            $data['year']= $year;
        }
        $data['articles_sidebar'] = $this->articles_model->getArticlesForSideBar(5);
        $data['videos_sidebar'] = $this->videos_model->getVideosForSideBar(5);
        $data['team1_recent'] = $this->guess_model->getRecent($data['doi1'],$data['year']);
        $data['team2_recent'] = $this->guess_model->getRecent($data['doi2'],$data['year']);
        $data['team1_ranking'] = $this->ranking_model->getRankingDataByName($data['doi1'],$data['year']);
        $data['team2_ranking'] = $this->ranking_model->getRankingDataByName($data['doi2'],$data['year']);
        $this->load->view('template/header.php', $data);
        $this->load->view('template/slide_bar', $data);
        $this->load->view('guess/guess_result', $data);
        $this->load->view('template/side_bar', $data);
        $this->load->view('template/footer.php', $data);
     }
     //Xay dung tap hoc du lieu
    public function testhome(){
        $data['slider_articles'] = $this->articles_model->getListArticles(6, 0);
        $data['popular_articles'] = $this->articles_model->getListArticles(4, 7);
        $data['lastest_articles'] = $this->articles_model->getListArticles(4, 7);

        $data['videos'] = $this->videos_model->getListVideos(6,0);
        $categories = $this->categories_model->getCategories();
        $categories_articles = array();
        foreach ($categories as $category){
            $category_articles = $this->articles_model->getArticleCategory($category->category_id);

            $list["articles"] = $category_articles;
            $list["category"] = $category;
            $categories_articles[] = $list;
        }

        $data['categories_articles'] = $categories_articles;
        $this->load->view('templates/header');
        $this->load->view('frontend/home/content', $data);
        $this->load->view('templates/footer');
    }
    public function article($alias = ''){
        if (!isset($alias) || empty($alias)) {
            redirect('view/all_articles');
        }
        $data['article'] = $this->articles_model->getArticleByAlias($alias);

//        // lấy dữ liệu cho side bar
//        $data['articles_sidebar'] = $this->articles_model->getArticlesForSideBar(5);
//        $data['videos_sidebar'] = $this->videos_model->getVideosForSideBar(5);

//        $data['slider_articles'] = $this->articles_model->getListArticles(6, 0);

        //Du lieu sidebar
        $data['popular_articles'] = $this->articles_model->getListArticles(4, 7);
        $data['lastest_articles'] = $this->articles_model->getListArticles(4, 7);

        $this->load->view('templates/header');
        $this->load->view('frontend/articles/detail', $data);
        $this->load->view('templates/footer');
    }
}
