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
a {
  text-decoration: none;
}
.homeproduct {
  overflow: hidden;
  width: 1194px;
  display: block;
  margin: 20px auto 0;
  border-top: 1px solid #ddd;
  border-left: 1px solid #ddd;
  background-color: white;
}
.homeproduct a {
  float: left;
  position: relative;
  width: 188px;
  height: 280px;
  padding: 0 5px;
  border-right: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
  background: #fff;
  overflow: hidden;
}
.homeproduct a figure {
  display: table-cell;
  vertical-align: bottom;
  width: 189px;
  height: 260px;
}
.homeproduct a img {
  max-width: 120px;
  max-height: 120px;
  margin: 20px auto 10px;
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
}
.homeproduct a .textkm {
  display: block;
  vertical-align: bottom;
  font-size: 11px;
  color: #666;
}
.homeproduct a h4 {
  display: table-cell;
  vertical-align: bottom;
  color: #c70101;
  font-weight: bold;
  font-size: 12px;
  line-height: 18px;
}
.homeproduct a h3 {
  display: block;
  font-size: 13px;
  font-weight: bold;
  color: #444;
  line-height: 14px;
  margin-bottom: 0;
  margin-top: 2px;
  width: 100%;
  max-height: 28px;
  overflow: hidden;
}
#add_button {
  margin-top: 20px;
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
#cart {
  width: 1194px;
  height: auto;
  margin: 20px auto 0;
  background-color: #FFFFFF;
}
#heading {
  padding-bottom: 10px;
}
div#text {
  color: red;
  margin-left: 458px;
  font-family: 'Raleway', sans-serif;
}
table{
    border-collapse: separate;
    border-spacing: 1px;
    border-color: gray;
}
#table {
  font-size: 15px;
  background-color: #E1E1E1;
  width: 100%;
}
#main_heading {
  font-weight: bold;
}
tr {
    background: white;
    display: table-row;
    vertical-align: inherit;
    border-color: inherit;
}
th, td{
  text-align: left;
  padding: 10px 5px;
}
</style>          
<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script type="text/javascript">
function clear_cart() {
    var result = confirm('Bạn muốn xóa hết số lượng vé đã đặt???');
    if (result) 
        {
            window.location = "<?php echo base_url('shopping/remove/all'); ?>";
        }
    else {
        return false;
        }
}
</script> 
</head>
<body>
<section id="cart">
        <div id="heading">
            <h2 style="text-align: center;color:#000000;">ĐẶT VÉ </h2>
        </div>
        <div id="text">
            <?php 
            $cart_check = $this->cart->contents();
            if(empty($cart_check)) {
                echo 'Bạn chưa đặt vé trên hệ thống!';
            } ?> 
        </div>
<table id="table" border="0" cellpadding="10px" cellspacing="1px">
    <?php
      if ($cart = $this->cart->contents()): ?>
    <tr id= "main_heading" style="color:#000000;">
        <td>Số thứ tự</td>
        <td>Tên sản phẩm</td>
        <td>Giá</td>
        <td>Số lượng</td>
        <td>Thành tiền</td>
        <td>Xóa sản phẩm</td>
    </tr>
    <?php
        echo form_open('shopping/update_cart');
        $grand_total = 0;
        $i = 1;
        foreach ($cart as $item):
            echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
            echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
            echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
            echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
            echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
    ?>
    <tr style="color:#000000;">
        <td><?php echo $i++; ?></td>
        <td><?php echo $item['name']; ?></td>
        <td><?php echo number_format($item['price']); ?> vnđ </td>
        <td><?php echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: right"'); ?></td>
        <?php $grand_total = $grand_total + $item['subtotal']; ?>
        <td><?php echo number_format($item['subtotal']) ?> vnđ </td>
        <td>   
            <a href="<?php echo base_url('shopping/remove/' . $item['rowid']); ?>">
                <img src="<?php echo base_url('assets/images/cart_cross.jpg'); ?>" width='25px' height='20px'/>   
            </a>
        </td>
        <?php endforeach; ?>
    </tr>
    <tr>
        <td><b style="color:#000000;">Tổng tiền: <?php echo number_format($grand_total); ?> vnđ</b></td>
        <?php // "clear cart" button call javascript confirmation message ?>
        <td colspan="5" align="right"><input  class ='fg-button teal' type="button" value="Xóa vé" onclick="clear_cart()"/>
        <?php //submit button. ?>
        <input class ='fg-button teal'  type="submit" value="Update số lượng"/>
        <?php echo form_close(); ?>
        <input class ='fg-button teal' type="button" value="Thanh toán" onclick="window.location = '<?php echo base_url('shopping/billing_view') ?>'"/></td>
    </tr>
    <?php endif; ?>
</table>      
</section>
    <section class="homeproduct">
    
        <?php foreach($post->result() as $row): ?>     
            <a class="proditem" href="#">
                <figure>
                    <img src="<?php echo base_url('assets/images/'.$row->img); ?>" alt="<?php echo $row->name; ?>" width="120" height="120"/>
                    <span class="textkm"><?php echo $row->title; ?></span>
                    <h4>Price: <?php echo $row->price; ?></h4>
                    <h3><?php echo $row->name; ?></h3>
                   

                     <!--  <input type="hidden" name="id" value="<?php echo $row->id; ?>"/>
                      <input type="hidden" name="name" value="<?php echo $row->name; ?>"/>
                      <input type="hidden" name="price" value="<?php echo $row->price; ?>"/>   --> 
                    <form action="<?php echo base_url();?>shopping/add" method="post" accept-charset="utf-8">
                      <?php $name = $row->name;?>
                      <?php $id = $row->id;?>
                      <?php $price = $row->price;?>
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <input type="hidden" name="name" value="<?php echo $name; ?>"/>
                      <input type="hidden" name="price" value="<?php echo $price;?>"/>                 
                      <p id="add_button"> 
                      <input type="submit" name="action" value="Đặt vé" class="fg-button teal"/></p>
                   </form>                          
                </figure>           
            </a>
        <?php endforeach;?>    
    </section>
</body>
</html>