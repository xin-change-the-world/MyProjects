<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title></title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- basic styles -->
		<link href="/Public/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="/Public/assets/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="/Public/assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<!-- fonts -->


		<!-- ace styles -->

		<link rel="stylesheet" href="/Public/assets/css/ace.min.css" />
		<link rel="stylesheet" href="/Public/assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="/Public/assets/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="/Public/assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->

		<script src="/Public/assets/js/ace-extra.min.js"></script>
		<script src="/Public/js/jquery.js"></script>
		<script src="/Public/assets/js/bootstrap.min.js"></script>
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="/Public/assets/js/html5shiv.js"></script>
		<script src="/Public/assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

<body>
		<div class="navbar navbar-default" id="navbar">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				
				<div class="navbar-header pull-left">
	<a href="/index.php/Home/Index/menu" class="navbar-brand">
		<small>
			<i class="icon-leaf"></i>
			<?php echo (C("TITLE")); ?>
		</small>
	</a><!-- /.brand -->
</div><!-- /.navbar-header -->
<div class="navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="/Public/assets/avatars/avatar2.png" alt="Jason's Photo" />
								<span class="user-info">
									<small>欢迎您,</small>
									<?php echo (session('username')); ?>
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="icon-cog"></i>
										设置
									</a>
								</li>

								<li>
									<a href="#">
										<i class="icon-user"></i>
										个人资料
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="/index.php/Home/Public/logout">
										<i class="icon-off"></i>
										退出
									</a>
								</li>
							</ul>
						</li>
					</ul><!-- /.ace-nav -->
				</div><!-- /.navbar-header -->
				
			</div><!-- /.container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

								<div class="sidebar" id="sidebar">
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
					</script>

					<div class="sidebar-shortcuts" id="sidebar-shortcuts">
						<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
							<button class="btn btn-success">
								<i class="icon-signal"></i>
							</button>

							<button class="btn btn-info">
								<i class="icon-pencil"></i>
							</button>

							<button class="btn btn-warning">
								<i class="icon-group"></i>
							</button>

							<button class="btn btn-danger">
								<i class="icon-cogs"></i>
							</button>
						</div>

						<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
							<span class="btn btn-success"></span>

							<span class="btn btn-info"></span>

							<span class="btn btn-warning"></span>

							<span class="btn btn-danger"></span>
						</div>
					</div><!-- #sidebar-shortcuts -->
					<ul class="nav nav-list">
						<?php if(is_array($_SESSION['menu'][$_SESSION['menu'][0][MODULE_NAME]['id']])): $i = 0; $__LIST__ = $_SESSION['menu'][$_SESSION['menu'][0][MODULE_NAME]['id']];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i; if( isset($_SESSION['menu'][$m['id']]) ): ?><li
									class="active open"
								>
									<a href="#" class="dropdown-toggle">
										<i class="icon-list"></i>
										<span class="menu-text"> <?php echo ($m["title"]); ?> </span>

										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<?php if(is_array($_SESSION['menu'][$m['id']])): $i = 0; $__LIST__ = $_SESSION['menu'][$m['id']];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_m): $mod = ($i % 2 );++$i;?><li
										<?php if(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME == $sub_m['name']): ?>class="active open"<?php endif; ?>
										>
											<a href="/index.php/<?php echo ($sub_m["name"]); ?>">
												<i class="icon-double-angle-right"></i>
												<?php echo ($sub_m["title"]); ?>
											</a>
										</li><?php endforeach; endif; else: echo "" ;endif; ?>
									</ul>
								</li>
							<?php else: ?>
								<li 
								<?php if(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME == $m['name']): ?>class="active"<?php endif; ?>
								>
									<a href="/index.php/<?php echo ($m["name"]); ?>">
										<i class="icon-dashboard"></i>
										<span class="menu-text"> <?php echo ($m["title"]); ?> </span>
									</a>
								</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
					</ul><!-- /.nav-list -->

					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>

					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div>

								<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<a href="/index.php/Home/Index/menu"><i class="icon-home home-icon" ></i></a>
								<a href="#">Admin模块</a>
							</li>

							<li>
								<a href="#">权限管理</a>
							</li>
							<li class="active">节点列表</li>
						</ul><!-- .breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="icon-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- #nav-search -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								权限管理
								<small>
									<i class="icon-double-angle-right"></i>
									节点列表
								</small>
							</h1>
						</div><!-- /.page-header -->
								<div class="row">
									<div class="col-xs-12 col-sm-4 widget-container-span">
										<div class="widget-box collapsed">
											<div class="widget-header widget-header-small header-color-orange">
												<h6>
													新增
												</h6>

												<div class="widget-toolbar">

													<a href="#" data-action="collapse">
														<i class="icon-chevron-down"></i>
													</a>

												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main">
		<form class="form-horizontal" role="form" name="add_rule_form" id="add_rule_form" method="post" action="/index.php/Admin/Index/addRule">

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> name </label>

				<div class="col-sm-9">
					<input type="text" id="a_name" name="form[name]" class="col-xs-10 col-sm-5" />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"> title </label>

				<div class="col-sm-9">
					<input type="text" class="col-xs-10 col-sm-5" id="a_title" name="form[title]" />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-4">status</label>

				<div class="col-sm-9">
					<input class="col-xs-10 col-sm-1" type="text" id="a_status" name="form[status]" value="1" />
					<div class="space-2"></div>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-5">type</label>

				<div class="col-sm-9">
					<div class="clearfix">
						<input type="text" class="col-xs-10 col-sm-5" id="a_type" name="form[type]" />
					</div>

					<div class="space-2"></div>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-5">condition</label>

				<div class="col-sm-9">
					<div class="clearfix">
						<input type="text" class="col-xs-10 col-sm-5" id="a_condition" name="form[condition]" />
					</div>

					<div class="space-2"></div>
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-6">level</label>

				<div class="col-sm-9">
					<input type="text" class="col-xs-10 col-sm-1" id="a_level" name="form[level]" />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-tags">father_id</label>

				<div class="col-sm-9">
					<input type="text" class="col-xs-10 col-sm-1" id="a_father_id" name="form[father_id]" />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-tags">is_show</label>

				<div class="col-sm-9">
					<input type="text" class="col-xs-10 col-sm-1" id="a_is_show" name="form[is_show]" value="1"/>
				</div>
			</div>

		<div class="modal-footer">
              	<button type="button" class="btn btn-primary" onclick="a_form()">保存</button>
      	</div>
		</form>
		<script>
			function ltrim(s){

			    return s.replace( /^\s*/,"");

			}

			//去右空格;

			function rtrim(s){

			    return s.replace( /\s*$/,"");

			}
			function trim(s){

			    return ltrim(rtrim(s));

			}
			function a_form(){
				var a_name = trim($('#a_name').val());
				var a_title = trim($('#a_title').val());
				var a_status = trim($('#a_status').val());
				var a_type = trim($('#a_type').val());
				var a_level = trim($('#a_level').val());
				var a_father_id = trim($('#a_father_id').val());
				var a_is_show = trim($('#a_is_show').val());
				if(a_name.length == 0){
					alert('name 不能为空！');
					return false;
				}
				if(a_title.length == 0){
					alert('title 不能为空！');
					return false;
				}
				if(a_status.length == 0){
					alert('status 不能为空！');
					return false;
				}
				if(a_type.length == 0){
					alert('type 不能为空！');
					return false;
				}
				if(a_level.length == 0){
					alert('level 不能为空！');
					return false;
				}
				if(a_father_id.length == 0){
					alert('father_id 不能为空！');
					return false;
				}
				if(a_is_show.length == 0){
					alert('is_show 不能为空！');
					return false;
				}


				document.getElementById('add_rule_form').submit();
			}
		</script>

												</div>
											</div>
										</div>
									</div>
								</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">编辑</h4>
      </div>
      <div class="modal-body">
		<form class="form-horizontal" role="form" name="edit_form" id="edit_form" method="post" action="/index.php/Admin/Index/edit">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> id </label>

				<div class="col-sm-9">
					<input type="text" id="e_id" name="form[id]" readOnly="true" placeholder="Username" class="col-xs-10 col-sm-1" />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> name </label>

				<div class="col-sm-9">
					<input type="text" id="e_name" name="form[name]" class="col-xs-10 col-sm-5" />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"> title </label>

				<div class="col-sm-9">
					<input type="text" class="col-xs-10 col-sm-5" id="e_title" name="form[title]" />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-4">status</label>

				<div class="col-sm-9">
					<input class="col-xs-10 col-sm-1" type="text" id="e_status" name="form[status]"  />
					<div class="space-2"></div>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-5">type</label>

				<div class="col-sm-9">
					<div class="clearfix">
						<input type="text" class="col-xs-10 col-sm-5" id="e_type" name="form[type]" />
					</div>

					<div class="space-2"></div>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-5">condition</label>

				<div class="col-sm-9">
					<div class="clearfix">
						<input type="text" class="col-xs-10 col-sm-5" id="e_condition" name="form[condition]" />
					</div>

					<div class="space-2"></div>
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-6">level</label>

				<div class="col-sm-9">
					<input type="text" class="col-xs-10 col-sm-1" id="e_level" name="form[level]" />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-tags">father_id</label>

				<div class="col-sm-9">
					<input type="text" class="col-xs-10 col-sm-1" id="e_father_id" name="form[father_id]" />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-tags">is_show</label>

				<div class="col-sm-9">
					<input type="text" class="col-xs-10 col-sm-1" id="e_is_show" name="form[is_show]" />
				</div>
			</div>

		<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        	<button type="button" class="btn btn-primary" onclick="e_form()">保存</button>
      	</div>
		</form>
		<script>
			function e_form(){
				document.getElementById('edit_form').submit();
			}
		</script>
	</div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--del modal-->
<!-- Modal -->
<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">删除规则</h4>
      </div>
      <div class="modal-body">
      	<h4 class="modal-title" id="myModalLabel">确认删除吗？</h4>
		<form class="form-horizontal" role="form" name="del_form" id="del_form" method="post" action="/index.php/Admin/Index/delRule">
			<input type="hidden" id="del_id" name="del_id" value="">
		<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        	<button type="button" class="btn btn-primary" onclick="d_form()">确认</button>
      	</div>
		</form>
		<script>
			function d_form(){
				document.getElementById('del_form').submit();
			}
		</script>
	</div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--del modal-->
						<div class="row">
							<div class="col-xs-12">
								<div class="table-responsive">
									<table id="sample-table-2" class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th>id</th>
												<th>name</th>
												<th class="hidden-480">title</th>

												<th>
													status
												</th>
												<th class="hidden-480">type</th>

												<th>condition</th>
												<th>level</th>
												<th>father_id</th>
												<th>is_show</th>
												<th>管理</th>
											</tr>
										</thead>
											<script>
												function edit(i){
													
													$('#e_id').val($('#c_id_'+i).html());
													$('#e_name').val($('#c_name_'+i).val());
													$('#e_title').val($('#c_title_'+i).html());
													$('#e_status').val($('#c_status_'+i).html());
													$('#e_type').val($('#c_type_'+i).html());
													$('#e_condition').val($('#c_condition_'+i).html());
													$('#e_level').val($('#c_level_'+i).html());
													$('#e_father_id').val($('#c_father_id_'+i).html());
													$('#e_id').val($('#c_id_'+i).html());
													$('#e_is_show').val($('#c_is_show_'+i).html());
												}
												function del(i){
													$('#del_id').val(i);
												}
											</script>
										<tbody>
											<?php if(is_array($rule)): $i = 0; $__LIST__ = $rule;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?><tr>
												<td id="c_id_<?php echo ($r["id"]); ?>"><?php echo ($r["id"]); ?></td>
												<td ><input type="hidden" id="c_name_<?php echo ($r["id"]); ?>" value="<?php echo ($r["name"]); ?>">
													<?php if($r["level"] == 1): echo ($r["name"]); ?>
													<?php elseif($r["level"] == 2): ?>
													|&nbsp;&nbsp;|—&nbsp;<?php echo ($r["name"]); ?>
													<?php elseif($r["level"] == 3): ?>
													|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|—&nbsp;<?php echo ($r["name"]); endif; ?>
												</td>
												<td id="c_title_<?php echo ($r["id"]); ?>"><?php echo ($r["title"]); ?></td>
												<td id="c_status_<?php echo ($r["id"]); ?>"><?php echo ($r["status"]); ?></td>
												<td id="c_type_<?php echo ($r["id"]); ?>"><?php echo ($r["type"]); ?></td>
												<td id="c_condition_<?php echo ($r["id"]); ?>"><?php echo ($r["condition"]); ?></td>
												<td id="c_level_<?php echo ($r["id"]); ?>"><?php echo ($r["level"]); ?></td>
												<td id="c_father_id_<?php echo ($r["id"]); ?>"><?php echo ($r["father_id"]); ?></td>
												<td id="c_is_show_<?php echo ($r["id"]); ?>"><?php echo ($r["is_show"]); ?></td>
												<td>
													<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
														<a class="green" href="#" onclick="edit(<?php echo ($r["id"]); ?>)">
															<i class="icon-pencil bigger-130"  data-toggle="modal" data-target="#myModal"></i>
														</a>
														<a class="red" href="#" onclick="del(<?php echo ($r["id"]); ?>)">
															<i class="icon-trash bigger-130" data-toggle="modal" data-target="#delModal"></i>
														</a>
													</div>
												</td>
											</tr><?php endforeach; endif; else: echo "" ;endif; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>				

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">
									<div class="col-sm-6">
										<div class="widget-box">
											<div class="widget-header header-color-blue2">
												<h4 class="lighter smaller"></h4>
											</div>

											<div class="widget-body">
												<div class="widget-main padding-8">
													<div id="tree1" class="tree"></div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<script type="text/javascript">
									var $assets = "assets";//this will be used in fuelux.tree-sampledata.js
								</script>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
	
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

								<div class="ace-settings-container" id="ace-settings-container">
					<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
						<i class="icon-cog bigger-150"></i>
					</div>

					<div class="ace-settings-box" id="ace-settings-box">
						<div>
							<div class="pull-left">
								<select id="skin-colorpicker" class="hide">
									<option data-skin="default" value="#438EB9">#438EB9</option>
									<option data-skin="skin-1" value="#222A2D">#222A2D</option>
									<option data-skin="skin-2" value="#C6487E">#C6487E</option>
									<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
								</select>
							</div>
							<span>&nbsp; 选择皮肤</span>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
							<label class="lbl" for="ace-settings-navbar"> 固定导航条</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
							<label class="lbl" for="ace-settings-sidebar"> 固定滑动条</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
							<label class="lbl" for="ace-settings-breadcrumbs">固定面包屑</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
							<label class="lbl" for="ace-settings-rtl">切换到左边</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
							<label class="lbl" for="ace-settings-add-container">
								切换窄屏
								<b></b>
							</label>
						</div>
					</div>
				</div><!-- /#ace-settings-container -->

			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='/Public/assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='/Public/assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='/Public/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="/Public/assets/js/bootstrap.min.js"></script>
		<script src="/Public/assets/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="/Public/assets/js/fuelux/fuelux.tree.min.js"></script>

		<!-- ace scripts -->

		<script src="/Public/assets/js/ace-elements.min.js"></script>
		<script src="/Public/assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->

		<script type="text/javascript">
			var DataSourceTree = function(options) {
				this._data 	= options.data;
				this._delay = options.delay;
			}

			DataSourceTree.prototype.data = function(options, callback) {
				var self = this;
				var $data = null;

				if(!("name" in options) && !("type" in options)){
					$data = this._data;//the root tree
					callback({ data: $data });
					return;
				}
				else if("type" in options && options.type == "folder") {
					if("additionalParameters" in options && "children" in options.additionalParameters)
						$data = options.additionalParameters.children;
					else $data = {}//no data
				}
				
				if($data != null)//this setTimeout is only for mimicking some random delay
					setTimeout(function(){callback({ data: $data });} , parseInt(Math.random() * 500) + 200);

				//we have used static data here
				//but you can retrieve your data dynamically from a server using ajax call
				//checkout examples/treeview.html and examples/treeview.js for more info
			};
			var tree_data = {
				<?php if(is_array($_SESSION['menu'][0])): $i = 0; $__LIST__ = $_SESSION['menu'][0];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i;?>'<?php echo ($m["name"]); ?>' : { name: '<?php echo ($m[name]); ?>', type: 'folder' }	,<?php endforeach; endif; else: echo "" ;endif; ?>				
			};
				<?php if(is_array($_SESSION['menu'][0])): $i = 0; $__LIST__ = $_SESSION['menu'][0];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i;?>tree_data['<?php echo ($m["name"]); ?>']['additionalParameters'] = {
						'children' : {
							
							<?php if(is_array($_SESSION['menu'][$_SESSION['menu'][0][$m['name']]['id']])): $i = 0; $__LIST__ = $_SESSION['menu'][$_SESSION['menu'][0][$m['name']]['id']];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_m): $mod = ($i % 2 );++$i;?>'<?php echo (str_replace("/","",$sub_m["name"])); ?>' : { name:'<?php echo ($sub_m["name"]); ?>', 
								<?php if( isset($_SESSION['menu'][$sub_m['id']]) ): ?>type:'folder'
								<?php else: ?>
									type:'item'<?php endif; ?> 
							},<?php endforeach; endif; else: echo "" ;endif; ?>
						}
					};<?php endforeach; endif; else: echo "" ;endif; ?>				

				<?php if(is_array($_SESSION['menu'][0])): $i = 0; $__LIST__ = $_SESSION['menu'][0];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i; if(is_array($_SESSION['menu'][$_SESSION['menu'][0][$m['name']]['id']])): $i = 0; $__LIST__ = $_SESSION['menu'][$_SESSION['menu'][0][$m['name']]['id']];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_m): $mod = ($i % 2 );++$i;?>tree_data['<?php echo ($m["name"]); ?>']['additionalParameters']['children']['<?php echo (str_replace("/","",$sub_m["name"])); ?>']['additionalParameters'] = {
							'children' : {
								<?php if(is_array($_SESSION['menu'][$sub_m['id']])): $i = 0; $__LIST__ = $_SESSION['menu'][$sub_m['id']];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s): $mod = ($i % 2 );++$i;?>'<?php echo (str_replace("/","",$s["name"])); ?>' : { name: '<?php echo ($s["name"]); ?>', type: 'item' },<?php endforeach; endif; else: echo "" ;endif; ?>
							}
						};<?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>				
			var treeDataSource = new DataSourceTree({data: tree_data});

			jQuery(function($){

			$('#tree1').ace_tree({
				dataSource: treeDataSource ,
				multiSelect:true,
				loadingHTML:'<div class="tree-loading"><i class="icon-refresh icon-spin blue"></i></div>',
				'open-icon' : 'icon-minus',
				'close-icon' : 'icon-plus',
				'selectable' : false,
				/*
				'selected-icon' : 'icon-ok',
				'unselected-icon' : 'icon-remove'*/
			});



		/*
		$('#tree1').on('loaded', function (evt, data) {
		});

		$('#tree1').on('opened', function (evt, data) {
		});

		$('#tree1').on('closed', function (evt, data) {
		});

		$('#tree1').on('selected', function (evt, data) {
		});*/
		
	});
	</script>
</body>
</html>