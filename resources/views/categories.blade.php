@include('layouts/top')
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
              <a href="/categories/add" style="float: right; margin-top: -30px" class="btn btn-success">Add</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                <tbody>
                @foreach($categories as $category) 
                    <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                    <td><a class="btn btn-primary" href="/categories/{{$category->id}}/edit">Edit</a></td>
                    <td><a class="btn btn-danger" href="/categories/{{$category->id}}/delete">Delete</a></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            </div>
            </div>
            </div>
        </div>

@include('layouts/bottom')