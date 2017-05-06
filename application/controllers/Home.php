<?php
Class Home extends MY_Controller {
    function __construct() {
        parent::__construct();
        //load model san pham
        $this->load->model('product_model');
        $this->load->model('catalog_model');
        $this->load->model('trademark_model');
        $this->load->model('slide_model');
        $this->load->model('support_model');
        $this->load->helper('slug');
    }
    function index($id = false) {
        $this->data['product_home'] = array();
        $trademarks = $this->trademark_model->get_list();
        
        foreach ($trademarks as $row) {

            $input_trademark = array();
            $input_trademark['where'] = array('trademark_id' => $row->id);
            //$input_trademark['limit'] = array(4, 0);

            $product_trademark = $this->product_model->get_list($input_trademark);
            $row->list_products = $product_trademark;
        }
        
        $this->data['product_trademark'] = $product_trademark;
        $this->data['trademarks'] = $trademarks;
        
        //pre($trademarks);
        
        $input_catalog['where'] = array('parent_id' => 0);
        $catalog_home = $this->catalog_model->get_list($input_catalog);
        foreach ($catalog_home as $catelogy) {
            // For qua tung cate lớn, lấy danh sách cate nhỏ
            $input_catalog['where'] = array('parent_id' => $catelogy->id);
            //$input_catalog['limit'] = array(4, 0);
            $subs = $this->catalog_model->get_list($input_catalog);
            $catelogy->subs = $subs;
            if(empty($catalog_home)){
                continue;
            }
            
            foreach ($catelogy->subs as $subCategory) {
                $input_product = array();
                $input_product['where'] = array('catalog_id' => $subCategory->id);
                $input_product['limit'] = array(1, 0);

                $product_home = $this->product_model->get_list($input_product);
                $subCategory->list_products = $product_home;
            }
//            foreach ($subs as $row) {
//                $input_catalog['where'] = array('parent_id' => $row->id);
//                $son = $this->catalog_model->get_list($input_catalog);
//                $row->son = $son;
//
//                foreach ($row->son as $subCategory) {
//                    $input_product = array();
//                    $input_product['where'] = array('catalog_id' => $subCategory->id);
//                    $input_product['limit'] = array(4, 0);
//
//                    $product_home = $this->product_model->get_list($input_product);
//                    $subCategory->list_products = $product_home;
//                }
//            }
            // For qua từng cate nhỏ, lấy danh sách product 
        }
        $this->data['catalog_home'] = $catalog_home;
        $this->data['product_home'] = $product_home;
        //pre($catalog_home);
        //echo "<pre>"; print_r($this->data['catalog_home']); die;
        //pre($product_home);
        /*
         * Lay san pham theo danh muc 
         */
        $input_skill['where'] = array();
        $pro_skill1 = $this->product_model->get_list($input_skill);
        $this->data['pro_skill'] = $pro_skill1;
        /*
         * Lay san pham theo thuong hieu kieu ngu nguoi
         * Đeo làm đc thì chơi theo kiểu ngủ người
         * Khi nào làm đc thì chơi kiểu pro
         * Cố lên k biết thì hỏi đừng dấu ngu
         */
        $input_skill['where'] = array('trademark_id' => 30);
        $pro_skill = $this->product_model->get_list($input_skill);
        $this->data['pro_skill'] = $pro_skill;

        //pre($pro_skill);
        $input_transino['where'] = array('trademark_id' => 29);
        $pro_transino = $this->product_model->get_list($input_transino);
        $this->data['pro_transino'] = $pro_transino;

        $input_select['where'] = array('trademark_id' => 28);
        $pro_select = $this->product_model->get_list($input_select);
        $this->data['pro_select'] = $pro_select;

        $input_shiseido['where'] = array('trademark_id' => 27);
        $pro_shiseido = $this->product_model->get_list($input_shiseido);
        $this->data['pro_shiseido'] = $pro_shiseido;

        $input_coreana['where'] = array('trademark_id' => 26);
        $pro_coreana = $this->product_model->get_list($input_coreana);
        $this->data['pro_coreana'] = $pro_coreana;

        $input_toford['where'] = array('trademark_id' => 25);
        $pro_toford = $this->product_model->get_list($input_toford);
        $this->data['pro_toford'] = $pro_toford;

        $input_chanel['where'] = array('trademark_id' => 24);
        $pro_chanel = $this->product_model->get_list($input_chanel);
        $this->data['pro_chanel'] = $pro_chanel;
        //pre($pro_skill);
        /*
         * Load form đăng kí thông tin nhận email
         */
        $this->data['temp'] = 'site/home/index';
        $this->load->view('site/layout', $this->data);
    }

    function email() {


        $data = array(
            'email' => $this->input->post('email')
        );
        $this->support_model->create($data);

        $this->data['temp'] = 'site/home/email';
        $this->load->view('site/layout', $this->data);
    }

    function view() {
        $this->data['temp'] = 'site/home/view';
        $this->load->view('site/layout', $this->data);
    }
}
