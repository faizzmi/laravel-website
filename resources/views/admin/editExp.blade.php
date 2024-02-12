<h3>Edit Experience</h3>

<form method="POST" action="{{ route('update-experience',  $experience->id) }}">
    @method('PUT')
    @csrf
    </div>
        <label for="from_date_exp">From</label>
        <input type="date" id="from_date_exp" name="from_date_exp" value="{{ $experience->from_date_exp }}">
    </div>
    </div>
        <label for="to_date_exp">To</label>
        <input type="date" id="to_date_exp" name="to_date_exp" value="{{ $experience->to_date_exp }}">
    </div>
    <div>
        <label for="expName">Experience Name</label>
        <input type="text" id="expName" name="expName" value="{{ $experience->expName }}" required>
    </div>

    <div>
        <label for="expPosition">Possition</label>
        <input type="text" id="expPosition" name="expPosition" value="{{ $experience->expPosition }}" required>
    </div>
    
    <div>
        <label for="expPlace">Place</label>
        <input type="text" id="expPlace" name="expPlace" value="{{ $experience->expPlace }}" required>
    </div>
    
    <div>
        <label for="descriptionExp">Experience Description</label><br>
        <textarea id="descriptionExp" name="descriptionExp" style="width: 80vw; height: 30vh;resize: none;">{{ $experience->descriptionExp }}</textarea>
    </div>
    
    <div>
        <button type="submit" >Save Edit</button>
        <a href="{{ route('dashboard') }}">cancel</a>
    </div>
</form>