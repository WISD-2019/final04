<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog" >
		 <div class="modal-content">
			<br>
			<div class="bs-example bs-example-tabs">
				<ul id="myTab" class="nav nav-tabs">
					<li class="nav-item"><a class="nav-link active" href="#signin" data-toggle="tab">Sign In</a></li>
					<li class="nav-item"><a class="nav-link" href="#signup" data-toggle="tab">Register</a></li>
					<li class="nav-item"><a class="nav-link" href="#why" data-toggle="tab">Why?</a></li>
				</ul>
			</div>
			<div class="modal-body">
				<div id="myTabContent" class="tab-content">
					<div class="container tab-pane fade" id="why">
						<p>We need this information so that you can receive access to the site and its content. Rest assured your information will not be sold, traded, or given to anyone.</p>
						<p></p><br> Please contact <a mailto:href="JoeSixPack@Sixpacksrus.com"></a>JoeSixPack@Sixpacksrus.com</a> for any other inquiries.</p>
					</div>
					<div class="container tab-pane active" id="signin">
						<form class="form-horizontal"  action="{{route('login')}}" method="post">
						<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

						<fieldset>
						<!-- Sign In Form -->
						<!-- Text input-->
						<div class="control-group">
							<label class="control-label" for="account">帳號:</label>
							<div class="controls">
							  <input required=""  name="account" type="text" class="form-control" placeholder="JoeSixpack" class="input-medium" required="">
							</div>
						</div>

							<!-- Password input-->
						<div class="control-group">
							<label class="control-label" for="passwordinput">密碼:</label>
							<div class="controls">
								<input required="" id="passwordinput" name="passwordinput" class="form-control" type="password" placeholder="********" class="input-medium">
							</div>
						</div>


						<!-- Button -->
						<div class="control-group">
							<label class="control-label" for="signin"></label>
							<div class="controls">
								<button name="action" class="btn btn-success" value="login">Sign In</button>
							</div>

						</div>
						</fieldset>
						</form>
					</div>
					<div class="container tab-pane fade" id="signup">
						<form class="form-horizontal" action="{{route('reg')}}" method="post">
						<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
						<fieldset>
						<!-- Sign Up Form -->
						<!-- Text input-->

						<div class="control-group">
							<label class="control-label" for="license">車牌：</label>
							<div class="controls">
							<input id="license" name="license" class="form-control" type="text" placeholder="QQQ-1234" class="input-large" required="">
							</div>
						</div>

						<!-- Text input-->
						<div class="control-group">
							<label class="control-label" for="email">E-mail</label>
							<div class="controls">
								<input id="email" name="email" class="form-control" type="text" placeholder="123@gm.com" class="input-large" required="">
							</div>
						</div>

						<!-- Text input-->
						<div class="control-group">
							<label class="control-label" for="username">姓名：</label>
							<div class="controls">
								<input id="username" name="username" class="form-control" type="text" placeholder="張三" class="input-large" required="">
							</div>
						</div>
						<!-- Text input-->
						<div class="control-group">
							<label class="control-label" for="account">帳號：</label>
							<div class="controls">
								<input  name="account" class="form-control" type="text" placeholder="123456" class="input-large" required="">
							</div>
						</div>

						<!-- Password input-->
						<div class="control-group">
							<label class="control-label" for="password">Password:</label>
							<div class="controls">
							<input id="password" name="password" class="form-control" type="password" placeholder="********" class="input-large" required="">
								<em>1-8 Characters</em>
							</div>
						</div>

						<!-- Button -->
						<div class="control-group">
							<label class="control-label" for="confirmsignup"></label>
							<div class="controls">
								<button name="action" class="btn btn-success" value="reg">Sign Up</button>
							</div>
						</div>
						</fieldset>
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		  </div>
	</div>
</div>
