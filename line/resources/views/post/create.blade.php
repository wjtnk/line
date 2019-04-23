<table>
    <form action="/post" method="post">
        {{ csrf_field() }}
        <tr><th>message: </th><td><input type="text" name="message"
                                         value="{{old('message')}}"></td></tr>
        <tr><th></th><td><input type="submit" value="send"></td></tr>
    </form>
</table>


