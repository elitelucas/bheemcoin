<section id="main-content">
    <div class="row">
        <div id="featured-games" class="small-16 large-16 columns">
            <h2 class="title" style="padding-bottom:2%;text-align:center;">Recent players </h2>
            <p style="text-align:center;padding-bottom:2%;    color: #c5db3b;
               font-size: 20px;">Bheemcoin is Bitcoin Generator Game to get bitcoins every minute. Try it !Refer your friends, enemies and everyone else and receive 20% lifetime commission on all their claims. We have no minimum payout, and always instant !</p>
               <center><ins class="bmadblock-5a9c2429a2f1090010f2a831" style="display:inline-block;width:728px;height:90px;"></ins>
<script async type="application/javascript" src="//ad.bitmedia.io/js/adbybm.js/5a9c2429a2f1090010f2a831"></script>
<link rel="stylesheet" href="https://bheemcoin.com/client_assets/css/popupstyle.css">
</center>
        </div>
    </div>
    <div class="row " style="padding-bottom:5%;">
        <div class="small-16 columns">
            <div class="row small-up-1 medium-up-2 large-up-4">
                <!--team-member-->
                <!--team-member-->
                <?php
			    
                foreach ($player as $row) {
                    $pro_pic = $row['image'];
                    if ($pro_pic == "") {
                        $pro_pic = "client_assets/user.png";
                    }else{
						$pro_pic = "client_assets/assets/user_profile/".$pro_pic;
					}
					?>
                    <div class="small-2 large-16 columns" style="cursor:pointer" onclick="openpopup('<?php echo $row['id'];?>')">
								  <center>  <img src="<?php echo base_url().$pro_pic;?>" class="" alt=""> </center>
					<h5  style="text-align:center;"><?php echo $row['username'];?></h5>
						  </div>
						  <?php
                }
				
				?>
            </div>
        </div>
    </div>
	
	 <div class="row " style="padding-bottom:5%;">
        <div class="small-16 columns">
            <div class="row small-up-1 medium-up-2 large-up-4" style="text-align: center;font-size: 1.46667rem;
    color: #c5db3b;font-weight: bold;">
                <?php 
				echo $cnt."  Active Players (".$userscount." last 5 minutes) "; ?>
            </div>
			 <div class="row small-up-1 medium-up-2 large-up-4">               
			   <?php 
				$i=0;
				
                 $count=count($last5minutesusers);				
				foreach ($last5minutesusers as $row) {
                  $a=" | ";
				  $i++;
				 if($count==$i){
					 $a="  "; 
				  }
                ?>
				<h2 onclick="openpopup('<?php echo $row['id'];?>')" class="activaplayer"><?php echo $row['username']." ".$a;?></h2>
				<?php 
				
				
				
				} ?>
				 </div>
        </div>
    </div>
	
	
    <div style="text-align:center">
        <?php echo $links; ?>
    </div>
	<div id="userdetails" class="modal" style="display:none">
  <!-- Modal content -->
  <div class="modal-content" style="width:60%">
    <span class="close" onclick='closepopup("userdetails")'>&times;</span>
    <p id="preview_model" style="color:#000000;width:700px;text-align:left" >
	</p>
  </div>
</div>
<div class="loading" id="loadid" style="display:none">Loading&#8230;</div>
<script>
function closepopup(id){
	$("#"+id).css('display','none');
}
function openpopup(id){
	$("#loadid").css('display','block');
	$.ajax({
		url:'get_details',
		type:'post',
		data:{userid:id},
		success:function(result){
			var res=JSON.parse(result);
			console.log(res[0].username);
			var imagesrc=res[0].image;
			if(imagesrc==''){
				imagesrc='<?php echo base_url();?>client_assets/user.png';
			}else{
				imagesrc='<?php echo base_url();?>client_assets/assets/user_profile/'+imagesrc;
			}
			var date = new Date(res[0].date);
			var newDate = date.toString('dd-MM-yy');
			newarray=newDate.split(" ");
			var d=newarray[1]+' '+newarray[2]+','+newarray[3];
			var responsehtml='<table>';
			responsehtml+='<tr><th colspan="2">Profile Information</th></tr>';
			responsehtml+='<tr><td>Avatar</td><td><img src="'+imagesrc+'" height="100" width="100"></td></tr>';
			responsehtml+='<tr><td>Username</td><td>'+res[0].username+'</td></tr>';
			 responsehtml+='<tr><td>Country</td><td></td></tr>';
			responsehtml+='<tr><th colspan="2">Generator Status</th></tr>';
			responsehtml+='<tr><td>Energy Speed</td><td>'+res[0].speed+'</td></tr>';
			responsehtml+='<tr><td>Capacity</td><td>'+res[0].capacity+'</td></tr>';
			responsehtml+='<tr><th colspan="2">Player Status</th></tr>';
			responsehtml+='<tr><td>Joined</td><td>'+d+'</td></tr>';
			responsehtml+='<tr><td>Total Generated</td><td>'+res[0].user_attack_player_satoshi+'</td></tr>';
			responsehtml+='<tr><td>Last Deposite</td><td>'+res[0].lastdeposit+'</td></tr>';
			responsehtml+='<tr><td>Referrals</td><td>'+res[0].referal+'</td></tr>'; 
			$("#preview_model").html(responsehtml);
			$('#userdetails').css('display','block');
			$("#loadid").css('display','none');
			
		}
	});
//$('#userdetails').css('display','block');
}
</script>
</section>