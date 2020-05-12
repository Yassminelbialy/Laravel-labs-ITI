@extends('layouts.app')
@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

<div class="container">
    <h1>Welcome {{ auth()->user()->name }}
        @if (auth()->user()->address)
        <span>from {{ auth()->user()->address }}</span>
        @endif
    </h1>
    <hr>
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <h2>Update Address </h2>
            <form action="/user/address" method="post">
                @csrf
                <div class="input-group col-sm-12 col-md-6" style="display: inline-block">
                    <input class="form-control" type="text" value="{{auth()->user()->address}}" name="address" required>
                </div>
                <input type="submit" class="btn btn-success" value="Update" />
            </form>
            <hr>
            <h2>Add New Phones Number </h2>
            <form action="/phones" method="post">
                @csrf
                <div class="input-group col-sm-12 col-md-6" style="display: inline-block">
                    <input class="form-control" type="number" placeholder="Phone Number" name="phone" required>
                </div>
                <input type="submit" class="btn btn-success" value="Add" />
            </form>
            <hr>
            <h2>This is your phones </h2>
            <ul>
                @foreach ($phones as $phone)
                <li>
                    {{ $phone->phone }}
                    <a href="/phones/edit/{{$phone->id}}" class="btn btn-info"> Edit </a>
                    <form action="/phones/{{$phone->id}}" method="post" style="width: fit-content;display: inline-block;">
                        @csrf
                        @method("DELETE")
                        <input type="submit" value="Delete" class="btn btn-info">
                    </form>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="col-sm-12 col-md-6">
            <h2>Contacts </h2>
            <ol>
                @foreach($users as $user)
                <li>{{$user->name}} | <a class="btn btn-info" href="/users/add/{{$user->id}}"> add</a> </li>
                @endforeach
            </ol>
            <hr>

            <h2>Your Contacts </h2>
            <ol>
                @foreach($contacts as $contact)
                    <li>{{ $contact->name }} | <a href="/users/destroy/{{$contact->id}}" class="btn btn-danger"> Delete </a>
                    @forelse($contact->phoneNumbers as $phones)
                        <li class="list-group-item">{{$phones->phone}} </li>
                        @empty
                        <li>Sorry This User Doesn't Have Any Phone Number</li>
                    @endforelse
                    </li>
                @endforeach
            </ol>
        </div>
    </div>
</div>
@endsection