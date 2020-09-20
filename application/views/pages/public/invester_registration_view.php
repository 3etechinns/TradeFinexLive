<section class="create_account padding_40">
<div class="container">
	<div class="row">
		<div class="col-md-5 col-xs-12 text-center sign_up_box">
			<div class="sign_up">
				<h3>Start Investing - Signup Now</h3>
				<?php
					$attributes = array('id' => 'signupValidusForm', 'class' => 'create_form', 'method' => 'post');
					echo form_open_multipart(base_url().'publicv/investerRegistration', $attributes);
				?>
					<div class="form-group mb-15">
						<label for="name">Name</label>
							<input class="form-control" name="first_name" id="first_name" type="text" tabindex="1" />
						</label>
					</div>
					<div class="form-group mb-15">
						<label for="email">Email ID</label>
							<input class="form-control" name="email" id="email" type="text" tabindex="2" />
						</label>
					</div>                    
                                        <div class="form-group mb-15">
						<label for="mmob">Mobile No.</label>
							<input class="form-control" id="mmob" name="mmob" type="text" tabindex="3" autocomplete="" />
						</label>
					</div>
                    
					<!--<div class="form-group focus-group">
						<label class="form-label">
							<input class="form-input input-focus" name="last_name" id="last_name" type="text" tabindex="2" /><span class="form-name floating-label">LAST NAME<sup>*</sup></span>
						</label>
					</div>
                    <div class="form-group focus-group">
						<label class="form-label">
							<input class="form-input input-focus" name="password" id="password" type="password" tabindex="4" /><span class="form-name floating-label">PASSWORD<sup>*</sup></span>
						</label>
					</div>
					<div class="form-group focus-group">
						<label class="form-label">
							<input class="form-input input-focus" name="password_confirmation" id="password_confirmation" type="password" tabindex="5" /><span class="form-name floating-label">CONFIRM PASSWORD<sup>*</sup></span>
						</label>
					</div>					
					<div class="form-group focus-group reg_otp">
						<label class="form-label">
							<input class="form-input input-focus" id="register_otp" name="register_otp" type="text" maxlength="8" tabindex="6" /><span class="form-name floating-label">ACCESS CODE<sup>*</sup></span><span class="append_icon_text hover_tooltip" style="font-size:16px;position:absolute;top:13px;right:5px;"><i class="fa fa-info-circle"></i><span class="hover_tooltiptext" title="" style="width: 175px;"> <a href="<?=base_url('publicv/contact')?>">Contact us</a> to get access code</span></span>
						</label>
						<img class="otp_sucess" src="<?=base_url()?>assets/images/icon/right.png" alt="OTP Success" />
					</div>-->
					<div class="form-group">
<!--						<div class="col-md-12 register_as">-->
							<label for="signupName">Register as</label>
						<!--</div>--> 
						<div class="radio_reg_group">
							<?php
								$i = 0; $c = 0;
								if((isset($_GET['i'])) || (!isset($_GET['c']))){
									$i = 1;
								}
								if(isset($_GET['c'])){
									$c = 1;
								}
							?>
							<div class="col-md-4 col-sm-4 col-xs-4 radio radio-danger">
                                                            <input type="radio" name="user_type" class="radio " value="1" <?=(($i == 1) ? 'checked="checked"' : '');?>  />
								<label for="checkbox4">Individual</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4 radio radio-danger">
							    <input type="radio" name="user_type" class="radio " value="2" <?=(($c == 1) ? 'checked="checked"' : '');?> />
								<label for="checkbox4">Corporate</label>
							</div>
							<!--<div class="col-md-4 col-sm-4 col-xs-4 radio radio-danger">
								<input name="user_type" class="user_radio user_type" value="2" <?=(($f == 1) ? 'checked="checked"' : '');?> type="radio">
								<label for="checkbox4">Financier</label>
							</div>-->
						</div>
					</div>
					<div class="row">
						<span class="otp_error error"></span>
						<?php echo $this->session->flashdata('error_signup'); ?>
					</div>

					<div class="checkbox">
						<input type="checkbox" id="agree" data-keyboard="false" onchange="document.getElementById('signupSubmit').disabled = !this.checked;"/>
						<label class="form-label"> I acknowledge that Eligibility to invest on the Validus platform requires Qualification under Accredited Investor status as per Singapore law.</label>
					</div>
					<input type="hidden" name="action" value="signup" />
					<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
					<div class="btn-more" style="float:none;"><button id="signupSubmit" type="submit" class="btn btn-info" disabled="disabled"> Sign Up </button> </div>

					
				</form>
			</div>
		</div>
		<div class="col-md-3 hidden-xs"> </div>
	</div>
</div>

 </div>


</section>


<?php //$this->load->view('includes/block_features') ?>
<?php $this->load->view('includes/login_modal') ?>


