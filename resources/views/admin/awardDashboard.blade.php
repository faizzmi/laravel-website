<h3>{{ $user->name }}'s Awards and Certifications</h3>

<a href="{{ route('create-award') }}">Add Award</a>

@if (isset($message))
    <p>{{ $message }}</p>
@else
<div>
    @if(Session::has('successAw'))
    <div>{{ Session::get('successAw')}}</div>
    @endif
    @if(Session::has('errorAw'))
        <div>{{ Session::get('errorAw')}}</div>
    @endif
    <table>
        <thead>
            <tr>
                <th>Year</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($awards as $award)
                <tr>
                    <td>{{ $award->award_date }}</td>
                    <td>{{ $award->awardName }}</td>
                    <td>{{ $award->awardDesc }}</td><td>
                        <a href="{{ route('edit-award', $award->id) }}">Edit</a>
                        <form action="{{ route('delete-award', $award->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Are you sure you want to delete this project record?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif