// xem chi tiết phòng
$(document).ready(function(){
        // nhấn nút edit hiện thông tin sưa
      $(document).on('click', '.chitiet_tbp', function(){
           var matblp_chitiet = $(this).attr("id");
           // alert(matblp_chitiet);
           $.ajax({
              url:"./../dulieu/chitiet_thietbi_trong_loaiphong.php",
              method:"POST",
              data:{matblp_chitiet:matblp_chitiet},
              success:function(data123){
                $('#employee_detail2').html(data123);
                $('#views_phong').modal('show');
              }
            });
      });
       
  // hiện thông báo khi bấm nút xóa
      $(document).on('submit', 'form[data-confirm]', function(e){
        var mathietbixoa13143 = $('#ma_tb_canxoa12').val();
        if (mathietbixoa13143) {

        if(!confirm($(this).data('confirm'))){
          e.stopImmediatePropagation();
          e.preventDefault();
        }else{
          // //xu ly nhấn nút xóa thiết bị
              event.preventDefault();
              $.ajax({
                url:"./insert_phong.php",
                method:"POST",
                data:{mathietbixoa13143:mathietbixoa13143},
                success:function(data129){
                  // alert(data129);
                  if (data129==99) {
                    alert('Xóa thiết bi thành công');
                    $('#xoa_ltb_form')[0].reset();
                    $('#xoa_loaithietbi123_data_Modal').modal('hide');
                    $('#dlthietbi').load('./dlthietbi.php');
                  }else {
                    alert('Lỗi xóa lỗi');
                  }
                }
            });
        }
      }
    });
      //cập nhật lại thông tin thiết bị 
// $(document).on('click', '.suathietbitrongtungloaiphong', function(){
//            var ma_thietbicapnhat = $(this).attr("id");
           
           // $.ajax({
           //      url:"./fetch.php",
           //      method:"POST",
           //      data:{ma_thietbicapnhat:ma_thietbicapnhat},
           //      dataType:"json",
           //      success:function(data){
           //        // alert(data);
           //          $('#ma_thietbicapnhat').val(data.MA_LOAI_THIET_BI);
           //          $('#ten_ltpcapnhat').val(data.TEN_LOAI_THIET_BI);
           //          $('#ma_tbsua1').val(data.MA_LOAI_THIET_BI);
                    
           //          $('#insert').val("Cập nhật");
           //          $('#thietbi_data_Modal').modal('show');
           //      }
           // });
      // });


  });
// hiện thông tin chi tiết thiết bị cần xóa trong từng loại phong
  $(document).on('click', '.sua_tbphong', function () {
    var ma_loai_phong = $(this).attr("id");
    // alert(ma_loai_phong);
    $.ajax({
      url:"./../dulieu/chitiet_thietbi_trong_loaiphong.php",
      method:"POST",
      data:{ma_loai_phong:ma_loai_phong},
      // dataType:"json",
      success:function(data){
        // alert(data);
        $('#xoatTlpemployee_detail2').html(data);
        $('#xoatTlp').modal('show');
      }
    });    
  })
// hiện thông báo khi bấm nút xóa
      // $(document).on('submit', 'form[data-confirm]', function(e){
      //   var mathietbixoa13143 = $('#ma_tb_canxoa12').val();
      //   alert('msg');
        // if (mathietbixoa13143) {

        // if(!confirm($(this).data('confirm'))){
        //   e.stopImmediatePropagation();
        //   e.preventDefault();
        // }else{
        //   // //xu ly nhấn nút xóa thiết bị
        //       event.preventDefault();
        //       $.ajax({
        //         url:"./insert_phong.php",
        //         method:"POST",
        //         data:{mathietbixoa13143:mathietbixoa13143},
        //         success:function(data129){
        //           // alert(data129);
        //           if (data129==99) {
        //             alert('Xóa thiết bi thành công');
        //             $('#xoa_ltb_form')[0].reset();
        //             $('#xoa_loaithietbi123_data_Modal').modal('hide');
        //             $('#dlthietbi').load('./dlthietbi.php');
        //           }else {
        //             alert('Lỗi xóa lỗi');
        //           }
        //         }
        //     });
        // }
      // }
    // });

  // xử lý nút xóa thiết bị trong tưng loại phòng
  $(document).on('click', '.xoathietbitrongtungloaiphong', function () {
    var ma_loai_phong_xoa = $(this).attr("id");
    //alert(ma_loai_phong_xoa);
    $.ajax({
      url:"./../dulieu/add_thietbi_vao_loaiphong.php",
      method:"POST",
      data:{ma_loai_phong_xoa:ma_loai_phong_xoa},
      dataType:"json",
      success:function(data){
        if (data==99) {
          alert('Xóa thành công');
          $('#xoatTlp').modal('hide');
        }else{
          alert('Lỗi xóa')
        }
        
      }
    });    
  })


// them thiết bị mới vào loại phòng
 function themtbphong(){ // them phong mới vào
  event.preventDefault();
  if ($('#ma_loai_phong').val()=='') {
        $('#ma_loai_phong').removeClass('vienxanh');
        $('#ma_loai_phong').addClass('viendo');
        alert('Chưa chọn loại phòng');
      }else{
        $('#ma_loai_phong').removeClass('viendo');
        $('#ma_loai_phong').addClass('vienxanh');
      // kiem tra chưa chọn loại thiết bị
      if ($('#ma_loai_tb').val()=='') {
        $('#ma_loai_tb').removeClass('vienxanh');
        $('#ma_loai_tb').addClass('viendo');
        alert('Chưa chọn loại thiết bị');
      }else{
        $('#ma_loai_tb').removeClass('viendo');
        $('#ma_loai_tb').addClass('vienxanh');
      // kiem tra chưa chọn số lượng loại thiết bị
      if ($('#soluong_loai_tb').val()=='') {
        $('#soluong_loai_tb').removeClass('vienxanh');
        $('#soluong_loai_tb').addClass('viendo');
        alert('Chưa chọn số lượng loại thiết bị');
      }else{
        $('#soluong_loai_tb').removeClass('viendo');
        $('#soluong_loai_tb').addClass('vienxanh');
        // nếu đủ dữ liệu tiến hành gọi hàm thêm phòng
        var ma_loai_phong= $('#ma_loai_phong').val()
        var ma_loai_tb= $('#ma_loai_tb').val()
        var soluong_loai_tb= $('#soluong_loai_tb').val()
        $.ajax({
          url:"./../dulieu/add_thietbi_vao_loaiphong.php",
          method:"POST",
          data:{
            ma_loai_phong:ma_loai_phong,
            ma_loai_tb:ma_loai_tb,
            soluong_loai_tb:soluong_loai_tb
             },
          success:function(data123){
            // alert(data123);
            if (data123==1) {
              $('#ma_loai_tb').addClass('viendo');
              $('#ma_loai_tb').removeClass('vienxanh');
              alert('Thiết bị đã tồn tại');
            }else{
              if (data123==99) {
                alert("Thêm thiết bị thành công");
                $('#ma_loai_phong').val();
                $('#ma_loai_tb').val();
                $('#soluong_loai_tb').val();
                 location.reload();
              }
            }         
          }
        });
          }//số lượng
        // kết thúc code thêm dữ liệu phòng
      }
      // két thúc kiểm tra mã loại phòng
    
    }
  
};

     


