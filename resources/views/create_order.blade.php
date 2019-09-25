<form method="POST" action="/orders/save/{{request()->route('id')}}">
    {!! csrf_field() !!}

    <input type="text" name="name"><br>
    <input type="text" name="last_name"><br>
    <input type="text" name="adress"><br>
    <input type="text" name="phone"><br>
    <button>Submit</button>
</form>