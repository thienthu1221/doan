<!-- head -->
<?php $this->load->view('admin/catalog/head', $this->data) ?>

<div class="line"></div>

<div class="wrapper">
    <div class="widget">
        <div class="title" id="test_1"> 
            <!-- đoạn này mình thử thui nhé-->
            <h6>Thêm mới danh mục sản phẩm</h6>
        </div>
        <form id="form" class="form" enctype="multipart/form-data" method="post" action="">
            <fieldset>
                <div class="formRow">
                    <label for="param_name" class="formLeft">Tên:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" id="param_name" value="<?php echo set_value('name') ?>" name="name"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"><?php echo form_error('name') ?></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="formRow">
                    <label for="param_name" class="formLeft">Danh mục cha:</label>
                    <div class="formRight">
                        <span class="oneTwo">
                            <select _autocheck="true" id="param_parent_id"  name="parent_id">
                                <option value="0">Là danh mục cha</option>
                                <?php foreach ($list as $row): ?>
                                    <option style="font-weight: bold" label="<?php echo $row->name ?>"><?php echo $row->name ?>
                                        <?php if (count($row->subs) > 1): ?>
                                            <?php foreach ($row->subs as $sub): ?>
                                            <option value="<?php echo $sub->id ?>"><?php echo $sub->name ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </span>
                        <span class="autocheck" name="parent_id_autocheck"></span>
                        <div class="clear error" name="parent_id_error"><?php echo form_error('parent_id') ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                
                <div class="formRow">
                            <label class="formLeft">Hình ảnh:<span class="req">*</span></label>
                            <div class="formRight">
                                <div class="left">
                                    <input type="file" name="image" id="image" size="25">
                                </div>
                                <div class="clear error" name="image_error"></div>
                            </div>
                            <div class="clear"></div>
                </div>

                <div class="formRow">
                    <label for="param_name" class="formLeft">Thứ tự hiển thị:</label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" id="param_sort_order" value="<?php echo set_value('sort_order') ?>" name="sort_order"></span>
                        <span class="autocheck" name="sort_order_autocheck"></span>
                        <div class="clear error" name="sort_order_error"><?php echo form_error('sort_order') ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formSubmit">
                    <input type="submit" class="redB" value="Thêm mới">
                </div>
<!--                             <div class="formSubmit">
                                    <input type="button" id="add_catelog" class="redB" value="Thêm mới">
                                </div>-->
            </fieldset>
        </form>

    </div>
</div>

<script type="text/javascript">
    $('#add_catelog').click(function () {
//        var product_name = $('#param_name').val(); // hàm này là lấy gia trị của input,checkbox, radio đều dc, select lun
//        // nhưng giờ anh sẽ chỉ e cách điền thông tin vào input mà e hiển thị
//        $('#param_name').val("Đây là test");

//        giờ lấy lại xem đúng giá trị nó ko nhé 


        var product_name = $('#param_name').val();
        $.ajax({
            url: "<?php echo base_url('admin/catalog/add_by_ajax') ?>", // Cái đoạn này địa chỉ function mình truyền hào

            type: "post",
            data: {product_name_1: product_name}, // thằng này phải à object nhé, array nó ko chạy đâu
            success: function (res) {
                var html = JSON.parse(res);
                if (html.isTrue === true) {
                    $('#test_1').html(html.html);
                }
                $('#test_1').html(html); // #test_1 là id của div mình mún chèn vào
            }
        });

    });
</script>
