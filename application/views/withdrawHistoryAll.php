<div class="container main_div">     
    <div class="row mainbodybgdailygift padding30both">
        <div class="row" width="100%" style="align-content: center;background-color: #0782C0">
            <h2 style="text-align:center">Latest Payments</h2>
        </div>
        <center><ins class="bmadblock-5a9c2685a2f1090010f2a8d8" style="display:inline-block;width:728px;height:90px;"></ins>
<script async type="application/javascript" src="//ad.bitmedia.io/js/adbybm.js/5a9c2685a2f1090010f2a8d8"></script></center>
        <style type="text/css">
            table.dataTable tfoot th, table.dataTable tfoot td {
                padding: 10px 18px 6px 18px;
                border-top: none;
            }
            table td, table th {
                padding: 9px 10px;
                text-align: center;
                border-bottom: none;
                font-size: 19px;
                border: 1px solid white;
            }
            table.dataTable tfoot th, table.dataTable tfoot td {
                padding: 10px 18px 6px 18px;
                border-top: none;
                background: #0782c0;
            }
            table.dataTable thead th, table.dataTable thead td {
                padding: 10px 18px;
                border-bottom:none;
                background: #0782c0;
            }
        </style>
        <div class="row" width="100%" style="text-align: center">                           
            <table id="listSlider" class="cell-border datatables" width="100%" cellspacing="0" style="color: black !important">
                <thead>
                    <tr>
                        <th>Sr.No.</th>                        
                        <th>Request Date</th>
                        <th>Username</th>
                        
                        <th>Amount</th>
                        <th>Method</th>
                        <th>Status</th>
                        
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Sr.No.</th>                        
                        <th>Request Date</th>
                        <th>Username</th>
                        
                        <th>Amount</th>
                        <th>Method</th>
                        <th>Status</th>
                        
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    if ($withdrawHistory != NULL) {
                        ?>
                        <tr>
                            <?php
                            $i = 1;
                            foreach ($withdrawHistory as $list) {
                                ?>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $list['withdraw_date']; ?></td>
                                <td><?php echo $list['username']; ?></td>
                                
                                <td><?php echo $list['withdraw_btc_amount']; ?></td>
                                <td>
                                    <?php
                                    if ($list['withdrawl_type'] == 1) {
                                        echo 'blockchain';
                                    } else if ($list['withdrawl_type'] == 2) {
                                        echo 'faucethub';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($list['withdraw_status'] == 0) {
                                        echo '<span class="pending_task"  style="color:#ffe900">Pending</span>';
                                    } else if ($list['withdraw_status'] == 1) {
                                        echo '<span  class="accept_task"  style="color:#12ce12">Accept</span>';
                                    } else if ($list['withdraw_status'] == 2) {
                                        echo '<span  class="rejected_task" style="color:#db0d0d">Rejected</span>';
                                    }
                                    ?>
                                </td>
								
                            </tr>
                            <?php
                            $i++;
                        }
                        ?>
                        <?php
                    } else {
                        ?> 
                        <tr>
                            <td>No data available</td>
                        </tr>
                        <?php
                    }
                    ?>


                </tbody>
            </table>
        </div>    
        <div class="row" id="countDownsatoshiData" width="100%" style="text-align: center">               
            <div  class="dailygiftback">
                <a class="button btndailygift" href="<?php echo base_url('welcome'); ?>"><span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span>Back</a>
            </div>                   
        </div>
    </div>
</div>
<br><center><iframe data-aa='873544' src='//ad.a-ads.com/873544?size=990x90' scrolling='no' style='width:990px; height:90px; border:0px; padding:0;overflow:hidden' allowtransparency='true'></iframe></center>


<script>
$(window).load(function() {
	
	var session_value="<?php    
	if(isset($_SESSION["user_id"]))
	{
	echo "1";
	}
	else
	{
	echo "0";
	}?>";
	
	if(session_value=="0"){
	$("#listSlider_paginate").html('');
	var html_get='<a class="paginate_button previous disabled" aria-controls="listSlider" data-dt-idx="0" tabindex="0" id="listSlider_previous">Previous</a><span><a   onclick="return login_page_redirect();" class="paginate_button current" aria-controls="listSlider" data-dt-idx="1" tabindex="0">1</a><a  onclick="return login_page_redirect();" class="paginate_button " aria-controls="listSlider" data-dt-idx="2" tabindex="0">2</a><a class="paginate_button " aria-controls="listSlider" data-dt-idx="3" tabindex="0">3</a><a  onclick="return login_page_redirect();" class="paginate_button " aria-controls="listSlider" data-dt-idx="4" tabindex="0">4</a><a  onclick="return login_page_redirect();" class="paginate_button " aria-controls="listSlider" data-dt-idx="5" tabindex="0">5</a><span  onclick="return login_page_redirect();" class="ellipsis">…</span><a class="paginate_button " aria-controls="listSlider" data-dt-idx="6" tabindex="0"  onclick="return login_page_redirect();">372</a></span><a class="paginate_button next" aria-controls="listSlider" data-dt-idx="7" tabindex="0" id="listSlider_next" onclick="return login_page_redirect();">Next</a>';
	
    $("#listSlider_paginate").html(html_get);
	
	$("select[name='listSlider_length']").prop('disabled',true);
		
	}
	
	
	
	
	
});


function login_page_redirect(){
	window.location.href = "/welcome/login";
}



</script>
