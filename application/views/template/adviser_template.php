<div class="row">
    <div class="col-lg-12 text-center">
        <h3 class="section-heading">{level}</h3>
    </div>

    {member}
    <div class="col-md-6 col-md-offset-3 col-lg-5 col-lg-offset-4 adviser-box">
        <div class="col-md-4 col-lg-4">
            <img src="<?=base_url()?>{m_img}">
        </div>
        <div class="col-md-8 col-lg-8">
            <p><i class="fa fa-user-circle" aria-hidden="true"></i> {m_name_en} ({m_name}) </p>
            <p><i class="fa fa-envelope" aria-hidden="true"></i> {m_mail} </p>
            <p><i class="fa fa-phone fa-lg" aria-hidden="true"></i> {m_phone} </p>
        </div>
    </div>
    {/member}
</div>
