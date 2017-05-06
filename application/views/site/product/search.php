<section id="content">
    <div class="container">
        <div id="breadcrumb">
            <div itemscope="" itemtype="">
                <a href="<?php echo base_url()?>" itemprop="url" class="nopad-l">
                    <span itemprop="title">Trang chủ</span>
                </a> ›
            </div>
            <div itemscope="" itemtype="">
                <a href="" itemprop="url">
                    <span itemprop="title">Tìm kiếm</span>
                </a>
            </div>
        </div>
        <!--breadcrumb-->
        <div class="title-cat-page">
            <h1>Tìm "<?php echo $key ?>"</h1>
        </div>
        <div class="product-list">
            <ul class="ul border">
                <?php foreach ($list as $row): ?>
                    <li>
                        <div class="p_container">
                            <span class="p-price-off">6%</span>
                            <a href="<?php if (!empty($row->slug)){echo base_url(slg($row->slug) . '-' . $row->id . '.html');} else {echo base_url(slg($row->name) . '-' . $row->id . '.html');}?>" class="p-img">
                                <img src="<?php echo base_url('upload/product/' . $row->image_link) ?>" alt="<?php echo $row->name ?>">
                            </a>
                            <a href="<?php if (!empty($row->slug)){echo base_url(slg($row->slug) . '-' . $row->id . '.html');} else {echo base_url(slg($row->name) . '-' . $row->id . '.html');}?>" class="p-name"><?php echo $row->name ?></a>
                            <?php if ($row->discount > 0): ?>
                                <?php $price_new = $row->price - $row->discount; ?>
                                <span class="p-old-price"><?php echo number_format($row->price) ?> vnđ</span>
                                <span class="p-price"><?php echo number_format($price_new) ?> vnđ </span>
                            <?php else: ?>
                                <span class="p-price"><?php echo number_format($row->price) ?> vnđ</span>
                            <?php endif; ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <!--container-->
</section>
