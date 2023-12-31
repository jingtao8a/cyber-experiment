<?php if ($fn_include = $this->_include("mheader.html")) include($fn_include); ?>
<script type="text/javascript">
    function validOldPwd() {
        $.post('<?php echo dr_member_url('account/cpassword'); ?>', {password: $("#oldPwd").val()}, function(data){
            if (data) {
                $("#err_oldPwd").html(data);
                $("#err_oldPwd_group").addClass('has-error');
            } else {
                $("#err_oldPwd").html('');
                $("#err_oldPwd_group").removeClass('has-error');
            }
        });
    }
    function validCheckPwd() {
        if ($("#newPwd").val() == "") {
            $("#err_checkPwd").html("密码不能为空");
            $("#err_checkPwd_group").addClass('has-error');
        }else if ($("#newPwd").val() != $("#checkPwd").val()) {
            $("#err_checkPwd").html("两次密码不正确");
            $("#err_checkPwd_group").addClass('has-error');
        } else {
            $("#err_checkPwd").html("");
            $("#err_checkPwd_group").removeClass('has-error');
        }
    }
</script>

<div class="blog-module shadow">
	<div class="blog-module-title">修改密码</div>

	<div class="member-form">

		<form action="" method="post" class="form-horizontal" novalidate="novalidate">
			<div class="form-body">
				<?php if (strlen($result_error) > 3) { ?>
				<div class="alert alert-danger display-hide" style="display: block;">
					<button class="close" data-close="alert"></button> <?php echo $result_error; ?></div>
				<?php } ?>

				<div id="err_oldPwd_group" class="form-group">
					<label class="col-md-2 control-label">当前密码：</label>
					<div class="col-md-5">
						<div class="input-icon ">
							<i class="fa fa-lock fa-fw"></i>
							<input type="password" class="form-control" onblur="javascript:validOldPwd();" name="password" id="oldPwd" placeholder="当前密码">
						</div>
						<span id="err_oldPwd" class="help-block help-block-error"></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">新的密码：</label>
					<div class="col-md-5">
						<div class="input-icon ">
							<i class="fa fa-lock fa-fw"></i>
							<input type="password" class="form-control" name="password1" id="newPwd" placeholder="新密码"> </div>

						<span class="help-block help-block-error"></span>
					</div>
				</div>
				<div id="err_checkPwd_group" class="form-group">
					<label class="col-md-2 control-label">确认密码：</label>
					<div class="col-md-5">
						<div class="input-icon ">
							<i class="fa fa-lock fa-fw"></i>
							<input type="password" class="form-control" onblur="javascript:validCheckPwd();" name="password2" id="checkPwd" placeholder="确认密码"> </div>

						<span id="err_checkPwd" class="help-block help-block-error"></span>
					</div>
				</div>

			</div>

			<div class="form-actions">
				<div class="row">
					<div class="col-md-offset-2 col-md-3">
						<button type="submit" class="mysubmit btn green"><i class="fa fa-save"></i> 保存</button>
					</div>
				</div>
			</div>

		</form>

	</div>
</div>



<?php if ($fn_include = $this->_include("mfooter.html")) include($fn_include); ?>