@extends('admin/layouts.master')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <a href="{{ route('admin.product.create')}}" class="btn btn-primary">Create product</a>
        </section>
    </div>
@endsection