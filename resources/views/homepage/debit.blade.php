    <form method="POST" action="/charge">
        <div class="form-group">
        <label for="number">Card Number</label><br>
        <input type="integer" name="number"><br>
        </div>
        <div class="form-group">
                <label for="code">3 Digit Security Code</label><br>
                <input type="number" name="code"><br>
        </div>
        <div class="form-group">
                <label for="code">Card Expiration Month</label><br>
                <input type="number" name="month"><br>
        </div>
        <div class="form-group">
                <label for="code">Card Expiration Year</label><br>
                <input type="number" name="year"><br>
        </div>
        <button>Submit Order</button> 
    </form>