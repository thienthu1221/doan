<?php

Class MY_Controller extends CI_Controller {

    //bien gui du lieu sang ben view
    public $data = array();

    function __construct() {
        //ke thua tu CI_Controller
        parent::__construct();

        $controller = $this->uri->segment(1);
        switch ($controller) {
            case 'admin' : {
                    $this->load->helper('language');
                    $this->lang->load('admin/common');

                    //xu ly cac du lieu khi truy cap vao trang admin
                    $this->load->helper('admin');
                    $this->_check_login();
                    break;
                }
            default: {
                    //xu ly du lieu o trang ngoai
                    //lay danh sach danh muc san pham
                    $this->load->model('catalog_model');
                    $this->load->helper('slug');
                    $input = array();
                    $input['where'] = array('parent_id' => 0);
                    $catalog_list = $this->catalog_model->get_list($input);
                    foreach ($catalog_list as $row) {
                        $input['where'] = array('parent_id' => $row->id);
                        $subs = $this->catalog_model->get_list($input);
                        $row->subs = $subs;
                        foreach ($subs as $row) {
                            $input['where'] = array('parent_id' => $row->id);
                            $son = $this->catalog_model->get_list($input);
                            $row->son = $son;
                        }
                    }
                    $this->data['catalog_list'] = $catalog_list;
                    
                    //lay danh sach bai viet moi
                    $this->load->model('news_model');
                    $input_news = array();
                    $input_news['limit'] = array(5, 0);
                    $news_list = $this->news_model->get_list($input_news);
                    $this->data['news_list'] = $news_list;
                    
                    //lay danh sach slide
                    $this->load->model('slide_model');
                    $input1['limit'] = array(5, 0);
                    $slide_list = $this->slide_model->get_list($input1);
                    $this->data['slide_list'] = $slide_list;
                    
                    $this->load->model('trademark_model');
                    $trademarks = $this->trademark_model->get_list();
                    $this->data['trademarks'] = $trademarks;
                    
                    //Sản phẩm hot
                    $this->load->model('product_model');
                    $input_hot['order'] = array('buyed', 'DESC');  
                    $input_hot['limit'] = array(5,0);
                    $product_hot = $this->product_model->get_list($input_hot);
                    $this->data['product_hot'] = $product_hot;
                    //Sản phẩm xem nhiêu
                    $input_view['order'] = array('view', 'DESC');  
                    $input_view['limit'] = array(5,0);
                    $product_view = $this->product_model->get_list($input_view);
                    $this->data['product_view'] = $product_view;
                
                    //goi toi thu vien
                    $this->load->library('cart');
                    $this->data['total_items'] = $this->cart->total_items();
                }
        }
    }

    /*
     * Kiem tra trang thai dang nhap cua admin
     */

    private function _check_login() {
        $controller = $this->uri->rsegment('1');
        $controller = strtolower($controller);

        $login = $this->session->userdata('login');
        //neu ma chua dang nhap,ma truy cap 1 controller khac login
        if (!$login && $controller != 'login') {
            redirect(admin_url('login'));
        }
        //neu ma admin da dang nhap thi khong cho phep vao trang login nua.
        if ($login && $controller == 'login') {
            redirect(admin_url('home'));
        }
    }

}
