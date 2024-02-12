<h3>Edit Award</h3>

<h3>Create Award</h3>

<form method="POST" action="{{ route('update-award', $award->id) }}">
    @method('PUT')
    @csrf

    </div>
        <label for="award_date">Year</label>
        <input type="date" id="award_date" name="award_date" value="{{ $award->award_date }}">
    </div>
    <div>
        <label for="awardName">Award Name</label>
        <input type="text" id="awardName" name="awardName" value="{{ $award->awardName }}" required>
    </div>
    <div>
        <label for="awardDesc">Award Description</label><br>
        <textarea id="awardDesc" name="awardDesc" style="width: 80vw; height: 30vh;resize: none;">{{ $award->awardDesc }}</textarea>
    </div>
    <div>
        <button type="submit" >Save edit</button>
        <a href="{{ route('award-dashboard') }}">cancel</a>
    </div>
</form>