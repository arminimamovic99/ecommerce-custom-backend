@include('layouts/top')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Subcategory</h1>
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

    <form class="user" method="POST" action="/subcategories/{{$subcategory->id}}/update" style="width: 400px">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="name">Subcategory Name</label><br>
            <input type="text" class="form-control form-control-user" value="{{$subcategory->name}}" id="exampleInputEmail" aria-describedby="emailHelp" name="name">
        </div>
    <div class="form-group">
        <label for="category">Which category does this subcategory belong to?</label><br>
        <select name="category">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select><br>
    </div>
    <button class="btn btn-primary btn-user btn-block">
        Edit
    </button>
    <hr>
    </form>

@include('layouts/bottom')