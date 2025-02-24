{{-- form for examiner to update student's record --}}
<x-examiner>

    @if (session('success'))
        <div class="text-bg-success p-2 w-50 my-2 mx-auto">
            {{ session('success') }}
        </div>
    @endif
    <h3 class="text-center my-2">{{ ucwords(auth()->user()->username) }}, welcome to Examiner</h3>
    <x-examinerdashboard></x-examinerdashboard>

    <h3 class="text-center my-3">Edit student's data</h3>

    <form action="{{route('student.update', $student)}}" method="post" class="w-75 bg-light p-5 my-3 mx-auto">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col">
                <label for="email" class="form-label">Student's email</label>
                <input type="text" class="form-control @error('email') border-danger @enderror"
                    value="{{ old('email') ?? $student->email }}" placeholder="Email" id="email" name="email">
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') border-danger @enderror"
                    placeholder="Password" id="password" name="password">
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-12 mt-3">
                <button class="btn btn-secondary w-100 mx-auto">Update record</button>
            </div>

            <div class="col-12 mt-5">
                <li class="text-muted">It is advisable to use the same password for all students e.g 123 or xyz</li>
                <li class="text-muted">Students will be required to change their passwords upon first login</li>
            </div>
        </div>
    </form>

    
</x-examiner>
