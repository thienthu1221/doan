
<div class="container convert_a">
    <div id="breadcrumb">
        <div itemscope itemtype="">
            <a href="<?php echo base_url() ?>" itemprop="url" class="nopad-l">
                <span itemprop="">Trang chủ</span>
            </a> ›
        </div>
        <div itemscope itemtype="">
            <a href="" itemprop="url">
                <span itemprop="title"><?php echo $catalog->name ?></span>
            </a> ›
        </div>
    </div>
    <!--breadcrumb-->
    <div class="clear"></div>
    <div id="col-left">
        <?php $this->load->view('site/menu') ?>
        <!--nav_vertical-->
        <div class="banner-left">
            <a href=""><img src="<?php echo public_url() ?>/site/img/banner/banner_6cdd60ea.png" alt="" width="202" height="412"/></a>
        </div>
    </div>
    <!--col-left-->
    <section id="content" class="right">
        <div id="img-detail">
            <div id="img-large">

                <img src="<?php echo base_url('upload/product/' . $product->image_link) ?>" title="" alt="" />
            </div>
            <ul id="img-thumbs" class="ul">
            </ul>
        </div>
        <!--img-detail-->
        <div id="overview">
            <h1 id="detail-name"><?php echo $product->name ?></h1>
            <div id="price-detail">
                <?php if($product->price == 0):?>
                <span id="sizePrice" class="new">
                    <?php foreach ($size_price as $row){echo $row->price_size; echo '-';}?>
                    vnđ
                </span>
                    <?php else: ?>
                <?php if ($product->discount > 0): ?>
                    <?php $price_new = $product->price - $product->discount; ?>
                    <span class="old"><?php echo number_format($product->price) ?> vnđ</span>
                    <span class="new"><?php echo number_format($price_new) ?> vnđ</span>
                <?php else: ?>
                    <span class="new"><?php echo number_format($product->price) ?> vnđ</span>
                <?php endif; ?>
                <?php endif;?>
            </div>
            <div class="detail-summary"><p id="size"><?php echo $product->intro ?></p></div>
            
            <div class="fb-like" 
                 data-href="https://www.facebook.com/buonbansi.vn/" 
                 data-layout="standard" 
                 data-action="like" 
                 data-size="large" 
                 data-show-faces="true" 
                 data-share="true">         
            </div>
            <br>
            <br>
            <div class="detail-summary">
                Dung tích :
                <select id="mySelect" name="" style="width: 145px;height: 28px;border: solid 1px #ccc;" onchange="myFunction()">
                    <option value="<?php foreach ($size_price as $row){echo $row->price_size.' vnđ - ';}?>">Chọn size bạn muốn</option>
                    <?php foreach ($size_price as $row):?>
                    <option value="<?php echo $row->price_size ?> vnđ"><?php echo $row->size?></option>
                    <?php endforeach;?>
                </select>
            </div>

            <!--quantity-detail-->
            <a id="buy-detail" href="javascript:show_popup('#popup-register')" rel="nofollow">Mua ngay</a>
            <a id="buy-detail" href="<?php echo base_url('cart/add/' . $product->id) ?>" rel="nofollow">Thêm vào giỏ hàng</a> 
        </div>

        <script>
            $(function () {
                $('#tab1 ul').carouFredSel({
                    auto: {
                        play: true,
                        timeoutDuration: 4000,
                        pauseOnHover: true
                    },
                    prev: '#tab1 .prev',
                    next: '#tab1 .next',
                });

                $(document).ajaxStop(function () {
                    $('#tab2 ul').carouFredSel({
                        auto: {
                            play: true,
                            timeoutDuration: 4000,
                            pauseOnHover: true
                        },
                        prev: '#tab2 .prev',
                        next: '#tab2 .next',
                    });

                    $(".tab1-detail a").click(function () {
                        $(".tab1-detail a").removeClass("current");
                        $(this).addClass("current");

                        $(".cf1").hide();
                        $($(this).attr("href")).show();
                        return false;
                    });
                });
            });
        </script>
        <div id="pro-detail-left">
            <div class="title-product-hot tab1-detail">
                <a href="#tab1" class="current"><span>Sản phẩm xem nhiều</span></a>

            </div>
            <div class="clear"></div>
            <div style="height:255px; overflow:hidden;">
                <div class="product-list cf1" id="tab1" style="height:255px;">
                    <div class="btn-carousel2"><span class="prev"></span><span class="next"></span></div>
                    <ul class="ul">
                        <?php foreach ($product_view as $row): ?>
                            <li style="width:145px;">
                                <div class="p_container" style="padding:10px;">
                                    <a href="" class="p-img" style="width:125px; height:125px;">
                                        <img src="<?php echo base_url('upload/product/' . $row->image_link) ?>" alt="<?php echo $row->name ?>" width="120" height="120" style="max-width:125px; max-height:125px;"/>
                                    </a>
                                    <a href="" class="p-name"><?php echo $row->name ?></a>
                                    <?php if ($row->discount > 0): ?>
                                        <?php $price_new = $row->price - $row->discount; ?>
                                        <span class="p-old-price"><?php echo number_format($row->price) ?> vnđ</span>
                                        <span class="p-price"><?php echo number_format($price_new) ?> vnđ</span>
                                    <?php else: ?>
                                        <span class="p-price"><?php echo number_format($row->price) ?> vnđ</span>
                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </div>
            <div class="space3"></div>
            <script>
                $(function () {
                    $(".tab2-detail a").click(function () {
                        $(".tab2-detail a").removeClass("current");
                        $(this).addClass("current");

                        $(".cf2").hide();
                        $($(this).attr("href")).show();
                        return false;
                    });
                });
            </script>
            <div id="tab-pro-info">
                <div class="title-product-hot tab2-detail">
                    <a href="#tab3" class="current" rel="nofollow"><span>Thông tin sản phẩm</span></a>
                </div>
                <div class="clear"></div>
                <div id="tab3" class="content-tab-pro cf2" style="display:block">
                    <p><?php echo $product->content ?></p>
                    <div class="clear"></div>
                </div>
            </div>
            <!--tab-pro-info-->
        </div>
        <!--pro-detail-left-->
        <div id="pro-detail-right">
            <div class="box-right">
                <div class="title-box-right">
                    <h2 class="title">Sản phẩm HOT</h2>
                </div>
                <div class="content-box-right pro-right">
                    <ul class="ul">
                        <?php foreach ($product_hot as $row): ?>
                            <li>
                                <div class="left">
                                    <a href="" class="name"><?php echo $row->name ?></a>
                                    <span class="price"><?php echo number_format($row->price) ?>vnđ</span>
                                </div>
                                <a href="" class="img">
                                    <img src="<?php echo base_url('upload/product/' . $row->image_link) ?>" alt="<?php echo $row->name ?>" width="75" height="75"/> 
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="space2"></div>
            <div class="banner-right">
                <a href="" target='_blank' rel='nofollow'>
                    <img border=0 src="<?php echo public_url() ?>/site/img/banner/banner_6a9aeddf.png" width='300' height='500' alt=""/>
                </a>
            </div>
            <div class="space2"></div>
        </div>
    </section>
</div>
<!--container-->
<div id="popup-register">
    <span class="close" onclick="closePopup('#popup-register')">X</span>
    <div class="title-login">
        <img src="<?php echo public_url() ?>/site/img/icon_register.png" alt="login" />
        <div class="left">
            <b>Thông tin khách hàng</b>
        </div>
    </div>
    <div class="clear"></div>
    <form method="post" action="<?php echo site_url('order/checkout') ?>" enctype="multipart/form-data" onsubmit="return check_field_regist();">
        <div class="register-left">
            <div class="title"><span>Thông tin người nhận</span></div>
            <table>
                <tr><td width="115">Email</td><td><input type="text" name="email" id="email_regist" class="text" placeholder="Email khách hàng" /></td></tr>
                <tr><td width="115">Họ tên</td><td><input type="text" name="name" id="password_regist" class="text" placeholder="Họ và tên"/></td></tr>
                <tr><td width="115">Số điện thoại</td><td><input type="text" name="phone" id="mobile_regist" class="text" placeholder="Số điện thoại"/></td></tr>
                <tr><td width="115">Địa chỉ</td><td><input type="text" name="message" id="address_regist" class="text" placeholder="Địa chỉ"/></td></tr>        
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Gưi đơn hàng" class="submit"/>
                    </td>
                </tr>
            </table>
        </div><!--register-left-->
        <div class="register-right">
            <div class="title"><span>Thông tin giao hàng</span></div>
            <table>
                <tr><td width="115">Địa chỉ</td><td>
                        <input type="text" name="message" id="address_regist" class="text" placeholder="Địa chỉ người nhận"/></td></tr>   
                <tr>
                    <td width="115">Ghi chú</td> <td><textarea style="width: 273px;height: 71px"></textarea></td>
                </tr>
            </table>
        </div>
    </form>
</div><!--popup-register-->
<script>
    function show_popup(a) {
        $('body').prepend("<div id='bg-opacity'></div>");
        $(a).fadeIn();
        left = ($(window).width() - $(a).width()) / 2;
        $(a).css({"position": "fixed", "top": "50px", "z-index": "9999", "left": left});
    }

    function closePopup(a) {
        $("#bg-opacity").remove();
        $(a).fadeOut();
    }

    $("#bg-opacity").click(function () {
        closePopup("#popup-register");
    });

</script>
<p id="demo"></p>
<script>
    function myFunction() {
        var x = document.getElementById("mySelect").value;
//        var text = '<?php echo $product->size_price; ?>';
//        var obj = JSON.parse(text);
//        document.getElementById("size").innerHTML = obj.size;
//        document.getElementById("price").innerHTML = obj.price_size;
        document.getElementById("sizePrice").innerHTML = x;
    }
</script>