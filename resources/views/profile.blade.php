@extends('layout')
@section('title', 'Profile')
@section('content')
    <h1 class="heading-1" style="margin-bottom: 30px">
        Profile
    </h1>

    <div class="main-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{asset('/assets/img/user.png')}}" alt="User"
                                 class="rounded-circle p-1" width="110">
                            <div class="mt-3">
                                <h4>{{$user->full_name}}</h4>
                            </div>
                        </div>
                        <hr class="my-4">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    Company Name
                                </h6>
                                <span class="text-secondary">{{$user->company_name}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('update.profile')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3 align-items-center">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="full_name" class="form-control"
                                           value="{{old('full_name', $user->full_name)}}">
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="email" class="form-control"
                                           value="{{old('email', $user->email)}}">
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Company Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="company_name" class="form-control"
                                           value="{{old('company_name', $user->company_name)}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" class="profile-save-button" value="Save Changes">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
