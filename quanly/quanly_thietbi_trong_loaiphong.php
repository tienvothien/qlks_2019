<?php
    include './../dulieu/kiemtradangnhap.php';
?>
<!DOCTYPE html>
<html lang="en"><head>
    <title> Quản lý thiết bị </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="shortcut icon" type="image/jpg" href="./../images/vnkgu.png"/> -->
    <script type="text/javascript" src="../vendor/bootstrap.js"></script>
    <link rel="stylesheet" href="../vendor/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/12.css">
    <script type="text/javascript" src="./../js/js_quanly_thietbi_trong_loaiphong.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
</head>
<body >
    <div class="container-fluid">
        <a href="index.php" title="">
            <div class="container-fluid">
                <div class="row anhbia  text-center">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <img class="img-responsive" src="../images/QLKSM.png" alt="">
                    </div>
                    
                </div>
            </div>
        </a>
        <br>
        <div class="container-fluid">
            <div class="row">
                <?php include 'menutrai.php';?>
                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 benphai">
                    <div class="container-fluid" style="padding: 0px;">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 chutieude">
                                <h2>Danh sách thiết bị trong từng loại phòng
                                    <button type="button" class="btn btn-info btn-lg nutthemnek " data-toggle="modal" data-target="#myModal">Thêm thiết bị</button>
                                </h2>
                        </div>
                        </div>
                    <hr class="ngay_ad"></div>
                    <div class="container-fluid">
                        <div class="row"><!-- nho doi ten class -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                           <div class="dulieu_thietbi_trong_loaiphong"><?php include './../dulieu/dulieu_thietbi_trong_loaiphong.php'; ?></div> 
                        </div>
                        
                       
                        </div><!-- end thaydoi1 -->
                        </div><!-- end noidungthaydoi -->
                        </div> <!-- end col-9 -->
                        </div> <!-- end row noi dung -->
                    </div>
                </div>
            </body>
        </html>
        <!-- <script>
                $(document).ready( function () {
                $('#myTable').DataTable();
                } );
        </script> -->

<!-- hiện modal them phonf -->
<div class="modal fade " id="myModal" role="dialog">
    <div class="modal-dialog modal-sm themphong">
         <div class="modal-content themloaithietbi">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Thêm thiết bị vào phòng</h3>
            </div>
            <div class="modal-body">
                <form style="font-size: 20px; margin: auto;" class="form-horizontal"  id="from_them_phong_moi" name="from_them_phong_moi" action="">
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="sel1">Chọn loại phòng</label>
                        <div class="col-sm-7">
                            <select class="form-control select_lp"  name="ma_loai_phong" id="ma_loai_phong" >
                                <option value="" >Chọn Loại phòng</option>
                                <?php
                                    include "conn.php";
                                    $select = "select * from loaiphong where xoa=0";
                                    $query = mysqli_query($conn, $select);
                                    $num = mysqli_num_rows($query);
                                        if ($num > 0) {
                                            while ($row = mysqli_fetch_array($query)) {
                                                $ma_loai_phong = $row['ma_loai_phong'];
                                                $ten_loai_phong = $row['ten_loai_phong'];
                                                echo "<option value='$ma_loai_phong'>$ten_loai_phong</option>";
                                                 }
                                                    } else {
                                                     echo "<option value=''>k co du lieu</option>";
                                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="sel1">Chọn loại thiết bị</label>
                        <div class="col-sm-7">
                            <select class="form-control select_ltb"  name="ma_loai_tb" id="ma_loai_tb">
                                <option value="" >Chọn loại thiết bị</option>
                                    <?php
                                        include "conn.php";
                                        $select = "select * from loaithietbi where xoa=0";
                                        $query = mysqli_query($conn, $select);
                                        $num = mysqli_num_rows($query);
                                            if ($num > 0) {
                                                while ($row = mysqli_fetch_array($query)) {
                                                    $MA_LOAI_THIET_BI = $row['MA_LOAI_THIET_BI'];
                                                    $TEN_LOAI_THIET_BI = $row['TEN_LOAI_THIET_BI'];
                                                    echo "<option value='$MA_LOAI_THIET_BI'>$TEN_LOAI_THIET_BI</option>";
                                                    }
                                                        } else {
                                                            echo "<option value=''>k co du lieu</option>";
                                                    }
                                    ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="sel1">Chọn số lượng loại thiết bị</label>
                        <div class="col-sm-7">
                            <select name="soluong_loai_tb" id="soluong_loai_tb" class="form-control" required="required">
                                <option value="" id="soluong_loai_tb"></option>
                                <?php for ($i=1; $i <11 ; $i++) { 
                                   echo "<option value='$i'>$i</option>";
                                } ?>                               
                               
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success  " onclick="themtbphong();">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal hiện thông tin chi tiết -->
<div id="views_phong" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Chi tiết thiết bị trong từng loại phòng</h4>
            </div>
                <div class="modal-body" id="employee_detail2">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Trở về</button>
                </div>
        </div>
    </div>
</div>
<!-- hiện thông tin thiết bị xóa -->
    <div id="xoatTlp" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Chi tiết thiết bị xóa</h4>
                </div>
                <div class="modal-body" id="xoatTlpemployee_detail2">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Trở về</button>
                </div>
            </div>
        </div>
    </div>
    <div id="chitiet_data_Modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cập nhật thông tin Phòng</h4>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                               <tr>
                                <th>Thiết bị</th>
                                <th>Xóa</th>
                               </tr>
                            </thead>
                            <tbody>
                                <form method="post" id="sua_thongtinphong1" data-confirm="Bạn có chắn muốn cập nhật lại thông tin này?">
                                    <tr>
                                        <td> <input disabled type="text" name="tenthietietbisua" id="tenthietietbisua" class="form-control "style="text-transform: uppercase;" /></td>
                                        <td style="text-align: center;"><input type="submit" name="insert" id="insert" value="Xóa" class="btn btn-danger capnhattb" /></td>
                                    </tr>
                                </form>
                            </tbody>
                        </table>
                    </div>

                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Trở lại</button>
                    </div>
            </div>
        </div>
    </div>

