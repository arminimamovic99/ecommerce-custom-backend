@include('layouts/top')
@if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}
            <span id='close' style="float:right;cursor:pointer;" onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;'> X </span>
        </p>
    </div>
@endif
  <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Pending Products</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Price</th>
                          <th>Brand</th>
                          <th>Description</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                    </div>
                  <tbody>
                        @foreach($pending as $product) 
                          <tr>
                            <th scope="row">{{$product->id}}</th>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->brand}}</td>
                            <td>{{$product->description}}</td>
                            <td><a class="btn btn-success" href="/pending/{{$product->id}}/approve">Approve</a></td>
                            <td><a class="btn btn-danger" href="/pending/{{$product->id}}/delete">Delete</a></td>
                          </tr>
                          @endforeach
                      </tbody>
                    </table>
                </div>
              </div>
</div>

  </div>
@include('layouts/bottom')