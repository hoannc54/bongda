<div class="col-md-9">

    <div class="row">
        <div class="col-md-4">
            <div class="list-group">
                <a href="#" class="list-group-item active">
                    <?php echo "BẢNG XẾP HẠNG KHU VỰC ";?>
                </a>
                <?php
                foreach ($regionals as $r) {
                    echo "<a href='" . base_url() . "view/ranking/" . $r['regional_id'] . "' class='list-group-item'>" . $r['regional_name'] . "</a>";
                }
                ?>
            </div>
        </div><!-- /.col-sm-4 -->
        <div class="col-md-8">
        <form action="<?php echo base_url();?>view/ranking" method="post">
        <select name = 'mua_giai'>
        <?php foreach ($year as $y) {
           
                echo "<option value = '".$y['year']."'>".$y['year']."</option>";
               
           } ?>
        </select>
       
       
           
        <input type="submit" name="submit" value="Go"/>
        </form>
            <div class="panel panel-primary" style="margin:50dp;">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo "BẢNG XẾP HẠNG BÓNG ĐÁ " . $regional->regional_name."".$mua_giai; ?></h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Vị trí BXH</th>
                                <th>Tên Đội Bóng</th>
                                <th>Số Trận Thắng</th>
                                <th>Số Trận Thua</th>
                                <th>Tổng Điểm</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $position = 1;
                            foreach ($ranking as $r) {
                                echo "<tr>";
                                echo "<td>" . $position++ . "</td>";
                                echo "<td>" . $r['team'] . "</td>";
                                echo "<td>" . $r['won'] . "</td>";
                                echo "<td>" . $r['lost'] . "</td>";
                                echo "<td>" . $r['points'] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>