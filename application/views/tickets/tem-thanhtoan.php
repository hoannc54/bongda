<!DOCTYPE html>
<html>
<head>
<title><?php echo $title; ?> by www.hoangcode.com</title>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta name="description" content="<?php echo $description; ?>" />
<meta name="keywords" content="<?php echo $keywords; ?>"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>	
<link rel="Shortcut Icon" href="#" type="image/x-icon" />	
<style type="text/css">
#bill_info{
    background-color:#90BA7B;
    width:640px;
    margin:0 auto;
    margin-bottom:10px;
}
h1{
    padding:30px;
    background-color:#7C5656;
    color:#FFF;
    font-size: 30px;
}
tr {
    display: table-row;
    vertical-align: inherit;
    border-color: inherit;
}
th, td{
  text-align: left;
  padding: 10px 5px;
}
input{
    padding: 5px 5px;
}
.fg-button.teal {
  color: #fff;
  background-color: #f16725;
}
.fg-button {
  border-radius: 4px;
  font-size: 16px;
  padding: 4px 28px;
  text-decoration: none;
  border: 0px solid;
  cursor: pointer;
  outline: none;
  margin-left: 20px;
  transition: 0.3s background;
}
</style>          
<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script type="text/javascript">

</script> 
</head>
<body>
<?php
    $grand_total = 0;
    if ($cart = $this->cart->contents()):
        foreach ($cart as $item):
            $grand_total = $grand_total + $item['subtotal'];
        endforeach;
    endif;
?>
    <section>
        <div id="bill_info">            
          <form name="billing" method="post" action="<?php echo base_url('shopping/save_order'); ?>">
                <input type="hidden" name="command"/>
                <div align="center">
                    <h1 align="center">Thông tin thanh toán</h1>
                    <table border="0" cellpadding="2px">
                        <tbody>
                            <tr><td>Tổng tiền:</td><td><strong style="color: white; padding-left: 10px;"> <?php echo number_format($grand_total); ?> vnđ</strong></td></tr>
                            <tr><td>Your Name:</td><td><input style="color:#000000;" type="text" name="name" required=""/></td></tr>
                            <tr><td>Email:</td><td><input style="color:#000000;" type="text" name="email" required=""/></td></tr>
                            <tr><td>Phone:</td><td><input style="color:#000000;" type="text" name="phone" required=""/></td></tr>
                            <tr><td>Address:</td><td><textarea style="color:#000000;" name="address" cols="35" rows="5"  required=""></textarea></td></tr>
                            <tr>
                                <td><a class="fg-button teal" id="back" href="<?php echo base_url('shopping.html'); ?>">Shopping</a>                            </td>
                                <td><input class="fg-button teal" type="submit" value="Gửi thông tin"/></td>
                            </tr> 
                        </tbody>
                    </table>
                </div>
            </form>
        </div>        
    </section>
</body>
</html>