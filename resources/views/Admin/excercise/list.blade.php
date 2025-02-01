@include('Admin.layouts.header')
@include('Admin.layouts.footer')
<div class="container-fluid">
        <div class="row">
        @include('Admin.layouts.navbar')
    <h1 class="mb-4">Excercise List</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($excercise as $getexcercise)
            <tr>
                <td>{{$getexcercise->id}}</td>
                <td>{{$getexcercise->name}}</td>
                <td>{{$getexcercise->description}}</td>
                <td>{{$getexcercise->image}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('dashboard.excercise.edit', ['id' => $getexcercise->id]) }}">Edit</a>
                </td>
                <td>
                    <form action="{{ route('dashboard.excercise.delete', ['id' => $getexcercise->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this banner?');">
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