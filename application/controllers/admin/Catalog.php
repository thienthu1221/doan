<?php

Class Catalog extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('catalog_model');
    }

    /*
     * Lay ra danh sach danh muc san pham
     */

    function index() {
        
        //lay tong so luong ta ca cac san pham trong websit
        $total_rows = $this->catalog_model->get_total();
        $this->data['total_rows'] = $total_rows;
        
        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
        $config['base_url']   = admin_url('catalog/index'); //link hien thi ra danh sach san pham
        $config['per_page']   = 10;//so luong san pham hien thi tren 1 trang
        $config['uri_segment'] = 4;//phan doan hien thi ra so trang tren url
        $config['next_link']   = 'Trang kế tiếp';
        $config['prev_link']   = 'Trang trước';
        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);
        
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        
        $input = array();
        $input['limit'] = array($config['per_page'], $segment);
        
        //kiem tra co thuc hien loc du lieu hay khong
        $id = $this->input->get('id');
        $id = intval($id);
        $input['where'] = array();
        if($id > 0)
        {
            $input['where']['id'] = $id;
        }
        $name = $this->input->get('name');
        if($name)
        {
            $input['like'] = array('name', $name);
        }
        $catalog_id = $this->input->get('catalog');
        $catalog_id = intval($catalog_id);
        if($catalog_id > 0)
        {
            $input['where']['catalog_id'] = $catalog_id;
        }
        
        
        
        $list = $this->catalog_model->get_list($input);
        $this->data['list'] = $list;

        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        //load view
        $this->data['temp'] = 'admin/catalog/index';
        $this->load->view('admin/main', $this->data);
    }

    /*
     * Them moi du lieu
     */

    function add() {
        //load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');

        //neu ma co du lieu post len thi kiem tra
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Tên', 'required');

            //nhập liệu chính xác
            if ($this->form_validation->run()) {
                //them vao csdl
                $name = $this->input->post('name');
                $parent_id = $this->input->post('parent_id');
                
                $sort_order = $this->input->post('sort_order');
                
                //lay ten file anh minh hoa duoc update len
                $this->load->library('upload_library');
                $upload_path = './upload/catalog';
                $upload_data = $this->upload_library->upload($upload_path, 'image');  
                $image_link = '';
                if(isset($upload_data['file_name']))
                {
                    $image_link = $upload_data['file_name'];
                }

                //luu du lieu can them
                $data = array(
                    'name' => $name,
                    'parent_id' => $parent_id,
                    'image_link' => $image_link,
                    'sort_order' => intval($sort_order)
                );
                //them moi vao csdl
                if ($this->catalog_model->create($data)) {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('catalog'));
            }
        }

        //lay danh sach danh muc cha
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $list = $this->catalog_model->get_list($input);
        foreach ($list as $row) {
            $input['where'] = array('parent_id' => $row->id);
            $subs = $this->catalog_model->get_list($input);
            $row->subs = $subs;
        }
        $this->data['list'] = $list;

        $this->data['temp'] = 'admin/catalog/add';
        $this->load->view('admin/main', $this->data);
    }

    /*
     * Cập nhật du lieu
     */

    function edit() {
        //load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');

        //lay id danh mục
        $id = $this->uri->rsegment(3);
        $info = $this->catalog_model->get_info($id);
        if (!$info) {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại danh mục này');
            redirect(admin_url('catalog'));
        }
        $this->data['info'] = $info;

        //neu ma co du lieu post len thi kiem tra
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Tên', 'required');

            //nhập liệu chính xác
            if ($this->form_validation->run()) {
                //them vao csdl
                $name = $this->input->post('name');
                
                $parent_id  = $this->input->post('parent_id');
                $sort_order = $this->input->post('sort_order');
                //lay ten file anh minh hoa duoc update len
                $this->load->library('upload_library');
                $upload_path = './upload/catalog';
                $upload_data = $this->upload_library->upload($upload_path, 'image');
                $image_link = '';
                if(isset($upload_data['file_name']))
                {
                    $image_link = $upload_data['file_name'];
                }
                //luu du lieu can them
                $data = array(
                    'name'       => $name,
                    
                    'parent_id'  => $parent_id,
                    'sort_order' => intval($sort_order)
                );
                if($image_link != '')
                {
                    $data['image_link'] = $image_link;
                }
                
                //them moi vao csdl
                if ($this->catalog_model->update($id, $data)) {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('catalog'));
            }
        }

        //lay danh sach danh muc cha
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $list = $this->catalog_model->get_list($input);
        foreach ($list as $row) {
            $input['where'] = array('parent_id' => $row->id);
            $subs = $this->catalog_model->get_list($input);
            $row->subs = $subs;
        }
        $this->data['list'] = $list;

        $this->data['temp'] = 'admin/catalog/edit';
        $this->load->view('admin/main', $this->data);
    }

    /*
     * Xoa danh mục
     */

    function delete() {
        //lay id danh mục
        $id = $this->uri->rsegment(3);
        $this->_del($id);

        //tạo ra nội dung thông báo
        $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
        redirect(admin_url('catalog'));
    }

    /*
     * Xoa nhieu danh muc san pham
     */

    function delete_all() {
        $ids = $this->input->post('ids');
        foreach ($ids as $id) {
            $this->_del($id, false);
        }
    }

    /*
     * Thuc hien xoa
     */

    private function _del($id, $rediect = true) {
        $info = $this->catalog_model->get_info($id);
        if (!$info) {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại danh mục này');
            if ($rediect) {
                redirect(admin_url('catalog'));
            } else {
                return false;
            }
        }

        //kiem tra xem danh muc nay co san pham khong
        $this->load->model('product_model');
        $product = $this->product_model->get_info_rule(array('catalog_id' => $id), 'id');
        if ($product) {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'Danh mục ' . $info->name . ' có chứa sản phẩm,bạn cần xóa các sản phẩm trước khi xóa danh mục');
            if ($rediect) {
                redirect(admin_url('catalog'));
            } else {
                return false;
            }
        }

        //xoa du lieu
        $this->catalog_model->delete($id);
    }
    
    function add_by_ajax(){
        //var_dump($_POST); #kiểm tra giá trị thui 
//       var_dump($_GE$
        $data['test'] = $this->input->post('product_name_1'); // nó giống khi e submit the kiểu truyền thống ko
        $html = $this->load->view('admin/catalog/return_ajax',$data,true); // Nhớ param thứ 3 là true nhe
        echo json_encode(array('html'=>$html,'isTrue'=>true)); // đoạn này là phải có nhé, giờ a demo trả về array nhé, đôi khi phải xài tới
        die('hsdfIjdashdlud;ioas');
//        if (1 == 1) {
//            // đôi khi e mún trả về lỗi như này cho người dùng biét và ko mún cho nó chạy nữa, thì phải sử dụng die or return
//            $html = $this->load->view('admin/catalog/return_ajax',$data,true); // Nhớ param thứ 3 là true nhe
//            echo json_encode(array('html'=>$html,'isTrue'=>true));
//            die();
//        }
    }

}
