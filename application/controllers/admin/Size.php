<?php
Class Size extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load ra file model
        $this->load->model('size_model');
    }
    
    /*
     * Hien thi danh sach size
     */
    function index()
    {
        //lay tong so luong ta ca cac size trong websit
        $total_rows = $this->size_model->get_total();
        $this->data['total_rows'] = $total_rows;

        $input = array();
       
        //lay danh sach size
        $list = $this->size_model->get_list($input);
        $this->data['list'] = $list;
       
        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        //load view
        $this->data['temp'] = 'admin/size/index';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Them size moi
     */
    function add()
    {
        
        //load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Tên size', 'required');
            
            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                              
                //luu du lieu can them
                $data = array(
                    'name'       => $this->input->post('name'),
                ); 
                //pre($data);
                //them moi vao csdl
                if($this->size_model->create($data))
                {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('size'));
            }
        }
        
        
        //load view
        $this->data['temp'] = 'admin/size/add';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Chinh sua size
     */
    function edit()
    {
        $id = $this->uri->rsegment('3');
        $size = $this->size_model->get_info($id);
        if(!$size)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'Không tồn tại size này');
            redirect(admin_url('size'));
        }
        $this->data['size'] = $size;
       
       
        //load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Tên size', 'required');
            
            //nhập liệu chính xác
            if($this->form_validation->run())
            {
               
                
                //luu du lieu can them
                $data = array(
                    'name'       => $this->input->post('name'),
                ); 
                
                //them moi vao csdl
                if($this->size_model->update($size->id, $data))
                {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không cập nhật được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('size'));
            }
        }
        
        
        //load view
        $this->data['temp'] = 'admin/size/edit';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Xoa du lieu
     */
    function del()
    {
        $id = $this->uri->rsegment(3);
        $this->_del($id);
        
        //tạo ra nội dung thông báo
        $this->session->set_flashdata('message', 'Xóa size thành công');
        redirect(admin_url('size'));
    }
    
    /*
     * Xóa nhiều size
     */
    function delete_all()
    {
        //lay tat ca id size muon xoa
        $ids = $this->input->post('ids');
        foreach ($ids as $id)
        {
            $this->_del($id);
        }
    }
    
    /*
     *Xoa size
     */
    private function _del($id)
    {
        $size = $this->size_model->get_info($id);
        if(!$size)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại size này');
            redirect(admin_url('size'));
        }
        //thuc hien xoa size
        $this->size_model->delete($id);
           
    }
}



