@include('layouts/top')
<!-- Page Heading -->
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
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
    <h1 class="h3 mb-0 text-gray-800">Add Subategory</h1>
</div>
<form class="user" method="POST" action="/subcategories/store" style="width: 400px">
    {!! csrf_field() !!}
    <div class="form-group">
        <label for="name">Name</label><br>
        <input type="text" name="name" class="form-control form-control-user"><br>
    </div>
    <div class="form-group">
        <select name="category">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select><br>
    </div>
    
    <button class="btn btn-primary btn-user btn-block">
      Add
    </button>
    <hr>
  </form>
@include('layouts/bottom')