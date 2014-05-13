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
								<a href="/index.php/Admin/Group/index">分组管理</a>
							</li>
							<li class="active">分组列表</li>
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
								分组管理
								<small>
									<i class="icon-double-angle-right"></i>
									分组列表
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
		<form class="form-horizontal" role="form" name="add_group_form" id="add_group_form" method="post" action="/index.php/Admin/Group/addGroup">

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> title </label>

				<div class="col-sm-9">
					<input type="text" id="a_title" name="form[title]" class="col-xs-10 col-sm-5" />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"> status </label>

				<div class="col-sm-9">
					<input type="text" class="col-xs-10 col-sm-5" id="a_status" name="form[status]" />
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
				var a_title = trim($('#a_title').val());
				var a_status = trim($('#a_status').val());
				if(a_title.length == 0){
					alert('title 不能为空！');
					return false;
				}
				if(a_status.length == 0){
					alert('status 不能为空！');
					return false;
				}
				document.getElementById('add_group_form').submit();
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
		<form class="form-horizontal" role="form" name="edit_form" id="edit_form" method="post" action="/index.php/Admin/Group/edit">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> id </label>

				<div class="col-sm-9">
					<input type="text" id="e_id" name="form[id]" readOnly="true" class="col-xs-10 col-sm-1" />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> title </label>

				<div class="col-sm-9">
					<input type="text" id="e_title" name="form[title]" class="col-xs-10 col-sm-5" />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"> status </label>

				<div class="col-sm-9">
					<input type="text" class="col-xs-10 col-sm-5" id="e_status" name="form[status]" />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-4">rules</label>

				<div class="col-sm-9">
					<input class="col-xs-10 col-sm-5" type="text" id="e_rules" name="form[rules]"  />
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
        <h4 class="modal-title" id="delmyModalLabel">删除用户组</h4>
      </div>
      <div class="modal-body">
      	<h4 class="modal-title" id="delmyModalLabel2">确认删除吗？</h4>
		<form class="form-horizontal" role="form" name="del_form" id="del_form" method="post" action="/index.php/Admin/Group/delGroup">
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

<!--rulesModel-->
<!-- Modal -->
<script>
function select_all(obj){

 	allElements = $("input[name^='rule']");

	for(var i = 0; i < allElements.length; i++){
		
		if(obj.checked){
			allElements[i].checked = true;
		}else{
			allElements[i].checked = false;
		}
	}
}
</script>
<div class="modal fade" id="rulesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="rulesModalLabel">权限分配</h4>
      </div>
      <div class="modal-body">
      	<h4 class="modal-title" id="group_name"></h4>
			<table>
				<tr>
					<td><input type="checkbox" id="controlAll" onclick="select_all(this)"></td>
					<td>&nbsp;id&nbsp;</td>
					<td>名称</td>
					<td>标题</td>
					<td>状态</td>
					<td>类型</td>
					<td>等级</td>
					<td>父节点id</td>
					<td>是否显示</td>
				</tr>
<script>
function single_check(obj, n){

	var name = 'rule_'+n;	
	
 	allElements = $("input[name='"+name+"']");
	for(var i = 0; i < allElements.length; i++){

		if(obj.checked){
			
			allElements[i].checked = true;
		}else{
			
			allElements[i].checked = false;
		}
	}
}
</script>
			<?php if(is_array($rules)): $i = 0; $__LIST__ = $rules;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?><tr>
					<td><input type="checkbox" name="rule_<?php echo ($r["father_id"]); ?>" id="rule_<?php echo ($r["id"]); ?>" onclick="single_check(this,<?php echo ($r["id"]); ?>)" value="<?php echo ($r["id"]); ?>"/></td>
					<td>&nbsp;<?php echo ($r["id"]); ?>&nbsp;</td>
					<td><?php echo ($r["name"]); ?></td> <td><?php echo ($r["title"]); ?></td> <td>&nbsp;<?php echo ($r["status"]); ?>&nbsp;</td> <td>&nbsp;<?php echo ($r["type"]); ?>&nbsp;</td> <td>&nbsp;<?php echo ($r["level"]); ?>&nbsp;</td> <td>&nbsp;<?php echo ($r["father_id"]); ?>&nbsp;</td> 
					<td>&nbsp;<?php echo ($r["is_show"]); ?>&nbsp;
						<?php if($r["is_show"] == 1): ?><i class="icon-eye-open"></i>
						<?php elseif($r["is_show"] == 0): ?>
							<i class="icon-eye-close"></i><?php endif; ?>
					</td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</table>
		<form class="form-horizontal" role="form" name="rules_form" id="rules_form" method="post" action="/index.php/Admin/Group/ruleAccess">
			<input type="hidden" id="group_id" name="group_id" value="">
			<input type="hidden" id="group_rules" name="group_rules" value="">
		<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        	<button type="button" class="btn btn-primary" onclick="r_form()">确认</button>
      	</div>
		</form>
		<script>
			function r_form(){
				var elements = $("input[name^='rule']");
				var s = "";
				for (var i = 0; i<elements.length; i++) {
					if(elements[i].checked)
						s = s + elements[i].value + ','
				};
				s = s.substr(0, s.length - 1);
				document.getElementById('group_rules').value = s;
				document.getElementById('rules_form').submit();
			}
		</script>
	</div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--rulesModel-->



<!--usersModel-->
<!-- Modal -->
<script>
function u_select_all(obj){

 	allElements = $("input[name^='users']");

	for(var i = 0; i < allElements.length; i++){
		
		if(obj.checked){
			allElements[i].checked = true;
		}else{
			allElements[i].checked = false;
		}
	}
}
</script>
<div class="modal fade" id="usersModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="rulesModalLabel">用户分组</h4>
      </div>
      <div class="modal-body">
      	<h4 class="modal-title" id="user_name"></h4>
      	<form class="form-horizontal" role="form" name="users_form" id="users_form" method="post" action="/index.php/Admin/Group/userGroup">

			<table>
				<tr>
					<td><input type="checkbox" id="controlAll" onclick="u_select_all(this)"></td>
					<td>&nbsp;id&nbsp;</td>
					<td>姓名</td>
				</tr>
			<?php if(is_array($users)): $i = 0; $__LIST__ = $users;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i;?><tr>
					<td><input type="checkbox" name="users[]" id="user_<?php echo ($u["id"]); ?>" value="<?php echo ($u["id"]); ?>"/></td>
					<td>&nbsp;<?php echo ($u["id"]); ?>&nbsp;</td>
					<td><?php echo ($u["username"]); ?></td> 
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</table>
			<input type="hidden" id="u_group_id" name="u_group_id" value="">
		<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        	<button type="button" class="btn btn-primary" onclick="u_form()">确认</button>
      	</div>
		</form>
		<script>
			function u_form(){
				document.getElementById('users_form').submit();
			}
		</script>
	</div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--usersModel-->



						<div class="row">
							<div class="col-xs-12">
								<div class="table-responsive">
									<table id="sample-table-2" class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th>id</th>
												<th>title</th>
												<th>status</th>
												<th>rules</th>
												<th>管理</th>
											</tr>
										</thead>
											<script>

												function edit(i){
													
													$('#e_id').val($('#c_id_'+i).html());
													$('#e_title').val($('#c_title_'+i).html());
													$('#e_status').val($('#c_status_'+i).html());
													$('#e_rules').val($('#c_rules_'+i).html());
													$('#e_title').val($('#c_title_'+i).html());
												}
												function del(i){
													$('#del_id').val(i);
												}
												function rules(i){
													$('#group_id').val(i);
													$('#group_name').html($('#c_title_'+i).html());													
													//str = $('#c_rules_'+i).html();
													<?php if(is_array($group)): $i = 0; $__LIST__ = $group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g): $mod = ($i % 2 );++$i;?>var rules<?php echo ($g["id"]); ?> = new Array();
													eval("var rules<?php echo ($g["id"]); ?> = [<?php echo ($g["rules"]); ?>]");<?php endforeach; endif; else: echo "" ;endif; ?>
													s = "var r=rules"+i;
													//alert(s);
													eval(s);
													//js数组访问第一次成功，第二次点击失效。
													//rules = new Array();
													//rules = str.split(",");

													allElements = $("input[name^='rule']");

													for(var n = 0; n < allElements.length; n++){
														allElements[n].checked = false;
													}

													for(p = 0; p < r.length; p++){

														document.getElementById('rule_'+r[p]).checked = true;
													}												 	
												}
												function users(i){
													/*chrome下，此方式在第一次访问时有效，第二次访问无效。
													s = $('#c_group_user_'+i).val();
													users = s.split(",");
													*/
													<?php if(is_array($grouUser)): $i = 0; $__LIST__ = $grouUser;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g): $mod = ($i % 2 );++$i;?>var user_group_<?php echo ($key); ?> = new Array();
													eval("var user_group_<?php echo ($key); ?> = [<?php echo ($g); ?>]");<?php endforeach; endif; else: echo "" ;endif; ?>
													s = "var u=user_group_"+i;
													
													eval(s);

												 	allElements = $("input[name^='users']");
																							 	
													for(var k = 0; k < allElements.length; k++){
														allElements[k].checked = false;
													}
													for(p = 0; p < u.length; p++){
														document.getElementById('user_'+u[p]).checked = true;
													}												 	
													$('#u_group_id').val(i);
												}
											</script>
										<tbody>
											<?php if(is_array($group)): $i = 0; $__LIST__ = $group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g): $mod = ($i % 2 );++$i;?><tr>
												<input type="hidden" id="c_group_user_<?php echo ($g["id"]); ?>" value="<?php echo ($grouUser[$g[id]]); ?>">
												<td id="c_id_<?php echo ($g["id"]); ?>"><?php echo ($g["id"]); ?></td>
												<td id="c_title_<?php echo ($g["id"]); ?>"><?php echo ($g["title"]); ?></td>
												<td id="c_status_<?php echo ($g["id"]); ?>"><?php echo ($g["status"]); ?></td>
												<td id="c_rules_<?php echo ($g["id"]); ?>"><?php echo ($g["rules"]); ?></td>
												<td>
													<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
														<a class="green" href="#" onclick="edit(<?php echo ($g["id"]); ?>)">
															<i class="icon-pencil bigger-130"  data-toggle="modal" data-target="#myModal"></i>
														</a>
														<a class="red" href="#" onclick="del(<?php echo ($g["id"]); ?>)">
															<i class="icon-trash bigger-130" data-toggle="modal" data-target="#delModal"></i>
														</a>
														<a class="red" href="#" title="权限分配" onclick="rules(<?php echo ($g["id"]); ?>)">
															<i class="icon-list" data-toggle="modal" data-target="#rulesModal"></i>
														</a>
														<a class="red" href="#" title="用户分组" onclick="users(<?php echo ($g["id"]); ?>)">
															<i class="icon-group" data-toggle="modal" data-target="#usersModal"></i>
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