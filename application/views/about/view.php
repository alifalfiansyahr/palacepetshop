<div class="hero-wrap hero-bread" style="background-image: url('<?php echo base_url().'assets/'; ?>images/single-product.jpg');">
    <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url(); ?>">Beranda</a></span></p>
        <h1 class="mb-0 bread">Tentang Kami</h1>
        </div>
    </div>
    </div>
</div>

<section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?php echo base_url().'photo/about/'.$rec->image; ?>);">
            </div>
            <div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate fadeInUp ftco-animated">
        <div class="heading-section-bold mb-4 mt-md-5">
        <div class="ml-md-0">
            <h2 class="mb-4">Palace Pet Shop</h2>
        </div>
        </div>
        <div class="pb-md-5">
            <p>
                <?php echo $rec->content; ?>
            </p>
        </div>
    </div>
</section>