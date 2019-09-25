@include('layouts/top')
    
@if ($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all(':message') as $message)
            <li>{{$message}}
              <span id='close' style="float:right;cursor:pointer;" onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;'> X </span>
            </li>
        @endforeach
    </div>
@endif
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Category</h1>
</div>
<form class="user" method="POST" action="/categories/{{$category->id}}/update" style="width: 400px">
    {!! csrf_field() !!}
    <div class="form-group">
      <label for="name">Category Name</label>
      <input type="text" class="form-control form-control-user" value="{{$category->name}}" id="exampleInputEmail" aria-describedby="emailHelp" name="name">
    </div>
    
    <button class="btn btn-primary btn-user btn-block">
      Edit
    </button>
    <hr>
  </form>
@include('layouts/bottom')