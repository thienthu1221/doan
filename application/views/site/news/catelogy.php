<?php $this->load->view('site/slide') ?>
<section id="content" class="convert_a">
    <div class="container">
        <div id="breadcrumb">
            <div itemscope itemtype="">
                <a href="" itemprop="url" class="nopad-l">
                    <span itemprop="title">Trang chủ</span>
                </a> ›
            </div>
            <div itemscope itemtype="">
                <a href="" itemprop="url">
                    <span itemprop="title">Tin tức</span>
                </a> ›
            </div>
            <div itemscope itemtype="">
                <a href="" itemprop="url">
                    <span itemprop="title">Tin khuyến mãi</span>
                </a>
            </div>
        </div><!--breadcrumb-->
    </div>
    <div class="container">
        <div id="news-detail">
            <div class="content-news-detail">
                <h1 class="title-news"><?php echo $news->title?></h1>
                <p><?php echo $news->content?></p>
            </div><!--content-news-detail-->
        </div><!--news-detail-->
        <div id="pro-detail-right">
            <div class="box-right">
                <div class="title-box-right"><h2 class="title">Sản phẩm HOT</h2></div>
                <div class="content-box-right pro-right">
                    <ul class="ul">
                        <?php foreach ($product_hot as $row): ?>
                        <li>
                            <div class="left">
                                <a href="" class="name"><?php echo $row->name ?></a>
                                <span class="price"><?php echo number_format($row->price) ?> vnđ</span>
                            </div>
                            <a href="" class="img">
                                <img src="<?php echo base_url('upload/product/' . $row->image_link) ?>" alt="<?php echo $row->name ?>" width="80" height="80"/> </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div><!--box-right-->
            <div class="space2"></div>
            <div class="banner-right">
                <a href="" target='_blank' rel='nofollow'>
                    <img border=0 src="<?php echo public_url() ?>/site/img/banner/banner_6a9aeddf.png" width='300' height='500' alt=""/></a>
            </div>
            <div class="space2"></div>
            <div class="box-right">
                <div class="title-box-right"><h2 class="title">Tin mới nhất</h2></div>
                <div class="content-box-right news-right">
                    <ul class="ul">
                        <?php foreach ($news_list as $row):?>
                        <li>
                            <a href="<?php echo base_url('news/catelogy/' . $row->id)?>" class="img">
                                <img src="<?php echo base_url('upload/news/'.$row->image_link)?>" alt="<?php echo $row->title?><?php echo $row->title?>" width="80" height="80"/> </a>
                            <a href="<?php echo base_url('news/catelogy/' . $row->id)?>" class="name"><?php echo $row->title?></a>
                            <span style="display:block; font-size:12px; margin-top:5px; color:#666;"><?php echo $row->intro?></span>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div><!--box-right-->

        </div><!--pro-detail-right-->
    </div><!--container-->
</section>