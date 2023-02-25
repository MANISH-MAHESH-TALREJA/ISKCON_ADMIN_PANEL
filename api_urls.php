<?php $page_title="Api Urls";

include("includes/header.php");
include("includes/function.php");

$file_path = getBaseUrl().'api.php';

?>
<div class="row">
	<div class="col-sm-12 col-xs-12">
		    <?php
    if(isset($_SERVER['HTTP_REFERER']))
    {
      echo '<a href="'.$_SERVER['HTTP_REFERER'].'"><h4 class="pull-left" style="font-size: 20px;color: #e91e63"><i class="fa fa-arrow-left"></i> Back</h4></a>';
    }
    ?>

		<div class="card">
			<div class="card-header">
				Example API urls
			</div>
			<div class="card-body no-padding">
				
				<pre><code class="html">
					<br><b>API URL</b>&nbsp; <?php echo $file_path;?>

					<br><b>Home Status</b> (Method: get_home) (Parameters: user_id)
					<br><b>Category List</b> (Method: get_category) (Parameters: ads_param,page)
					<br><b>Category Wise Diets</b> (Method: diet_by_cat) (Paramater: ads_param, cat_id, page)
					<br><b>Single Diet</b> (Method: single_diet) (Parameters: user_id, ads_param, diet_id)
					<br><b>Recent View All</b>(Method: recent_views_all) (Parameters: user_id, page, ads_param,type[video, diet])
					<br><b>Recent Video</b> (Method: recent_video) (Parameters: user_id, video_id)
					<br><b>Search Diet</b> (Method: search_diet) (Parameters: ads_param, search_text,page)
					<br><b>Video list</b> (Method: video_list) (Parameters: user_id, ads_param ,page)
					<br><b>Search Video</b> (Method: video_search) (Parameters: user_id, search_text,page, ads_param)
					<br><b>User Register</b> (Method: user_register) (Parameter: type [google,normal,facebook] name,email,password,phone,auth_id,device_id)
					<br><b>User Login</b> (Method: user_login) (Parameter: email, password)
					<br><b>Check User Status</b>(Method: user_status) (Parameter: user_id)
					<br><b>User Profile</b> (Method: user_profile) (Parameter: user_id)
					<br><b>User Profile Update</b> (Method: user_profile_update) (Parameter: user_id, name, email,phone ,is_remove[true, false]) (File: user_image)
					<br><b>Forgot Password</b> (Method: user_forgot_pass) (Parameter: email)
					<br><b>Change Password</b> (Method: change_password) (Parameters: user_id, old_password, new_password)
					<br><b>Add Favourite/Unfavourite</b> (Method: add_favourite) (Parameters: id, user_id, type[video, diet])
					<br><b>Get Favorite List</b> (Method: get_favourite_list) (Parameters: user_id, type[video, diet], ads_param, page)
					<br><b>Contact Subjects</b> (Method: get_contact) (Parameter: user_id)
					<br><b>User Contact Us</b> (Method: user_contact_us) (Parameter: contact_email,contact_name,contact_phone,contact_msg,contact_subject)
					<br><b>Add Bmi(body mass index)</b> (Method: add_bmi) (Parameters: user_id, bmi_score, bmi_status, gender[MALE,FEMALE])
					<br><b>Bmi List(body mass index)</b> (Method: get_bmi_history) (Parameter: user_id, page)
					<br><b>Delete Bmi(body mass index)</b>(Method: delete_bim_calculator)(Parameter: id, user_id)
					<br><b>App Terms & Conditions</b>(Method: app_terms_conditions)
					<br><b>App Privacy Policy</b> (Method: app_privacy_policy)
					<br><b>App Faq</b> (Method: app_faq)
					<br><b>App About Details</b> (Method: app_about)
					<br><b>App Details</b> (Method: get_app_details)

				</code> 
			</pre>
		</div>
	</div>
</div>
</div>
<br/>
<div class="clearfix"></div>

<?php include("includes/footer.php");?>       
