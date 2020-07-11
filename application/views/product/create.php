<div class="hero-wrap hero-bread" style="background-image: url('<?php echo base_url().'assets/'; ?>images/single-product.jpg');">
    <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url(); ?>">Beranda</a></span> / <span class="mr-2"><a href="#">Produk </a></span></p>
        <h1 class="mb-0 bread">Produk Baru</h1>
        </div>
    </div>
    </div>
</div>

<section class="ftco-section contact-section bg-light">
  <div class="container">
    <div class="row block-9">
      <div class="col-md-12 order-md-last d-flex">

        <form id="form_product" action="<?php echo base_url(); ?>product/create" class="bg-white p-5 contact-form" method="post" enctype="multipart/form-data">

          <?php if($this->session->userdata('status')!=null) { ?>
              <div class="alert alert-<?php echo $this->session->userdata('status'); ?> align-center" style="text-align: center;" role="alert">
                  <strong>
                    <?php echo $this->session->userdata('pesan'); ?>
                  </strong>
              </div>
              
              <br />
          <?php 
              $this->session->set_userdata('status', null);
          }
          ?>
          
          	<div class="form-group row">
				<label class="col-sm-3 col-form-label">Kategori *</label>
			  	<div class="col-sm-9">
				  	<select id="category_id" name="category_id" class="form-control select-single" required="true" style="background-color:#fff !important;">
                        <option value="">-- Pilih Kategori --</option>
                        <?php
						if($recCategory!=null) {
							foreach($recCategory as $rec) {
								echo '<option value="'.$rec->id.'">'.$rec->name.'</option>';
							}
						}
                        ?>
                    </select>
                    <?php echo form_error('category_id', '<span class="help-block" style="color: red">', '</span>'); ?>
				</div>
          	</div>
          	<div class="form-group row">
				<label class="col-sm-3 col-form-label">Kode *</label>
				<div class="col-sm-9">
            		<input type="text" class="form-control" id="code" name="code" maxlength="20" required>
					<?php echo form_error('code', '<span class="help-block" style="color: red">', '</span>'); ?>
          		</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama Produk *</label>
				<div class="col-sm-9">
            		<input type="text" class="form-control" id="name" name="name" maxlength="300" required>
					<?php echo form_error('name', '<span class="help-block" style="color: red">', '</span>'); ?>
          		</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Deskripsi *</label>
				<div class="col-sm-9">
            		<textarea class="form-control" id="description" name="description" required></textarea>
					<?php echo form_error('description', '<span class="help-block" style="color: red">', '</span>'); ?>
          		</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Stok Etalase *</label>
				<div class="col-sm-9">
            		<input type="number" class="form-control" id="stock" name="stock" required>
					<?php echo form_error('stock', '<span class="help-block" style="color: red">', '</span>'); ?>
          		</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Stok Warehouse *</label>
				<div class="col-sm-9">
            		<input type="number" class="form-control" id="stock_wh" name="stock_wh" required>
					<?php echo form_error('stock_wh', '<span class="help-block" style="color: red">', '</span>'); ?>
          		</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Satuan *</label>
			  	<div class="col-sm-9">
				  	<select id="unit_id" name="unit_id" class="form-control select-single" required="true" style="background-color:#fff !important;">
                        <option value="">-- Pilih Satuan --</option>
                        <?php
						if($recUnit!=null) {
							foreach($recUnit as $rec) {
								echo '<option value="'.$rec->id.'">'.$rec->name.'</option>';
							}
						}
                        ?>
                    </select>
                    <?php echo form_error('unit_id', '<span class="help-block" style="color: red">', '</span>'); ?>
				</div>
          	</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Harga (Rp.) *</label>
				<div class="col-sm-9">
            		<input type="number" class="form-control" id="nominal" name="nominal" required>
					<?php echo form_error('nominal', '<span class="help-block" style="color: red">', '</span>'); ?>
          		</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Homepage *</label>
				<div class="col-sm-9">
					<div class="radio">
						<label><input type="radio" name="homepage" id="homepage1" class="mr-2" value="1" required> Yes</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="homepage" name="homepage2" class="mr-2" value="0" > No</label>
					</div>
					<?php echo form_error('homepage', '<span class="help-block" style="color: red">', '</span>'); ?>
          		</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Foto *</label>
				<div class="col-sm-9">
            		<input type="file" class="form-control" id="photo" name="photo" required accept=".jpg,.jpeg,.png" onchange="validateFileType(this.id)">
					<?php echo form_error('photo', '<span class="help-block" style="color: red">', '</span>'); ?>
          		</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label"></label>
				<div class="col-sm-9">
            		<input type="submit" id="btnsave" name="btnsave" value="Simpan" class="btn btn-primary py-3 px-5">
				</div>
          </div>
        </form>
      
      </div>

    </div>
  </div>
</section>


<script>

	function validateFileType(id)
    {
        var fileName = document.getElementById(id).value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if(extFile!='jpeg'&&extFile!='jpg'&&extFile!='png'){
            alert('File type must jpeg, jpg, or png');
            document.getElementById(id).value = "";
        }
    }

</script>