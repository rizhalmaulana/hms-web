
<div class="intro intro-single route bg-image" style="background-image: url(img/overlay-bg.jpg)">
  <div class="overlay-mf"></div>
  <div class="intro-content display-table">
    <div class="table-cell">
      <div class="container">
        <h2 class="intro-title mb-4">Master Spot</h2>
        <ol class="breadcrumb d-flex justify-content-center">
          <li class="breadcrumb-item">
            <a href="<?php echo base_url(); ?>">Home</a>
          </li>
          <li class="breadcrumb-item">
            <a href="<?php echo base_url('blog'); ?>">Master</a>
          </li>
          <li class="breadcrumb-item active">spot</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--/ Intro Skew End /-->

<!--/ Section Blog-Single Star /-->

<section class="blog-wrapper sect-pt4" id="blog">
  <div class="container">
    <div class="row">
      <div class="col-md-8">

        <?php foreach($spot as $a){ ?>

          <div class="spott-box">
            <div class="spott-thumb">
              <?php if($a->spot_sampul != ""){ ?>
                <img src="<?php echo base_url(); ?>gambar/spot/<?php echo $a->spot_sampul ?>" alt="<?php echo $a->spot_judul ?>" class="img-fluid">
              <?php } ?>
            </div>
            <div class="spott-meta">
              <h1 class="article-title"><a href="<?php echo base_url().$a->spot_slug ?>"><?php echo $a->spot_judul ?></a></h1>
              <ul>
                <li>
                  <span class="ion-ios-person"></span>
                  <a href="#"><?php echo $a->pengguna_nama ?></a>
                </li>
                <li>
                  <span class="ion-pricetag"></span>
                  <a href="#"><?php echo $a->jalur_nama ?></a>
                </li>
              </ul>
            </div>
          </div>
        <?php } ?>

        <!-- membuat tombol halaman pagination -->
        <?php echo $this->pagination->create_links(); ?>

      </div>

      <div class="col-md-4">
        <?php $this->load->view('frontend/v_sidebar'); ?>
      </div>
    </div>
  </div>
</section>
  <!--/ Section Blog-Single End /