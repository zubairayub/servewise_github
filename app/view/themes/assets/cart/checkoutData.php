<?php
REQUIRE '../../include/config.php';

if(!empty($_POST)){

$order_id =  process_order($DB_CLASS,$_POST,$owner_id,$vb_id);
}
if(!empty($_GET)){

    $status = $_GET['status'].'<br>';
    $trans_id = $_GET['transaction_id'].'<br>';
?>
<script>
var dataLayer = window.dataLayer || [];
dataLayer.push({
    'event': 'transaction',
    'ecommerce': {
        'purchase': {
            'actionField': {
                'id': <?= $trans_id; ?>,
                'revenue' : '68.00'
            },
            'products': [{
                'name': 'cow_meat',
                'id': '32',
                'price': '15.25',
                'quantity': '1',
            },
        ]
        
    }
    
}
});
</script>
<?php
}



?>