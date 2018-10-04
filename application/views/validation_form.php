<!DOCTYPE html>
<html>
	<head>
		<title>Validation Example</title>

		<!--CSS-->
	    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<style type="text/css">
			.error
			{
				color: red;
			}

			.customfocus
			{
			    border: 1px solid red !important;
			}

			.successfocus
			{
				border: 1px solid red !important;
			}
		</style>

		<!--Angular with additional JS-->
    	
		<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.js"></script>
	    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular-animate.js"></script>
	    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular-sanitize.js"></script>
	    <script src="//angular-ui.github.io/bootstrap/ui-bootstrap-tpls-2.5.0.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-messages/1.5.7/angular-messages.min.js"></script>
  		
		<!--Bootrap 4-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>		

		<?php
            require_once(APPPATH."views/base/validation_js.php");
        ?>	
	</head>
	<body ng-app="myApp">	
		<div ng-controller="myCtrl">
			<h3>AngularJs Validation </h3><hr>
			<form name="myform">
				<!-- Only Alphabetic-->
				<div class="row">
					<div class="col-lg-2">
						<label>Only Alphabetic</label>
					</div>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="myname" ng-model="myname" ng-pattern="/^[a-zA-Z\s]*$/" required="" disallow-spaces>
						<span class="error" ng-show="showMsgs && myform.myname.$error.required"><?php echo $this->lang->line('required');?></span>
						<span class="error" ng-show="myform.myname.$error.pattern"><?php echo $this->lang->line('alphabetic_val');?></span>
					</div>
				</div><br>

				<!--Only Numbers-->
				<div class="row">
					<div class="col-lg-2">
						<label>Only Number</label>
					</div>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="onlyNumber" ng-model="onlyNumber" ng-pattern="/^[0-9]*$/" required="">
						<span class="error" ng-show="showMsgs && myform.onlyNumber.$error.required"><?php echo $this->lang->line('required');?></span>
						<span class="error" ng-show="myform.onlyNumber.$error.pattern"><?php echo $this->lang->line('numeric_val');?></span>
					</div>
				</div><br>

				<!--Only Number with Keys-->
				<div class="row">
					<div class="col-lg-2">
						<label>Only Number With Keys</label>
					</div>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="onlyNumberkeys" ng-model="onlyNumberkeys" ng-pattern="/^[0-9]*$/" required="" allow-only-numbers>
						<span class="error" ng-show="showMsgs && myform.onlyNumberkeys.$error.required"><?php echo $this->lang->line('required');?></span>
						<span class="error" ng-show="myform.onlyNumberkeys.$error.pattern"><?php echo $this->lang->line('numeric_val');?></span>
					</div>
				</div><br>

				<!--Pincode-->
				<div class="row">
					<div class="col-lg-2">
						<label>Pincode</label>
					</div>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="pincode" ng-model="pincode" ng-pattern="/^[0-9]{6}$/" maxlength="6" required/>
						<span class="error" ng-show="showMsgs && myform.pincode.$error.required"><?php echo $this->lang->line('required');?></span>
						<span class="error" ng-show="myform.pincode.$error.pattern"><?php echo $this->lang->line('pincode_val');?></span>
					</div>
				</div><br>

				<!--Email-->
				<div class="row">
					<div class="col-lg-2">
						<label>Email</label>
					</div>
					<div class="col-lg-8">
						<input type="email" class="form-control" name="email" ng-model="email" required/>
						<span class="error" ng-show="showMsgs && myform.email.$error.required"><?php echo $this->lang->line('required');?></span>
						<span class="error" ng-show="myform.email.$error.email"><?php echo $this->lang->line('email_val');?></span>
					</div>
				</div><br>

				<!--Mobile-->
				<div class="row">
					<div class="col-lg-2">
						<label>Mobile</label>
					</div>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="mobile" ng-model="mobile" ng-pattern="/^[0-9]{10}$/" maxlength="10" required allow-only-numbers/>
						<span class="error" ng-show="showMsgs && myform.mobile.$error.required"><?php echo $this->lang->line('required');?></span>
						<span class="error" ng-show="myform.mobile.$error.pattern"><?php echo $this->lang->line('mobile_val');?></span>
					</div>
				</div><br>

				<!--Mobile With Code-->
				<div class="row">
					<div class="col-lg-2">
						<label>Mobile with code</label>
					</div>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="mobileCode" ng-model="mobileCode" ng-pattern="/\+\d{2}-\d{10}/" required placeholder="+91-98765XXXXX" />
						<span class="error" ng-show="showMsgs && myform.mobileCode.$error.required"><?php echo $this->lang->line('required');?></span>
						<span class="error" ng-show="myform.mobileCode.$error.pattern"><?php echo $this->lang->line('mobile_val');?></span>
					</div>
				</div><br>

				<!--URL-->
				<div class="row">
					<div class="col-lg-2">
						<label>URL</label>
					</div>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="url" ng-model="url" ng-pattern="/^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/" required placeholder="" />
						<span class="error" ng-show="showMsgs && myform.url.$error.required"><?php echo $this->lang->line('required');?></span>
						<span class="error" ng-show="myform.url.$error.pattern"><?php echo $this->lang->line('url_val');?></span>
					</div>
				</div><br>

				<!--Password-->
				<div class="row">
					<div class="col-lg-2">
						<label>Password</label>
					</div>
					<div class="col-lg-8">
						<input type="password" class="form-control" name="user_password" placeholder="password" required ng-model="user_password" password-verify="{{confirm_password}}" ng-pattern="/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z_@!%*./#&+-]{8,}$/">
						<span class="error" ng-show="showMsgs && myform.user_password.$error.required"><?php echo $this->lang->line('required');?></span>
						<span class="error" ng-show="myform.user_password.$error.pattern">
							<?php echo $this->lang->line('password_val');?>
						</span>				       
					</div>
				</div><br>

				<!--Confirm Password-->
				<div class="row">
					<div class="col-lg-2">
						<label>Confirm Password</label>
					</div>
					<div class="col-lg-8">
						<input class="form-control" ng-model="confirm_password" name="confirm_password" type="password" placeholder="confirm password" required password-verify="{{user_password}}">
						<span class="error" ng-show="showMsgs && myform.confirm_password.$error.required"><?php echo $this->lang->line('required');?></span>

				        <div class="error" ng-messages="myform.confirm_password.$error" ng-if=" myform.confirm_password.$dirty">
				          <p ng-message="minlength">This field is too short</p>
				          <p ng-message="maxlength">This field is too long</p>
				          <p ng-message="passwordVerify">Password do not match</span>
				        </div>						
					</div>
				</div><br>				
				

				<button class="btn btn-primary" type="submit" ng-click="submited('myform')"> Submit Form </button>
			</form>
		</div>
		<br /><br/>

		<div ng-controller="ModalCtrl as $ctrl" class="modal-angular">
			<script type="text/ng-template" id="ModalContent.html">
		        <div class="modal-header">
		            <h3 class="modal-title" id="modal-title">I'm a modal!</h3>
		        </div>
		        <div class="modal-body" id="modal-body">
		            <h3>Angular Modal</h3>
		        </div>
		        <div class="modal-footer">
		            <button class="btn btn-primary" type="button" ng-click="$ctrl.ok()">OK</button>
		            <button class="btn btn-warning" type="button" ng-click="$ctrl.cancel()">Cancel</button>
		        </div>
		    </script>
		    <h3>Angular Modal</h3><hr>
		    <button type="button" class="btn btn-primary" ng-click="$ctrl.open()">Open me!</button>
		</div>		
	</body>
</html>