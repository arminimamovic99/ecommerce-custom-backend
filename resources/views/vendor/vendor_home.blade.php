

@include('layouts/vendor_top')
@if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}
            <span id='close' style="float:right;cursor:pointer;" onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;'> X </span>
        </p>
    </div>
@endif
        <h1 class="text-center">Welcome To Your Vendor Dashboard</h1>
        <div class="notification"></div>
    <div class="card" style="width: 60%; border-radius: 15px; display:block; margin: 0 auto"> 
        <div class="card-body">
            <p class="text-center" style="width: 90%; color: black; padding:10px">In order to accept payments after selling a product through our platform, you will have to either create a new Stripe account,
                or connect an existing one. <br>
                <a href="https://dashboard.stripe.com/oauth/authorize?response_type=code&client_id=ca_FqZpCJ649XaM3Rge4tKCfPWfqOgntPzY&scope=read_write"
                class="btn btn-primary" style="border-radius:5px; margin-top:20px">Connect to Stripe</a>
            </p>
            <span id='close' style="text-align:center;cursor:pointer;" onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;'>
            <u>Already Connected. Close this window</u>
            </span>
        </div>
            
    </div>
    
@include('layouts/vendor_bottom')