<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Faiz Azmi</title>
</head>
<body>
    <h1>Add New Education</h1>

    <form method="POST" action="{{ route("store-edu") }}">
        @csrf
        <div class="form-group">
            <label for="from_date">From Date</label>
            <input type="from_date" id="from_date" name="from_date" required>
        </div>
        <div class="form-group">
            <label for="to_date">To Date</label>
            <input type="to_date" id="to_date" name="to_date">
        </div>
        <div class="form-group">
            <label for="education_name">Education Name</label>
            <input type="education_name" id="education_name" name="education_name" required>
        </div>
        <div class="form-group">
            <label for="place">Place</label>
            <input type="text" id="place" name="place" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label><br>
            <textarea id="description" name="description" style="width: 80vw; height: 30vh;resize: none;"></textarea>
        </div>
        <button type="submit" >Submit</button>
        <a href="{{ route('dashboard') }}">cancel</a>
    </form>
</body>
</html>