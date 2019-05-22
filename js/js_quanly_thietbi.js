function themtb(){ 
  if ($('#them_ma_tb').val()=='') {
    $('#them_ma_tb').addClass('viendo');
    $('#them_ma_tb').removeClass('vienxanh');
    alert('Chưa nhập mã thiết bị');
  }else{
    if ($('#them_ma_tb').val().length==5) {
      $('#them_ma_tb').removeClass('viendo');
      $('#them_ma_tb').addClass('vienxanh');
      // kiem tra chưa nhập tên loại thiết bị
      if ($('#them_loai_tb').val()=='') {
        $('#them_loai_tb').removeClass('vienxanh');
        $('#them_loai_tb').addClass('viendo');
        alert('Chưa nhập tên loại thiết bị');
      }else{
        $('#them_loai_tb').removeClass('viendo');
        $('#them_loai_tb').addClass('vienxanh');
        //nếu đủ dữ liệu tiến hành gọi hàm thêm phòng
        var them_ma_tb= $('#them_ma_tb').val()
        var them_loai_tb= $('#them_loai_tb').val()
        $.ajax({
          url:"./../dulieu/add_thiet_bi_moi.php",
          method:"POST",
          data:{
            them_ma_tb:them_ma_tb,
            them_loai_tb:them_loai_tb
          },
          success:function(data123){them_ma_tb
            if (data123==1) {
              $('#them_ma_tb').addClass('viendo');
              $('#them_ma_tb').removeClass('vienxanh');
              alert('Mã đã tồn tại');
            }else{
              if (data123==99) {
                alert("Thêm thiết bị thành công");
               
               location.reload();
              }
            }         
          }
        });
        // kết thúc code thêm dữ liệu phòng
      }
      // két thúc kiểm tra mã loại phòng
    }else{
      $('#them_ma_tb').addClass('viendo');
      $('#them_ma_tb').removeClass('vienxanh');
      alert('Độ dài mã thiết bị sai ( Phải đủ  5 ký tự)');
    }
  }
};

 // xoa thiết bị
      $(document).on('click', '.btn_xoatb', function(){

           var mathietbixoa123 = $(this).attr("id");
           $.ajax({
                url:"./../dulieu/fetch.php",
                method:"POST",
                data:{mathietbixoa123:mathietbixoa123},
                dataType:"json",
                success:function(data){
                    $('#mathietbixoa123').val(data.MA_LOAI_THIET_BI);
                    $('#ma_tb_canxoa12').val(data.MA_LOAI_THIET_BI);
                    $('#tenthietbixoa').val(data.TEN_LOAI_THIET_BI);
                   
                    
                    $('#insert1').val("Xóa");
                    $('#xoa_loaithietbi123_data_Modal').modal('show');
                }

           });
      });   
      
// hiện thông báo khi bấm nút xóa
      $(document).on('submit', 'form[data-confirm]', function(e){
        var mathietbixoa123 = $('#ma_tb_canxoa12').val();
        if (mathietbixoa123) {

        if(!confirm($(this).data('confirm'))){
          e.stopImmediatePropagation();
          e.preventDefault();
        }else{
          // //xu ly nhấn nút xóa thiết bị
              event.preventDefault();
              $.ajax({
                url:"./../dulieu/delete.php",
                method:"POST",
                data:{mathietbixoa123:mathietbixoa123},
                success:function(data129){
                  // alert(data129);
                  if (data129==99) {
                    alert('Xóa thiết bị thành công');
                    $('#xoa_ltb_form')[0].reset();
                    $('#xoa_loaithietbi123_data_Modal').modal('hide');
                    location.reload();
                  }else {
                    alert('Lỗi xóa thiết bị');
                  }
                }
            });
        }
      }
    });

