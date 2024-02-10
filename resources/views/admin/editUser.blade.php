<h1>Edit Profile</h1>

<form method="POST" action="{{ route('update-user', $user->id) }}">
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
        <input type="jobTitle" id="jobTitle" name="jobTitle" value="{{ $user->jobTitle }}" >
    
        <label for="fullname">Name</label>
        <input type="fullname" id="fullname" name="name" value="{{ $user->name }}" >
    </div>

    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ $user->email }}" >
    
        {{-- <label for="password">Password</label> --}}
        <input type="hidden" id="password" name="password" placeholder="New Password">
        {{-- <button type="button" id="togglePassword">Show</button> --}}
    </div>

    <div>
        <label for="about">About</label>
        <textarea id="about" name="about" >{{ $user->about }}</textarea>
    </div>
    
    <button type="submit">Save</button>
    <a href="{{ route('dashboard') }}">Cancel</a>
</form>

<div>
    <h3>Contact</h3>
</div>

<script>
    const passwordInput = document.getElementById('password');
    const toggleButton = document.getElementById('togglePassword');

    toggleButton.addEventListener('click', function() {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleButton.textContent = 'Hide';
        } else {
            passwordInput.type = 'password';
            toggleButton.textContent = 'Show';
        }
    });
</script>