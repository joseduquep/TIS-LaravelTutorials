@extends('layouts.app')

@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Success</div>
        <div class="card-body">
          <div class="alert alert-success text-center">
            <h4 class="alert-heading">Product created</h4>
            <p>The product has been successfully created.</p>
            <hr>
            <a href="{{ route('product.index') }}" class="btn btn-primary">View All Products</a>
            <a href="{{ route('product.create') }}" class="btn btn-secondary">Create Another Product</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection 