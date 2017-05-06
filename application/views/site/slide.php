<!--container-->
<div class="clear"></div>
<div id="content-top">
    <div class="container">
        <?php $this->load->view('site/menu')?>
        <!--nav_vertical-->
    </div>
    <div class="wrap-slider">
        <div class="slider">
            <?php foreach ($slide_list as $row):?>
            <a href="" target='_blank' rel='nofollow'>
                <img border=0 src="<?php echo base_url('upload/slide/' . $row->image_link)?>" width='1600' height='420' alt="<?php echo $row->name?>"/>
            </a>  
            <?php endforeach;?>
        </div>
    </div>
    
</div>
<!--content-top-->