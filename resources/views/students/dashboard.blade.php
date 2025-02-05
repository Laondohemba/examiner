<x-student>
    @if (session('success'))
        <div class="text-bg-success p-2 my-3 w-50">
            {{ session('success') }}
        </div>
    @endif
    <h3 class="text-center my-3">{{ auth('student')->user()->name }}'s Dashboard</h3>

    <div class="row">
        <div class="col-md-4">
            <div class="d-flex flex-column text-center">
                <i class="fa fa-user" style="font-size:12rem; color:black"></i>
                <div class="card text-center">
                    <div class="card-header">
                        <strong>Email:</strong> {{ auth('student')->user()->email ?? '' }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <strong>Name:</strong> {{ auth('student')->user()->name ?? '' }}
                        </h5>
                        <p class="card-text">
                            <strong>Phone:</strong> {{ auth('student')->user()->phone ?? '' }}
                        </p>
                        <p class="card-text">
                            <strong>Registration number:</strong> {{ auth('student')->user()->reg_no ?? '' }}
                        </p>
                        <a href="{{ route('profile.edit') }}" class="btn btn-light w-100">Update Profile</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            @if ($examinations->count() > 0)
                <h6 class="my-3 text-center">Upcoming examinations</h6>
                @foreach ($examinations as $examination)
                    <div class="card mx-auto mt-5" style="width: 40rem;">
                        <div class="card-header d-flex justify-content-between">
                            <h3 class="text-center">
                                {{ $examination['examinations']->exam_name }}
                            </h3>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-2">
                                        <h6>Status</h6>
                                    </div>
                                    <div class="col-10">
                                        {{ $examination['starts_in'] !== 'Already started'
                                            ? 'Starts in: ' . $examination['starts_in']
                                            : ($examination['ended'] === 'Not ended yet'
                                                ? 'Already started, Not ended yet'
                                                : 'Ended: ' . $examination['ended']) }}
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                @endforeach
            @else
                <h3 class="text-center">No you have no examination yet</h3>
            @endif
        </div>
    </div>
</x-student>
