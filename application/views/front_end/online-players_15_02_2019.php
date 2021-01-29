<section id="main-content">
    <div class="row">
        <div id="featured-games" class="small-16 large-16 columns">
            <h2 class="title" style="padding-bottom:2%;text-align:center;">Online Players</h2>
            <p style="text-align:center;padding-bottom:2%;    color: #c5db3b;
               font-size: 20px;">Bheemcoin is Bitcoin Generator Game to get bitcoins every minute. Try it !Refer your friends, enemies and everyone else and receive 20% lifetime commission on all their claims. We have no minimum payout, and always instant !</p>
               <center><ins class="bmadblock-5a9c2429a2f1090010f2a831" style="display:inline-block;width:728px;height:90px;"></ins>
<script async type="application/javascript" src="//ad.bitmedia.io/js/adbybm.js/5a9c2429a2f1090010f2a831"></script>
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
                    echo '<div class="small-2 large-16 columns">
								  <center>  <img src="'.base_url().$pro_pic.'" class="" alt=""> </center>
								  <h5 style="text-align:center;">'.$row['username'].'</h5>
						  </div>';
                }
                ?>
            </div>
        </div>
    </div>
    <div style="text-align:center">
        <?php echo $links; ?>
    </div>
</section>