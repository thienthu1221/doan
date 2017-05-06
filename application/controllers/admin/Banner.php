<?php
Class Banner extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load ra file model
        $this->load->model('banner_model');
    }
    
    /*
     * Hien thi danh sach banner
     */
    function index()
    {
        //lay tong so luong ta ca cac banner trong websit
        $total_rows = $this->banner_model->get_total();
        $this->data['total_rows'] = $total_rows;

        $input = array();
       
        //lay danh sach banner
        $list = $this->banner_model->get_list($input);
        $this->data['list'] = $list;
       
        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        //load view
        $this->data['temp'] = 'admin/banner/index';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Them banner moi
     */
    function add()
    {
        
        //load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Tên banner', 'required');
            
            //nhập liệu chính xác
            if($this->form_validation->run())
            {
               
                //lay ten file anh minh hoa duoc update len
                $this->load->library('upload_library');
                $upload_path = './upload/banner';
                $upload_data = $this->upload_library->upload($upload_path, 'image');  
                $image_link = '';
                if(isset($upload_data['file_name']))
                {
                    $image_link = $upload_data['file_name'];
                }
               
                //luu du lieu can them
                $data = array(
                    'name'       => $this->input->post('name'),
                    'image_link' => $image_link,
                ); 
                //them moi vao csdl
                if($this->banner_model->create($data))
                {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('banner'));
            }
        }
        
        
        //load view
        $this->data['temp'] = 'admin/banner/add';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Chinh sua banner
     */
    function edit()
    {
        $id = $this->uri->rsegment('3');
        $banner = $this->banner_model->get_info($id);
        if(!$banner)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'Không tồn tại banner này');
            redirect(admin_url('banner'));
        }
        $this->data['banner'] = $banner;
       
       
        //load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Tên banner', 'required');
            
            //nhập liệu chính xác
            if($this->form_validation->run())
            {
               
                //lay ten file anh minh hoa duoc update len
                $this->load->library('upload_library');
                $upload_path = './upload/banner';
                $upload_data = $this->upload_library->upload($upload_path, 'image');
                $image_link = '';
                if(isset($upload_data['file_name']))
                {
                    $image_link = $upload_data['file_name'];
                }
            
                //luu du lieu can them
                $data = array(
                    'name'       => $this->input->post('name'),
                ); 
                if($image_link != '')
                {
                    $data['image_link'] = $image_link;
                }
               
                //them moi vao csdl
                if($this->banner_model->update($banner->id, $data))
                {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không cập nhật được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('banner'));
            }
        }
        
        
        //load view
        $this->data['temp'] = 'admin/banner/edit';
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
        $this->session->set_flashdata('message', 'Xóa banner thành công');
        redirect(admin_url('banner'));
    }
    
    /*
     * Xóa nhiều banner
     */
    function delete_all()
    {
        //lay tat ca id banner muon xoa
        $ids = $this->input->post('ids');
        foreach ($ids as $id)
        {
            $this->_del($id);
        }
    }
    
    /*
     *Xoa banner
     */
    private function _del($id)
    {
        $banner = $this->banner_model->get_info($id);
        if(!$banner)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại banner này');
            redirect(admin_url('banner'));
        }
        //thuc hien xoa banner
        $this->banner_model->delete($id);
        //xoa cac anh cua banner
        $image_link = './upload/banner/'.$banner->image_link;
        if(file_exists($image_link))
        {
            unlink($image_link);
        }
        
    }
}



