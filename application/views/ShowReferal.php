<div class="container main_div">     
    <div class="row mainbodybgdailygift padding30both">
        <div class="row" width="100%" style="align-content: center;background-color: #0782C0">
            <h2 style="text-align:center">Referal</h2>
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
            <br>
            <table id="listSlider" class="cell-border datatables" width="100%" cellspacing="0" style="color: black !important">               
                <thead>
                    <tr>
                        <th>Sr.No.</th>
                        <th>username</th>
                        <th>bitcoin_address</th>
                        <th>email</th>
                        <th>how_find</th> 
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Sr.No.</th>
                        <th>username</th>
                        <th>bitcoin_address</th>
                        <th>email</th>
                        <th>how_find</th> 
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    if ($refreal_friends != NULL) {
                        ?>
                        <tr>
                            <?php
                            $i = 1;
                            foreach ($refreal_friends as $listReferal) {
                                ?>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $listReferal['username']; ?></td>
                                <td><?php echo $listReferal['bitcoin_address']; ?></td>
                                <td><?php echo $listReferal['email']; ?></td>
                                <td><?php echo $listReferal['how_find']; ?></td>
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
                <a class="button btndailygift" href="<?php echo base_url('referal'); ?>"><span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span>Back</a>
            </div>                   
        </div>
    </div>
</div>