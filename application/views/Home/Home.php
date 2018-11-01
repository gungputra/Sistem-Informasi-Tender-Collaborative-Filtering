<section class="section-intro bg-img padding-y-lg">
	<div class="row">
  <div class="col-sm-6 mx-auto">
   <article class="white text-center mb-5">
   	<h1 class="display-3">Display hero text</h1>
    <p>This example is a quick exercise to illustrate how the navbar and its contents work. Some navbars extend the width of the viewport, others are confined within... For positioning of navbars, checkout the Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
   </article>

  </div> <!-- col.// -->
</div> <!-- row.// -->
</section>  <!-- section-intro.// -->
<section class="section-content padding-y">
<div class="container">

<header class="section-heading">
	<h2>Basic starter page</h2>
</header><!-- sect-heading -->

<div class="row">
	<?php foreach ($tender as $key): ?>
		<div class="col-md-3">
			<figure class="card card-product">
				<div class="img-wrap"><img src="<?php echo base_url('assets/image/tender/'.$key->gambar) ?>"></div>
				<figcaption class="info-wrap">
					<h4 class="title"><?php echo $key->tittle ?></h4>
				</figcaption>
				<div class="bottom-wrap">
					<p class="float-left"><span class="fa fa-calendar" style="margin-right:5px"></span><?php echo $key->deadline ?></p>
					<a onclick="detail(<?php echo $key->id_tender ?>)" class="btn btn-sm btn-primary float-right text-white">Detail</a>
				</div> <!-- bottom-wrap.// -->
			</figure>
		</div> <!-- col // -->

	<?php endforeach; ?>
</div> <!-- row.// -->

</div>
</section>
