<div class="clear"></div>
<div id="footer-top">
    <div class="container">
        <div id="newsletter">
            <h3><i class="icon icon-email"></i>Đăng ký nhận tin</h3>
            <form>
                <input type="text" id="email-newsletter" name="email" placeholder="Email của bạn"/>
                
                <a href="javascript:subscribe_newsletter()" class="icon send-newsletter"></a>
            </form>
        </div>
    </div>
</div><!--footer-top-->

<div class="clear"></div>
<footer id="footer">
    <div class="container">
        <div class="box-footer">
            <h3>Chính sách & Trợ giúp</h3>
            <ul class="ul" style="display:block;"	>
                <li><a href="" rel="nofollow">Chính sách bảo mật thông tin</a></li>
                <li><a href="" rel="nofollow">Chính sách bán hàng</a></li>
                <li><a href="" rel="nofollow">Chính sách đổi trả hàng</a></li>
                <li><a href="" rel="nofollow">Hướng dẫn mua hàng Online</a></li>
                <li><a href="" rel="nofollow">Trung tâm trợ giúp</a></li>
            </ul>
        </div><!--box-footer-->
        <div class="box-footer">
            <h3>Danh mục sản phẩm</h3>
            <?php foreach ($catalog_list as $row):?>
            <ul class="ul">
                <li><a href=""><?php echo $row->name?></a></li>
            </ul>
            <?php endforeach;?>
        </div><!--box-footer-->
        <div class="box-footer">
            <h3>Trung tâm giá sỉ</h3>
            <ul class="ul">
                <li><a href="" rel="nofollow">Giới thiệu</a></li>
                <li><a href="" rel="nofollow">Tuyển dụng</a></li>
            </ul>
            <h3 style="display:block;margin-top:10px;">Chứng nhận</h3>
            <a href="" rel="nofollow"><i class="icon icon-bct"></i></a>
        </div><!--box-footer-->
        <div class="box-footer">
            <div class="fb-page" data-href="https://www.facebook.com/buonbansi.vn/" data-tabs="timeline" data-width="300" data-height="250" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/buonbansi.vn/" class="fb-xfbml-parse-ignore">
                    <a href="https://www.facebook.com/buonbansi.vn/"></a>
                </blockquote>
            </div>
        </div>
    </div><!--container-->
    <div class="clear"></div>
    <div class="bottom-footer">
        <div class="container" style="text-align:center;">    
            <p>Công ty TNHH mỹ phẩm Ayumi Địa chỉ: C13/77 Tôn Đản F13 Q4 Thành Phố Hồ Chí Minh</p>
            <p>Giấy phép kinh doanh số 0104186006 do Sở Kế hoạch đầu tư thành phố Hà Nội cấp ngày 28/9/2009.</p>
            <p>Showroom HCM: 63b Trần Đình Xu, P.Cầu Kho, Q1, Tp.HCM. Điện thoại: 08.3837.2738. Hotline: 0983 99 3131.</p>
            <p>Showroom HN:9/149 Nguyễn Ngọc Nại, Thanh Xuân, Hà Nội. Hotline: 0983 99 3131.</p>

        </div>
    </div><!--bottom-footer-->
</footer>
<script>
    function subscribe_newsletter() {
        var email = document.getElementById('email-newsletter').value;
        if (email.length > 3) {
            $.post("home/email", 
            {email: email}, 
            function (data) {
                if (data == 'success') {
                    alert("Quý khách đã đăng ký thành công ");
                    $("#email_newsletter").val("Nhập Email nhận bản tin");
                } else if (data == 'exist') {
                    alert("Quý khách đã đăng ký thành công");
                } else {
                    alert('Quý khách đã đăng ký thành công ');
                }
            });
        } else {
            alert('Vui lòng nhập địa chỉ email');
        }
    }
</script>