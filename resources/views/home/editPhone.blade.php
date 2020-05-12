@extends('layouts.app')
@section('content')
<form action="/phones/edit/{{$phone->id}}" method="post">
    @csrf
    <div class="input-group col-sm-3" style="display: inline-block">
        <input class="form-control" type="number" placeholder="Phone Number" value="{{$phone->Phone}}" name="new_phone" required>
    </div>
    <input type="submit" class="btn btn-success" value="Add" />
</form>
@endsection