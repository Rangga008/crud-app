@extends('layout')

@section('content')
<h2 class="mb-4">Lihat Contact</h2>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('contacts.update', $contact->id) }}" method="POST" class="bg-white p-4 rounded shadow-sm">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ $contact->name }}" placeholder="Name" disabled>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ $contact->email }}" placeholder="Email"
            disabled>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control" value="{{ $contact->phone }}" placeholder="Phone" disabled>
    </div>

    <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection