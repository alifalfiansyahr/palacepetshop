<div class="hero-wrap hero-bread" style="background-image: url('<?php echo base_url().'assets/'; ?>images/single-product.jpg');">
    <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url(); ?>">Beranda</a></span> / <span class="mr-2"><a href="#">Product</a></span> / <span><?php echo $rec->category_name; ?></span></p>
        <h1 class="mb-0 bread"><?php echo $rec->name; ?></h1>
        </div>
    </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate">
                <a href="<?php echo (file_exists('photo/product/'.$rec->photo)) ? base_url().'photo/product/'.$rec->photo : base_url().'photo/no_picture.jpg'; ?>" class="image-popup">
                    <img src="<?php echo (file_exists('photo/product/'.$rec->photo)) ? base_url().'photo/product/'.$rec->photo : base_url().'photo/no_picture.jpg'; ?>" class="img-fluid" alt="<?php echo $rec->name; ?>">
                </a>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h3><?php echo $rec->name; ?></h3>
                <p class="price"><span>Rp. <?php echo number_format($rec->price,2,",","."); ?></span><small>/ <?php echo $rec->unit; ?></small></p>
                <p><?php echo $rec->description; ?></p>
                <div class="row mt-4">
                
                </div>
            </div>
        </div>
    </div>
</section>
<hr >
<section class="ftco-section">
    <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
        <div class="col-md-12 heading-section text-center ftco-animate">
        <span class="subheading">Produk</span>
        <h2 class="mb-4">Produk Terkait</h2>
        </div>
    </div>   		
    </div>
    <div class="container">
        <div class="row">
            <?php
            if($recRelated!=null)
            {
                foreach($recRelated as $r)
                {
            ?>
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="product">
                            <a href="<?php echo base_url().'detail-product/'.$r->slug; ?>" class="img-prod"><img class="img-fluid" style="height:202px;width=253px;" src="<?php echo (file_exists('photo/product/'.$r->photo)) ? base_url().'photo/product/'.$r->photo : base_url().'photo/no_picture.jpg'; ?>" alt="<?php echo $r->name; ?>">
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a href="<?php echo base_url().'detail-product/'.$r->slug; ?>"><?php echo $r->name; ?></a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <span class="price-sale">Rp. <?php echo number_format($r->price,2,",","."); ?></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</section>