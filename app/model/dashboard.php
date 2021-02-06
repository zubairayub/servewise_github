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

print_r($total_weekly_sale);
exit();



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
								<span class="float-right">321 $</span>
							</p>
							<div class="progress">
								<div class="bg-primary" style="width:70%"></div>
							</div>
						</div>
						<div class="progress-wrapper">
							<p>
								Delivered
								<span class="float-right"> 70%</span>
							</p>
							<div class="progress">
								<div class="bg-primary" style="width:70%"></div>
							</div>
						</div>
						<div class="progress-wrapper">
							<p>
								On the way to Client
								<span class="float-right"> 80%</span>
							</p>
							<div class="progress">
								<div class="bg-primary" style="width:80%"></div>
							</div>
						</div>
						<div class="progress-wrapper">
							<p>
								Returned
								<span class="float-right"> 10%</span>
							</p>
							<div class="progress">
								<div class="bg-primary" style="width:10%"></div>
							</div>
						</div>
						<div class="progress-wrapper">
							<p>
								Pickup in Store
								<span class="float-right"> ( 20 / 18)</span>
							</p>
							<div class="progress">
								<div class="bg-primary" style="width:70%"></div>
							</div>
						</div>
						</div>
					</div>';












}elseif($type == 'Vendor' || $owner_type == 'Vendor'){
// $data =  getvendors($logInId );
	$vbid =  $_SESSION['vendor_id'];

}else{

	header('Location ?page=logout');
}

