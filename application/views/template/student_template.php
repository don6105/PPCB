<div class="row row-centered">
    <div class="col-lg-12 text-center">
        <h3 class="section-heading">{level} Student</h3>
    </div>

    {member}
    <div class="col-md-6 col-lg-4 student-box col-centered">
        <div class="col-md-3">
            <img src="<?=base_url()?>{m_img}">
        </div>
        <div class="col-md-9">
            <p><i class="fa fa-user-circle" aria-hidden="true"></i> {m_name_en} ({m_name}) </p>
            <p><i class="fa fa-envelope" aria-hidden="true"></i> {m_mail} </p>
            <p><i class="fa fa-graduation-cap" aria-hidden="true"></i> {m_edu_level} Student {m_edu_year} </p>
        </div>
    </div>
    {/member}
</div>
