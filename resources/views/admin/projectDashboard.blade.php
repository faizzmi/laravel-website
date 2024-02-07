
<hr>

@if (isset($message))
    <p>{{ $message }}</p>
    <a href="">Add Project</a>
@else
    <!-- Display project dashboard -->
@endif
<div>
    <a href="/dashboard">back</a>
</div>
