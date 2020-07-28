<?php
  include 'inc/header.php';
 ?>
 <?php 
   $show= $order->order_list();
 ?>
 <style>
 	.inner{
	 	background-color: rgb(255, 255, 255);
	    min-height: 400px;
	    border-radius: 4px;
	    padding: 1px;
 	}
 	.table {
		border-collapse: collapse;
	    width: 100%;
	    word-break: break-word;
	    display: table;
	    border-spacing: 2px;
    	border-color: grey;
 	}
 	.thead{
 		display: table-header-group;
	    vertical-align: middle;
	    border-color: inherit;
 	}
 	.tr{
 		display: table-row;
	    vertical-align: inherit;
	    border-color: inherit;
	    border-bottom: 1px solid rgb(244, 244, 244);
	 }
	 .th{
	 	min-width: 130px;
	    color: rgb(120, 120, 120);
	    font-size: 18px;
	    font-weight: 500;
	    text-align: left;
	    padding: 20px 15px;
	    display: table-cell;
        vertical-align: inherit;
	 }
	 .tbody{
	 	display: table-row-group;
	    vertical-align: middle;
	    border-color: inherit;
	 }
	 .td{
	 	font-size: 16px;
	    line-height: 20px;
	    color: rgb(51, 51, 51);
	    min-width: 130px;
	    font-weight: 500;
	    text-align: left;
	    padding: 20px 15px;
	    display: table-cell;
        vertical-align: inherit;
	 }
	 .tr:hover{
       background: #e7f7fc;
	 }
 </style>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Danh sách đơn hàng</h2>
			    	<div class="inner">
						<table class="table">
							<thead class="thread">
								<tr class="tr">
									<th class="th">ID đơn hàng</th>
									<th class="th">Ngày đặt hàng</th>
									<th class="th">Mặt hàng</th>
									<th class="th">Thành tiền</th>
									<th class="th">Trạng thái đơn hàng</th>
								</tr>
							</thead>
							<tbody class="tbody">
								 <?php 
							        $show_order= $order->show_order_list();
	                                if($show_order){
	                    	            while($result=$show_order->fetch_assoc()){    
						        ?>
								<tr class="tr">
									<td class="td"><a style="color:rgb(0, 127, 240);"href="orderdetail.php?date_order=<?php echo $result['date_order'] ?>"><?php echo $result['orderlistID'] ?></a></td>
									<td class="td"><?php echo $result['date_order'] ?></td>
									<td class="td"><?php echo $result['description']?> + ...</td>
									<td class="td"><?php echo  $fm->format_money($result['price']) ?></td>
									<td class="td"><?php  echo $result['state'] ?></td>
								</tr>
								<?php 
                                 }}
								 ?>
							</tbody>
						</table>
					</div>
			</div>
					
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php
  include 'inc/footer.php';
 ?>

