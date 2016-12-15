<div class="col-md-9">
<h2 style="color:#000000">Du doan ket qua ty so</h2>

</br>
<?php echo "DU DOAN KET QUA THI DAU CUA 2 DOI: ".$doi1." VA ".$doi2 ; ?></h2>
<br>
	<pre>
<?php

var_dump($team);
echo $year;?>
</pre>
	<?php
foreach ($history1 as $h ) {
$thang_san_nha = $h['count_Thg'];
$thua_san_nha = $h['count_Thua'];
$hoa_san_nha = $h['count_Hoa'];
echo "THONG KE LICH SU THI DAU CUA 2 DOI";
echo "<br>";
echo "VOI VAI TRO CHU NHA CUA ".$h['home_team'];
echo "<br>";
echo "Lich su doi dau cua 2 doi: Doi chu nha da tung thang :". $h['count_Thg']."tran";
echo "<br>";
echo "Lich su doi dau cua 2 doi: Doi chu nha da tung thua :". $h['count_Thua']."tran";
echo "<br>";
echo "Lich su doi dau cua 2 doi: Doi chu nha da tung hoa :". $h['count_Hoa']."tran";
echo "<br>";
}
?>
<?php 
foreach ($history2 as $h ) {
$thua_san_khach = $h['count_Thg'];
$thang_san_khach = $h['count_Thua'];
$hoa_san_khach = $h['count_Hoa'];
echo "THONG KE LICH SU THI DAU CUA 2 DOI";
echo "<br>";
echo "VOI VAI TRO CHU NHA CUA ".$h['home_team'];
echo "<br>";
echo "Lich su doi dau cua 2 doi: Doi chu nha da tung thang :". $h['count_Thg']."tran";
echo "<br>";
echo "Lich su doi dau cua 2 doi: Doi chu nha da tung thua :". $h['count_Thua']."tran";
echo "<br>";
echo "Lich su doi dau cua 2 doi: Doi chu nha da tung hoa :". $h['count_Hoa']."tran";
echo "<br>";
}
?>
<?php
echo "Cac doi da tung thi dau voi nhau o cac thoi diem la";
echo "<br>";
echo "Thoi Gian Thi Dau Cua 2 Doi";
echo "<br>";
foreach ($date as $d) {
	$date = $d['year'];
	list($ngaydl, $thangdl, $namdl) = explode("/",$date);
	
	echo "</br>";
	echo "Ngay: ".$ngaydl."+ Thang: ".$thangdl." + Nam: ".$namdl;
	echo "<br>";
}
?>
<?php 
 echo "Thoi diem duoc nhap vao tu he thong";
 echo "</br>";
 echo "Ngay: ".$ngay." Thang: ". $thang." Nam: ". $nam;
 echo "<br>";
 echo "Mua giai: ".$year;
?>
<p></p>
<?php
echo "<br>";
foreach ($team1_recent as $t1) {
echo "Phong do hien tai cua doi".$doi1."la: ";
echo "So tran thang san nha la: ".$t1['home_fthg'];
$rteam1_fthg_home = $t1['home_fthg'];
$rteam1_fthg_away = $t1['away_fthg'];
$rteam1_ftag_home = $t1['home_ftag'];
$rteam1_ftag_away = $t1['away_ftag'];
$rteam1_fequal_home = $t1['home_equal'];
$rteam1_fequal_away = $t1['away_equal'];
echo "<br>";
}
 
?>
<?php
echo "<br>";
foreach ($team2_recent as $t1) {
echo "Phong do hien tai cua doi".$doi2."la: ";
echo "So tran thang san nha la: ".$t1['home_fthg'];
$rteam2_fthg_home = $t1['home_fthg'];
$rteam2_fthg_away = $t1['away_fthg'];
$rteam2_ftag_home = $t1['home_ftag'];
$rteam2_ftag_away = $t1['away_ftag'];
$rteam2_fequal_home = $t1['home_equal'];
$rteam2_fequal_away = $t1['away_equal'];
echo "<br>";
}
 
?>
<?php
foreach ($team1_ranking as $r1) {
	echo "<br>";
	echo "So diem tren bang xep hang cua ".$doi1." la:".$r1['points'];
	$pteam1 = $r1['points'];
}?>
<?php
foreach ($team2_ranking as $r1) {
	echo "<br>";
	echo "So diem tren bang xep hang cua ".$doi2." la:".$r1['points'];
	$pteam2 = $r1['points'];
}
?>
// lay 3 gia tri tham so
<?php
// lich su thi dau
$tong = $thang_san_nha+$thang_san_khach+$thua_san_nha+$thua_san_khach+$hoa_san_nha+$hoa_san_khach;
$x1 =($thang_san_nha+$thang_san_khach)/($tong+1);
//phong do hien tai trong mua giai ve ty le thang san nha
$tong_mua_giai_home = $rteam1_fthg_home + $rteam1_fequal_home + $rteam1_ftag_home;
$x2 = $rteam1_fthg_home/($tong_mua_giai_home+1);
var_dump($x1);
var_dump($x2);
$x3 = $pteam1/($pteam1+$pteam2+1);
var_dump($x3);
//Vi tri tren bang xep hang

echo "<br>";
echo "Lich su thi dau: ".$x1;
echo "<br>";
echo "Phong do hien tai: ".$x2;
echo "<br>";
echo "Vi tri tren bang xep hang ".$x3;
echo "<br>";
$kq = ($x1+$x2+$x3)/3;
echo "Ty le thang cua doi ". $doi1." la ".$kq;
?>
</div>