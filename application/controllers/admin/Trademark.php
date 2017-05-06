<?php

Class Trademark extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('trademark_model');
    }

    /*
     * Lay ra danh sach danh muc san pham
     */

    function index() {
        $list = $this->trademark_model->get_list();
        $this->data['list'] = $list;

        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        //load view
        $this->data['temp'] = 'admin/trademark/index';
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
                //luu du lieu can them
                $data = array('name' => $name,);
                //them moi vao csdl
                if ($this->trademark_model->create($data)) {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('trademark'));
            }
        }

        //lay danh sach thuong hieu
        $input = array();
        $trademark_list = $this->trademark_model->get_list($input);
        $this->data['trademark_list'] = $trademark_list;

        $this->data['temp'] = 'admin/trademark/add';
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
        $info = $this->trademark_model->get_info($id);
        if (!$info) {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại danh mục này');
            redirect(admin_url('trademark'));
        }
        $this->data['info'] = $info;

        //neu ma co du lieu post len thi kiem tra
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Tên', 'required');

            //nhập liệu chính xác
            if ($this->form_validation->run()) {
                //them vao csdl
                $name = $this->input->post('name');
                //luu du lieu can them
                $data = array('name'       => $name);
                //them moi vao csdl
                if ($this->trademark_model->update($id, $data)) {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('trademark'));
            }
        }

        //lay danh sach danh muc cha
        $input = array();
        $trademark_list = $this->trademark_model->get_list($input);
        $this->data['trademark_list'] = $trademark_list;

        $this->data['temp'] = 'admin/trademark/edit';
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
        redirect(admin_url('trademark'));
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
        $info = $this->trademark_model->get_info($id);
        if (!$info) {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại danh mục này');
            if ($rediect) {
                redirect(admin_url('trademark'));
            } else {
                return false;
            }
        }
        //kiem tra xem danh muc nay co san pham khong
        $this->load->model('product_model');
        $product = $this->product_model->get_info_rule(array('trademark_id' => $id), 'id');
        if ($product) {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'Danh mục ' . $info->name . ' có chứa sản phẩm,bạn cần xóa các sản phẩm trước khi xóa danh mục');
            if ($rediect) {
                redirect(admin_url('trademark'));
            } else {
                return false;
            }
        }

        //xoa du lieu
        $this->trademark_model->delete($id);
    }

}
