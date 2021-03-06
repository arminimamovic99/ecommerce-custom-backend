@include('layouts/top')
<div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Orders</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Last Name</th>
                  <th>Adress</th>
                  <th>Phone Number</th>
                  <th>Product</th>
                  <th></th>
                </tr>
              </thead>
            <tbody>
            @foreach($orders as $order) 
                <tr>
                <th scope="row">{{$order->id}}</th>
                <td>{{$order->name}}</td>
                <td>{{$order->last_name}}</td>
                <td>{{$order->adress}}</td>
                <td>{{$order->phone_number}}</td>
                <td>{{$order->product}}</td>
                <td><a class="btn btn-danger" href="/orders/delete/{{$order->id}}">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
    </table>
    @if (empty($orders))
        <p class="alert alert-danger">No orders do display</p>
    @endif
    </div>
    </div>
    </div>

    </div>
@include('layouts/bottom')