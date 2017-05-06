<!-- head -->
<?php $this->load->view('admin/product/head', $this->data) ?>

<div class="line"></div>

<div class="wrapper">

    <!-- Form -->
    <form enctype="multipart/form-data" method="post" action="<?php echo admin_url('product/add') ?>" id="form" class="form">
        <fieldset>
            <div class="widget">
                <div class="title">
                    <img class="titleIcon" src="<?php echo public_url('admin') ?>/images/icons/dark/add.png">
                    <h6>Thêm mới Sản phẩm</h6>
                </div>

                <ul class="tabs">
                    <li class="activeTab"><a href="#tab1">Thông tin chung</a></li>
                    <li class=""><a href="#tab2">SEO Onpage</a></li>
                    <li class=""><a href="#tab3">Bài viết</a></li>
                    <li class=""><a href="#tab4">Timex</a></li>

                </ul>

                <div class="tab_container">
                    <div class="tab_content pd0" id="tab1" style="display: block;">
                        <div class="formRow">
                            <label for="param_name" class="formLeft">Tên:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo"><input type="text" _autocheck="true" id="param_name" name="name"></span>
                                <span class="autocheck" name="name_autocheck"></span>
                                <div class="clear error" name="name_error"></div>
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
                            <label class="formLeft">Ảnh kèm theo:</label>
                            <div class="formRight">
                                <div class="left">
                                    <input type="file" multiple="" name="image_list[]" id="image_list" size="25" >
                                </div>
                                <div class="clear error" name="image_list_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_cat" class="formLeft">Size:<span class="req">*</span></label>
                            <div class="formRight">

                                <input type="button" class="redB" id="check" value="Thêm">
                                <span class="autocheck" name="cat_autocheck"></span>
                                <div class="clear error" name="cat_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow" id="autogen"></div>

                        <!-- Price -->
                        <div class="formRow">
                            <label for="param_price" class="formLeft">Giá :<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" _autocheck="true" class="format_number" id="param_price" style="width:100px" name="price">
                                    <img src="<?php echo public_url('admin') ?>/crown/images/icons/notifications/information.png" style="margin-bottom:-8px" class="tipS" original-title="Giá bán sử dụng để giao dịch">
                                </span>
                                <span class="autocheck" name="price_autocheck"></span>
                                <div class="clear error" name="price_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <!-- Price -->
                        <div class="formRow">
                            <label for="param_discount" class="formLeft">
                                Giảm giá (VND) 
                                <span></span>:
                            </label>
                            <div class="formRight">
                                <span>
                                    <input type="text" class="format_number" id="param_discount" style="width:100px" name="discount">
                                    <img src="<?php echo public_url('admin') ?>/crown/images/icons/notifications/information.png" style="margin-bottom:-8px" class="tipS" original-title="Số tiền giảm giảm giá">
                                </span>
                                <span class="autocheck" name="discount_autocheck"></span>
                                <div class="clear error" name="discount_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_cat" class="formLeft">Thể loại:<span class="req">*</span></label>
                            <div class="formRight">
                                <div id="ScrollCB" style="height:200;width:300px;overflow:auto">
                                    <ul>
                                        <?php foreach ($catalogs as $row): ?>
                                            <?php if (count($row->subs) > 1): ?>

                                                <li><input type="checkbox" name="catalog" value="<?php echo $row->id ?>"><?php echo $row->name ?><br>
                                                <ul style="padding: 0 20px 0 20px;">
                                                    <?php foreach ($row->subs as $sub): ?>
                                                        <li><input type="checkbox" name="catalog" value="<?php echo $sub->id ?>"><?php echo $sub->name ?><br> 
                                                        <ul style="padding: 0 20px 0 20px;">
                                                            <?php foreach ($sub->son as $son): ?>
                                                            <li><input type="checkbox" name="catalog" value="<?php echo $son->id ?>"><?php echo $son->name ?><br></li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul></li>
                                            <?php else: ?>
                                                <input type="checkbox" name="catalog" value="<?php echo $row->id ?>"><?php echo $row->name ?><br>

                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div> 
                            <span class="autocheck" name="cat_autocheck"></span>
                            <div class="clear error" name="cat_error"></div>
                        </div>

                        <div class="clear"></div>
                        <!-- warranty -->
                        <div class="formRow">
                            <label for="param_cat" class="formLeft">Thương hiệu:<span class="req"></span></label>
                            <div class="formRight">
                                <select name="trademark"  class="left" >
                                    <option value="">Không có thương hiệu</option>
                                    <!-- kiem tra danh muc co danh muc con hay khong -->
                                    <?php foreach ($trademarks as $row): ?>
                                        <option value="<?php echo $row->id ?>"><?php echo $row->name ?>  </option>
                                    <?php endforeach; ?>
                                </select>
                                <span class="autocheck" name="cat_autocheck"></span>
                                <div class="clear error" name="cat_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_sale" class="formLeft">Khuyễn mãi theo ngày:</label>
                            <div class="formRight">
                                <span class="oneTwo"><input style="width:100px" name="date" id="filter_created" type="text" class="datepicker" /></span>
                                <span class="autocheck" name="date_autocheck"></span>
                                <div class="clear error" name="date_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>					         
                        <div class="formRow hide"></div>
                    </div>

                    <div class="tab_content pd0" id="tab2" style="display: none;">

                        <div class="formRow">
                            <label for="param_intro" class="formLeft">Mô tả:</label>
                            <div class="formRight">
                                <span class="oneTwo"><textarea cols="" rows="4" _autocheck="true" id="param_intro" name="intro"></textarea></span>
                                <span class="autocheck" name="intro_autocheck"></span>
                                <div class="clear error" name="intro_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_slug" class="formLeft">Link:</label>
                            <div class="formRight">
                                <span class="oneTwo"><textarea cols="" rows="4" _autocheck="true" id="param_slug" name="slug"></textarea></span>
                                <span class="autocheck" name="slug_autocheck"></span>
                                <div class="clear error" name="slug_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_site_title" class="formLeft">Title:</label>
                            <div class="formRight">
                                <span class="oneTwo"><textarea cols="" rows="4" _autocheck="true" id="param_site_title" name="site_title"></textarea></span>
                                <span class="autocheck" name="site_title_autocheck"></span>
                                <div class="clear error" name="site_title_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_meta_desc" class="formLeft">Meta description:</label>
                            <div class="formRight">
                                <span class="oneTwo"><textarea cols="" rows="4" _autocheck="true" id="param_meta_desc" name="meta_desc"></textarea></span>
                                <span class="autocheck" name="meta_desc_autocheck"></span>
                                <div class="clear error" name="meta_desc_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_meta_key" class="formLeft">Meta keywords:</label>
                            <div class="formRight">
                                <span class="oneTwo"><textarea cols="" rows="4" _autocheck="true" id="param_meta_key" name="meta_key"></textarea></span>
                                <span class="autocheck" name="meta_key_autocheck"></span>
                                <div class="clear error" name="meta_key_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow hide"></div>
                    </div>

                    <div class="tab_content pd0" id="tab3" style="display: none;">

                        <div class="formRow">
                            <label class="formLeft">Nội dung:</label>
                            <div class="formRight">
                                <textarea class="editor" id="param_content" name="content"></textarea>
                                <div class="clear error" name="content_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow hide"></div>
                    </div>
                    <div class="tab_content pd0" id="tab4" style="display: none;">

                        <div class="formRow hide"></div>
                    </div>
                </div><!-- End tab_container-->

                <div class="formSubmit">
                    <input type="submit" class="redB" value="Thêm mới">
                    <input type="reset" class="basic" value="Hủy bỏ">
                </div>
                <div class="clear"></div>
            </div>
        </fieldset>
    </form>
</div>
<div class="clear mt30"></div>

<!--<script>
    $('#check').click(function () {
        if ($(this).is(':checked')) {
            $('#autogen').append('<label>Filename:</label><input type="text" name="file"  id="file" />')
        } else {
            $('#autogen').empty()
        }

    })
</script>-->
<script>
    $('#check').click(function () {
    $('#autogen').append('\n\
                        <label for="param_price" class="formLeft">Giá :<span class="req">*</span></label>\
                        <div class="formRight">\n\
                            <span class="oneTwo">\n\
                                <input type="text" _autocheck="true" class="format_number" id="param_price" style="width:100px" name="price_size[]">\n\
                                <img src="<?php echo public_url('admin') ?>/crown/images/icons/notifications/information.png" style="margin-bottom:-8px" class="tipS" original-title="Giá bán sử dụng để giao dịch">\n\
                            </span>\n\
                            <span class="autocheck" name="price_autocheck"></span>\n\
                                \n\
                            <div class="clear error" name="price_error"></div>\n\
                        </div>\n\
                        <div class="clear"></div>\n\<br>\
                        <label for="param_price" class="formLeft">Size :<span class="req">*</span></label>\
                            <div class="formRight">\n\
                                <span class="oneTwo">\n\
                                    <input type="text" _autocheck="true" class="format_number" id="param_price" style="width:100px" name="size[]">\n\
                                    <img src="<?php echo public_url('admin') ?>/crown/images/icons/notifications/information.png" style="margin-bottom:-8px" class="tipS" original-title="Giá bán sử dụng để giao dịch">\n\
                                </span>\n\
                                <span class="autocheck" name="price_autocheck"></span>\n\
                                    \n\
                                <div class="clear error" name="price_error"></div>\n\
                            </div>\n\
                        <div class="clear"></div><br>')
    })
</script>