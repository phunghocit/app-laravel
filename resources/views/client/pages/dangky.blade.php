
@extends('client.layouts.master')

@section('content')
@if ($errors->any())
<div>
    <ul>
        @foreach ($errors->all() as $error)
            <li><span style="color: red">{{$error}}</span></li>
        @endforeach
    </ul>
</div>
    
@endif
    <form action="{{ route('nguoidung.dangky')}}" method="POST">
            <!-- name input -->
        @csrf 
        <div class="form-outline mb-4">
            <input type="text" id="form2Example1" class="form-control" name="name" value="{{old('name')}}"/>
            <label class="form-label" for="form2Example1">name</label>
        </div>
        @error('name')
            <div class="alert-danger">{{$message}}</div>
        @enderror
            
        <!-- Email input -->

        <div class="form-outline mb-4">
            <input type="email" id="form2Example1" class="form-control" name="email" value="{{old('email')}}"/>
            <label class="form-label" for="form2Example1">Email address</label>
        </div>
        @error('email')
            <div class="alert-danger">{{$message}}</div>
        @enderror
        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" id="form2Example2" class="form-control" name="password" />
            <label class="form-label" for="form2Example2">Password</label>
        </div>
        @error('password')
            <div class="alert-danger">{{$message}}</div>
        @enderror

        <!-- 2 column grid layout for inline styling -->
        {{-- <div class="row mb-4">
            <div class="col d-flex justify-content-center">
            <!-- Checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                <label class="form-check-label" for="form2Example31"> Remember me </label>
            </div>
            </div>
        
            <div class="col">
            <!-- Simple link -->
            <a href="#!">Forgot password?</a>
            </div>
        </div>
        --}}
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>
    </form>
@endsection