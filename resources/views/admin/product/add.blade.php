@extends('admin.main')

@section('head')
    <script src="{{asset('/ckeditor/ckeditor.js')}}"></script>
@endsection

@section('content')
    <form action="" method="post">
        <div class="card-body">

            <div class="form-group">
                <label for="product">Tên sản phẩm</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control"  placeholder="Nhập tên sản phẩm">
            </div>

            <div class="form-group">
                <label>Danh mục</label>
                <select class="form-control" name="menu_id">
                    <option value="0">Danh mục</option>
                    @foreach($products as $product)
                        <option value="{{$product->id}}">{{$product->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="product">Giá gốc</label>
                <input type="number" name="price" value="{{old('price')}}" class="form-control"  >
            </div>

            <div class="form-group">
                <label for="product">Giá giảm</label>
                <input type="number" name="price_sale" value="{{old('price_sale')}}" class="form-control"  >
            </div>

            <div class="form-group">
                <label>Mô tả</label>
                <textarea name="description" class="form-control">{{old('description')}}</textarea>
            </div>

            <div class="form-group">
                <label>Mô tả chi tiết</label>
                <textarea name="content" id="content" class="form-control">{{old('content')}}</textarea>
            </div>

            <div class="form-group">
                <label for="product">Ảnh sản phẩm</label>
                <input type="file"  class="form-control" id="upload">
                <div id="image_show">

                </div>
                <input type="hidden" name="thumb" id="thumb">
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
            <button type="submit" class="btn btn-primary">Tạo sản phẩm</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
