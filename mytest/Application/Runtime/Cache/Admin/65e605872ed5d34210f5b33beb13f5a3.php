<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
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
								<a href="/index.php/Admin/User/index">用户管理</a>
							</li>
							<li class="active">用户列表</li>
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
								用户管理
								<small>
									<i class="icon-double-angle-right"></i>
									用户列表
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
		<form class="form-horizontal" role="form" name="add_rule_form" id="add_rule_form" method="post" action="/index.php/Admin/User/addUser">

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> username </label>

				<div class="col-sm-9">
					<input type="text" id="a_username" name="form[username]" class="col-xs-10 col-sm-5" />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"> password </label>

				<div class="col-sm-9">
					<input type="password" class="col-xs-10 col-sm-5" id="a_password" name="form[password]" />
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
				var a_username = trim($('#a_username').val());
				var a_password = trim($('#a_password').val());
				if(a_username.length == 0){
					alert('username 不能为空！');
					return false;
				}
				if(a_password.length == 0){
					alert('password 不能为空！');
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
		<form class="form-horizontal" role="form" name="edit_form" id="edit_form" method="post" action="/index.php/Admin/User/edit">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> id </label>

				<div class="col-sm-9">
					<input type="text" id="e_id" name="form[id]" readOnly="true" class="col-xs-10 col-sm-1" />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> username </label>

				<div class="col-sm-9">
					<input type="text" id="e_username" name="form[username]" class="col-xs-10 col-sm-5" />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"> 旧密码 </label>

				<div class="col-sm-9">
					<input type="password" class="col-xs-10 col-sm-5" id="e_password" name="form[password]" />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-4">新密码</label>

				<div class="col-sm-9">
					<input class="col-xs-10 col-sm-5" type="password" id="e_password_new" name="form[password_new]"  />
					<div class="space-2"></div>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-5">确认新密码</label>

				<div class="col-sm-9">
					<div class="clearfix">
						<input type="password" class="col-xs-10 col-sm-5" id="e_password_new_con" name="form[password_new_con]" />
					</div>

					<div class="space-2"></div>
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
        <h4 class="modal-title" id="myModalLabel">删除用户</h4>
      </div>
      <div class="modal-body">
      	<h4 class="modal-title" id="myModalLabel">确认删除吗？</h4>
		<form class="form-horizontal" role="form" name="del_form" id="del_form" method="post" action="/index.php/Admin/User/delUser">
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
												<th>username</th>
												<th>group</th>
												<th>管理</th>
											</tr>
										</thead>
											<script>
												function edit(i){
													
													$('#e_id').val($('#c_id_'+i).html());
													$('#e_username').val($('#c_username_'+i).html());
												}
												function del(i){
													$('#del_id').val(i);
												}
											</script>
										<tbody>
											<?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i;?><tr>
												<td id="c_id_<?php echo ($u["id"]); ?>"><?php echo ($u["id"]); ?></td>
												<td id="c_username_<?php echo ($u["id"]); ?>"><?php echo ($u["username"]); ?></td>
												<td><?php echo ($u["title"]); ?></td>
												<td>
													<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
														<a class="green" href="#" onclick="edit(<?php echo ($u["id"]); ?>)">
															<i class="icon-pencil bigger-130"  data-toggle="modal" data-target="#myModal"></i>
														</a>
														<a class="red" href="#" onclick="del(<?php echo ($u["id"]); ?>)">
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
</body>
</html>