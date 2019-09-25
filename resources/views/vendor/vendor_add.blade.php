@include('layouts/vendor_top')

   
@if ($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all(':message') as $message)
            <li>{{$message}}
                <span id='close' style="float:right;cursor:pointer;" onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;'> X </span>
            </li>
        @endforeach
    </div>
@endif

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Product</h1>
    </div>
    <form class="user" method="POST" action="/vendor/approve" style="width: 400px"  enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group" class="form-control form-control-user">
            <label for="name">Product Name</label><br>
            <input type="text" name="name" class="form-control form-control-user"><br>
        </div>
        <div class="form-group">
            <label for="price">Product Price</label><br>
            <input type="text" name="price" class="form-control form-control-user"><br>
        </div>
       
        <div class="form-group">
            <label for="name">Product Brand</label><br>
            <input type="text" name="brand" class="form-control form-control-user"><br>
        </div>
        <div class="form-group">
            <label for="description">Product Description</label><br>
            <textarea type="text" name="description" class="form-control form-control-user"></textarea><br>
        </div>
        
        <div class="form-group">
            <label for="image">Add a photo of the product</label><br>
            <input type="file" name="image" class="form-control form-control-user"><br>
        </div>
        <button class="btn btn-primary btn-user btn-block">
          Add
        </button>
        <hr>
      </form>

@include('layouts/bottom')