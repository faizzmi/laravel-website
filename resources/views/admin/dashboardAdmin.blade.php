<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Faiz Azmi</title>
</head>
<body>
    <h1>Welcome to {{ $data->name }}'s dashboard</h1>
    
    <a href="dashboard/logout">Logout</a>
    <hr>
    <div class="about">
        <h3>About</h3>

        @if(Session::has('successAbout'))
            <div>{{ Session::get('successAbout')}}</div>
        @endif
        @if(Session::has('errorAbout'))
            <div>{{ Session::get('errorAbout')}}</div>
        @endif

        @method('PUT')
        @csrf

        <div>
            <label for="job">Job Title</label>
            <input type="jobTitle" id="jobTitle" name="jobTitle" value="{{ $data->jobTitle }}" readonly>
        
            <label for="fullname">Name</label>
            <input type="fullname" id="fullname" name="name" value="{{ $data->name }}" readonly>
        </div>

        <div>
            <label for="about">About</label>
            {{-- <textarea id="about" name="about" maxlength="1000"  readonly>{{ $data->about }}</textarea> --}}
            <textarea id="about" name="about" style="width: 80vw; height: 30vh;resize: none;" readonly>{{ $data->about }}</textarea>
        </div>
        
        <a href="{{ route('edit-user', $data->id) }}">Edit</a>

    </div>

    <div>
        <h3>Skills</h3>
        <div>
            <a href="{{ route('project-dashboard') }}">See all projects</a>
        </div>
        <div>
            <a href="{{ route('award-dashboard') }}">See all awards</a>
        </div>
    </div>
        
    <div>
        <h3>Education Records</h3>

        <a href="{{ route("create-edu") }}">Add New Education</a>
        @if(Session::has('successEdu'))
            <div>{{ Session::get('successEdu')}}</div>
        @endif
        @if(Session::has('errorEdu'))
            <div>{{ Session::get('errorEdu')}}</div>
        @endif
        @if (isset($messageEdu))
            <p>{{ $messageEdu }}</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>Name</th>
                        <th>Place</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($educations as $education)
                        <tr>
                                <td>{{ $education->from_date }}</td>
                                <td>{{ $education->to_date }}</td>
                                <td>{{ $education->education_name }}</td>
                                <td>{{ $education->place }}</td>
                                <td>{{ $education->description }}</td>
                            <td>
                                <a href="{{ route('edit-edu', $education->id) }}">Edit</a>
                                <form action="{{ route('delete-edu', $education->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Are you sure you want to delete this education record?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <div>
        <h3>Experiences</h3>
        
        <a href="{{ route("create-experience") }}">Add New Experience</a>
        
        @if (isset($messageExp))
            <p>{{ $messageExp }}</p>
        @else
        @if(Session::has('successExp'))
            <div>{{ Session::get('successExp')}}</div>
        @endif
        @if(Session::has('errorExp'))
            <div>{{ Session::get('errorExp')}}</div>
        @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>Name</th>
                        <th>Place</th>
                        <th>Position</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($experiences as $experience)
                        <tr>
                                <td>{{ $experience->from_date_exp }}</td>
                                <td>{{ $experience->to_date_exp }}</td>
                                <td>{{ $experience->expName }}</td>
                                <td>{{ $experience->expPlace }}</td>
                                <td>{{ $experience->expPosition }}</td>
                                <td>{{ $experience->descriptionExp }}</td>
                            <td>
                                <a href="{{ route('edit-experience', $experience->id) }}">Edit</a>
                                <form action="{{ route('delete-experience', $experience->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Are you sure you want to delete this experience record?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <div>
        <h3>Contacts</h3>
        
        <a href="{{ route("create-contact") }}">Add New Contact</a>
        
        @if (isset($messageC))
            <p>{{ $messageC }}</p>
        @else

            @if(Session::has('successC'))
                <div>{{ Session::get('successC')}}</div>
            @endif
            @if(Session::has('errorC'))
                <div>{{ Session::get('errorC')}}</div>
            @endif
            
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Link</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->link }}</td>
                            <td>
                                <a href="{{ route('edit-contact', $contact->id) }}">Edit</a>
                                <form action="{{ route('delete-contact', $contact->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Are you sure you want to delete this experience record?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    </div>
</body>
</html>