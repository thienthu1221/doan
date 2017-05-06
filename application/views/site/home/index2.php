<div class="container">
    <?php foreach ($catalog_home as $row): ?>
        <div class="dashed-line"></div>
        <div class="product-list hot home">
            <a href="" class="p-cat-img"><img class="lazy" src="<?php echo public_url() ?>/images/blank.gif" data-original="http://matnai.com.vn/media/banner/banner_b83aac23.png" alt="80" width="208" height="208"/></a>

            <div class="left">
                <div class="p-sub-cat">
                    <?php if (!empty($row->subs)): ?>
                        <?php foreach ($row->subs as $subs): ?>
                            <a href=""><?php echo $subs->name      ?></a>
                        <?php endforeach; ?>  
                    <?php endif; ?>
                </div>
                <div class="clear"></div>
                <ul class="ul">
                    <?php
                    // $row foreach tren va foreach duoi, khong duoc dat trung ten
                    //$product_home_of_cate = $product_home[$subCategory->subs];
                    foreach ($row->subs as $subCategory):
                        foreach ($subCategory->list_products as $rowPro):
                            // pre($rowPro);
                            ?>
                            <li>
                                <div class="p_container">
                                    <span class="p-price-off">5%</span>
                                    <a href="<?php echo base_url('product/view/' . $rowPro->id) ?>" class="p-img">
                                        <img class="lazy" src="<?php echo public_url() ?>/images/blank.gif" data-original="<?php echo base_url('upload/product/' . $rowPro->image_link) ?>" alt="<?php echo $rowPro->name ?>" width="208" height="208"/>
                                    </a>
                                    <a href="<?php echo base_url('product/view/' . $rowPro->id) ?>" class="p-name"><?php echo $rowPro->name ?></a>
                                    <?php if ($rowPro->discount > 0): ?>
                                        <?php $price_new = $rowPro->price - $rowPro->discount; ?>
                                        <span class="p-old-price"><?php echo number_format($rowPro->price) ?> vnđ</span>
                                        <span class="p-price"><?php echo number_format($price_new) ?> vnđ</span>
                                    <?php else: ?>
                                        <span class="p-price"><?php echo number_format($rowPro->price) ?> vnđ</span>
                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </ul>
            </div>

        </div>
    <?php endforeach; ?>
    <!--news-home-->
</div>