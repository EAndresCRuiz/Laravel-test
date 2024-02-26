@extends('contact.layout')

@section('content') 
<div class="card">
    <div class="card-header">Contact Details</div>
    <div class="card-body">
        <div class="card-body">
            <h5 class="card-title">{{ $contact->name }}</h5></br>
            <p class="card-text">Contact : {{ $contact->contact }}</p>
            <p class="card-text">Email : {{ $contact->email }}</p>
        </div>
        <a href="{{ url('/contact/' . $contact->id . '/edit') }}" title="Edit Contact"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

        <form method="POST" action="{{ url('/contact' . '/' . $contact->id) }}" accept-charset="UTF-8" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm" title="Delete Contact" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
        </form>
    </hr>
    </div>
</div>
@endsection