<!-- head -->
<?php $this->load->view('admin/catalog/head', $this->data) ?>

<div class="line"></div>

<div class="wrapper">

    <?php $this->load->view('admin/message', $this->data); ?>

    <div class="widget">

        <div class="title">
            <span class="titleIcon">
                <div class="checker" id="uniform-titleCheck">
                    <span>
                        <input type="checkbox" name="titleCheck" id="titleCheck" style="opacity: 0;">
                    </span>
                </div>
            </span>
            <h6>Danh sách danh mục sản phẩm</h6>
            <div class="num f12">Tổng số: <b><?php echo count($list) ?></b></div>
        </div>

        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
            <thead class="filter"><tr><td colspan="6">
                        <form method="get" action="<?php echo admin_url('catalog') ?>" class="list_filter form">
                            <table width="80%" cellspacing="0" cellpadding="0"><tbody>

                                    <tr>
                                        <td style="width:40px;" class="label"><label for="filter_id">Mã số</label></td>
                                        <td class="item"><input type="text" style="width:55px;" id="filter_id" value="<?php echo $this->input->get('id') ?>" name="id"></td>

                                        <td style="width:40px;" class="label"><label for="filter_id">Tên</label></td>
                                        <td style="width:155px;" class="item"><input type="text" style="width:155px;" id="filter_iname" value="<?php echo $this->input->get('name') ?>" name="name"></td>

                                        <td style="width:60px;" class="label"><label for="filter_status">Thể loại</label></td>
                                        <td class="item">
                                            <select name="catalog">
                                                <option value=""></option>
                                                <option value="">Danh mục cấp 1</option>
                                                <option value="">Danh mục cấp 2</option>
                                            </select>
                                        </td>

                                        <td style="width:150px">
                                            <input type="submit" value="Lọc" class="button blueB">
                                            <input type="reset" onclick="window.location.href = '<?php echo admin_url('catalog') ?>';" value="Reset" class="basic">
                                        </td>

                                    </tr>
                                </tbody></table>
                        </form>
                    </td>
                </tr>
            </thead>
            <thead>
                <tr>
                    <td style="width:10px;"><img src="<?php echo public_url('admin') ?>/images/icons/tableArrows.png" /></td>
                    <td style="width:80px;">Mã số</td>
                    <td style="width:80px;">Thư tự hiện thị</td>
                    <td>Tên danh mục</td>
                    <td style="width:100px;">Hành động</td>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <td colspan="7">
                        <div class="list_action itemActions">
                            <a href="#submit" id="submit" class="button blueB" url="<?php echo admin_url('catalog/delete_all') ?>">
                                <span style='color:white;'>Xóa hết</span>
                            </a>
                        </div>

                        <div class="pagination">
                            <?php echo $this->pagination->create_links() ?>
                        </div>
                    </td>
                </tr>
            </tfoot>

            <tbody>
                <?php foreach ($list as $row): ?>
                    <tr class="row_<?php echo $row->id ?>">
                        <td><input type="checkbox" name="id[]" value="<?php echo $row->id ?>" /></td>

                        <td class="textC"><?php echo $row->id ?></td>
                        <td class="textC"><?php echo $row->sort_order ?></td>

                        <td>
                            <span title="<?php echo $row->name ?>" class="tipS">
                                <?php echo $row->name ?>				
                            </span>
                        </td>


                        <td class="option">
                            <a href="<?php echo admin_url('catalog/edit/' . $row->id) ?>" title="Chỉnh sửa" class="tipS ">
                                <img src="<?php echo public_url('admin') ?>/images/icons/color/edit.png" />
                            </a>

                            <a href="<?php echo admin_url('catalog/delete/' . $row->id) ?>" title="Xóa" class="tipS verify_action" >
                                <img src="<?php echo public_url('admin') ?>/images/icons/color/delete.png" />
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="clear mt30"></div>
