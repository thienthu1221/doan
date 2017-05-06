<?php
Class Cart extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('slug');
    }
    
    /*
     * Phuoc thuc them san pham vao gio hang
     */
    function add()
    {
        //lay ra san pham muon them vao gio hang
        $this->load->model('product_model');
        $id = $this->uri->rsegment(3);
        $product = $this->product_model->get_info($id);
        if(!$product)
        {
            redirect();
        }
        
        //chuyen sang trang danh sach san pham trong gio hang
        redirect(base_url('thanh-toan.html'));
    }
    
    /*
     * Hien thị ra danh sách sản phẩm trong gio hàng
     */
    function index()
    {
        //thong gio hang
        $carts = $this->cart->contents();
        //tong so san pham co trong gio hang
        $total_items = $this->cart->total_items();
        
        $this->data['carts'] = $carts;
        $this->data['total_items']  =$total_items;
        
        $this->data['title'] = 'Giỏ hàng - Shophangphap.com';
        $this->data['hinh'] = '';
        $this->data['mota'] = '';
        $this->data['keywords'] = 'SHOP HÀNG PHÁP, shophangphap.com, sieu thi hang phap';
        $this->data['description'] = 'Chuyên cung cấp các mặt hàng Pháp đang hot và sử dụng rộng rãi tại Quận 7, Quận 3, Tp.HCM';
        
        $this->data['temp']  ='site/cart/index';
        $this->load->view('site/layout', $this->data);
    }
    
    /*
     * Cập nhật giỏ hàng
     */
    function update()
    {
        //thong gio hang
        $carts = $this->cart->contents();
        foreach ($carts as $key => $row)
        {
            //tong so luong san pham
            $total_qty = $this->input->post('qty_'.$row['id']);
            $data = array();
            $data['rowid'] = $key;
            $data['qty'] = $total_qty;
            $this->cart->update($data);
        }
        
        //chuyen sang trang danh sach san pham trong gio hang
        redirect(base_url('thanh-toan.html'));
    }
    
    /*
     * Xoa sản phẩm trong gio hang
     */
    function del()
    {
        $id = $this->uri->rsegment(3);
        $id = intval($id);
        //trường hợp xóa 1 sản phẩm nào đó trong giỏ hàng
        if($id > 0)
        {
            //thong gio hang
            $carts = $this->cart->contents();
            foreach ($carts as $key => $row)
            {
                if($row['id'] == $id)
                {
                    //tong so luong san pham
                    $data = array();
                    $data['rowid'] = $key;
                    $data['qty'] = 0;
                    $this->cart->update($data);
                }
            }
        }else{
            //xóa toàn bô giỏ hang
            $this->cart->destroy();
        }
        
        //chuyen sang trang danh sach san pham trong gio hang
        redirect(base_url('cart'));
    }
}


