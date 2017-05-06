<!-- head -->
<?php $this->load->view('admin/banner/head', $this->data) ?>

<div class="line"></div>

<div id="main_banner" class="wrapper">
    <div class="widget">

        <div class="title">
            <span class="titleIcon"><input type="checkbox" name="titleCheck" id="titleCheck"></span>
            <h6>
                Danh sách banner
            </h6>
            <div class="num f12">Số lượng: <b><?php echo $total_rows ?></b></div>
        </div>

        <table width="100%" cellspacing="0" cellpadding="0" id="checkAll" class="sTable mTable myTable">

            <thead>
                <tr>
                    <td style="width:21px;"><img src="<?php echo public_url('admin/images') ?>/icons/tableArrows.png"></td>
                    <td style="width:60px;">Mã số</td>
                    <td>Hình</td>
                    <td>Tên</td>
                    <td style="width:120px;">Hành động</td>
                </tr>
            </thead>

            <tfoot class="auto_check_pages">
                <tr>
                    <td colspan="6">
                        <div class="list_action itemActions">
                            <a url="<?php echo admin_url('banner/delete_all') ?>" class="button blueB" id="submit" href="#submit">
                                <span style="color:white;">Xóa hết</span>
                            </a>
                        </div>

                    </td>
                </tr>
            </tfoot>
            <tbody class="list_item">
                <?php foreach ($list as $row): ?>
                    <tr class="row_<?php echo $row->id ?>">
                        <td><input type="checkbox" value="<?php echo $row->id ?>" name="id[]"></td>

                        <td class="textC"><?php echo $row->id ?></td>

                        <td>
                            <div class="image_thumb">
                                <img height="50" src="<?php echo base_url('upload/banner/' . $row->image_link) ?>">
                                <div class="clear"></div>
                            </div>
                        </td>
                        <td class="textC"><?php echo $row->name ?></td>
                        <td class="option textC">
                            <a class="tipS" title="Chỉnh sửa" href="<?php echo admin_url('banner/edit/' . $row->id) ?>">
                                <img src="<?php echo public_url('admin/images') ?>/icons/color/edit.png">
                            </a>
                            <a class="tipS verify_action" title="Xóa" href="<?php echo admin_url('banner/del/' . $row->id) ?>">
                                <img src="<?php echo public_url('admin/images') ?>/icons/color/delete.png">
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>

</div>


