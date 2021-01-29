<div class="container main_div">     
    <div class="row mainbodybgdailygift padding30both">
        <div class="row" width="100%" style="align-content: center;background-color: #0782C0">
            <h2 style="text-align:center">Deposit</h2>
        </div>
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
            <span>Send payment to :</span><br>
            <h2><a href="<?php echo base_url('deposit/newBtcAddress'); ?>">Click Here to Generate new Deposit Address</a></h2>

            <img src="https://chart.googleapis.com/chart?chs=225x225&chld=L|2&cht=qr&chl=bitcoin:<?php echo $lastDepositAddress['deposit_btc_address'] ?>?amount=0.00126label=BTC%26message=Cool"><br>
            <h5>btc address :- </h5> &nbsp;&nbsp;<?php echo $lastDepositAddress['deposit_btc_address'] ?> <br><br>
            <table id="listSlider" class="cell-border datatables" width="100%" cellspacing="0" style="color: black !important">            
                <thead>
                    <tr>
                        <th>Sr.No.</th>
                        <th>Address</th>
                        <th>Balance</th>                        
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Sr.No.</th>
                        <th>Address</th>
                        <th>Balance</th>                        
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    if ($listDeposit != NULL) {
                        ?>
                        <tr>
                            <?php
                            $i = 1;
                            foreach ($listDeposit as $list) {
								$root_url="https://blockchain.info/q/addressbalance/".$list['deposit_btc_address'];
  								$response = file_get_contents($root_url);
        						$object = json_decode($response);
								if(!empty($object)){
                                ?>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $list['deposit_btc_address']; ?></td>
                                <td><?php 
								
								echo $object/100000000;
								//echo $list['btc']; 
								
									?></td>
                            
					</tr>
                            <?php
                            $i++;
                        }
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
