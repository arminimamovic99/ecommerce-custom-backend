@include('layouts/top')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Products</h1>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all(':message') as $message)
            <li>{{$message}}
                <span id='close' style="float:right;cursor:pointer;" onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;'> X </span>
            </li>
        @endforeach
    </div>
@endif
    <form method="POST" action="/products/{{$product->id}}/update">
        {!! csrf_field() !!}
        <div class="form-group">
                <label for="name">Product Name</label><br>
                <input type="text" name="name" value="{{$product->name}}" class="form-control form-control-user"><br>
        </div>
        <div class="form-group">
                <label for="price">Product Price</label><br>
                <input type="text" name="price" value="{{$product->price}}" class="form-control form-control-user"><br>
        </div>
        <div class="form-group">
                <label for="brand">Product Brand</label><br>
                <input type="text" name="brand" value="{{$product->brand}}" class="form-control form-control-user"><br>
        </div>
        <div class="form-group">
                <label for="sale">Is the product on sale?</label><br>
                <select name="sale">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                </select><br>
        </div>
        <div class="form-group">
                <label for="description">Product Description</label><br>
                <textarea type="text" name="description" value="{{$product->description}}" class="form-control form-control-user"></textarea><br>  
        </div>
       <div class="form-group">
            <label for="subcategory">Which subcategory does this product belong to?</label><br>
        <select name="subcategory">

            @foreach($subcategories as $subcategory)
                <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
            @endforeach

        </select><br>
       </div>
       <div class="form-group">
           <label for="image">Product Photo</label>
           <input type="file" name="image" class="form-control form-control-user"><br>
       </div>

    <button>Submit</button>
    </form>

@include('layouts/bottom')