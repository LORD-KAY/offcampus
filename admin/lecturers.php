<?php
include '../navbars/home_navbar.php';
require_once "../inc/connection.php";

$id = "lord";

if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email'])  && isset($_POST['phone'])  && isset($_POST['region'])  && isset($_POST['district']))
 {
 	$lect_firstname = $_POST['firstname'];
 	$lect_lastname  = $_POST['lastname'];
 	// $lect_fullName	= $lect_firstname. " " . $lect_lastname;
 	$lect_email 	= "example@.com";
    $lect_phone		= $_POST['phone'];
    $lect_region 	= $_POST['region'];
 	$lect_district  = $_POST['district'];

 	$lect_indicator = substr($lect_district,0,4);

 	$default_image = "images/boys.jpg";

 	$lect_insert = "INSERT INTO lecturer(lect_firstname,lect_lastname,region,lect_district,lect_indicator,phone_number,email,lect_image) VALUES('$lect_firstname','$lect_lastname','$lect_region','$lect_district','$lect_indicator','$lect_phone','$lect_email','$default_image')";

 	$lect_res = $mysqli->query($lect_insert);

 	
 }
 else{
 	
 }

 //updating the data in the database
 
if (isset($_POST['update_firstname']) && isset($_POST['update_lastname'])   && isset($_POST['update_phone'])  && isset($_POST['update_region'])  && isset($_POST['update_district']) && isset($_POST['data_id']))
 {
 	$update_firstname = $_POST['update_firstname'];
 	$update_lastname  = $_POST['update_lastname'];
 	// $lect_fullName	= $lect_firstname. " " . $lect_lastname;
 	$update_email 	= "example@.com";
    $update_phone		= $_POST['update_phone'];
    $update_region 	= $_POST['update_region'];
 	$update_district  = $_POST['update_district'];

 	$update_id 		 = $_POST['data_id'];

 	//updating the data in the database
 	$lect_update = "UPDATE lecturer SET lect_firstname = '$update_firstname',lect_lastname = '$update_lastname',phone_number = '$update_phone',region='$update_region', lect_district='$update_district' WHERE lect_ID = '$update_id'";
 	$lect_update_res = $mysqli->query($lect_update);

 	if ($lect_update_res) 
 	{
 		echo "Updated with data shosdfd ";
 	}
 	
 }
 else{
 	
 }

?>
<head>
	<title>OCTPs&reg; | Lecturers' List</title>
		<style type="text/css">
		h5.stud_list_title{
		  font-weight: 400;
		  font-size: 17px;
		}
		h5 >i.view{
			margin-top:-3px;
		}
		div.stud_list{
			background-color: #e9e9e9;
			border-left: 2px solid lightblue;
			transition: 0.2s all ease-in;
			-webkit-transition:0.2s all ease-in;
			-moz-transition:0.2s all ease-in;
			-ms-transition:0.2s all ease-in;
			-o-transition:0.2s all ease-in;
			
		}
		div.bgColor_list{
			background-color: #e9e9e9;
			border-left: 2px solid lightblue;
			transition: 0.2s all ease-in;
			-webkit-transition:0.2s all ease-in;
			-moz-transition:0.2s all ease-in;
			-ms-transition:0.2s all ease-in;
			-o-transition:0.2s all ease-in;
		}

		div.stud_list:hover{
			background-color: #ffffff;
			cursor: pointer;
			transition: 0.1s all ease-in;
			-webkit-transition:0.1s all ease-in;
			-moz-transition:0.1s all ease-in;
			-ms-transition:0.1s all ease-in;
			-o-transition:0.1s all ease-in;
		}


		div.afterEffect:hover{
			background-color: #ffffff;
			cursor: pointer;
			transition: 0.1s all ease-in;
			-webkit-transition:0.1s all ease-in;
			-moz-transition:0.1s all ease-in;
			-ms-transition:0.1s all ease-in;
			-o-transition:0.1s all ease-in;
		}
		div.checkedBg{
			background-color: #ffffff;
		}
		span.image{
			width: 50px;
			height: auto;
			
		}
		span.image > img{
			width: 40px;
			height: 40px;
			margin-top: 8px;
			border:3px solid rgba(0,0,0,0.25);
		}
		span.name{
			position: relative;
			top: 17px;
			left: 0px;
			font-weight: 500;
		}
		span.email{
			position: relative;
			top: 17px;
			font-weight: 500;
		}
		span.email > a{
			color: black;
		}
		span.email > a:hover{
			text-decoration: underline;
			white-space: nowrap;
			text-overflow: ellipsis;
		}
		span.phone,span.side_menu{
			position: relative;
			top: 17px;
			font-weight: 500;
		}
		.mt10{
			margin-top: 13px;
			display: none;
			padding: 2px 2px 2px 2px;
			/*background-color: rgba(0,0,0,0.25);
			border-bottom-right-radius: 50%;
			border-bottom-left-radius: 50%;
			border-top-right-radius: 50%;
			border-top-left-radius: 50%;*/
			color: #929292;
		}
		.mt11{
			margin-top: 13px;
			display: none;
			padding: 2px 2px 2px 2px;
			/*background-color: rgba(0,0,0,0.25);
			border-bottom-right-radius: 50%;
			border-bottom-left-radius: 50%;
			border-top-right-radius: 50%;
			border-top-left-radius: 50%;*/
			color: #929292;
		}
		a#edit{

		}
		
		div.empty_list{
			position: relative;
			margin: 50px auto;
			width: 200px;
			height: 200px;
		}
		div.image_list{
			position: absolute;
			top: 60px;
			left: 0;
			right: 0;
		}
		span.empty_title{
			font-family: 'Open Sans', sans-serif;
			font-size: 14px;
			font-weight: 600;
			line-height: 1;
			text-align: center;
			margin-left: 26px;
		}
		span#checkmate{
			visibility: hidden;
			opacity: 0;
		}
		
	</style>
</head>
<body>
	 <div class="main-page">
		<div class="row">
			<div class="col s2 m2 l2" id="side-pane">
				<?php include '../navbars/sidenav.php'; ?>
			</div>
			<div class="col s10 m10 l10 animated fadeIn">
				<div class="content_body">

					<div class="row">
						<div class="col s12 m12 l12" id="lecturer_lair">
							<h5 class="grey-text text-accent-3 left-align stud_list_title"><i class="material-icons left view">view_list</i>Lecturers' List</h5>
							<?php
							$qs = "SELECT * FROM lecturer ORDER BY lect_firstname ASC";
							$res = $mysqli->query($qs);
							$count = $res->num_rows;
							
							//using conditional statement to compare the values and the variables
							if ($count > 0) 
							{
								while ($row = $res->fetch_array(MYSQLI_BOTH))
									{
										$lect_id    = $row['lect_ID'];
										$lect_image = $row['lect_image'];
										$lect_fullName = $row['lect_firstname']." ".$row['lect_lastname'];
										$lect_district_name = $row['lect_district'];
										$lect_dist = $row['lect_indicator'];
										$lect_region   = $row['region'];
										$lect_email    = $row['email'];
										$lect_phone    = $row['phone_number'];

										//Usual firstname and the lastname query
										$lect_firstname = $row['lect_firstname'];
										$lect_lastname  = $row['lect_lastname'];

										//using generated random numbers
										$space_stripping = substr($lect_fullName, 0,4).mt_rand();
										$user_checkmate = str_replace(' ','', $space_stripping);
										$user_checkmate1 = substr($lect_fullName, -3).mt_rand();

										$user_edit     = substr($lect_region, 0,4).mt_rand();
										$user_delete   = substr($lect_region, -3).mt_rand();

										$user_image  = substr($lect_email, 0,3).mt_rand();
										$lect_district = lect_dist.mt_rand();

										//Generating random colors scheme
										$number_gen = mt_rand(1,9);

										$str = 'abcdef';
										$shuffled = str_shuffle($str);


								?>
								<div class="card-panel z-depth-0 waves-effect waves-block waves-ripple col s12 stud_list list1" id="<?php echo "$lect_id";?>"" style="background-color:#<?php echo "$random";?>">
									<div class="col s2 m2 l2">
										<span class="image" id="<?php echo "$user_image";?>"><img id="<?php echo "$user_image";?>" src="../<?php echo "$lect_image";?>" alt="avatar" class="responsive-img circle"></span>
										 <span class="<?php echo "$user_checkmate";?>" id="checkmate" style="position: relative;top: -7px;left: -33px;">
										 	<input name="lectList[]" type="checkbox" id="<?php echo "$user_checkmate1";?>" class="checkbox" value="<?php echo "$lect_id";?>"/>
				      			 		 	<label for="<?php echo "$user_checkmate1";?>"></label> 
										 </span>
									</div>
									
									<div class="col s3 m3 l3" id="<?php echo "$lect_district";?>">
										<span class="name left-align"><?php echo $lect_fullName;?></span>
									</div>
									<div class="col s2 m2 l2" id="<?php echo "$lect_district";?>">
										<span class="phone"><?php echo $lect_district_name; ?></span>
									</div>
									<div class="col s3 m3 l3" id="email">
										<span class="email left-align"><a href="#">+233<?php echo "$lect_phone";?></a></span>
									</div>
									
									<div class="col s2 m2 l2">
										<span class="side_menu">
											<a>
												<i id="<?php echo "$user_delete";?>" class="material-icons right mt10 tooltipped <?php echo "$lect_district";?>" data-tooltip="Delete" data-delay="5" data-position="bottom">delete</i>
											</a>
											<a href>
												<i id="" class="material-icons right mt10 tooltipped <?php echo "$lect_district";?>" data-tooltip="Move To Archives" data-position="bottom" data-delay="5">archive</i>
											</a>
											<a>
												<i id="<?php echo "$user_edit";?>" class="material-icons right mt10 tooltipped <?php echo "$lect_district";?>" data-tooltip="Edit" data-position="bottom" data-delay="5">mode_edit</i>
											</a>
										</span>

									</div>
								</div>
								<script type="text/javascript">
									//Configuration fo the phone number array
									var phoneray = [];
									var phoneCount = 0;
									//configuration for the email array
									var mailray = [];
									var mailCount = 0;
									//configuration for the multiselect arrays and count
									var arrayCount = 0;
									var arr = [];
									$("span.<?php echo "$user_checkmate";?>").css("visibility","hidden");
									var res = 0;
									var count = 0;
									$(document).ready(function(){
										$("div#<?php echo "$lect_id";?>").hover(
											function(){
											 $("i.<?php echo "$lect_district";?>").css("display","block");
											 $("img#<?php echo "$user_image";?>").css({"visibility":"hidden","opacity":"0"});
											},
											function(){
											  $("i.<?php echo "$lect_district";?>").css("display","none");

											  $("img#<?php echo "$user_image";?>").css({"visibility":"visible","opacity":"1"});
											}

										);

										var Name = "<?php echo "$lord"; ?>";
										$("#<?php echo "$lect_district";?>").click(function(){
											$.sweetModal({
													title: '<div class="col s12 m12 l12">\
													\			<div class="col s2 m2 l2" id="<?php echo "$lect_id";?>">\
													\				<img src="../images/boys.jpg" style="width:80px; height=80px;border:4px solid rgba(0,0,0,0.25);" class="circle responsive-img overview">\
																</div>\
													\			<div class="col s8 m8 l8">\
													\				<span class="name" style="position:absolute;top:50px;left:135px;"><?php echo "$lect_fullName";?></span>\
													\				<span class="more_vert"><a href="" style="position:absolute;top:20px;right:60px;"><i class="material-icons right grey-text text-darken-2">delete</i></a><a href="" style="position:absolute;top:20px;right:100px;"><i class="material-icons right grey-text text-darken-2">archive</i></a></span>\
																<div>\
															</div>',

													content: '<form action="" method="post">\
												                <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
													                <i class="material-icons prefix" id="icon_prefix">person_pin</i>\
													                <input type="text" name="firstname" class="validate" value="<?php echo "$lect_firstname";?>" disabled style="font-size:14px;font-weight:400;line-height:1;color:#919191;">\
													                <label for="firstname" class="active">First Name</label>\
												                </div>\
												                <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
													                <i class="material-icons prefix" id="icon_prefix">person_pin</i>\
													                <input type="text" name="lastname" class="validate" value="<?php echo "$lect_lastname";?>" disabled style="font-size:14px;font-weight:400;line-height:1;color:#919191;">\
													                <label for="icon_prefix" class="active">Last Name</label>\
												                </div>\
												                <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
													                <i class="material-icons prefix" id="icon_prefix">perm_phone_msg</i>\
													                <input type="text" name="phone"  value="<?php echo "$lect_phone";?>" class="validate" disabled style="font-size:14px;font-weight:400;line-height:1;color:#919191;">\
													                <label for="icon_prefix" class="active">Phone Number</label>\
												                </div>\
												                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
													                <i class="material-icons prefix" id="icon_prefix">person_pin_circle</i>\
													                <input type="text" name="district"  value="<?php echo "$lect_district_name";?>" class="validate" disabled style="font-size:14px;font-weight:400;line-height:1;color:#919191;">\
													                <label for="icon_prefix" class="active">District Of Choice</label>\
												                </div>\
												           </form>',
													width  : '680px'
												});
										});

										 $("i#<?php echo "$user_edit";?>").on('click',function(){
										 		$.sweetModal({
												title: 'Edit User Credentials',
												content: '<form action="" method="post">\
												                <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;" id="<?php echo "$lect_id";?>">\
													                <i class="material-icons prefix" id="icon_prefix">person_pin</i>\
													                <input type="text" name="firstname" class="validate" id="firstname" value="<?php echo "$lect_firstname";?>">\
													                <label for="icon_prefix" class="active">First Name</label>\
												                </div>\
												                <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
													                <i class="material-icons prefix" id="icon_prefix">person_pin</i>\
													                <input type="text" name="lastname" class="validate" id="lastname" value="<?php echo "$lect_lastname";?>">\
													                <label for="icon_prefix" class="active">Last Name</label>\
												                </div>\
												                <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
													                <i class="material-icons prefix" id="icon_prefix">perm_phone_msg</i>\
													                <input type="text" name="phone" id="phone" class="validate" value="<?php echo "$lect_phone";?>">\
													                <label for="icon_prefix" class="active">Phone Number</label>\
												                </div>\
												                <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
													                <i class="material-icons prefix" id="icon_prefix">place</i>\
													                <input type="text" name="region" id="region" class="validate" value="<?php echo "$lect_region";?>">\
													                <label for="icon_prefix" class="active">Region Of Choice</label>\
												                </div>\
												                <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
													                <i class="material-icons prefix" id="icon_prefix">person_pin_circle</i>\
													                <input type="text" name="district" id="district" class="validate" value=<?php echo "$lect_district_name";?>>\
													                <label for="icon_prefix" class="active">District Of Choice</label>\
												                </div>\
												           </form>',
												width:'500px',

												buttons: {
													updateButton:{
														label: 'Update Data',
														classes : 'blueB flat',
														action:function(){
															var update_firstname = $('#firstname').val();
															var update_lastname = $('#lastname').val();
															var update_phone = $('#phone').val();
															var update_region = $('#region').val();
															var update_district = $('#district').val();

															var data_id 		= "<?php echo "$lect_id";?>";

															//Returns successfull data submission message
															var dataString = "update_firstname="+ update_firstname + "&update_lastname="+ update_lastname +"&update_phone="+ update_phone + "&update_region="+update_region + "&update_district="+update_district + "&data_id="+data_id;
															if(update_firstname == '' || update_lastname == '' || update_district == '' )
															 {
															 	$.sweetModal({
															 		content:"Fields Cannot Be Empty",
															 		icon   :$.sweetModal.ICON_ERROR,
															 		width : '400px'

															 	});
															 }
															 else
															 {
															 	$.ajax({
															 		type:"POST",
															 		url:"lecturers.php",
															 		data: dataString,
															 		success: function()
															 		{
															 			setTimeout(function() {
															 					//Then something should happen here
																 			$.sweetModal({
																 				content: "Details Updated Successfully !",
																 				icon   : $.sweetModal.ICON_SUCCESS,
																 				width:'350px',
																 				timeout: 2600,
																 				showCloseButton:false
																 			});
															 			}, 3000);
															 			setTimeout(function() {
															 					window.location.reload();
															 			}, 4000);
															 		}
															 	});
															 }
															 console.dir(update_firstname + update_lastname +update_phone + update_region + update_district + data_id);

														}
													},
													cancelButton:{
														label: 'Cancel',
														classes: 'secondaryB bordered flat',
														action: function(){

														}
													}
												}								
											});
										});
										
										//Configuring the delete button for the lecturer operations
										$("i#<?php echo "$user_delete"; ?>").on('click',function(){
											 $.sweetModal({
											 	title: 'Are You Sure ?',
											 	icon : $.sweetModal.ICON_WARNING,
											 	content: 'These Details Will Permanently Be Deleted.',
											 	width : '400px',
											 	buttons:{
											 		deleteButton:{
											 			label:'Delete',
											 			classes: 'redB bordered',
											 			action : function()
											 			{
											 				var delete_id = "<?php echo "$lect_id";?>";
											 				var dataString = "delete_id="+delete_id;

											 				if (delete_id == '')
											 				 {
											 				 	$.sweetModal({
											 				 		icon:$.sweetModal.ICON_ERROR,
											 				 		width:'400px',
											 				 		content:'Fatal Error Has Occurred, Contact Your Super Admin',
											 				 		timeout:4000
											 				 	});
											 				 }
											 				 else{
											 				 	$.ajax({
											 				 		type:"POST",
											 				 		url : "lecturers.php",
											 				 		data: dataString,
											 				 		success:function()
											 				 		{
											 				 			setTimeout(function() {
											 				 				$.sweetModal({
											 				 					content:'Delete Successfully',
											 				 					icon:$.sweetModal.ICON_SUCCESS,
											 				 					width:'350px',
											 				 					showCloseButton:false,
											 				 					timeout:2600
											 				 				});
											 				 			}, 3000);
											 				 			setTimeout(function() {
											 				 				window.location.reload();
											 				 			}, 4000);
											 				 		}
											 				 	});
											 				 }
											 				 console.dir(delete_id);
											 			}

											 		},
											 		cancelButton:{
											 			label:'Cancel',
											 			classes: 'secondaryB bordered flat',
											 			action : function()
											 			{

											 			}
											 		}
											 	}
											 })
										});	

										$(window).load(function(){
											$("span.<?php echo "$user_checkmate";?>").css("visibility","hidden");
											// $("div.stud_list").css("background-color","#e9e9e9");
											$("div#<?php echo "$lect_id";?>").css({"margin-bottom":"-7px"});
										});

										
										$('input#<?php echo "$user_checkmate1";?>').click(function(){
											if ($(this).prop("checked") == true) 
											{
												$("div#overlay").css({"visibility":"visible","opacity":"1","transition":"0.2s all ease-in","transform":"translateY(0%),scale(1.2)"});
												$("span#<?php echo "$user_image";?>").css({"visibility":"hidden","opacity":"0"});
												$("span.<?php echo "$user_checkmate";?>").css({"visibility":"visible","opacity":"1"});
												$("div#<?php echo "$lect_id";?>").addClass("checkedBg").css({"border-left":"3px solid #039be5"});
												$("i#<?php echo "$lect_district";?>").css("display","block");
												//pushing to the phone array list 
												var phone_data = "<?php echo "$lect_phone";?>";
												//Setting if an array data already exist or present
												var existPhone = "<?php echo "$lect_phone"; ?>";
												phoneray = $.grep(phoneray,function(i){
													return i !== existPhone;
												})
												phoneray.push(phone_data);
												console.log("Phone Numbers");
												console.dir(phoneray);
												//Pushing to the email array list
												var user_mailer = "<?php echo "$lect_email"; ?>";
												//getting if the array is already present
												var existMail = "<?php echo "$lect_email";?>";
										 	 	mailray = $.grep(mailray,function(i){
										 	 		return i !== existMail;
										 	 	});

												mailray.push(user_mailer);
												console.log("user mailer");
												console.dir(mailray);
												// $("input#test5").prop("checked",true);
												arr.push($(this).val());

												console.log("This is the array");
												console.dir(arr);
												count = count + 1;
												res = 1;
												console.log("this is the click: ");
												console.dir(res);
												console.dir(count);

												if (res == 1)
												 {
												 	//calling the outhover function
												 	$("div#<?php echo "$lect_id";?>").hover(
															function(){
															
																$("span.<?php echo "$user_checkmate";?>").css({"visibility":"visible","opacity":"1"});
															},function(){
																
																$("span.<?php echo "$user_checkmate";?>").css({"visibility":"visible","opacity":"1"});
															}
														);

												 }

											}
											else if ($(this).prop("checked") == false){
												// $("div#overlay").css({"visibility":"hidden","opacity":"0","transition":"0.2s all ease-out","transform":"translateY(0%),scale(1.2)"});
												$("span.<?php echo "$user_checkmate";?>").css({"visibility":"hidden","opacity":"0"});
												$("span#<?php echo "$user_image";?>").css({"visibility":"visible","opacity":"1"});
												$("i#<?php echo "$lect_district";?>").css("display","none");
												$("div#<?php echo "$lect_id";?>").removeClass("checkedBg").addClass("afterEffect").css({"border-left":"2px solid lightblue","transition":"0.2s all ease-in"});
												$("#<?php echo "$user_image";?>").css({"visibility":"visible","opacity":"1"});
												// $("input#test5").prop("checked",false);
												$('input#<?php echo "$user_checkmate1";?>').prop("checked",false);
												res = 0;
												if (res == 0) 
												{
													 $("div#<?php echo "$lect_id";?>").hover(
															function(){
															
																$("span.<?php echo "$user_checkmate";?>").css({"visibility":"visible","opacity":"1"});
															},
															function(){
															
																$("span.<?php echo "$user_checkmate";?>").css({"visibility":"hidden","opacity":"0"});
															}
														);
												}
												console.log("when deactivated");
												console.dir(res);
												var itemToRemove = $(this).val();
												arr.splice($.inArray(itemToRemove, arr),1);
												console.log("This is a pop array");
												console.dir(arr);

												//removing from mail ray
												var mailToRemove ="<?php echo "$lect_email"; ?>";
												mailray.splice($.inArray(mailToRemove,mailray),1);
												console.log("This is the pop array mailray");
												console.dir(mailray);

												//Removing from the phone number array
												var phoneToRemove = "<?php echo "$lect_phone"; ?>";
												phoneray.splice($.inArray(phoneToRemove,phoneray),1);
												console.log("This is the phone number pop array");
												console.dir(phoneray);
											}

											//Counting the list in the array
											arrayCount = arr.length;
											console.log("The length of the array");
											console.dir(arrayCount);
											if (arrayCount > 0)
											 {
											 	$("label#selectLabel").text(arrayCount + " " + "selected").css({"font-weight":"400","color":"#00b0ff"});
											 	$("div#addLectBtn").addClass("bounceOutRight").removeClass("bounceInRight");
											 }
											else if (arrayCount == 0)
											 {
											 	$("div#overlay").css({"visibility":"hidden","opacity":"0","transition":"0.2s all ease-out","transform":"translateY(0%),scale(1.2)"});
											 	$("div#addLectBtn").addClass("bounceInRight").removeClass("bounceOutRight");
											 }
										});	

										if (res == 0) 
										{
											 $("div#<?php echo "$lect_id";?>").hover(
													function(){
														
														$("span.<?php echo "$user_checkmate";?>").css({"visibility":"visible","opacity":"1"});
													},
													function(){
														
														$("span.<?php echo "$user_checkmate";?>").css({"visibility":"hidden","opacity":"0"});
													}
												);
										}

										//configuring the multicheckbox effect for the navbar overlay
										$("input#test5").click(function(){
											if ($(this).prop("checked") == true)
											 {
											 	//Maagic script for getting the overall phone numbers
											 	var existNumber = "<?php echo "$lect_phone"; ?>";
											 	phoneray = $.grep(phoneray,function(i){
											 		return i !== existNumber;
											 	});
											 	phoneray.push(existNumber); //pushing new number to it
											 	console.log("Multicheck Phone numbers");
											 	console.dir(phoneray);

											 	//Magic script for array definition
										 	 	var existValue = $('input#<?php echo "$user_checkmate1";?>').val();
										 	 	arr = $.grep(arr,function(i){
										 	 		return i !== existValue;
										 	 	});
										 	 	arr.push($('input#<?php echo "$user_checkmate1";?>').val());
										 	

										 	 	//Scripts for the mailray definition
										 	 	var existMail = "<?php echo "$lect_email";?>";
										 	 	mailray 	  = $.grep(mailray,function(i){
										 	 		return i !== existMail;
										 	 	});

										 	 	mailray.push(existMail);
										 	 	console.log("Pushing all the array to the array");
										 	 	console.dir(mailray);

										 	 	$("input#<?php echo "$user_checkmate1";?>").prop("checked",true);
										 	 	$("span#<?php echo "$user_image";?>").css({"visibility":"hidden","opacity":"0"});
												$("span.<?php echo "$user_checkmate";?>").css({"visibility":"visible","opacity":"1"});
												$("div#<?php echo "$lect_id";?>").addClass("checkedBg").css({"border-left":"3px solid #039be5"});
												$("i#<?php echo "$lect_district";?>").css("display","block");
										 	 	res = 1;
										 	 	if (res == 1)
												 {
												 	//calling the outhover function
												 	$("div#<?php echo "$lect_id";?>").hover(
															function(){
																$("span.<?php echo "$user_checkmate";?>").css({"visibility":"visible","opacity":"1"});
															},function(){
																
																$("span.<?php echo "$user_checkmate";?>").css({"visibility":"visible","opacity":"1"});
															}
														);

												 }
											 }
											 else if ($(this).prop("checked") == false)
											 {
											 	$("span.<?php echo "$user_checkmate";?>").css({"visibility":"hidden","opacity":"0"});
												$("span#<?php echo "$user_image";?>").css({"visibility":"visible","opacity":"1"});
												$("i#<?php echo "$lect_district";?>").css("display","none");
												$("div#<?php echo "$lect_id";?>").removeClass("checkedBg").addClass("afterEffect").css({"border-left":"2px solid lightblue","transition":"0.2s all ease-in"});
												$("#<?php echo "$user_image";?>").css({"visibility":"visible","opacity":"1"});

											 	$("input#<?php echo "$user_checkmate1";?>").prop("checked",false);
											 	var mItemToRemove = $('input#<?php echo "$user_checkmate1";?>').val();
											 	arr.splice($.inArray(mItemToRemove,arr),1);
											
											 	//Removing the email from the stack array list
											 	var mMailToRemove = "<?php echo "$lect_email"; ?>";
											 	mailray.splice($.inArray(mMailToRemove,mailray),1);
											 

											 	//Removing the phone numbers from the stack of the array list
											 	var mPhoneToRemove = "<?php echo "$lect_phone";?>";
											 	phoneray.splice($.inArray(mPhoneToRemove,phoneray),1);
											 	console.log("Phone splicing for multicheckbox");
											 	console.dir(phoneray);

											 	res = 0;
											 	if (res == 0)
												{
												 	//calling the outhover function
												 	$("div#<?php echo "$lect_id";?>").hover(
															function(){
																$("span.<?php echo "$user_checkmate";?>").css({"visibility":"visible","opacity":"1"});
															},function(){
																
																$("span.<?php echo "$user_checkmate";?>").css({"visibility":"hidden","opacity":"0"});
															}
														);

												}

											 }
											 arrayCount = arr.length;
											 if (arrayCount > 0) 
											 {
											 	$("label#selectLabel").text(arrayCount + " " + "selected").css({"font-weight":"400","color":"#00b0ff"});
											 	$("div#addLectBtn").addClass("bounceOutRight").removeClass("bounceInRight");
											 }
											 else if(arrayCount == 0)
											 {
											 	$("div#overlay").css({"visibility":"hidden","opacity":"0","transition":"0.2s all ease-out","transform":"translateY(0%),scale(1.2)"});
											 	$("div#addLectBtn").addClass("bounceInRight").removeClass("bounceOutRight");
											 }
										});

										//configuring the back button
										$("i#close").click(function(){
											$("input#test5").prop("checked",false);
											$("span.<?php echo "$user_checkmate";?>").css({"visibility":"hidden","opacity":"0"});
											$("span#<?php echo "$user_image";?>").css({"visibility":"visible","opacity":"1"});
											$("i#<?php echo "$lect_district";?>").css("display","none");
											$("div#<?php echo "$lect_id";?>").removeClass("checkedBg").addClass("afterEffect").css({"border-left":"2px solid lightblue","transition":"0.2s all ease-in"});
											$("#<?php echo "$user_image";?>").css({"visibility":"visible","opacity":"1"});

										 	$("input#<?php echo "$user_checkmate1";?>").prop("checked",false);

										 	//Emptying the list of array for the phone array data
										 	var emptyPhoneArray = "<?php echo "$lect_phone"; ?>";
										 	phoneray.splice($.inArray(emptyPhoneArray,phoneray),1);
										 	console.log("Emptying Phone Array on Back Close");
										 	console.dir(phoneray);

										 	//Emptying the list of array for the user indexes
										 	var mItemToRemove = $('input#<?php echo "$user_checkmate1";?>').val();
										 	arr.splice($.inArray(mItemToRemove,arr),1);
										 	console.log("this is the poping splice array");
										 	console.dir(arr);

										 	//Emptying the list of mail array
										 	var emptyMailArray = "<?php echo "$lect_email";?>";
										 	mailray.splice($.inArray(emptyMailArray,mailray),1);
										 	console.log("Emptying the mail array ");
										 	console.dir(mailray);
											res = 0;
										 	if (res == 0)
											{
											 	//calling the outhover function
											 	$("div#<?php echo "$lect_id";?>").hover(
														function(){
															$("span.<?php echo "$user_checkmate";?>").css({"visibility":"visible","opacity":"1"});
														},function(){
															
															$("span.<?php echo "$user_checkmate";?>").css({"visibility":"hidden","opacity":"0"});
														}
													);

											}
											arrayCount = arr.length;
											 if (arrayCount > 0) 
											 {
											 	$("div#addLectBtn").addClass("bounceOutRight").removeClass("bounceInRight");
											 	$("label#selectLabel").text(arrayCount + " " + "selected").css({"font-weight":"400","color":"#00b0ff"});
											 }
											 else if(arrayCount == 0)
											 {
											 	$("div#overlay").css({"visibility":"hidden","opacity":"0","transition":"0.2s all ease-out","transform":"translateY(0%),scale(1.2)"});
											 	$("div#addLectBtn").addClass("bounceInRight").removeClass("bounceOutRight");
											 }
										});
									});
								</script>
								<?php
									}
							}
							else
							{
								echo 
								'<div class="card-panel z-depth-0 col s12 m12 l12" style="background-color:#eeeeee;">
									<div class="empty_list">
										<div class="image_list">
											<img src="../images/admin/empty_list.svg" class="responsive-img" alt="Empty List"/>
											<span class="empty_title">No Lecturer Added</span>
										</div>

									</div>
								</div>
								';
							}
							?>
						</div>
					</div>

					<!-- Adding lecturers  data to the database -->
					<div id="addLectBtn" class="fixed-action-btn animated" style="right: 70px;bottom: 35px;">
					    <a  id="addLecturer" class="btn-floating btn-large light-blue accent-3 waves-effect waves-ripple">
					      <i class="large material-icons tooltipped" data-tooltip="Add Lecturer" data-position="left" data-delay="5">person_add</i>
					    </a>
					</div>
					<!-- uploading a file to the database -->
					<div id="addLectBtn" class="fixed-action-btn animated" style="right: 79px;bottom: 97px;">
					    <a  id="bulk" class="btn-floating grey accent-3 waves-effect waves-ripple">
					      <i class="large material-icons tooltipped" data-tooltip="Bulk Upload" data-position="left" data-delay="5">cloud_upload</i>
					    </a>
					</div>
					  <!-- Deleting lecturer Details from the database -->
					  <?php
					  	if (isset($_POST['delete_id']))
					  	 {
					  	 	$perform_delete = $_POST['delete_id'];
					  	 	$lect_delete    = "DELETE FROM lecturer WHERE lect_ID = '$perform_delete'";
					  	 	$lect_delete_res = $mysqli->query($lect_delete);

					  	 	if ($lect_delete_res) 
					  	 	{
					  	 	  ?>
					  	 	  <script type="text/javascript">console.dir("Nice something happen");</script>
					  	 	  <?php
					  	 	}
					  	 } 
					  ?>

					  <script type="text/javascript">
					  	//Adding a lecturer's modal pane 
										$("#addLecturer").on('click',function(){
											$.sweetModal({
												title: 'Add Lecturer',
												content: '<form  method="post" action="" id="lectForm" style="margin-top:10px;">\
												                <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
													                <i class="material-icons prefix" id="icon_prefix">person_pin</i>\
													                <input type="text" name="firstname" class="validate" id="firstname" required>\
													                <label for="icon_prefix">First Name</label>\
												                </div>\
												                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
													                <i class="material-icons prefix" id="icon_prefix">person_pin</i>\
													                <input type="text" name="lastname" class="validate" id="lastname" required>\
													                <label for="icon_prefix">Last Name</label>\
												                </div>\
												                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
													                <i class="material-icons prefix" id="icon_prefix">perm_phone_msg</i>\
													                <input type="number" name="phone" class="validate" id="phone" required>\
													                <label for="icon_prefix">Phone Number</label>\
												                </div>\
												                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
													                <i class="material-icons prefix" id="icon_prefix">map_marker</i>\
													                <input type="text" name="region" class="validate region" id="region" required>\
													                <label for="icon_prefix">Region Of Choice</label>\
												                </div>\
												                <div class="input-field col s12" style="margin-top:15px;margin-bottom:12px;">\
													                <i class="material-icons prefix" id="icon_prefix">place</i>\
													                <input type="text" name="district" id="district" class="autocomplete" required>\
													                <label for="district">District Of Choice</label>\
												                </div>\
												           </form>',
												width : '600px',
												buttons:{
													submitButton:{
														label: 'Submit Data',
														classes: 'blueB flat',
														action: function(){
															var firstname = $('#firstname').val();
															var lastname  = $('#lastname').val();
															var email 	  = $('#email').val();
															var phone	  = $('#phone').val();
															var region 	  = $('#region').val();
															var district  = $('#district').val();
															//Returns successfull data submission message
															var dataString = "firstname="+ firstname + "&lastname="+ lastname + "&email="+email +"&phone="+ phone + "&region="+region + "&district="+district;
															if (firstname == '' || lastname == '' || district == '' )
															 {
															 	$.sweetModal({
															 		content:"Fields Cannot Be Empty",
															 		icon   :$.sweetModal.ICON_ERROR,
															 		width  :'350px',
															 		showCloseButton:false,
															 		timeout:3000
															 	});
															 }
															 else
															 {
															 	$.ajax({
															 		type:"POST",
															 		url:"lecturers.php",
															 		data: dataString,
															 		success: function()
															 		{
															 			setTimeout(function() {
															 				//Then something should happen here
																 			$.sweetModal({
																 				content: "Details Saved Successfully !",
																 				icon   : $.sweetModal.ICON_SUCCESS,
																 				width  :'350px',
																 				showCloseButton:false,
																 				timeout: 2700
																 			});
															 			}, 3000);
															 			setTimeout(function() {
															 				window.location.reload();
															 			}, 4000);
															 		}
															 	})
															 	.done(function(){
															 		console.log("This is success");
															 	})
															 	.fail(function(){
															 		console.log("This is failure");
															 	});
															 }

															console.dir(firstname + lastname + email + phone + region + district);
														}
													},

													cancel:{
														label:'Cancel',
														classes: 'secondaryB bordered flat',
														action: function()
														{
															//Closing the modal function
														}
													},
												}

											});
											$("#region").change(function(){
												var banks = $("input#region").val();
												 $('input.autocomplete').autocomplete({
												    data: {
												    	 <?php 
												    	   
													       $reg_query = "SELECT * FROM region ORDER BY fullname ASC";
													       $reg_fetch = $mysqli->query($reg_query);
													       $reg_count = $reg_fetch->num_rows;
													       while ($row = $reg_fetch->fetch_array(MYSQLI_BOTH))
													       {
													       		 $fullname = $row['fullname'];
													      ?>
													      "<?php echo "$fullname";?>": null,
													      <?php
													  		}		
													      ?>
												    },
												    limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
												    onAutocomplete: function(val) {
												      // Callback function when value is autcompleted.
												    },
												    minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
												  });
											});

										   $('input.region').autocomplete({
										    data: {
										      <?php 
										       $reg_query = "SELECT * FROM region ORDER BY fullname ASC";
										       $reg_fetch = $mysqli->query($reg_query);
										       $reg_count = $reg_fetch->num_rows;
										       while ($row = $reg_fetch->fetch_array(MYSQLI_BOTH))
										       {
										       		 $fullname = $row['fullname'];
										      ?>
										      "<?php echo "$fullname";?>": null,
										      <?php
										  		}		
										      ?>
										    },
										    limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
										    onAutocomplete: function(val) {
										      // Callback function when value is autcompleted.
										    },
										    minLength: 2, // The minimum length of the input for the autocomplete to start. Default: 1.
										  });

									});
						//Configuring the email for multi user provided mails
						$("i#email").on('click',function(){
							$.sweetModal({
								title:'<div class="chips chips-initial" data-index="0" data-initialized="true">\
								          <input type="text" id="emails" class="data" name="emails" value="" style="margin-left:-5px;"/>\
								        </div>',
								content:'<div class="input-field col s12">\
								          \
								          <textarea id="description" class="materialize-textarea" data-length="120" style="margin-top:-10px;"></textarea>\
								          <label for="description">Message</label>\
								        </div>',
								width:'500px',
								buttons:{
									cancelButton:{
										label:'Cancel',
										classes:'secondaryB bordered flat',
										action:function(){

										}
									},
									sendButton:{
										label:'Send',
										classes:'blueB',
										action:function(){
											var dataString = "mailray=" +mailray;
											console.dir(dataString);

											if (mailray.length == 0)
											{
												$.sweetModal({
													icon:$.sweetModal.ICON_ERROR,
													content:'Something Went Wrong',
													width:'350px'
												});
											}
											else
											{
												$.post({
														url:'lecturers.php',
														data:dataString,
														success:function(){
															//Functions for sending data will be place here
														}
													})
													.done(function(){

													});
											}
										}
									}
								}
							});
							console.log("This is the mailray for the selection");
							console.dir(mailray);
							console.log("Ginger");
							//working from different angel
							var MainArray = {};
							var dataM      = [];
							for (var i = 0; i < mailray.length; i++) {
								var object = {};
								object.tag = mailray[i];
								dataM.push(object);
							}
							//final array list
							MainArray.data = dataM;
							$('.chips-initial').material_chip(MainArray);
						});

						//Displaying the array of data on the form for sending text messages
						$("i#sms").on('click',function(){
							console.dir(phoneray);
							$.sweetModal({
								title:'<div class="chips chips-content" data-index="0" data-initialized="true">\
								          <input type="text" id="emails" class="data" name="emails" value="" style="margin-left:-5px;"/>\
								        </div>',
								content:'<div class="input-field col s12">\
								          \
								          <textarea id="description" class="materialize-textarea" data-length="120" style="margin-top:-10px;"></textarea>\
								          <label for="description">Message</label>\
								        </div>',
								width:'500px',
								buttons:{
									cancelButton:{
										label:'Cancel',
										classes:'secondaryB bordered flat',
										action:function()
										{

										}
									},
									doneButton:{
										label:'Send Sms',
										classes:'blueB',
										action:function()
										{
											if (phoneray.length <= 0)
											 {
											 	$.sweetModal({
											 		icon:$.sweetModal.ICON_ERROR,
											 		content:'Fatal Error . Contact Admin',
											 		showCloseDialog:false,
											 		width:'350px',
											 	});
											 }
											 else{
											 	var dataString = "phoneArray="+phoneray;
											 	$.post({
											 		url:"lecturers.php",
											 		data:dataString,
											 		success:function(){
											 			//Functions for sending data will be placed here
											 		}
											 	})
											 	.done(function(){
											 		console.log("Success");
											 	});
											 }

										}
									}
								}
							});
							//Codes for the configuration of the contact chips
							var PhoneArray = {};
							var dataM 	   = [];
							for (var i = 0; i < phoneray.length; i++) {
								var object = {};
								object.tag = phoneray[i];
								dataM.push(object);
							}
							//Placing th overall data into the phone array (Big one)
							PhoneArray.data = dataM;
							$('.chips-content').material_chip(PhoneArray);
						});
						$("a#multipleDelete").on('click',function(){
							console.dir(arr);
							$.sweetModal({
								title:'Are You Sure About This ?',
								icon: $.sweetModal.ICON_WARNING,
								type:$.sweetModal.TYPE_ALERT,
								content: 'These Data Will Permanently Be Deleted',
								width: '400px',
								buttons:{
									cancelButton:{
										label: 'Cancel',
										classes: 'secondaryB bordered flat',
										action:function(){

										}
									},
									deleteButton:{
										label: 'Delete',
										classes: 'redB',
										action:function(){
											var dataString = "dataArray="+arr;
											if (arr.length == 0) 
											{
												$.sweetModal({
													title:"Alert",
													icon :$.sweetModal.ICON_ERROR,
													content:"Something Went Wrong",
													width:'350px',
												});
											}
											else{
												$.post({
													url:"lecturers.php",
													data:{ardata:arr},
													success:function(){
														setTimeout(function() {
															$.sweetModal({
											 				content: "Delete Successfull !",
											 				icon   : $.sweetModal.ICON_SUCCESS,
											 				width  :'400px',
											 				showCloseButton:false,
											 				timeout: 2500
											 			});
														}, 3000);
											 			setTimeout(function() {
											 				window.location.reload();
											 			}, 4000);
													}
												});
											}
										}
									}
								}
							});
						});	

						//Hooking up the onclick event listener
						$("a#bulk").on('click',function(){
							$("div#lecturer_lair").load("bulk_lecturer.php");
							$("ul.back-button").css({"display":"block","opacity":"1"});
						});

						//Activating the on back click for the csv file download
						// $("a.back_click").on('click',function(){
						// 	 setTimeout(function() {
					 //            $("div.bottomsheetLoader").fadeOut('slow');
					 //          }, 3500);
						// });
					  </script>
					  <?php 
					  if (isset($_POST['ardata']))
					  {
					  	$arrayData = $_POST['ardata'];
					    for ($i=0; $i < count($arrayData) ; $i++) { 
					    	# code...
					    	$deleteData = $arrayData[$i];
					    	$deleteQuery = "DELETE FROM lecturer WHERE lect_ID = '$deleteData'";
					    	$deleteFetch = $mysqli->query($deleteQuery);
					    	if ($deleteFetch) 
					    	{
					    		# code...
					    	}
					    }
					  }
					  ?>
				</div>
			</div>
		</div>
	</div>
</body>