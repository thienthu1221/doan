<?php $this->load->view('site/slide') ?>
<section id="content">
  <div class="container">
    <div id="breadcrumb">
      <div itemscope="" itemtype="">
        <a href="" itemprop="url" class="nopad-l">
          <span itemprop="title">Trang chủ</span>
        </a> ›
      </div>
      <div itemscope="" itemtype="">
        <a href="" itemprop="url">
          <span itemprop="title">Tin tức</span>
        </a> ›
      </div>
      <div itemscope="" itemtype="">
        <a href="" itemprop="url">
          <span itemprop="title"></span>
        </a>
      </div>
    </div><!--breadcrumb-->
  </div>
  <div class="title-page-common"><div class="container"><h1></h1></div></div>
  <div class="container">
    <div id="news-list">
      <ul class="ul">
        <?php foreach ($news as $row):?>
        <li class="clear">
          <a href="" class="img"><img src="<?php echo base_url('upload/news/'.$row->image_link)?>"></a>
          <div class="right">
          	<a href="" class="name"><?php echo $row->title?></a>
            <span class="summary"><?php echo $row->intro?></span>
            <span class="time"><i></i><?php echo get_date($row->created) ?></span>
          </div>
        </li>
        <?php endforeach;?>
      </ul>
    </div><!--news-list-->
    <div class="clear"></div>
    
    <div class="paging">
      
      <a href="#" class="current">1</a>
      
      <a href="index4658.html?page=2">2</a>
      
      <a href="index9ba9.html?page=3">3</a>
      
      <a href="indexfdb0.html?page=4">4</a>
      
      <a href="index4658.html?page=2">Next</a>
      
    </div><!--paging-->
    
  </div><!--container-->
</section>