<h3>Create Award</h3>

<form method="POST" action="{{ route('store-award') }}">
    @csrf
    </div>
        <label for="award_date">Year</label>
        <input type="date" id="award_date" name="award_date">
    </div>
    <div>
        <label for="awardName">Award Name</label>
        <input type="text" id="awardName" name="awardName" required>
    </div>
    <div>
        <label for="awardDesc">Award Description</label><br>
        <textarea id="awardDesc" name="awardDesc" style="width: 80vw; height: 30vh;resize: none;"></textarea>
    </div>
    <div>
        <button type="submit" >Add New</button>
        <a href="{{ route('award-dashboard') }}">cancel</a>
    </div>
</form>