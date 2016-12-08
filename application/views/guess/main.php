<div class="col-md-9">
<h2 style="color:#000000"><?php echo "Du doan ket qua ty so giua 2 doi ".$doi1." va ".$doi2; ?></h2>

</br>
<form action="<?php echo base_url();?>view/guess_result" method="post">
<p>Chon doi bong thu 1(chu nha)</p>
<select name = 'doi1'>
<?php foreach ($list_team as $lt){
	echo "<option value = '".$lt['team_name']."'>".$lt['team_name']."</option>";
	
}?>
</select>
<br>
<p>Chon doi bong thu 2</p>
<select name = 'doi2'>
<?php foreach ($list_team as $lt){
	echo "<option value = '".$lt['team_name']."'>".$lt['team_name']."</option>";
}?>
</select>
<br>
<p>Chon thoi gian thi dau de du doan</p>
<br>
<p>Chon ngay</p>
<select name = "ngay">
	<?php 
	for ($i = 1;$i<32;$i++)
		echo "<option value = '".$i."'>".$i."</option>";
	?>
</select>
<br>
<p>Chon thang</p>
<select name = "thang">
<?php
for( $i = 1;$i<13;$i++){
	echo "<option value = '".$i."'>".$i."</option>";
}

?>
</select>
<br>
<p>Chon nam</p>
<select name = "nam">
<?php
for( $i = 1993;$i<=2016;$i++){
	echo "<option value = '".$i."'>".$i."</option>";
}

?>
</select>
<br>
<br>
<input type="submit" name="submit" value="Go"/>
</div>