<?php $this->load->view('site/slide') ?>
<section id="content">
    <div id="home-product-hot">
        <div class="container">
            <div class="space2"></div>
            <div class="space"></div>
            <!--<div class="title-product-list"><h2 style="background:#f5f5f5">Sản phẩm đề xuất</h2></div>-->
            <div class="space"></div>
            <div class="clear"></div>
            <div id="title-product-hot">
                <?php $i = 0; ?>
                <?php foreach ($trademarks as $row): ?>
                    <a href="" data-tab="#tab<?php echo $i++ ?>" title="Click để xem hết" class=""><span><?php echo $row->name ?></span></a>
                <?php endforeach; ?>
            </div>
            <?php $i = 0; ?>
            <?php foreach ($trademarks as $row): ?>
            <div class="clear"></div>
            <div class="product-list hot cf" id="tab<?php echo $i++ ?>">
                <div class="btn-carousel">
                    <span class="prev show"></span>
                    <span class="next show"></span>
                </div>
                <ul class="ul">
                    <?php foreach ($row->list_products as $row_Tra): ?>
                    <?php $sizePrice = json_decode($row_Tra->size_price) ?>
                    
                        <li>
                            <div class="p_container">
                                <span class="p-price-off">17%</span>
                                <a 
                                    href="<?php
                                    if (!empty($row_Tra->slug)) {
                                        echo base_url(slg($row_Tra->slug) . '-' . $row_Tra->id . '.html');
                                    } else {
                                        echo base_url(slg($row_Tra->name) . '-' . $row_Tra->id . '.html');
                                    }
                                    ?>" 
                                    class="p-img">
                                    <img src="<?php echo base_url('upload/product/' . $row_Tra->image_link) ?>" alt="<?php echo $row_Tra->name ?>" width="250" height="250"/>
                                </a>
                                <a href="<?php
                                if (!empty($row_Tra->slug)) {
                                    echo base_url(slg($row_Tra->slug) . '-' . $row_Tra->id . '.html');
                                } else {
                                    echo base_url(slg($row_Tra->name) . '-' . $row_Tra->id . '.html');
                                }
                                ?>" class="p-name"><?php echo $row_Tra->name ?></a>
                                
<!--                                <p class="countdown" id="countdown-<?php echo $row_Tra->id?>"></p>
                                    <script>
                                        get_countdown("<?php echo "countdown-".$row_Tra->id ?>","<?php echo date('Y-m-d H:i:s') ?>","<?php echo $row_Tra->date.' 23:59:59'?>");
                                    </script>-->
                                
                                   <?php if ($row_Tra->price == 0): ?>
                                    <span class="p-price"><?php
                                        foreach ($sizePrice as $subrow) {
                                            echo $subrow->price_size . ' - ';
                                        }
                                        ?> vnđ</span>
                                <?php else: ?>
                                    <?php if ($row_Tra->discount > 0): ?>
                                        <?php $price_new = $row_Tra->price - $row_Tra->discount; ?>
                                        <span class="p-old-price"><?php echo number_format($row_Tra->price) ?> vnđ</span>
                                        <span class="p-price"><?php echo number_format($price_new) ?> vnđ</span>
                                    <?php else: ?>
                                        <span class="p-price"><?php echo number_format($row_Tra->price) ?> vnđ</span>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!--product-list-->
            <script>
                $(function () {
                    $('#tab<?php echo $i++ ?> ul').carouFredSel({
                        auto: {
                            play: true,
                            timeoutDuration: 4000,
                            pauseOnHover: true
                        },
                        prev: '#tab0 .prev',
                        next: '#tab0 .next',
                    });
                });
            </script>
            <?php endforeach; ?>
        </div>

    </div>
    <!--home-product-hot-->
    <script>
        $(function () {
            $(".product-list.hot.cf").hide();
            $("#tab0").show();
            $("#title-product-hot a").hover(function () {
                $("#title-product-hot a").removeClass("current");
                $(this).addClass("current");

                $("#home-product-hot .cf").hide();
                $($(this).attr("data-tab")).show();
                return false;
            });
        });
    </script>  
    <div class="container">
        <?php foreach ($catalog_home as $row): ?>
            <div class="dashed-line"></div>
            <div class="product-list hot home">
                <a href="" class="p-cat-img" style="width: 20%"><img class="lazy" src="<?php //echo public_url()           ?>/images/blank.gif" data-original="<?php echo base_url('upload/catalog/' . $row->image_link) ?>" alt="80" width="208" height="208"/></a>

                <div class="left" style="width: 80%">
                    <marquee>
                        <div class="p-sub-cat" >
                        <?php if (!empty($row->subs)): ?>
                            <?php foreach ($row->subs as $subs): ?>
                                <a href="<?php echo base_url('danh-muc-' . slg($subs->name) . '-' . $subs->id . '.html') ?>"><?php echo $subs->name ?></a>
                            <?php endforeach; ?>  
                        <?php endif; ?>
                    </div>
                    </marquee>
                    <div class="btn-carousel"><span class="prev show"></span>
                            <span class="next show"></span>
                    </div>    
                    <ul class="ul">
                        <?php
                        
                        // $row foreach tren va foreach duoi, khong duoc dat trung ten
                        foreach ($row->subs as $subCategory):
                            foreach ($subCategory->list_products as $rowPro):
                                ?>
                                <li>
                                    <div class="p_container"  >
                                        
                                       <?php if ($rowPro->discount > 0): ?>
                                       <?php $price_off= ($rowPro->discount * 100) /$rowPro->price ?>
                                        <span class="p-price-off"><?php echo floor($price_off); ?>%</span>   
                                        <?php endif;?>
                                        <?php $sizePrice = json_decode($rowPro->size_price) ?>
                                        <a href="<?php
                                        if (!empty($rowPro->slug)) {
                                            echo base_url(slg($rowPro->slug) . '-' . $rowPro->id . '.html');
                                        } else {
                                            echo base_url(slg($rowPro->name) . '-' . $rowPro->id . '.html');
                                        }
                                        ?>" class="p-img">
                                            <img class="lazy" src="<?php echo public_url() ?>/images/blank.gif" data-original="<?php echo base_url('upload/product/' . $rowPro->image_link) ?>" alt="<?php echo $rowPro->name ?>" width="208" height="208"/>
                                        </a>
                                        
                                        <a href="<?php
                                        if (!empty($rowPro->slug)) {
                                            echo base_url(slg($rowPro->slug) . '-' . $rowPro->id . '.html');
                                        } else {
                                            echo base_url(slg($rowPro->name) . '-' . $rowPro->id . '.html');
                                        }
                                        ?>" class="p-name"><?php echo $rowPro->name ?></a>
                                        <p class="countdown" id="countdown-<?php echo $rowPro->id?>"></p>
                                            <script>
                                                get_countdown("<?php echo "countdown-".$rowPro->id ?>","<?php echo date('Y-m-d H:i:s') ?>","<?php echo $rowPro->date.' 23:59:59'?>");
                                            </script>
                                        
                                           <?php if ($rowPro->price == 0): ?>
                                            <span class="p-price"><?php
                                                foreach ($sizePrice as $subrow) {
                                                    echo $subrow->price_size . ' - ';
                                                }
                                                ?> vnđ</span>
                                        <?php else: ?>
                                            <?php if ($rowPro->discount > 0): ?>
                                                <?php $price_new = $rowPro->price - $rowPro->discount; ?>
                                                <span class="p-old-price"><?php echo number_format($rowPro->price) ?> vnđ</span>
                                                <span class="p-price"><?php echo number_format($price_new) ?> vnđ</span>
                                            <?php else: ?>
                                                <span class="p-price"><?php echo number_format($rowPro->price) ?> vnđ</span>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
        <?php endforeach; ?>
        <!--news-home-->
        <div id="news-home">
            <div class="title-product-list"><h2>Tin tức</h2></div>
            <div class="clear"></div>
            <ul class="ul">
                <?php foreach ($news_list as $row): ?>
                    <li class="nomar-l">
                        <a href="<?php echo base_url('news/catelogy/' . $row->id) ?>" class="img">
                            <img class="lazy" src="<?php echo base_url('upload/news/' . $row->image_link) ?>" data-original="<?php echo base_url('upload/news/' . $row->image_link) ?>" width="208" height="208" alt="<?php echo $row->title ?>" /></a>
                        <a href="<?php echo base_url('news/catelogy/' . $row->id) ?>" class="name"><?php echo $row->title ?></a>
                        <span class="summary"><?php echo $row->intro ?></span>

                    </li>
                <?php endforeach; ?>
            </ul>
        </div><!--news-home-->
    </div>
    <!--container-->
</section>
