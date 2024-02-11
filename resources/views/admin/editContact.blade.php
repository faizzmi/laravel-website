<h3>Edit Contact</h3>

<form method="POST" action="{{ route('update-contact',$contact->id) }}">
    @method('PUT')
    @csrf
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ $contact->name }}" required>
    </div>

    <div>
        <label for="link">Link</label>
        <input type="text" id="link" name="link" value="{{ $contact->link }}" required>
    </div>
    <div>
        <button type="submit" >Save Edit</button>
        <a href="{{ route('dashboard') }}">cancel</a>
    </div>
</form>