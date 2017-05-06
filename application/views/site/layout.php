

<!DOCTYPE html>
<html lang="vi-vn">
    <?php $this->load->view('site/head') ?>
    <body>
        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=1857275481209256";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

        <div id="wrapper">
            <script type="text/javascript">
                $(document).ready(function () {
                    var curr_text = "";
                    var count_select = 0;
                    var curr_element = "";


                    $("#text-search").keyup(function (b) {

                        if (b.keyCode != 38 && b.keyCode != 40) {
                            inputString = $(this).val();
                            if (inputString.trim() != '') {
                                $(".autocomplete-suggestions").show();
                                $(".autocomplete-suggestions").load("ajax/get_product_list03d2.html?q=" + encodeURIComponent(inputString));
                            } else {
                                $(".autocomplete-suggestions").hide();
                                count_select = 0;
                            }
                        }
                    });


                    $('body').click(function () {
                        $(".autocomplete-suggestions").hide();
                    });
                });
            </script>
            <script>
                function user_like_vote(item_id, content, data_holder) {
                    $.post("ajax/user_like_2.html", {item_id: item_id, content_type: content}, function (data) {
                        $("#" + data_holder).html(data);
                        if (content == 'comment-like') {
                            $(".like_count" + item_id).each(function () {
                                count = parseInt($(this).text());
                                $(this).html(count + 1);
                            });
                        }

                        if (content == 'comment-dislike') {
                            $(".unlike_count" + item_id).each(function () {
                                count = parseInt($(this).text());
                                $(this).html(count + 1);
                            });
                        }
                    });
                }
            </script>
            <script>
                $(function () {
                    $(".slider").responsiveSlides({
                        auto: true,
                        random: true,
                        speed: 500,
                        pager: true
                    });

                    imgWidth = 1600;
                    left = ($(window).width() - imgWidth) / 2;
                    $(".slider img").css("left", left);
                    $(".rslides_tabs").css("right", -left);
                });

                function sort_sub_nav(col_number, col_item, item_html_sort, parent_content) {
                    //Khoi tao
                    var col_number = col_number; //so cot, = 0 neu muon sap xep tu dong theo theo so hang
                    var col_item = col_item; //so hang trong 1 cot, = 0 neu muon sap xep tu dong theo so cot
                    var item_html_sort = item_html_sort; //Phan tu muon sap xep
                    var parent_content = parent_content;
                    var item_per_col = 0; //so phan tu 1 cot
                    /*...............................*/
                    var total_item = item_html_sort.length;
                    if (col_item != 0)
                        item_per_col = col_item;
                    if (col_item == 0 && col_number > 0)
                        item_per_col = Math.ceil(total_item / col_number);

                    var table_html = "";
                    table_html += "<table class='tbl_sub_nav'><tr><td valign='top'>";
                    for (i = 0; i < total_item; i++) {
                        table_html += item_html_sort.parent().children(":eq(" + i + ")").html();
                        if (i % item_per_col == 0 && i > 0)
                            table_html += "</td><td valign='top'>";
                    }
                    table_html += "</tr></table></td>";
                    parent_content.children().remove();
                    parent_content.append(table_html);
                }
                $(function () {
                    $(".sub-nav").each(function () {
                        sort_sub_nav(0, 10, $(this).find("li"), $(this).children(".sub-item"));

                        if ($(this).find(".sub-document-link").length > 0) {
                            subDocument = $(this).find(".sub-document-link").html();
                            $(this).find(".sub-document-link").remove();
                            $(this).find(".tbl_sub_nav tr").append("<td class='nobdr'>" + subDocument + "</td>");
                        }

                        if ($(this).find(".sub-img").length > 0) {
                            subImg = $(this).find(".sub-img").html();
                            $(this).find(".sub-img").remove();
                            $(this).find(".tbl_sub_nav tr").append("<td class='nobdr'>" + subImg + "</td>");
                        }

                    });
                });
            </script>
            <?php $this->load->view('site/header') ?>

            <div class="clear"></div>
            <?php $this->load->view($temp, $this->data) ?>
            <!--content-->
            <div class="clear"></div>
            <?php $this->load->view('site/footer') ?>

<!--        <script type="text/javascript" src="<?php echo public_url() ?>/site/js/jquery.min.1.4.js"></script>
<script type="text/javascript" src="<?php echo public_url() ?>/site/js/m_slide.js"></script>
<script type="text/javascript" src="<?php echo public_url() ?>/site/js/swipe.js"></script>
<script type="text/javascript" src="<?php echo public_url() ?>/site/js/m_carousel.js"></script>-->
    </body>
</html>

