

<div class="container">
    <div id="breadcrumb">
        <div itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
            <a href="<?php echo base_url()?>" itemprop="url" class="nopad-l">
                <span itemprop="title">Trang chủ</span>
            </a> ›
        </div>
        <div itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
            <a href="" itemprop="url">
                <span itemprop="title">Thông tin</span>
            </a>
        </div>
    </div>
    <!--breadcrumb-->
    <div class="clear"></div>
    <div class="cart-page">
        <div class="taxonomy-page">
            <div class="full">
                <div class="width990" style="border: 1px solid #ccc;padding: 10px;margin: 10px auto;">
                    <div class="cart-container">
                        <div class="step02">
                            <div class="left">
                                <div class="step02-tab">
                                    <!-- end tab -->
                                    <form method="post" enctype="multipart/form-data" action="<?php echo site_url('order/checkout') ?>">
                                        <div id="tab02" style="" class="cf-tab">
                                            <div class="tab02-form">
                                                <!--KH dang nhap-->
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td width="100px">Họ tên</td>
                                                            <td>
                                                                <input name="name" id="buyer_name" value="<?php echo isset($user->name) ? $user->name : '' ?>" placeholder="Họ tên" type="text">
                                                                <p id="for_buyer_name"><?php echo form_error('name') ?></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="100px">Địa chỉ</td>
                                                            <td>
                                                                <textarea name="message" id="buyer_address" class="addressText" placeholder="Địa chỉ nhận hàng"></textarea>
                                                                <p id="for_buyer_address"><?php echo form_error('message') ?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td width="100px">
                                                                Email
                                                            </td>
                                                            <td>
                                                                <input name="email" id="buyer_email" value="<?php echo isset($user->email) ? $user->email : '' ?>" placeholder="Email của bạn" type="text">
                                                                <p id="for_buyer_mobile"><?php echo form_error('email') ?></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="100px">Số điện thoại</td>
                                                            <td>
                                                                <input name="phone" id="buyer_mobile" value="<?php echo isset($user->phone) ? $user->phone : '' ?>" placeholder="Số điện thoại" type="text">
                                                                <p id="for_buyer_mobile"><?php echo form_error('phone') ?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td></td>
                                                            <td style="font-style: italic; color:#999; padding: 0 5px; line-height: 16px;">Trung tâm giá sỉ sẽ liên hệ số điện thoại này để đảm bảo sẽ giao hàng đến bạn</td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>
                                                                <button type="submit" class="btnnext">Tiếp tục</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>                                       	
                                    </form>
                                </div>
                            </div>
                            <!-- left -->
                            <div class="right">
                                <div class="box">
                                    <?php foreach ($carts as $row): ?>
                                    <strong>Sản phẩm đang có trong giỏ hàng</strong>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td width="20px"><?php echo $row['qty']; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><span class="price" style="color:#222 !important;">1.080.000₫</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p>
                                        <b>Tạm tính:</b>
                                        <span><?php echo number_format($row['subtotal']); ?>₫</span>
                                    </p>
                                    
                                    <p>
                                        <b>Phí vận chuyển:</b>
                                        <span id="fee-shipping">Chưa có</span>
                                    </p>
                                    <p>
                                        <b>Phí thu hộ:</b>
                                        <span id="fee-keep">Chưa có</span>
                                    </p>
                                    <p class="total">
                                        <b>Thành tiền</b>
                                        <span style="color:#EB7000 !important; font-weight: bold;" id="totalValue"><?php echo number_format($total_amount) ?>₫</span>
                                    </p>
                                    <?php endforeach;?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--cart-page-->
</div>

