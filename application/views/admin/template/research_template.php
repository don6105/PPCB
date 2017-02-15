<div class="col-md-12 paper" id="{r_id}">
	<div class="col-md-12 remove-btn">
		<i class="fa fa-times fa-lg" aria-hidden="true"></i>
	</div>
	<div class="col-md-6 paper-box text-center">
		<h4>{r_paper}</h4>
		<h5>{r_author}</h5>
		<h5>{r_publicdate}</h5>
		<h5>{r_publicwhere}</h5>
		<h5>{r_keyword}</h5>
		<h5>{r_description}</h5>
	</div>
	<div class="col-md-6 paper-img">
		{r_imgs}
		<img src="<?=base_url()?>{r_img}">
		{/r_imgs}
	</div>
</div>