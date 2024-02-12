<h3>Create Experience</h3>

<form method="POST" action="{{ route('store-experience') }}">
    @csrf
    </div>
        <label for="from_date_exp">From</label>
        <input type="date" id="from_date_exp" name="from_date_exp">
    </div>
    </div>
        <label for="to_date_exp">To</label>
        <input type="date" id="to_date_exp" name="to_date_exp">
    </div>
    <div>
        <label for="expName">Experience Name</label>
        <input type="text" id="expName" name="expName" required>
    </div>

    <div>
        <label for="expPosition">Possition</label>
        <input type="text" id="expPosition" name="expPosition" required>
    </div>
    
    <div>
        <label for="expPlace">Place</label>
        <input type="text" id="expPlace" name="expPlace" required>
    </div>
    
    <div>
        <label for="descriptionExp">Experience Description</label><br>
        <textarea id="descriptionExp" name="descriptionExp" style="width: 80vw; height: 30vh;resize: none;"></textarea>
    </div>
    
    <div>
        <button type="submit" >Add New</button>
        <a href="{{ route('dashboard') }}">cancel</a>
    </div>
</form>