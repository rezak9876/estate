<form action=" {{ route('sendMessage') }}" method="post">
    @csrf

    <input type="text" name="message">
    <button type="submit">send message</button>
</form>