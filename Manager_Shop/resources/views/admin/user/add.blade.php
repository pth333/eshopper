@extends('layouts.admin')

@section('title','Thêm user')
@section('css')
<link rel="stylesheet" href="{{ asset('admins/slider/add/add.css')}}">
<link href="{{ asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
<style>
    .select2-selection__choice {
        background-color: blueviolet !important;
    }
</style>
@endsection
@section('content')
<div class="content-wrapper">

    @include('partials.content-header', ['name' => 'User','key' => 'Add'])
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('users.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên</label>
                            <input type="text" class="form-control  @error('price') is-invalid @enderror" placeholder="Nhập tên" name="name" value="{{ old('name')}}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control  @error('price') is-invalid @enderror" placeholder="Nhập email" name="email" value="{{ old('email')}}">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control  @error('price') is-invalid @enderror" placeholder="Nhập password" name="password">
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Chọn vai trò</label>
                            <select name="role_id[]" class="form-control  @error('price') is-invalid @enderror select2_init" multiple>
                                <option value=""></option>
                                @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection
@section('js')
<script src="{{ asset('vendors/select2/select2.min.js')}}"></script>
<script>
    $('.select2_init').select2({
        'placeholder': 'Chọn vai trò'
    })
</script>
@endsection
