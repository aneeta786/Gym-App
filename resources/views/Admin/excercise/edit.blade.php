@include('Admin.layouts.header')
<div class="container-fluid">
        <div class="row">
        @include('Admin.layouts.navbar')
            <!-- Main Content -->
        <main class="px-4">
            <h1 class="mt-4">Excercise Add</h1>
            <form method="post" action="{{ route('admin.excercise.update', ['id' => $excercise->id]) }}" enctype="multipart/form-data">

                @csrf
                <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" value="{{ $excercise->name }}" name="name" placeholder="Enter name" required>
            </div>

            <!-- Description Field -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter description" >{{ $excercise->description }}</textarea>

            </div>
           <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                @if($excercise->image)
                <div>
                    <img src="{{ asset('storage/' . $excercise->image) }}" alt="Current Image" style="max-width: 150px; max-height: 150px;">
                </div>
                @endif
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
            </div>


            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </main>
    </div>
</div>
@include('Admin.layouts.footer')