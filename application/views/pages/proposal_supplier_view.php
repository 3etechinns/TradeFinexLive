<?php  
	
	if((empty($check_company) && is_array($check_company) && sizeof($check_company) == 0) || $check_company[0]->tfcom_cat_ref == 0 || $check_company[0]->tfcom_country_ref == 0 || $uwalleta == '' || trim($uwalletbal) == '' || intval($uwalletbal) == 0){
		
		if($check_company[0]->tfcom_cat_ref == 0 || $check_company[0]->tfcom_country_ref == 0){
			$this->session->set_flashdata("error_company_info", "<font class='alert-danger' style='color:red;font-size: 14px;float: left;margin-top: 5px;'>Please input Company information properly.</font>");
		}
		
		if($uwalleta == '' || trim($uwalletbal) == '' || intval($uwalletbal) == 0){
			$this->session->set_flashdata("error_finance_info", "<font class='alert-danger' style='color:red;font-size: 14px;float: left;margin-top: 5px;'>Please input Finance information properly.</font>");
		}
		
		redirect(base_url().'user/edit');

	} 
	
	if($project_listed_info && !empty($project_listed_info) && is_array($project_listed_info) && sizeof($project_listed_info) <> 0){ 

		$start_date = new DateTime($project_listed_info[0]->postDate);
		$since_start = $start_date->diff(new DateTime(date('Y-m-d H:i:s')));
		$postago = '';
								
		$postago = $since_start->days.' '.($since_start->days > 1 ? 'days' : 'day').' total';
								
		if(intval($since_start->y) > 0){
			$postago = $since_start->y.' '.($since_start->y > 1 ? 'years' : 'year');
		}else{
			if(intval($since_start->m) > 0){
				$postago = $since_start->m.' '.($since_start->m > 1 ? 'months' : 'month');
			}else{
				if(intval($since_start->d) > 0){
					$postago = $since_start->d.' '.($since_start->d > 1 ? 'days' : 'day');
				}else{
					if(intval($since_start->h) > 0){
						$postago = $since_start->h.' '.($since_start->h > 1 ? 'hours' : 'hour');
					}else{
						if(intval($since_start->i) > 0){
							$postago = $since_start->i.' '.($since_start->i > 1 ? 'minutes' : 'minute');
						}else{	
							$postago = $since_start->s.' '.($since_start->s > 1 ? 'seconds' : 'second');
						}
					}
				}
			}
		}
?>

<div class="sub_page_wraper">
	<section class="submit_proposal_common">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-3 col-xs-12 hidden-md hidden-lg hidden-sm">
					<div class="right_part_profile">
						<div class="profile_back"><img src="<?=base_url()?>assets/images/page/back_profile_img.png"></div>
						<div class="profile_img"><img src="<?=(($project_listed_info[0]->tfb_pic_file && $project_listed_info[0]->tfb_pic_file != '') ? base_url().'assets/user_profile_image/'.$project_listed_info[0]->tfb_pic_file : base_url().'assets/images/img/contact_profile_photo.png') ?>" alt="uimg" class="user-img avatar" /> </div>
						<div class="profile_name">
							<h4><?=ucwords($project_listed_info[0]->tfb_fname.' '.$project_listed_info[0]->tfb_lname);?></h4>
							<p>Beneficiary</p>
						</div>
						<div class="project_details">
							<p>Estimated Budget: <?=$project_listed_info[0]->tfcu_name.''.number_format($project_listed_info[0]->fixedBudget, 0, '', ',');?></p>
							<ul class="location">
								<li class="address"><span class="ti-location-pin"></span><?=$project_listed_info[0]->tfc_name; ?></li>
							</ul>
						</div>
						<div class="profile_ratings">
							<?php
								echo set_rating_user($purating);
							?>
							<h5><?=round($purating, 1)?>/5</h5>
						</div>
					</div>
				</div>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<?php
						$attributes = array('id' => 'form_postp_proposal', 'class' => '', 'method' => 'post', 'role' => 'form');
						echo form_open_multipart(base_url().'project/proposal_supplier/', $attributes); 
					?>
						<div class="submit_form_sec">
							<div class="header_title">
								<h4>Price & Tax</h4>
							</div>
							<div class="common_form_sec">
								<div class="row sec_row">
									<div class="col-md-4 col-sm-4 col-xs-12">
										<div class="form-group">
											<label class="form-label <?=($ppriceval > 0 ? 'input-focust' : '') ?>">
												<input type="hidden" id="pcurr" name="pcurr" value="2" />
												<input class="form-input <?=((trim($ppriceval) <> '' && trim($ppriceval) <> 0) ? 'input-focus' : 'input-focus-notr')?>" id="ppriceval" name="ppriceval" type="text" value="<?=($ppriceval > 0 ? $ppriceval : '') ?>" />
												<span class="form-name floating-label">Price [&#36;]<sup>*</sup></span> 
											</label>
										</div>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<div class="form-group">
											<label class="form-label <?=($ppricetax > 0 ? 'input-focust' : '') ?>">
												<input class="form-input <?=((trim($ppricetax) <> '' && trim($ppricetax) <> 0) ? 'input-focus' : 'input-focus-notr')?>" id="ppricetax" name="ppricetax" type="text" value="<?=($ppricetax > 0 ? $ppricetax : '') ?>" />
												<span class="form-name floating-label">Tax Percentage ( % )<sup>*</sup></span> 
											</label>
										</div>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<div class="form-group">
											<label class="form-label <?=($ppricetot > 0 ? 'input-focust' : '') ?>">
												<input class="form-input <?=((trim($ppricetot) <> '' && trim($ppricetot) <> 0) ? 'input-focus' : 'input-focus-notr')?>" id="ppricetot" name="ppricetot" type="text" value="<?=($ppricetot > 0 ? $ppricetot : '') ?>" readonly />
												<span class="form-name floating-label">Total Amount<sup>*</sup></span> 
											</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="submit_form_sec">
							<div class="header_title">
								<h4>Timeline</h4>
							</div>
							<div class="common_form_sec">
								<div class="row sec_row">
									<div class="col-md-4 col-sm-4 col-xs-12">
										<div class="form-group">
											<label class="form-label <?=($pvalid > 0 ? 'input-focust' : '') ?>">
												<input type="hidden" id="pvalidu" name="pvalidu" value="1" />
												<input class="form-input <?=((trim($pvalid) <> '' && trim($pvalid) <> 0) ? 'input-focus' : 'input-focus-notr')?>" id="pvalid" name="pvalid" type="text" value="<?=($pvalid > 0 ? $pvalid : '') ?>" />
												<span class="form-name floating-label">Proposal Validity (Days)<sup>*</sup></span> 
											</label>
										</div>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<div class="form-group">
											<label class="form-label <?=($psleadtime > 0 ? 'input-focust' : '') ?>">
												<input type="hidden" id="psleadtimeu" name="psleadtimeu" value="1" />
												<input class="form-input <?=((trim($psleadtime) <> '' && trim($psleadtime) <> 0) ? 'input-focus' : 'input-focus-notr')?>" id="psleadtime" name="psleadtime" type="text" value="<?=($psleadtime > 0 ? $psleadtime : '') ?>" />
												<span class="form-name floating-label">Supply Lead Validity (Days)<sup>*</sup></span> 
											</label>
										</div>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-12 hide">
										<div class="form-group">
											<label class="form-label <?=($pcommission > 0 ? 'input-focust' : '') ?>">
												<input type="hidden" id="pcommissionu" name="pcommissionu" value="1" />
												<input class="form-input <?=((trim($pcommission) <> '' && trim($pcommission) <> 0) ? 'input-focus' : 'input-focus-notr')?>" id="pcommission" name="pcommission" type="text" value="<?=($pcommission > 0 ? $pcommission : '') ?>" />
												<span class="form-name floating-label">Commission Lead Validity (Days)<sup>*</sup></span> 
											</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="submit_form_sec">
							<div class="header_title">
								<h4>Delivery Details</h4>
							</div>
							<div class="common_form_sec">
								<div class="row sec_row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label class="form-label">
												<textarea rows="5" id="pdeliveryt" name="pdeliveryt" class="form-control form-input <?=(trim($pdeliveryt) <> '' ? 'input-focus' : 'input-focus-notr')?>"><?=$pdeliveryt ?></textarea>
												<span class="form-name floating-label">Delivery Details<sup>*</sup></span> 
											</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="submit_form_sec">
							<div class="header_title">
								<h4>Remarks & Documents</h4>
							</div>
							<div class="common_form_sec">
								<div class="row sec_row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label class="form-label">
												<textarea rows="5" id="premarks" name="premarks" class="form-control form-input <?=(trim($premarks) <> '' ? 'input-focus' : 'input-focus-notr')?>"><?=$premarks ?></textarea>
												<span class="form-name floating-label">Remarks(Optional)</span> 
											</label>
										</div>
									</div>
								</div>
								<div class="row sec_row">
									<div class="col-md-3 col-sm-3 col-xs-12">
										<div class="form-group">
											<h5 class="project_attachment">Attachments (Optional)</h5>
										</div>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<div class="form-group">
											<div class="browse_file custom_fileup">
												<label for="file-upload" class="custom-file-upload">Browse File </label>
												<label class="imgupload ok"><i class="fa fa-check"></i></label>
												<label class="imgupload stop"><i class="fa fa-times"></i></label>
												<label id="namefile"><!--[jpg,jpeg,png,doc,docx,xls,xlsx,pdf,txt]-->
												<?php 
													if($pattachf !== ''){
														echo '<a href="'.base_url().'assets/project_proposals/'.$pattachf.'" target="_blank" title="Download file" style="margin: 5px;font-size: 11px;"><i class="fa fa-download"></i>&nbsp;Proposal Attachment</a>';
													}
												?>
												</label>
												<input id="pdoc" name="pattach" type="file" />
												<input type="hidden" name="pattachf" value="<?=$pattachf ?>" />
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="button_group_sec">
								<div class="col-md-4">
									<div class="btn-more"> 
										<button type="submit" class="btn send_proposal"><?=($prrow == 0 ? 'Send Now' : 'Update Now' ) ?></button>
									</div>
								</div>
							</div>
							<input type="hidden" name="action" value="<?=($prrow == 0 ? 'create_proposal' : 'update_proposal' ) ?>" />
							<input type="hidden" name="prow_id" value="<?=$prrow;?>" />
							<input type="hidden" name="row_id" value="<?=$project_listed_info[0]->ID;?>" />
						</div>
						
					</form>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-12 hidden-xs">
					<div class="right_part_profile">
						<div class="profile_back"><img src="<?=base_url()?>assets/images/page/back_profile_img.png"></div>
						<div class="profile_img"><img src="<?=(($project_listed_info[0]->tfb_pic_file && $project_listed_info[0]->tfb_pic_file != '') ? base_url().'assets/user_profile_image/'.$project_listed_info[0]->tfb_pic_file : base_url().'assets/images/img/contact_profile_photo.png') ?>" alt="uimg" class="user-img avatar" /> </div>
						<div class="profile_name">
							<h4><?=ucwords($project_listed_info[0]->tfb_fname.' '.$project_listed_info[0]->tfb_lname);?></h4>
							<p>Beneficiary</p>
						</div>
						<div class="project_details">
							<p>Estimated Budget: <?=$project_listed_info[0]->tfcu_name.''.number_format($project_listed_info[0]->fixedBudget, 0, '', ',');?></p>
							<ul class="location">
								<li class="address"><span class="ti-location-pin"></span><?=$project_listed_info[0]->tfc_name; ?></li>
							</ul>
						</div>
						<div class="profile_ratings">
							<?php
								echo set_rating_user($purating);
							?>
							<h5><?=round($purating, 1)?>/5</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<?php }else{ ?>
	
	<div class="container" >
		<div class="row">
			<div class="jumbotron thank_sec" >
			   <div id="page_blank_msg" class="bwhite_content">
					<div class="gpopup_head"><a href="javascript:void(0)" onclick="window.location='<?=base_url();?>';document.getElementById('page_blank_msg').style.display='none';"><i class="fa fa-times-circle" aria-hidden="true"></i></a></div>
					<?php 
						echo '<div class="text-center"><img src="'.base_url().'assets/images/icon/error.png" style="width:70px;border:0px;" /></div>'; 
					?>
					<div class="text-center">
						<h3 class='text-center' style="font-size:15px;line-height:20px;color:#000;padding-left:10px;padding-right:10px;">Oops ! Something Wrong. Click <a href="<?=base_url();?>">here</a> to go dashboard.</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="fade" class="black_overlay"></div>
	<script type="text/javascript">
		document.getElementById('fade').style.display = 'block';
		document.getElementById('page_blank_msg').style.display = 'block';
	</script>
	
<?php } ?>

<a id="submitp_btn" data-toggle="modal" data-target="#submit_popup"></a>
<div id="submit_popup" class="modal fade" role="dialog">
	<div class="modal-dialog"> 
    
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close proj_info" row_id="<?=(($proj_row <> 0) ? $proj_row : 0)?>" data-dismiss="modal"> <span class="hidden-xs">×</span> <span class="hidden-md hidden-lg"> <img src="<?=base_url()?>assets/images/icon/log_arrow.png" alt="icon"></span> </button>
			</div>
			<div class="modal-body text-center">
				<span>
					<?php 
						if($msg == 'success'){ 
							echo '<div class="text-center"><img src="'.base_url().'assets/images/icon/right.png" /></div>'; 
						}else{
							echo '<div class="text-center"><img src="'.base_url().'assets/images/icon/cross.png" /></div>'; 
						} 
					?>
				</span>
				<div class="text-center">
				<?php 	
					echo $msg_extra; 
				?>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="proposal_post_msg" class="fwhite_content">
	<?php 
		if($msg == 'success'){ 
			echo '<div class="text-center"><img src="'.base_url().'assets/images/icon/check_success.png" style="width:70px;border:0px;" /></div>'; 
		}else{
			echo '<div class="text-center"><img src="'.base_url().'assets/images/icon/check_fail.png" style="width:70px;border:0px;" /></div>'; 
		} 
	?>
	<div class="text-center">
	<?php 	
		echo $msg_extra; 
	?>
	</div>
</div>							