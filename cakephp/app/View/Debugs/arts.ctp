
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
            <div class="row margin-top-10">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat2 dashboard-step">
                        <div class="display">
                            <div class="number">
                                <h3 class="font-green-sharp">三步约飞机</h3>
                            </div>
                            <div class="icon">
                                <i class="fa fa-paper-plane-o"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat2 dashboard-step">
                        <div class="display">
                            <div class="number">
                                <h3 class="font-red-haze">1. 挑场景/案例</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat2 dashboard-step">
                        <div class="display">
                            <div class="number">
                                <h3 class="font-blue-sharp">2. 咨询团队 </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat2 dashboard-step">
                        <div class="display">
                            <div class="number">
                                <h3 class="font-purple-soft">3. 坐等飞机来 </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<div class="tabbable tabbable-custom tabbable-noborder">
						<ul class="nav nav-tabs nav-justified">
							<li class="active">
								<a href="#tab_1" data-toggle="tab">
								婚纱/婚庆 </a>
							</li>
							<li>
								<a href="#tab_2" data-toggle="tab">
								企业/楼盘 </a>
							</li>
							<li>
								<a href="#tab_3" data-toggle="tab">
								城市/风光 </a>
							</li>
							<li>
								<a href="#tab_4" data-toggle="tab">
							    赛事航拍 </a>
							</li>
							<li>
								<a href="#tab_5" data-toggle="tab">
							    行业应用 </a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1">
								<!-- BEGIN FILTER -->
								<div class="margin-top-10">
									<ul class="mix-filter">
										<li class="filter" data-filter="all">
											 所有
										</li>
										<li class="filter" data-filter="category_1">
											 草坪
										</li>
										<li class="filter" data-filter="category_2">
											 海岛
										</li>
										<li class="filter" data-filter="category_3">
											 教堂
										</li>
										<li class="filter" data-filter="category_3 category_1">
											 城堡
										</li>
									</ul>
									<div class="row mix-grid thumbnails">
								        <div class="col-md-4 col-sm-6 mix category_1" >
                                            <div class="thumbnail">
                                                <!-- <img style="width: 100%; height: 200px; display: block;" alt="100%x200" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyOTQiIGhlaWdodD0iMjAwIj48cmVjdCB3aWR0aD0iMjk0IiBoZWlnaHQ9IjIwMCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjE0NyIgeT0iMTAwIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjE4cHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+Mjk0eDIwMDwvdGV4dD48L3N2Zz4=" data-src="holder.js/100%x200"> -->
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img1.jpg");?>" alt="">

                                                <div class="caption" style=" overflow:hidden; text-overflow:ellipsis;">
                                                    <a title="Mitochondrial Island" target="_blank" href="<?php echo $this->Html->url("/Debugs/viewArt"); ?>" class="thumbnail-title">案例名字</a> 
                                                    <a title="Jean Wimmerlin" target="_blank" href="<?php echo $this->Html->url("/Debugs/viewTeam"); ?>" class="thumbnail-author">团队名字</a>
                                                    <div class="price">  估价 <i class="fa fa-jpy"></i> 90000</div>
                                                    <ul class="list-inline blog-tags">
                                                        <li>
                                                            <i class="fa fa-tags"></i>
                                                            <a href="javascript:;">
                                                            城堡</a>
                                                            <a href="javascript:;">
                                                            婚庆 </a>
                                                            <a href="javascript:;">
                                                            奢华</a>
                                                        </li>
                                                    </ul>
                                                    <p>
                                                       案例描述, Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies.
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
								        <div class="col-md-4 col-sm-6 mix category_1" >
                                            <div class="thumbnail">
                                                <!-- <img style="width: 100%; height: 200px; display: block;" alt="100%x200" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyOTQiIGhlaWdodD0iMjAwIj48cmVjdCB3aWR0aD0iMjk0IiBoZWlnaHQ9IjIwMCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjE0NyIgeT0iMTAwIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjE4cHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+Mjk0eDIwMDwvdGV4dD48L3N2Zz4=" data-src="holder.js/100%x200"> -->
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img1.jpg");?>" alt="">

                                                <div class="caption" style=" overflow:hidden; text-overflow:ellipsis;">
                                                    <a title="Mitochondrial Island" target="_blank" href="<?php echo $this->Html->url("/Debugs/viewArt"); ?>" class="thumbnail-title">案例名字</a> 
                                                    <a title="Jean Wimmerlin" target="_blank" href="<?php echo $this->Html->url("/Debugs/viewTeam"); ?>" class="thumbnail-author">团队名字</a>
                                                    <div class="price">  估价 <i class="fa fa-jpy"></i> 90000</div>
                                                    <ul class="list-inline blog-tags">
                                                        <li>
                                                            <i class="fa fa-tags"></i>
                                                            <a href="javascript:;">
                                                            城堡</a>
                                                            <a href="javascript:;">
                                                            婚庆 </a>
                                                            <a href="javascript:;">
                                                            奢华</a>
                                                        </li>
                                                    </ul>
                                                    <p>
                                                       案例描述, Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies.
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
								        <div class="col-md-4 col-sm-6 mix category_1" >
                                            <div class="thumbnail">
                                                <!-- <img style="width: 100%; height: 200px; display: block;" alt="100%x200" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyOTQiIGhlaWdodD0iMjAwIj48cmVjdCB3aWR0aD0iMjk0IiBoZWlnaHQ9IjIwMCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjE0NyIgeT0iMTAwIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjE4cHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+Mjk0eDIwMDwvdGV4dD48L3N2Zz4=" data-src="holder.js/100%x200"> -->
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img1.jpg");?>" alt="">

                                                <div class="caption" style=" overflow:hidden; text-overflow:ellipsis;">
                                                    <a title="Mitochondrial Island" target="_blank" href="<?php echo $this->Html->url("/Debugs/viewArt"); ?>" class="thumbnail-title">案例名字</a> 
                                                    <a title="Jean Wimmerlin" target="_blank" href="<?php echo $this->Html->url("/Debugs/viewTeam"); ?>" class="thumbnail-author">团队名字</a>
                                                    <div class="price">  估价 <i class="fa fa-jpy"></i> 90000</div>
                                                    <ul class="list-inline blog-tags">
                                                        <li>
                                                            <i class="fa fa-tags"></i>
                                                            <a href="javascript:;">
                                                            城堡</a>
                                                            <a href="javascript:;">
                                                            婚庆 </a>
                                                            <a href="javascript:;">
                                                            奢华</a>
                                                        </li>
                                                    </ul>
                                                    <p>
                                                       案例描述, Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies.
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
								        <div class="col-md-4 col-sm-6 mix category_1" >
                                            <div class="thumbnail">
                                                <!-- <img style="width: 100%; height: 200px; display: block;" alt="100%x200" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyOTQiIGhlaWdodD0iMjAwIj48cmVjdCB3aWR0aD0iMjk0IiBoZWlnaHQ9IjIwMCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjE0NyIgeT0iMTAwIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjE4cHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+Mjk0eDIwMDwvdGV4dD48L3N2Zz4=" data-src="holder.js/100%x200"> -->
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img1.jpg");?>" alt="">

                                                <div class="caption" style=" overflow:hidden; text-overflow:ellipsis;">
                                                    <a title="Mitochondrial Island" target="_blank" href="<?php echo $this->Html->url("/Debugs/viewArt"); ?>" class="thumbnail-title">案例名字</a> 
                                                    <a title="Jean Wimmerlin" target="_blank" href="<?php echo $this->Html->url("/Debugs/viewTeam"); ?>" class="thumbnail-author">团队名字</a>
                                                    <div class="price">  估价 <i class="fa fa-jpy"></i> 90000</div>
                                                    <ul class="list-inline blog-tags">
                                                        <li>
                                                            <i class="fa fa-tags"></i>
                                                            <a href="javascript:;">
                                                            城堡</a>
                                                            <a href="javascript:;">
                                                            婚庆 </a>
                                                            <a href="javascript:;">
                                                            奢华</a>
                                                        </li>
                                                    </ul>
                                                    <p>
                                                       案例描述, Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies.
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
								        <div class="col-md-4 col-sm-6 mix category_1" >
                                            <div class="thumbnail">
                                                <!-- <img style="width: 100%; height: 200px; display: block;" alt="100%x200" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyOTQiIGhlaWdodD0iMjAwIj48cmVjdCB3aWR0aD0iMjk0IiBoZWlnaHQ9IjIwMCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjE0NyIgeT0iMTAwIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjE4cHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+Mjk0eDIwMDwvdGV4dD48L3N2Zz4=" data-src="holder.js/100%x200"> -->
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img1.jpg");?>" alt="">

                                                <div class="caption" style=" overflow:hidden; text-overflow:ellipsis;">
                                                    <a title="Mitochondrial Island" target="_blank" href="<?php echo $this->Html->url("/Debugs/viewArt"); ?>" class="thumbnail-title">案例名字</a> 
                                                    <a title="Jean Wimmerlin" target="_blank" href="<?php echo $this->Html->url("/Debugs/viewTeam"); ?>" class="thumbnail-author">团队名字</a>
                                                    <div class="price">  估价 <i class="fa fa-jpy"></i> 90000</div>
                                                    <ul class="list-inline blog-tags">
                                                        <li>
                                                            <i class="fa fa-tags"></i>
                                                            <a href="javascript:;">
                                                            城堡</a>
                                                            <a href="javascript:;">
                                                            婚庆 </a>
                                                            <a href="javascript:;">
                                                            奢华</a>
                                                        </li>
                                                    </ul>
                                                    <p>
                                                       案例描述, Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies.
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
								        <div class="col-md-4 col-sm-6 mix category_1" >
                                            <div class="thumbnail">
                                                <!-- <img style="width: 100%; height: 200px; display: block;" alt="100%x200" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyOTQiIGhlaWdodD0iMjAwIj48cmVjdCB3aWR0aD0iMjk0IiBoZWlnaHQ9IjIwMCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjE0NyIgeT0iMTAwIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjE4cHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+Mjk0eDIwMDwvdGV4dD48L3N2Zz4=" data-src="holder.js/100%x200"> -->
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img1.jpg");?>" alt="">

                                                <div class="caption" style=" overflow:hidden; text-overflow:ellipsis;">
                                                    <a title="Mitochondrial Island" target="_blank" href="<?php echo $this->Html->url("/Debugs/viewArt"); ?>" class="thumbnail-title">案例名字</a> 
                                                    <a title="Jean Wimmerlin" target="_blank" href="<?php echo $this->Html->url("/Debugs/viewTeam"); ?>" class="thumbnail-author">团队名字</a>
                                                    <div class="price">  估价 <i class="fa fa-jpy"></i> 90000</div>
                                                    <ul class="list-inline blog-tags">
                                                        <li>
                                                            <i class="fa fa-tags"></i>
                                                            <a href="javascript:;">
                                                            城堡</a>
                                                            <a href="javascript:;">
                                                            婚庆 </a>
                                                            <a href="javascript:;">
                                                            奢华</a>
                                                        </li>
                                                    </ul>
                                                    <p>
                                                       案例描述, Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies.
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
								        <div class="col-md-4 col-sm-6 mix category_1" >
                                            <div class="thumbnail">
                                                <!-- <img style="width: 100%; height: 200px; display: block;" alt="100%x200" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyOTQiIGhlaWdodD0iMjAwIj48cmVjdCB3aWR0aD0iMjk0IiBoZWlnaHQ9IjIwMCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjE0NyIgeT0iMTAwIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjE4cHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+Mjk0eDIwMDwvdGV4dD48L3N2Zz4=" data-src="holder.js/100%x200"> -->
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img1.jpg");?>" alt="">

                                                <div class="caption" style=" overflow:hidden; text-overflow:ellipsis;">
                                                    <a title="Mitochondrial Island" target="_blank" href="<?php echo $this->Html->url("/Debugs/viewArt"); ?>" class="thumbnail-title">案例名字</a> 
                                                    <a title="Jean Wimmerlin" target="_blank" href="<?php echo $this->Html->url("/Debugs/viewTeam"); ?>" class="thumbnail-author">团队名字</a>
                                                    <div class="price">  估价 <i class="fa fa-jpy"></i> 90000</div>
                                                    <ul class="list-inline blog-tags">
                                                        <li>
                                                            <i class="fa fa-tags"></i>
                                                            <a href="javascript:;">
                                                            城堡</a>
                                                            <a href="javascript:;">
                                                            婚庆 </a>
                                                            <a href="javascript:;">
                                                            奢华</a>
                                                        </li>
                                                    </ul>
                                                    <p>
                                                       案例描述, Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies.
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
								        <div class="col-md-4 col-sm-6 mix category_1" >
                                            <div class="thumbnail">
                                                <!-- <img style="width: 100%; height: 200px; display: block;" alt="100%x200" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyOTQiIGhlaWdodD0iMjAwIj48cmVjdCB3aWR0aD0iMjk0IiBoZWlnaHQ9IjIwMCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjE0NyIgeT0iMTAwIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjE4cHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+Mjk0eDIwMDwvdGV4dD48L3N2Zz4=" data-src="holder.js/100%x200"> -->
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img1.jpg");?>" alt="">

                                                <div class="caption" style=" overflow:hidden; text-overflow:ellipsis;">
                                                    <a title="Mitochondrial Island" target="_blank" href="<?php echo $this->Html->url("/Debugs/viewArt"); ?>" class="thumbnail-title">案例名字</a> 
                                                    <a title="Jean Wimmerlin" target="_blank" href="<?php echo $this->Html->url("/Debugs/viewTeam"); ?>" class="thumbnail-author">团队名字</a>
                                                    <div class="price">  估价 <i class="fa fa-jpy"></i> 90000</div>
                                                    <ul class="list-inline blog-tags">
                                                        <li>
                                                            <i class="fa fa-tags"></i>
                                                            <a href="javascript:;">
                                                            城堡</a>
                                                            <a href="javascript:;">
                                                            婚庆 </a>
                                                            <a href="javascript:;">
                                                            奢华</a>
                                                        </li>
                                                    </ul>
                                                    <p>
                                                       案例描述, Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies.
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
								        <div class="col-md-4 col-sm-6 mix category_1" >
                                            <div class="thumbnail">
                                                <!-- <img style="width: 100%; height: 200px; display: block;" alt="100%x200" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyOTQiIGhlaWdodD0iMjAwIj48cmVjdCB3aWR0aD0iMjk0IiBoZWlnaHQ9IjIwMCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjE0NyIgeT0iMTAwIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjE4cHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+Mjk0eDIwMDwvdGV4dD48L3N2Zz4=" data-src="holder.js/100%x200"> -->
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img1.jpg");?>" alt="">

                                                <div class="caption" style=" overflow:hidden; text-overflow:ellipsis;">
                                                    <a title="Mitochondrial Island" target="_blank" href="<?php echo $this->Html->url("/Debugs/viewArt"); ?>" class="thumbnail-title">案例名字</a> 
                                                    <a title="Jean Wimmerlin" target="_blank" href="<?php echo $this->Html->url("/Debugs/viewTeam"); ?>" class="thumbnail-author">团队名字</a>
                                                    <div class="price">  估价 <i class="fa fa-jpy"></i> 90000</div>
                                                    <ul class="list-inline blog-tags">
                                                        <li>
                                                            <i class="fa fa-tags"></i>
                                                            <a href="javascript:;">
                                                            城堡</a>
                                                            <a href="javascript:;">
                                                            婚庆 </a>
                                                            <a href="javascript:;">
                                                            奢华</a>
                                                        </li>
                                                    </ul>
                                                    <p>
                                                       案例描述, Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies.
                                                    </p>

                                                </div>
                                            </div>
                                        </div>

									</div>
								</div>
								<!-- END FILTER -->
                            <div>
                                <ul class="pagination pagination-lg">
                                    <li>
                                        <a href="javascript:;">
                                        <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        1 </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        2 </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        3 </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        4 </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        5 </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        6 </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
							</div>
                            
							<div class="tab-pane" id="tab_2">
								<!-- BEGIN FILTER -->
								<div class="filter-v1 margin-top-10">
									<ul class="mix-filter">
										<li class="filter" data-filter="all">
											 全部
										</li>
										<li class="filter" data-filter="category_1">
											 企业形象
										</li>
										<li class="filter" data-filter="category_2">
											 房产楼盘
										</li>
									</ul>
									<div class="row mix-grid thumbnails">
										<div class="col-md-4 col-sm-6 mix category_1">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img1.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis prae sentium.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img1.jpg");?>"  title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_2">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img2.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis prae sentium.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img2.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_3">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img3.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img3.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_1 category_2">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img4.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis prae sentium.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img4.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_2 category_1">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img5.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis prae.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img5.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_1 category_2">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img6.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis prae sentium.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img6.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_2 category_3">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img1.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img1.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_1 category_2">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img2.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis prae sentium.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img2.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_3">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img4.jpg");?>"alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img4.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_1">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img3.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis prae sentium voluptatum.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img3.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- END FILTER -->
							</div>
							<div class="tab-pane" id="tab_3">
								<!-- BEGIN FILTER -->
								<div class="filter-v1 margin-top-10">
									<ul class="mix-filter">
										<li class="filter" data-filter="all">
										    所有
										</li>
										<li class="filter" data-filter="category_1">
								            城市形象
										</li>
										<li class="filter" data-filter="category_2">
											景点风光
										</li>
										<li class="filter" data-filter="category_3">
										    秀美山川
										</li>
									</ul>
									<div class="row mix-grid thumbnails">
										<div class="col-md-4 col-sm-6 mix category_1">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img1.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis prae sentium.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img1.jpg");?>"  title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_2">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img2.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis prae sentium.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img2.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_3">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img3.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img3.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_1 category_2">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img4.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis prae sentium.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img4.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_2 category_1">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img5.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis prae.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img5.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_1 category_2">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img6.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis prae sentium.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img6.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_2 category_3">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img1.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img1.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_1 category_2">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img2.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis prae sentium.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img2.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_3">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img4.jpg");?>"alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img4.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_1">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img3.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis prae sentium voluptatum.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img3.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- END FILTER -->
							</div>
							<div class="tab-pane" id="tab_4">
								<!-- BEGIN FILTER -->
								<div class="filter-v1 margin-top-10">
									<ul class="mix-filter">
										<li class="filter" data-filter="all">
										    所有
										</li>
										<li class="filter" data-filter="category_1">
								            足球
										</li>
										<li class="filter" data-filter="category_2">
											篮球
										</li>
									</ul>
									<div class="row mix-grid thumbnails">
										<div class="col-md-4 col-sm-6 mix category_1">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img1.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis prae sentium.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img1.jpg");?>"  title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_2">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img2.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis prae sentium.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img2.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_3">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img3.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img3.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_1 category_2">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img4.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis prae sentium.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img4.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_2 category_1">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img5.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis prae.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img5.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_1 category_2">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img6.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis prae sentium.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img6.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_2 category_3">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img1.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img1.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_1 category_2">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img2.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis prae sentium.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img2.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_3">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img4.jpg");?>"alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img4.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_1">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img3.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis prae sentium voluptatum.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img3.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- END FILTER -->
							</div>
							<div class="tab-pane" id="tab_5">
								<!-- BEGIN FILTER -->
								<div class="filter-v1 margin-top-10">
									<ul class="mix-filter">
										<li class="filter" data-filter="all">
										    所有
										</li>
										<li class="filter" data-filter="category_1">
								            空中广告
										</li>
										<li class="filter" data-filter="category_2">
											农药喷洒
										</li>
										<li class="filter" data-filter="category_3">
										    高空架线
										</li>
									</ul>
									<div class="row mix-grid thumbnails">
										<div class="col-md-4 col-sm-6 mix category_1">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img1.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis prae sentium.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img1.jpg");?>"  title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_2">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img2.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis prae sentium.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img2.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_3">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img3.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img3.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_1 category_2">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img4.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis prae sentium.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img4.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_2 category_1">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img5.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis prae.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img5.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_1 category_2">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img6.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis prae sentium.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img6.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_2 category_3">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img1.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img1.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_1 category_2">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img2.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis prae sentium.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img2.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_3">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img4.jpg");?>"alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img4.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 mix category_1">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img3.jpg");?>" alt="">
												<div class="mix-details">
													<h3>Cascusamus et iusto odio</h3>
													<p>
														 At vero eos et accusamus et iusto odio digniss imos duc sasdimus qui sint blanditiis prae sentium voluptatum.
													</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $this->Html->url("/theme4/assets/admin/pages/media/works/img3.jpg");?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- END FILTER -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
