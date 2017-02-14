<section class="bg-dark" id="research">

<!-- Modal -->
    <div id="paper_modal" class="modal fade-scale" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title text-center">Research</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xm-12 col-md-5 text-center">
                            <img src="<?=base_url('assets/img/research/paper1.png')?>" class="display-img">
                        </div>
                        <div class="col-xs-12 col-md-7">
                            <div id="info-content" class="content-box">
                                Paper information
                                <p>Jin Ye, Chun-Yuan Lin. Building a Powerful and Energy-efficient Computing Platform with NVIDIA Jetson TK1 and its Applications</p>
                                <p></p>
                                <p>2016 Nov 05</p>
                                <p style="color: purple;">Fill in information of paper</p>
                                <br><br>test
                            </div>
                            <div class="col-xs-12 thumbnail-box">
                                <img src="<?=base_url('assets/img/research/paper1.png')?>" class="thumbnail-img">
                                <img src="<?=base_url('assets/img/research/paper1-result.png')?>" class="thumbnail-img">
                                <img src="<?=base_url('assets/img/research/paper1-result.png')?>" class="thumbnail-img">
                                <img src="<?=base_url('assets/img/research/paper1-result.png')?>" class="thumbnail-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Research</h2>
                <hr class="primary">
            </div>
        </div>

        <div class="row">
            <!-- Research Collapse -->
            <div class="col-md-12 text-center">
                <div class="panel-group col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2" id="accordion" role="tablist" aria-multiselectable="true">

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading1" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1" style="cursor: pointer;">
                            <span class="panel-title"> Achievement </span>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
                            <div class="panel-body">
                                {achievement}
                                <div class="paper-group">
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="thumbnail">
                                            <img src="<?=base_url('assets/img/research/paper1.png')?>" alt="#">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 paper-text-box">
                                        <p>{r_paper}</p>
                                        <p>{r_author}</p>
                                        <p>{r_publicwhere}, {r_publicdate}</p>
                                        <p>{r_keyword}</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                {/achievement}
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading2" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapse2" style="cursor: pointer;">
                            <span class="panel-title"> Conference </span>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
                            <div class="panel-body">
                                {conference}
                                <div class="paper-group">
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="thumbnail">
                                            <img src="<?=base_url('assets/img/research/paper1.png')?>" alt="#">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 paper-text-box">
                                        <p>{r_paper}</p>
                                        <p>{r_author}</p>
                                        <p>{r_publicwhere}, {r_publicdate}</p>
                                        <p>{r_keyword}</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                {/conference}
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading3" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapse3" style="cursor: pointer;">
                            <span class="panel-title"> Journal </span>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
                            <div class="panel-body">
                                {journal}
                                <div class="paper-group">
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="thumbnail">
                                            <img src="<?=base_url('assets/img/research/paper1.png')?>" alt="#">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 paper-text-box">
                                        <p>{r_paper}</p>
                                        <p>{r_author}</p>
                                        <p>{r_publicwhere}, {r_publicdate}</p>
                                        <p>{r_keyword}</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                {/journal}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End of Research Collapse -->
        </div>
    </div>
</section>