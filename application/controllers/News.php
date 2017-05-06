<?php

Class News extends MY_Controller {

    function __construct() {
        parent::__construct();
        //load model san pham
        $this->load->model('news_model');
    }

    function index() {

        $input_news = array();
        $input_news['limit'] = array(20, 0);
        $news = $this->news_model->get_list($input_news);
        $this->data['news'] = $news;

        $this->data['temp'] = 'site/news/index';
        $this->load->view('site/layout', $this->data);
    }

    function catelogy() {
        //lay id san pham muon xem
        $id = $this->uri->rsegment(3);
        $news = $this->news_model->get_info($id);
        if (!$news) {
            redirect();
        }
        $this->data['news'] = $news;
        $this->data['temp'] = 'site/news/catelogy';
        $this->load->view('site/layout', $this->data);
    }

}
