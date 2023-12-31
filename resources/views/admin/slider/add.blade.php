@extends('admin.main')



@section('content')
    <form action="" method="post">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="product">Tiêu đề</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control"  >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="product">Đường dẫn</label>
                        <input type="text" name="url" value="{{old('url')}}" class="form-control"  >
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="product">Ảnh sản phẩm</label>
                <input type="file"  class="form-control" id="upload">
                <div id="image_show">

                </div>
                <input type="hidden" name="thumb" id="thumb">
            </div>

            <div class="form-group">
                <label for="product">Sắp xếp</label>
                <input type="number" name="sort_by" value="1" class="form-control"  >
            </div>

            <div class="form-group">

                <div class="form-group">
                    <label>Kích hoạt</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                        <label for="active" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" >
                        <label for="no_active" class="custom-control-label">Không</label>
                    </div>

                </div>
            </div>

        </div>


        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm silder</button>
        </div>
        @csrf
    </form>
@endsection

