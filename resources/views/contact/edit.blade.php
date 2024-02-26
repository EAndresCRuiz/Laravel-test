@extends('contact.layout')

@section('content') 
<div class="card">
    <div class="card-header">Edit {{ $contact->name }} details</div>
    <div class="card-body">
      
        <form action="{{ route('contact.update', $contact->id) }}" method="POST">
            @csrf
            @method("PATCH")
            <input type="hidden" name="id" id="id" value="{{$contact->id}}" id="id" />
            <label>Name</label></br>
            <input type="text" name="name" id="name" value="{{$contact->name}}" class="form-control">
            @error('name')
            <div class="invalid-feedback is-invalid" style="display: block">
                {{ $message }}
            </div>
            @enderror
            <label>Contact</label></br>
            <input type="text" name="contact" id="contact" value="{{$contact->contact}}" class="form-control">
            @error('contact')
            <div class="invalid-feedback is-invalid" style="display: block">
                {{ $message }}
            </div>
            @enderror
            <label>Email</label></br>
            <input type="text" name="email" id="email" value="{{$contact->email}}" class="form-control">
            @error('email')
            <div class="invalid-feedback is-invalid" style="display: block">
                {{ $message }}
            </div>
            @enderror
            </br><input type="submit" value="Update" class="btn btn-success"></br>
        </form>
   
    </div>
</div>
@endsection