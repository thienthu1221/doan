<div class="container">
    <div id="breadcrumb">
        <div itemscope="" itemtype="">
            <a href="<?php echo base_url() ?>" itemprop="url" class="nopad-l">
                <span itemprop="title">Trang chủ</span>
            </a> ›
        </div>
        <div itemscope="" itemtype="">
            <a href="" itemprop="url">
                <span itemprop="title">Giỏ hàng</span>
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
                        <div class="step01">
                            <?php if ($total_items > 0): ?>
                                <form action="<?php echo base_url('cart/update') ?>" method="post">
                                    <div class="left">

                                        <table class="tbl-step01" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <td colspan="2">Sản phẩm trong giỏ hàng</td>
                                                    <td width="100px">Giá mua</td>
                                                    <td width="100px">Số lượng</td>
                                                    <td width="100px">Thành tiền</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $total_amount = 0; ?>
                                                <?php foreach ($carts as $row): ?>
                                                    <?php $total_amount = $total_amount + $row['subtotal']; ?>
                                                    <tr class="tbl-row" data-id="129" data-quantity="1" data-price="884000">
                                                        <td><img src="<?php echo base_url('upload/product/' . $row['image_link']) ?>" width="100px"></td>
                                                        <td>
                                                            <a href="" class="name"><?php echo $row['name']; ?></a>
                                                            <div class="clear"></div>
                                                            <a href="<?php echo base_url('cart/del/' . $row['id']) ?>" class="delete-btn">Hủy</a>
                                                        </td>
                                                        <td>
                                                            <span id="sell_price_pro_129"><?php echo number_format($row['price']); ?></span>₫
                                                            <div style="clear:both"></div>

                                                        </td>
                                                        <td>
                                                            <input name="qty_<?php echo $row['id'] ?>" id="quantity_pro_129" value="<?php echo $row['qty']; ?>" onchange="updatePrice('pro', '129', this.value)" style="width:30px; text-align: center;">
                                                        </td>
                                                        <td>
                                                            <span id="price_pro_129"><?php echo number_format($row['subtotal']); ?></span>₫
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <script>
                                            $(document).ready(function () {
                                                $(".delAll").click(function () {
                                                    if (confirm("Bạn muốn xóa bỏ sản phẩm này khỏi giỏ hàng ? ")) {
                                                        $(".tbl-row").each(function () {
                                                            _id = $(this).attr("data-id");
                                                            _price = $(this).attr("data-price");
                                                            _quantity = $(this).attr("data-quantity");
                                                            removeShoppingCartItem("pro", _id, _quantity, _price);
                                                        });
                                                        window.location = "";
                                                    }
                                                });
                                            });
                                        </script>
                                            <div class="action">
                                                <button style="width: 250px;height:29px " type="submit">Cập nhật</button>
                                                
                                                <div class="right"style="width: 250px" >
                                                    <a href="<?php echo base_url('cart/del') ?>">Hủy hết</a>       
                                                </div> 
                                                 
                                                <div class="right" style="margin-right: 35px">
                                                    <a href="<?php echo base_url() ?>">Quay Lại</a>       
                                                </div>
                                            </div>
                                    </div>
                                    <!-- left -->
                                    <div class="right">
                                        <div class="box">
                                            <p>
                                                <b>Tổng cộng:</b>
                                                <span><?php echo number_format($row['subtotal']); ?>₫</span>
                                            </p>
                                            <p>
                                                <b>Giảm giá:</b>
                                                <span>0₫</span>
                                            </p>
                                            <p class="total">
                                                <b>Thành tiền</b>
                                                <span style="color:#ff6633;"><?php echo number_format($total_amount) ?>₫</span>
                                            </p>
                                        </div>
                                        <a href="<?php echo site_url('order/checkout') ?>">Tiến hành thanh toán</a>
                                    </div>
                                    <div class="clear"></div>
                                </form>
                            <?php else: ?>
                                <h4>Không có sản phẩm nào trong giỏ hàng</h4>
                            <?php endif; ?>
                        </div>
                        <!-- step01 -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--cart-page-->
</div>