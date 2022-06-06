@extends('layouts.app')
@section('content')
<div class="container">
    <div class="update-form">
        <form action="{{ route('phonebook.update', $phonebook->id)}}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group required">
                <label for="name" class="control-label">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $phonebook->name }}" required />
            </div>
            <div class="form-group required">
                <label for="photo" class="control-label">Photo:</label>
                <input type="file" id="photo" name="photo" />
            </div>
            <div class="form-group required emails">
                <label for="email" class="control-label">Email:</label>
                <input type="text" class="form-control" name="email[0]" value="{{ $phonebook->email[0]->email }}" required />
                <input type="button" class="btn btn-primary" id="add-btn-email" value="Add email"/>
            </div>
            <div class="form-group phones">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" name="phone[0]" value="{{ $phonebook->phone[0]->phone }}" />
                <input type="button" class="btn btn-primary" id="add-btn-phone" value="Add phone"/>
            </div>
            <div class="form-group required">
                <label for="address" class="control-label">Address:</label>
                <input type="text" class="form-control address" name="address" value="{{ $phonebook->address }}" required />
                <label for="addressckb">Same mailing address:</label>
                <input type="checkbox" class="addressckb" name="addressckb">
            </div>
            <div class="form-group">
                <label for="mailing_address">Mailing address:</label>
                <input type="text" class="form-control mailing_address" name="mailing_address" value="{{ $phonebook->mailing_address }}" />
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@include('includes.formValidation')
@endsection