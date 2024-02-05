<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Faiz Azmi</title>
</head>
<body>
    <h1>Edit Education</h1>

    <form method="POST" action="{{ route('update-edu', $education->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="from_date">From Date</label>
            <input type="date" id="from_date" name="from_date" required value={{ $education->from_date }}>
            <span>@error('name') {{ $message }} @enderror</span>
        </div>
        <div class="form-group">
            <label for="to_date">To Date</label>
            <input type="date" id="to_date" name="to_date" value={{ $education->to_date }}>
            <span>@error('name') {{ $message }} @enderror</span>
        </div>
        <div class="form-group">
            <label for="education_name">Education Name</label>
            <input type="text" id="education_name" name="education_name" required value={{ $education->education_name }}>
            <span>@error('name') {{ $message }} @enderror</span>
        </div>
        <div class="form-group">
            <label for="place">Place</label>
            <input type="text" id="place" name="place" required value={{ $education->place }}>
            <span>@error('name') {{ $message }} @enderror</span>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description">{{ $education->description }}</textarea>
            <span>@error('name') {{ $message }} @enderror</span>
        </div>
        <a href="{{ route('dashboard') }}">cancel</a>
        <button type="submit" >Submit</button>
    </form>
</body>
</html>