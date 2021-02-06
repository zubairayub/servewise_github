<?php
//session_start();
//echo $_SESSION["logIn"];
//echo $_SESSION['logInName'];

 require("category/categoryClass.php");
 require_once($dbcalss);

	$category = new Category();
	$message=null;

	$dbcalss = NULL ;
	


	$type =  $type;
$type = getstatus($type);
if($type == 'Branch' || $owner_type == 'Branch')
{

	//$data =  getbranches($logInId );
	$vbid =  $_SESSION['vendor_id'];
	$branch_id =  $_SESSION['branch_id'];

if($owner_type == 'Branch'){
$u_id = $owner_id;
}else{
$u_id = $logInId;

}




$vendor_count = count(getvendors($dbcalss , $vbid , 'FALSE'));
$branch_count = count(getbranches($u_id,'TRUE'));
$product_count = count(getproducts($branch_id,''));
$order_count = count(getorders($u_id,'Branch'));
$customer_count = count(getcustomerlist($branch_id,'Branch'));
$order_amount = getorderamount('',$u_id,'Branch');
$order_amount = $order_amount[0]['totalamount'];
$out_of_stock = count(getoutofstockproducts($branch_id,'','Branch'));
$product_amount = getproductsamount($branch_id,'','Branch');
$product_amount = $product_amount[0]['productamount'];
$recent_orders = getorders($u_id,'Branch');
$total_weekly_sale = progress_dashboard_weekly('',$u_id,'Branch');

$weekly_deliverd_order = $total_weekly_sale['weekly_deliverd_order'];
$weekly_order = $total_weekly_sale['weekly_order'];
$weekly_route_order = $total_weekly_sale['weekly_route_order'];
$weekly_returned_order = $total_weekly_sale['weekly_returned_order'];
$weekly_store_pickup_order = $total_weekly_sale['weekly_store_pickup_order'];






if($weekly_order > 0){
$weekly_order_percantage = ($weekly_order / $order_count) * 100 ;



$weekly_deliverd_order_percantage = ($weekly_deliverd_order / $weekly_order) * 100 ;



$weekly_route_order_percantage = ($weekly_route_order / $weekly_order) * 100 ;



$weekly_returned_order_percantage = ($weekly_returned_order / $weekly_order) * 100 ;



$weekly_store_pickup_order_percantage = ($weekly_store_pickup_order / $weekly_order) * 100 ;

}else{

$weekly_order_percantage = 0 ;



$weekly_deliverd_order_percantage = 0;



$weekly_route_order_percantage = 0 ;



$weekly_returned_order_percantage = 0 ;



$weekly_store_pickup_order_percantage = 0 ;




}








$first_row = '<div class="row">
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-warning">
					<p>
						<i class="fa fa-spinner" aria-hidden="true" style="color:white; font-size:20px;"></i>
					</p>
					<h3> ' . $vendor_count . ' </h3>
					<p>Total Vendors</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-success">
					<p>
						<i class="fa fa-check" aria-hidden="true" style="color:white; font-size:20px;"></i>
					</p>
					<h3>'. $branch_count .' </h3>
					<p>Total Branch</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-success">
					<p>
						<i class="fa fa-check" aria-hidden="true" style="color:white; font-size:20px;"></i>
					</p>
					<h3>'. $product_count .' </h3>
					<p>Total Products</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-success">
					<p>
						<i class="fa fa-check" aria-hidden="true" style="color:white; font-size:20px;"></i>
					</p>
					<h3>'. $order_count . '</h3>
					<p>Total Orders</p>
				</div>
			</div>
		</div>';




$second_row = '<div class="row">
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-warning">
					<p>
						<i class="fa fa-spinner" aria-hidden="true" style="color:white; font-size:20px;"></i>
					</p>
					<h3>'. $customer_count .'</h3>
					<p>Total Customers</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-success">
					<p>
						<i class="fa fa-check" aria-hidden="true" style="color:white; font-size:20px;"></i>
					</p>
					<h3>'. $order_amount .'</h3>
					<p>Total Orders Amount</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-success">
					<p>
						<i class="fa fa-check" aria-hidden="true" style="color:white; font-size:20px;"></i>
					</p>
					<h3>'. $product_amount .'</h3>
					<p>Total Products Amount</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-success">
					<p>
						<i class="fa fa-check" aria-hidden="true" style="color:white; font-size:20px;"></i>
					</p>
					<h3>'. $out_of_stock .'</h3>
					<p>Running OUT OF STOCK</p>
				</div>
			</div>
		</div>';







$weekly_sales = '<div class="card-content">
						<div class="progress-wrapper">
							<p>
								Weekly Sales 
								<span class="float-right">'.$weekly_order.'</span>
							</p>
							<div class="progress">
								<div class="bg-primary" style="width:'.$weekly_order_percantage.'%"></div>
							</div>
						</div>
						<div class="progress-wrapper">
							<p>
								Delivered
								<span class="float-right">'.$weekly_deliverd_order.'</span>
							</p>
							<div class="progress">
								<div class="bg-primary" style="width:'.$weekly_deliverd_order_percantage.'%"></div>
							</div>
						</div>
						<div class="progress-wrapper">
							<p>
								On the way to Client
								<span class="float-right">'.$weekly_route_order.'</span>
							</p>
							<div class="progress">
								<div class="bg-primary" style="width:'.$weekly_route_order_percantage.'%"></div>
							</div>
						</div>
						<div class="progress-wrapper">
							<p>
								Returned
								<span class="float-right">'.$weekly_returned_order.'</span>
							</p>
							<div class="progress">
								<div class="bg-primary" style="width:'.$weekly_returned_order_percantage.'%"></div>
							</div>
						</div>
						<div class="progress-wrapper">
							<p>
								Pickup in Store
								<span class="float-right">'.$weekly_store_pickup_order.'</span>
							</p>
							<div class="progress">
								<div class="bg-primary" style="width:'.$weekly_store_pickup_order_percantage.'%"></div>
							</div>
						</div>
						</div>
					</div>';





	
}elseif($type == 'Admin' || $owner_type == 'Admin'){




$vendor_count = count(getvendors($dbcalss , '' , ''));
$branch_count = count(getbranches('',''));
$product_count = count(getproducts('',''));
$order_count = count(getorders('',''));
$customer_count = count(getcustomerlist('','Admin'));
$order_amount = getorderamount('','','Admin');
$order_amount = $order_amount[0]['totalamount'];
$out_of_stock = count(getoutofstockproducts('',''));
$product_amount = getproductsamount('','');
$product_amount = $product_amount[0]['productamount'];
$recent_orders = getorders('','');
$total_weekly_sale = progress_dashboard_weekly('','','');

$weekly_deliverd_order = $total_weekly_sale['weekly_deliverd_order'];
$weekly_order = $total_weekly_sale['weekly_order'];
$weekly_route_order = $total_weekly_sale['weekly_route_order'];
$weekly_returned_order = $total_weekly_sale['weekly_returned_order'];
$weekly_store_pickup_order = $total_weekly_sale['weekly_store_pickup_order'];







$weekly_order_percantage = ($weekly_order / $order_count) * 100 ;



$weekly_deliverd_order_percantage = ($weekly_deliverd_order / $weekly_order) * 100 ;



$weekly_route_order_percantage = ($weekly_route_order / $weekly_order) * 100 ;



$weekly_returned_order_percantage = ($weekly_returned_order / $weekly_order) * 100 ;



$weekly_store_pickup_order_percantage = ($weekly_store_pickup_order / $weekly_order) * 100 ;










$first_row = '<div class="row" >
			<div class="col-3 col-m-6 col-sm-6">
				<div  class="counter" style="background: rgb(252,235,69);background: linear-gradient(74deg, rgba(252,235,69,1) 0%, rgba(199,122,40,1) 100%);">
					<p>
						<i class="fa fa-user-circle-o" aria-hidden="true" style="color:white; font-size:20px;"></i>
					</p>
					<h3 class="timer count-title count-number" data-to="' . $vendor_count .'" data-speed="1500"> </h3>
					<p>Total Vendors</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter" style="background: rgb(255,86,86);background: linear-gradient(74deg, rgba(255,86,86,1) 0%, rgba(255,35,35,1) 100%);">
					<p>
						<i class="fa fa-home" aria-hidden="true" style="color:white; font-size:20px;"></i>
					</p>
					<h3 class="timer count-title count-number" data-to="' . $branch_count .'" data-speed="1700"></h3>
					<p>Total Branch</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter" style="background: rgb(255,130,27);background: linear-gradient(74deg, rgba(255,130,27,1) 0%, rgba(255,100,23,1) 100%);">
					<p>
						<i class="fa fa-product-hunt" aria-hidden="true" style="color:white; font-size:20px;"></i>
					</p>
					<h3 class="timer count-title count-number" data-to="' . $product_count .'" data-speed="1700"></h3>
					<p>Total Products</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter" style="background: rgb(238,255,27);background: linear-gradient(74deg, rgba(238,255,27,1) 0%, rgba(255,225,23,1) 100%);">
					<p>
						<i class="fa fa-book" aria-hidden="true" style="color:white; font-size:20px;"></i>
					</p>
					<h3 class="timer count-title count-number" data-to="' . $order_count .'" data-speed="2700"></h3>
					<p>Total Orders</p>
				</div>
			</div>
		</div>';




$second_row = '<div class="row">
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter" style="background: rgb(123,255,27);background: linear-gradient(74deg, rgba(123,255,27,1) 0%, rgba(152,255,23,1) 100%);">
					<p>
						<i class="fa fa-users" aria-hidden="true" style="color:white; font-size:20px;"></i>
					</p>
					<h3 class="timer count-title count-number" data-to="' . $customer_count .'" data-speed="2200"></h3>
					<p>Total Customers</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter" style="background: rgb(27,146,255);background: linear-gradient(74deg, rgba(27,146,255,1) 0%, rgba(23,172,255,1) 100%);">
					<p>
						<i class="fa fa-money" aria-hidden="true" style="color:white; font-size:20px;"></i>
					</p>
					<h3 class="timer count-title count-number" data-to="' . $order_amount .'" data-speed="3000"></h3>
					<p>Total Orders Amount</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter" style="background: rgb(161,27,255);background: linear-gradient(74deg, rgba(161,27,255,1) 0%, rgba(210,23,255,1) 100%);">
					<p>
					<i class="fa fa-money" aria-hidden="true" style="color:white; font-size:20px;"></i>
						<i class="fa fa-product-hunt" aria-hidden="true" style="color:white; font-size:20px;"></i>
					</p>
					<h3 class="timer count-title count-number" data-to="' . $product_amount .'" data-speed="2700"></h3>
					<p>Total Products Amount</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter" style="background: rgb(255,27,139);background: linear-gradient(74deg, rgba(255,27,139,1) 0%, rgba(255,23,51,1) 100%);">
					<p>
						<i class="fa fa-archive" aria-hidden="true" style="color:white; font-size:20px;"></i>
					</p>
					<h3 class="timer count-title count-number" data-to="' . $out_of_stock .'" data-speed="3000"></h3>
					<p>Running OUT OF STOCK</p>
				</div>
			</div>
		</div>';







$weekly_sales = '<div class="card-content">
						<div class="progress-wrapper">
							<p>
								Weekly Sales 
								<span class="float-right">'.$weekly_order.'</span>
							</p>
							<div class="progress">
								<div class="bg-primary" style="width:'.$weekly_order_percantage.'%"></div>
							</div>
						</div>
						<div class="progress-wrapper">
							<p>
								Delivered
								<span class="float-right">'.$weekly_deliverd_order.'</span>
							</p>
							<div class="progress">
								<div class="bg-primary" style="width:'.$weekly_deliverd_order_percantage.'%"></div>
							</div>
						</div>
						<div class="progress-wrapper">
							<p>
								On the way to Client
								<span class="float-right">'.$weekly_route_order.'</span>
							</p>
							<div class="progress">
								<div class="bg-primary" style="width:'.$weekly_route_order_percantage.'%"></div>
							</div>
						</div>
						<div class="progress-wrapper">
							<p>
								Returned
								<span class="float-right">'.$weekly_returned_order.'</span>
							</p>
							<div class="progress">
								<div class="bg-primary" style="width:'.$weekly_returned_order_percantage.'%"></div>
							</div>
						</div>
						<div class="progress-wrapper">
							<p>
								Pickup in Store
								<span class="float-right">'.$weekly_store_pickup_order.'</span>
							</p>
							<div class="progress">
								<div class="bg-primary" style="width:'.$weekly_store_pickup_order_percantage.'%"></div>
							</div>
						</div>
						</div>
					</div>';












}elseif($type == 'Vendor' || $owner_type == 'Vendor'){
//$data =  getbranches($logInId );
	$vbid =  $_SESSION['vendor_id'];
	//$branch_id =  $_SESSION['branch_id'];

if($owner_type == 'Vendor'){
$u_id = $owner_id;
}else{
$u_id = $logInId;

}




$vendor_count = count(getvendors('' , $u_id , 'TRUE'));
$branch_count = count(getbranches($u_id,'FALSE'));
$product_count = count(getproducts($vbid,'','Vendor'));
$order_count = count(getorders($vbid,'Vendor'));
$customer_count = count(getcustomerlist($vbid,'Vendor'));
$order_amount = getorderamount('',$vbid,'Vendor');
$order_amount = $order_amount[0]['totalamount'];
$out_of_stock = count(getoutofstockproducts($vbid,'','Vendor'));
$product_amount = getproductsamount($vbid,'','Vendor');
$product_amount = $product_amount[0]['productamount'];
$recent_orders = getorders($vbid,'Vendor');
$total_weekly_sale = progress_dashboard_weekly('',$vbid,'Vendor');

$weekly_deliverd_order = $total_weekly_sale['weekly_deliverd_order'];
$weekly_order = $total_weekly_sale['weekly_order'];
$weekly_route_order = $total_weekly_sale['weekly_route_order'];
$weekly_returned_order = $total_weekly_sale['weekly_returned_order'];
$weekly_store_pickup_order = $total_weekly_sale['weekly_store_pickup_order'];






if($weekly_order > 0){
$weekly_order_percantage = ($weekly_order / $order_count) * 100 ;



$weekly_deliverd_order_percantage = ($weekly_deliverd_order / $weekly_order) * 100 ;



$weekly_route_order_percantage = ($weekly_route_order / $weekly_order) * 100 ;



$weekly_returned_order_percantage = ($weekly_returned_order / $weekly_order) * 100 ;



$weekly_store_pickup_order_percantage = ($weekly_store_pickup_order / $weekly_order) * 100 ;

}else{

$weekly_order_percantage = 0 ;



$weekly_deliverd_order_percantage = 0;



$weekly_route_order_percantage = 0 ;



$weekly_returned_order_percantage = 0 ;



$weekly_store_pickup_order_percantage = 0 ;




}










$first_row = '<div class="row">
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-warning">
					<p>
						<i class="fa fa-spinner" aria-hidden="true" style="color:white; font-size:20px;"></i>
					</p>
					<h3> ' . $vendor_count . ' </h3>
					<p>Total Vendors</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-success">
					<p>
						<i class="fa fa-check" aria-hidden="true" style="color:white; font-size:20px;"></i>
					</p>
					<h3>'. $branch_count .' </h3>
					<p>Total Branch</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-success">
					<p>
						<i class="fa fa-check" aria-hidden="true" style="color:white; font-size:20px;"></i>
					</p>
					<h3>'. $product_count .' </h3>
					<p>Total Products</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-success">
					<p>
						<i class="fa fa-check" aria-hidden="true" style="color:white; font-size:20px;"></i>
					</p>
					<h3>'. $order_count . '</h3>
					<p>Total Orders</p>
				</div>
			</div>
		</div>';




$second_row = '<div class="row">
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-warning">
					<p>
						<i class="fa fa-spinner" aria-hidden="true" style="color:white; font-size:20px;"></i>
					</p>
					<h3>'. $customer_count .'</h3>
					<p>Total Customers</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-success">
					<p>
						<i class="fa fa-check" aria-hidden="true" style="color:white; font-size:20px;"></i>
					</p>
					<h3>'. $order_amount .'</h3>
					<p>Total Orders Amount</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-success">
					<p>
						<i class="fa fa-check" aria-hidden="true" style="color:white; font-size:20px;"></i>
					</p>
					<h3>'. $product_amount .'</h3>
					<p>Total Products Amount</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-success">
					<p>
						<i class="fa fa-check" aria-hidden="true" style="color:white; font-size:20px;"></i>
					</p>
					<h3>'. $out_of_stock .'</h3>
					<p>Running OUT OF STOCK</p>
				</div>
			</div>
		</div>';







$weekly_sales = '<div class="card-content">
						<div class="progress-wrapper">
							<p>
								Weekly Sales 
								<span class="float-right">'.$weekly_order.'</span>
							</p>
							<div class="progress">
								<div class="bg-primary" style="width:'.$weekly_order_percantage.'%"></div>
							</div>
						</div>
						<div class="progress-wrapper">
							<p>
								Delivered
								<span class="float-right">'.$weekly_deliverd_order.'</span>
							</p>
							<div class="progress">
								<div class="bg-primary" style="width:'.$weekly_deliverd_order_percantage.'%"></div>
							</div>
						</div>
						<div class="progress-wrapper">
							<p>
								On the way to Client
								<span class="float-right">'.$weekly_route_order.'</span>
							</p>
							<div class="progress">
								<div class="bg-primary" style="width:'.$weekly_route_order_percantage.'%"></div>
							</div>
						</div>
						<div class="progress-wrapper">
							<p>
								Returned
								<span class="float-right">'.$weekly_returned_order.'</span>
							</p>
							<div class="progress">
								<div class="bg-primary" style="width:'.$weekly_returned_order_percantage.'%"></div>
							</div>
						</div>
						<div class="progress-wrapper">
							<p>
								Pickup in Store
								<span class="float-right">'.$weekly_store_pickup_order.'</span>
							</p>
							<div class="progress">
								<div class="bg-primary" style="width:'.$weekly_store_pickup_order_percantage.'%"></div>
							</div>
						</div>
						</div>
					</div>';







}else{

	header('Location ?page=logout');
}

