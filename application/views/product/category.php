<div class="hero-wrap hero-bread" style="background-image: url('<?php echo base_url().'assets/'; ?>images/single-product.jpg');">
    <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url(); ?>">Beranda</a></span> / <span class="mr-2"><a href="#">Kategori Produk</a></span></p>
        <h1 class="mb-0 bread"><?php echo $category; ?></h1>
        </div>
    </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5 text-center">
                <ul class="product-category">
                    <li><a href="<?php echo base_url().'category/all'; ?>" class="<?php echo (($slug=='all') ? 'active' : ''); ?>">Semua</a></li>
                    <?php
				  	$menu = category();
					if($menu!=null)
					{
						foreach($menu as $r)
						{
							echo '<li><a href="'.base_url().'category/'.$r->slug.'" class="'.(($category==$r->name) ? 'active' : '').'">'.$r->name.'</a></li>';
						}
					}
				    ?>
                </ul>
            </div>
        </div>
        <div class="row">

            <?php 
            if($rec!=null) 
            { 
                foreach($rec as $p)
                {
            ?>

                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="product">
                            <a href="<?php echo base_url(); ?>detail-product/<?php echo $p->slug; ?>" class="img-prod"><img class="img-fluid" style="height:202px;width=253px;" src="<?php echo base_url(); ?>photo/product/<?php echo $p->photo; ?>" alt="<?php echo $p->name; ?>">
                                <!-- <span class="status">30%</span> -->
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a href="<?php echo base_url(); ?>detail-product/<?php echo $p->slug; ?>"><?php echo $p->name; ?></a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <span class="price-sale">Rp. <?php echo number_format($p->price,2,",","."); ?></span></p>
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
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                    <?php if($paging!=null) { ?>
                        <?php echo $paging; ?>
                    <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
                