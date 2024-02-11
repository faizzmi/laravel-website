<h3>Create Contact</h3>

<form method="POST" action="{{ route('store-contact') }}">
    @csrf
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>
    </div>

    <div>
        <label for="link">Link</label>
        <input type="text" id="link" name="link" required>
    </div>
    <div>
        <button type="submit" >Add New</button>
        <a href="{{ route('dashboard') }}">cancel</a>
    </div>
</form>