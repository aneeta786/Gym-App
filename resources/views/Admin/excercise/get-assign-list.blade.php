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
                </tr>
            </thead>
            <tbody>
                @foreach ($assignExercises as $getexcercise)
                    <tr>
                        <td>{{$getexcercise->id}}</td>
                        <td>{{$getexcercise->exercise_name}}</td>
                    </tr>
                @endforeach          
        </tbody>
    </table>
</div>
</div>
</div>
@include('Admin.layouts.footer')