@extends('backend.layouts.master')
@section('title')
Quản Trị - Thêm Mới Nhà Xuất Bản
@endsection
@section('feature-title')
Thêm Mới Nhà Xuất Bản
@endsection
@section('content')
<!-- DIV hiển thị thông báo lỗi start -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<!-- DIV hiển thị thông báo lỗi end -->
<form name="frmCreateNxb" id="frmCreateNxb" method="post" action="{{ url('admin/nxb/store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
  <div class="form-group" >
    <label for="manxb">Mã Nhà Xuất Bản</label>
    <input type="text" class="form-control" id="manxb" name="manxb" aria-describedby="manxbHelp" placeholder="Nhập mã Nhà Xuất Bản . . .">
    
  </div>
  <div class="form-group" >
    <label for="tennxb">Tên Nhà Xuất Bản</label>
    <input type="text" class="form-control" id="tennxb" name="tennxb" aria-describedby="tennxbHelp" placeholder="Nhập tên Nhà Xuất Bản . . .">
    
  </div>
  <a href="{{ url('admin/nhaxuatban') }}" class="btn btn-primary">Quay về</a>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
@section('custom-scripts')
<script>
  $(document).ready(function() {
    $("#frmCreateNxb").validate({
      rules: {
        manxb: {
          required: true,
          minlength: 3,
          maxlength: 20
        },
        tennxb: {
          required: true,
          minlength: 3,
          maxlength: 500
        },
      },
      messages: {
        manxb: {
          required: "Vui lòng nhập mã Nhà Xuất Bản",
          minlength: "Mã Nhà Xuất Bản phải có ít nhất 3 ký tự",
          maxlength: "Mã Nhà Xuất Bản không được vượt quá 20 ký tự"
        },
        tennxb: {
          required: "Vui lòng nhập tên Nhà Xuất Bản",
          minlength: "Tên Nhà Xuất Bản phải có ít nhất 3 ký tự",
          maxlength: "Tên Nhà Xuất Bản không được vượt quá 500 ký tự"
        },
      },
      errorElement: "em",
      errorPlacement: function(error, element) {
        // Thêm class `invalid-feedback` cho field đang có lỗi
        error.addClass("invalid-feedback");
        if (element.prop("type") === "checkbox") {
          error.insertAfter(element.parent("label"));
        } else {
          error.insertAfter(element);
        }
        // Thêm icon "Kiểm tra không Hợp lệ"
        if (!element.next("span")[0]) {
          $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>")
            .insertAfter(element);
        }
      },
      success: function(label, element) {
        // Thêm icon "Kiểm tra Hợp lệ"
        if (!$(element).next("span")[0]) {
          $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>")
            .insertAfter($(element));
        }
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass("is-invalid").removeClass("is-valid");
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).addClass("is-valid").removeClass("is-invalid");
      }
    });
  });
</script>
@endsection