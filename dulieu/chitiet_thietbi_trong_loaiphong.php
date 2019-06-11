<?php 
// lấy dữ liệu tb lp  để xem chi tiết
if (isset($_POST["matblp_chitiet"])) {
	$output = '';
	include 'conn.php';

	$result = mysqli_query($conn, "SELECT cothietbi.ma_loai_phong,loaiphong.ten_loai_phong, cothietbi.MA_LOAI_THIET_BI, cothietbi.SO_LUONG ,loaithietbi.TEN_LOAI_THIET_BI FROM cothietbi, loaithietbi, loaiphong WHERE loaiphong.ma_loai_phong = cothietbi.ma_loai_phong AND loaithietbi.MA_LOAI_THIET_BI = cothietbi.MA_LOAI_THIET_BI AND cothietbi.xoa = 0 AND loaithietbi.XOA = 0 AND cothietbi.ma_loai_phong = '$_POST[matblp_chitiet]'");

	if (mysqli_num_rows($result)) {
		$output .= '
      <div class="table-responsive">
           <table class="table table-bordered table-hover">
           <tr>
              <th>STT</th>
              <th>Thiết bị</th>
              <th>Số lượng</th>
           </tr>  ';

		$so1 = 1;
		while ($row = mysqli_fetch_array($result)) {

			$output .= '

                <tr>
                     <td style=" text-transform: capitalize; text-align:center;">' . $so1 . '</td>
                     <td style=" text-transform: capitalize;">' . $row["TEN_LOAI_THIET_BI"] . '</td>
                    <td style=" text-transform: capitalize;">' . $row["SO_LUONG"] . '</td>
                </tr>
           ';
			$so1++;
		}
		$output .= '
           </table>
      </div>
      ';
		echo $output;
	} else {
		echo "Chưa có dữ liệu";
	}

}

// lấy dữ liệu tb lp  để xem chi tiết và xóa
if (isset($_POST["ma_loai_phong"])) {
	$output = '';
	include 'conn.php';

	$result = mysqli_query($conn, "SELECT cothietbi.id, cothietbi.ma_loai_phong ,loaiphong.ten_loai_phong, cothietbi.MA_LOAI_THIET_BI, cothietbi.SO_LUONG ,loaithietbi.TEN_LOAI_THIET_BI FROM cothietbi, loaithietbi, loaiphong WHERE loaiphong.ma_loai_phong = cothietbi.ma_loai_phong AND loaithietbi.MA_LOAI_THIET_BI = cothietbi.MA_LOAI_THIET_BI AND cothietbi.xoa = 0 AND loaithietbi.XOA = 0 AND cothietbi.ma_loai_phong ='$_POST[ma_loai_phong]'");

	if (mysqli_num_rows($result)) {
		$output .= '
      <div class="table-responsive">
           <table class="table table-bordered table-hover">
           <tr>
              <th>STT</th>
              <th>Thiết bị</th>
              <th>Số lượng</th>
              <th>Sửa</th>
              <th>Xóa</th>
           </tr>  ';

		$so1 = 1;
		while ($row = mysqli_fetch_array($result)) {

			$output .= '

                <tr>
                     <td style=" text-transform: capitalize; text-align:center;">' . $so1 . '</td>
                     <td style=" text-transform: capitalize;">' . $row["TEN_LOAI_THIET_BI"] . '</td>
                     <td style=" text-transform: capitalize;">' . $row["SO_LUONG"] . '</td>

                     <td style=" text-transform: capitalize;">
                     <input type="button"  class=" btn btn-danger suathietbitrongtungloaiphong" name="sua"  id="' . $row["id"] . '" value="Sửa">
                     </td>
                     <td style=" text-transform: capitalize;">
                     <input type="button"  class="xoathietbitrongtungloaiphong btn btn-danger" name=""  id="' . $row["id"] . '" value="Xóa">
                     </td>

                </tr>
           ';
			$so1++;
		}
		$output .= '
           </table>
      </div>
      ';
		echo $output;
	} else {
		echo "Chưa có dữ liệu";
	}

}
 ?>