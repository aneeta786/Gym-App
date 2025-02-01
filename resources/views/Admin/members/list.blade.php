@include('Admin.layouts.header')
@include('Admin.layouts.footer')
<div class="container-fluid">
    <div class="row">
        @include('Admin.layouts.navbar')
        <h1 class="mb-4">Member List</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Email</th>
                    <th scope="col">Image</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Sex</th>
                    <th scope="col">Is Premium</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($member1 && $member1->count())
                    @foreach ($member1 as $member)
                        @if (is_object($member))
                            <tr>
                                <td>{{$member->id}}</td>
                                <td><a class="btn btn-primary btn-sm" href="{{ route('dashboard.excercise.assignmembers', ['id' => $member->id]) }}">{{$member->name}}</a></td>
                                <td>{{$member->age}}</td>
                                <td>{{$member->email}}</td>
                                <td>{{$member->image}}</td>
                                <td>{{$member->phone_no}}</td>
                                <td>{{$member->address}}</td>
                                <td>{{$member->sex}}</td>
                                <td>{{$member->is_premium}}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('dashboard.member.edit', ['id' => $member->id]) }}">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('dashboard.member.delete', ['id' => $member->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this banner?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @else
                    <tr>
                        <td colspan="10">No members found.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@include('Admin.layouts.footer')
