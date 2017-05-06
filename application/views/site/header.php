<div class="container">
    <header id="header">
        <a href="<?php echo base_url()?>" id="logo"><img src="<?php echo public_url()?>/logo.png" alt="" width="190" height="60"/></a>
        <div id="search">
            <form method="get" action="<?php echo site_url('product/search')?>" enctype="multipart/form-data">
                <input type="text" class="text" value="<?php echo isset($key) ? $key : '' ?>" id="text-search" name="key-search" placeholder="Tìm kiếm từ khóa..." autocomplete="off"/>
                <input type="submit" id="submit_search" value="Search" />
            </form>
            <div class="autocomplete-suggestions"></div>
        </div>
        <!--search-->
        <div id="hotline-header">Hotline:0938992267</div>
        <a href="<?php echo base_url('cart')?>" id="cart-header" rel="nofollow">
            <i class="icon icon-cart"></i><span>Giỏ hàng</span><b id="count_shopping_cart_store"><?php echo $total_items?></b>
        </a>
        
    </header>
    <!--header-->
    <div class="clear"></div>
</div>