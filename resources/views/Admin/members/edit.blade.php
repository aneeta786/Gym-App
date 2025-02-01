@include('Admin.layouts.header')
<div class="container-fluid">
        <div class="row">
        @include('Admin.layouts.navbar')
            <!-- Main Content -->
        <main class="px-4">
            <h1 class="mt-4">Member Add</h1>
            <form method="post" action="{{ route('dashboard.member.update', ['id' => $members->id]) }}" enctype="multipart/form-data">
                @csrf
                <!-- Name Field -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" value="{{ $members->name }}" name="name" placeholder="Enter your name">
                    @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Age Field -->
                <div class="mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" class="form-control" id="age" value="{{ $members->age }}" name="age" placeholder="Enter your age">
                    @error('age')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Email Field -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" value="{{ $members->email }}" name="email" placeholder="Enter your email">
                    @error('email')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Image Field -->
                <div class="mb-3">
                    <label for="image" class="form-label">Profile Image</label>
                    @if($members->image)
                <div>
                    <img src="{{ asset('storage/' . $members->image) }}" alt="Current Image" style="max-width: 150px; max-height: 150px;">
                </div>
                @endif
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                </div>
                <!-- Phone Number Field -->
                <div class="mb-3">
                    <label for="phone_no" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" value="{{ $members->phone_no }}" id="phone_no" name="phone_no" placeholder="Enter your phone number">
                    @error('phone_no')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Address Field -->
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" value="{{ $members->address }}" id="address" name="address" rows="4" placeholder="Enter your address">{{ $members->address }}</textarea>
                    @error('address')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Sex Field -->
                <div class="mb-3">
                    <label for="sex" class="form-label">Sex</label>
                    <select class="form-control" id="sex" name="sex">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <!-- Is Premium Field -->
                <div class="mb-3">
                    <label for="is_premium" class="form-label">Is Premium</label>
                    <select class="form-control" id="is_premium" name="is_premium">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </main>
    </div>
</div>
@include('Admin.layouts.footer')