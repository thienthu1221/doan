<div id="nav-verti">
    <ul class="ul top">
        <li>
            <a href="" class="root"><b>DANH MỤC</b></a>
        </li>
        <?php foreach ($catalog_list as $row): ?>
            <li>
                <a href="<?php echo base_url('danh-muc-' . slg($row->name) . '-' . $row->id . '.html') ?>" class="root"><?php echo $row->name ?></a>
                <div class="sub-nav">
                    <div class="sub-item">

                        <?php if (!empty($row->subs)): ?>
                            <?php foreach ($row->subs as $subs): ?>
                                <ul>
                                    <li><a href="<?php echo base_url('danh-muc-' . slg($subs->name) . '-' . $subs->id . '.html') ?>" class="item lv1"><?php echo $subs->name ?></a></li>
                                    <?php foreach ($subs->son as $son): ?>
                                        <li><a href="<?php echo base_url('danh-muc-' . slg($son->name) . '-' . $son->id . '.html') ?>" class="item lv2"><?php echo $son->name ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <!--sub-nav-->
            </li>
        <?php endforeach; ?>
    </ul>
    <ul class="ul bottom">
        <li><a href="" class="root" rel="nofollow">Liên hệ</a></li>
        <li><a href="" class="root" rel="nofollow">Showroom</a></li>
        <li><a href="" class="root">Khuyến mãi</a></li>
    </ul>
</div>
