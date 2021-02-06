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




$first_row = '<div class="row">
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter" style="background: rgb(252,235,69);background: linear-gradient(74deg, rgba(252,235,69,1) 0%, rgba(199,122,40,1) 100%);">
					<p>
						<i class="fa fa-user-circle-o" aria-hidden="true" style="color:white; font-size:20px;"></i>
					</p>
					<h3> ' . $vendor_count . ' </h3>
					<p>Total Vendors</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter" style="background: rgb(255,86,86);background: linear-gradient(74deg, rgba(255,86,86,1) 0%, rgba(255,35,35,1) 100%);">
					<p>
						<i class="fa fa-home" aria-hidden="true" style="color:white; font-size:20px;"></i>
					</p>
					<h3>'. $branch_count .' </h3>
					<p>Total Branch</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter" style="background: rgb(255,130,27);background: linear-gradient(74deg, rgba(255,130,27,1) 0%, rgba(255,100,23,1) 100%);">
					<p>
						<i class="fa fa-product-hunt" aria-hidden="true" style="color:white; font-size:20px;"></i>
					</p>
					<h3>'. $product_count .' </h3>
					<p>Total Products</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter" style="background: rgb(238,255,27);background: linear-gradient(74deg, rgba(238,255,27,1) 0%, rgba(255,225,23,1) 100%);">
					<p>
						<i class="fa fa-book" aria-hidden="true" style="color:white; font-size:20px;"></i>
					</p>
					<h3>'. $order_count . '</h3>
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
					<h3>'. $customer_count .'</h3>
					<p>Total Customers</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter" style="background: rgb(27,146,255);background: linear-gradient(74deg, rgba(27,146,255,1) 0%, rgba(23,172,255,1) 100%);">
					<p>
						<i class="fa fa-money" aria-hidden="true" style="color:white; font-size:20px;"></i>
					</p>
					<h3>'. $order_amount .'</h3>
					<p>Total Orders Amount</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter" style="background: rgb(161,27,255);background: linear-gradient(74deg, rgba(161,27,255,1) 0%, rgba(210,23,255,1) 100%);">
					<p>
					<i class="fa fa-money" aria-hidden="true" style="color:white; font-size:20px;"></i>
						<i class="fa fa-product-hunt" aria-hidden="true" style="color:white; font-size:20px;"></i>
					</p>
					<h3>'. $product_amount .'</h3>
					<p>Total Products Amount</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter" style="background: rgb(255,27,139);background: linear-gradient(74deg, rgba(255,27,139,1) 0%, rgba(255,23,51,1) 100%);">
					<p>
						<i class="fa fa-archive" aria-hidden="true" style="color:white; font-size:20px;"></i>
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

