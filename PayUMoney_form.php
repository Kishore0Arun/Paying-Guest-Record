<?php
session_start();
if(isset($_POST['submit']))
	{
		$area=$_POST['areaName'];
		$com=$_POST['completeAdd'];
		$deli=$_POST['deliveryInst'];
		$pay=$_POST['payMode'];
		$link=@mysql_connect("localhost","root","");
		mysql_select_db("nwb",$link);
		mysql_query("insert into addresstab(areaName,completeAdd,deliveryInst,payMode) values('".$area."', '".$com."', '".$deli."','".$pay."')");
		mysql_close();
	}


$total=0;
	$total = $_POST['amount'];
	$merchant_key  = "gtKFFx";
	$salt          = "eCwWELxi";
	$payu_base_url = "https://test.payu.in"; // For Test environment
	$action        = '';
	$currentDir	   = 'http://localhost/creative/payment/payumoney/';
	$posted = array();
	if(!empty($_POST)) {
	  foreach($_POST as $key => $value) {    
	    $posted[$key] = $value; 
	  }
	}
	

	$formError = 0;
	if(empty($posted['txnid'])) {
	  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
	} else {
	  $txnid = $posted['txnid'];
	}

	$hash         = '';
	$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";

	if(empty($posted['hash']) && sizeof($posted) > 0) {
	  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
	  ){
	    $formError = 1;

	  } else {
	   	$hashVarsSeq = explode('|', $hashSequence);
	    $hash_string = '';	
		foreach($hashVarsSeq as $hash_var) {
	      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
	      $hash_string .= '|';
	    }
	    $hash_string .= $salt;
	    $hash = strtolower(hash('sha512', $hash_string));
	    $action = $payu_base_url . '/_payment';
	  }
	} elseif(!empty($posted['hash'])) {
	  $hash = $posted['hash'];
	  $action = $payu_base_url . '/_payment';
	}
?>
<html>
  <head>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  <meta charset="UTF-8">
        <title>NWB</title>
        <link rel="stylesheet" href="css1/normalize.css">
        <link rel="stylesheet" href="css1/main.css" media="screen" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css1/bootstrap.css">
        <link rel="stylesheet" href="css1/style-portfolio.css">
        <link rel="stylesheet" href="css1/picto-foundry-food.css" />
        <link rel="stylesheet" href="css1/jquery-ui.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css1/font-awesome.min.css" rel="stylesheet">
</head>
  </head>
  <body onload="submitPayuForm()">
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="row">
                <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
					<image src="./images/icon.png">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">NWB</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </nav>
  <br/><br/><br/><br/><br/><br/>
  <table align="center">
  <tr><td>
  <div style="padding:50px">
  <center>
    <h2 class="right-text">PayU Form</h2>
    <br/>
    <?php if($formError) { ?>
      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php } ?>
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $merchant_key ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <table>
        <tr>
          <td><b>Mandatory Parameters</b><br/><br/>
        <tr><br/><br/><br/><br/>
          <td>Amount <span class="mand">*</span>: </td>
          <td><input name="amount" type="text" class="form" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount']; ?>"/></td>
		</tr>
		<tr>
          <td>First Name <span class="mand">*</span>: </td>
          <td><input type="text" name="firstname" id="firstname" class="form" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" /></td>
        </tr>
        <tr>
          <td>Email <span class="mand">*</span>: </td>
          <td><input type="email" name="email" id="email" class="form" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" /></td>
		  </tr>
		<tr>
          <td>Phone <span class="mand">*</span>: </td>
          <td><input type="text" name="phone" class="form" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" /></td>
        </tr>
        <tr>
          <td>Product Info <span class="mand">*</span>: </td>
          <td colspan="3"><input type="text" name="productinfo" class="form" value="<?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?>" /></td>
        </tr>
        <tr>
          <td colspan="3"><input type="hidden" name="surl" value="<?php echo (empty($posted['surl'])) ? $currentDir.'success.php' : $posted['surl'] ?>" size="64" /></td>
        </tr>
        <tr>
          <td colspan="3"><input type="hidden" name="furl" value="<?php echo (empty($posted['furl'])) ? $currentDir.'failure.php' : $posted['furl'] ?>" size="64" /></td>
        </tr>

        <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="" size="64" /></td>
        </tr>

        
        <tr>
          <?php if(!$hash) { ?>
            <td colspan="4"><input type="submit" value="Submit" class="text-center form-btn form-btn" /></td>
          <?php } ?>
        </tr>
      </table>
    </form>
	</center>
	</div>
	</td>
	<td>
	<div >
	
	<div>
	<h3>Order Details</h3>
		<table class="table-bordered" style="margin-bottom:180px;background-color:lightblue">
			<tr>
				<th width="100px">Item Name</th>
				<th width="50px">Quantity</th>
				<th width="180px">&nbsp;Price</th>
				<th width="50px">Total</th>
			</tr>
			<tr><td><br/></td></tr>
			<?php
			if(!empty($_SESSION["shopping_cart"]))
			{
				
				foreach($_SESSION["shopping_cart"] as $keys => $values)
				{
			?>
			<tr>
				<td><?php echo $values["item_name"]; ?></td>
				<td><?php echo $values["item_quantity"]; ?></td>
				<td>&nbsp;RS. <?php echo $values["item_price"]; ?></td>
				<td><?php echo number_format($values["item_quantity"] * $values["item_price"],2); ?></td>
			</tr>
			<?php
					$total=$total+($values["item_quantity"]* $values["item_price"]);
				}
				?>
				<?php
			}
			?>
		</table>
	</div>
	</div>
	</td>
	</tr></table>
	
  </body>
</html>
