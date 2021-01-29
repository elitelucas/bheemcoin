<div class="container main_div">     
    <div class="row mainbodybgdailygift padding30both">
        <div class="row" width="100%" style="align-content: center;background-color: #0782C0">
            <h2 style="text-align:center">Withdraw History</h2>
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
           <table id="listSlider" class="cell-border datatables" width="100%" cellspacing="0" style="color: black !important">
                <thead>
                    <tr>
                        <th>Sr.No.</th>
                        <th>Request Date</th>
                        <th>Status</th>
                        <th>Amount</th>
                        <th>Method</th>
                        <th>Btc Address</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Sr.No.</th>
                        <th>Request Date</th>
                        <th>Status</th>
                        <th>Amount</th>
                        <th>Method</th>
                        <th>Btc Address</th>
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
                                <td>
                                    <?php
                                    if ($list['withdraw_status'] == 0) {
                                        echo 'Pending';
                                    } else if ($list['withdraw_status'] == 1) {
                                        echo 'Accept';
                                    } else if ($list['withdraw_status'] == 2) {
                                        echo 'Rejected';
                                    }
                                    ?>
                                </td>
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
                                <td><?php echo $list['withdraw_btc_address']; ?></td>
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
        <center><iframe data-aa='873562' src='//ad.a-ads.com/873562?size=728x90' scrolling='no' style='width:728px; height:90px; border:0px; padding:0;overflow:hidden' allowtransparency='true'></iframe></center>
        
        <center><iframe data-aa='873544' src='//ad.a-ads.com/873544?size=990x90' scrolling='no' style='width:990px; height:90px; border:0px; padding:0;overflow:hidden' allowtransparency='true'></iframe></center>
        <div class="row" id="countDownsatoshiData" width="100%" style="text-align: center">               
            <div  class="dailygiftback">
                <a class="button btndailygift" href="<?php echo base_url('welcome'); ?>"><span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span>Back</a>
            </div>                   
        </div>
    </div>
</div>
