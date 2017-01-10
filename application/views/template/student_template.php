<div class="row">
    <div class="col-lg-11 col-lg-offset-1">
        <h3 class="section-heading">{level} Student</h3>
    </div>

    <div class="col-lg-11 col-lg-offset-1">
        {member}
        <a onclick="get_resume_data({m_id});" data-toggle="modal" data-target="#member_resume">
            <div class="col-md-6 student-box">
                <div class="col-md-3">
                    <img src="<?=base_url('{m_img}')?>">
                </div>
                <div class="col-md-9">
                    <p><i class="fa fa-fw fa-user-circle" aria-hidden="true"></i> {m_name_en} ({m_name}) </p>
                    <p><i class="fa fa-fw fa-envelope" aria-hidden="true"></i> {m_mail} </p>
                    <p><i class="fa fa-fw fa-graduation-cap" aria-hidden="true"></i> {m_edu_level} Student {m_edu_year} </p>
                </div>
            </div>
        </a>
        {/member}
    </div>
</div>
