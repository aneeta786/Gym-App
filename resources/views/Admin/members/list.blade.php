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
        @foreach ($member as $members)
            <tr>
                <td>{{$members->id}}</td>
                <td><a class="btn btn-primary btn-sm" href="{{ route('admin.excercise.assignmembers', ['id' => $members->id]) }}">{{$members->name}}</a></td>
                <td>{{$members->age}}</td>
                <td>{{$members->email}}</td>
                <td>{{$members->image}}</td>
                <td>{{$members->phone_no}}</td>
                <td>{{$members->address}}</td>
                <td>{{$members->sex}}</td>
                <td>{{$members->is_premium}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('admin.member.edit', ['id' => $members->id]) }}">Edit</a>
                </td>
                <td>
                    <form action="{{ route('admin.member.delete', ['id' => $members->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this banner?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="class="btn btn-primary btn-sm"">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
           
        </tbody>
    </table>
</div>
</div>
</div>
@include('Admin.layouts.footer')