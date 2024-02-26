@extends('contact.layout')

@section('content') 
<div class="card">
  <div class="card-header">Contact Page</div>
  <div class="card-body">
      
      <form action="{{ route('contact.store') }}" method="POST">
        @csrf
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control">
        @error('name')
        <div class="invalid-feedback is-invalid" style="display: block">
            {{ $message }}
        </div>
        @enderror
        <label>Contact</label></br>
        <input type="number" name="contact" id="contact" class="form-control" max="999999999">
        @error('contact')
        <div class="invalid-feedback is-invalid" style="display: block">
            {{ $message }}
        </div>
        @enderror
        <label>Email</label></br>
        <input type="email" name="email" id="email" class="form-control">
        @error('email')
        <div class="invalid-feedback is-invalid" style="display: block">
            {{ $message }}
        </div>
        @enderror
        </br><input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
@endsection