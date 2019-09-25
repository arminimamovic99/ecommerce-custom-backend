<form method="POST" action="/paypal/checkout">
    {{ csrf_field() }}
    <div class="form-group">
    <label for="amount">Amount</label><br>
    <input type="text" name="amount"><br>
    </div>
    </div>
    <button>Submit Order</button> 
</form>