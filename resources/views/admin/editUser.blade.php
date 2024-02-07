<form method="POST" action="{{ route('update-user', $user->id) }}">
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
        <input type="jobTitle" id="jobTitle" name="jobTitle" value="{{ $user->jobTitle }}" >
    
        <label for="fullname">Name</label>
        <input type="fullname" id="fullname" name="name" value="{{ $user->name }}" >
    </div>

    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ $user->email }}" >
    
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="New Password">
    </div>

    <div>
        <label for="about">About</label>
        <textarea id="about" name="about" >{{ $user->about }}</textarea>
    </div>
    
    <button type="submit">Edit</button>
    <a href="{{ route('dashboard') }}">cancel</a>
</form>