 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{Route('admin.excercise.list')}}">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{Route('admin.member.list')}}">Member List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{Route('admin.member.create')}}">Member Create</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{Route('admin.excercise.list')}}">Excersise List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{Route('admin.excercise.create')}}">Excersise Add</a>
                    </li>
                </ul>
            </div>
        </nav>
