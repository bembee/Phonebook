@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('status'))
    <div class="alert-info">
        <p>{{Session::get('status')}}</p>
    </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name<ith>
                <th>Photo</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Mailing address</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($phonebooks as $phonebook)
            <tr>
                <td>{{ $phonebook->name }}</td>
                <td><img class="small-pic" src="{{ $phonebook->photo }}"></td>
                <td>
                    @foreach ($phonebook->email as $email)
                    {{ $email->email}}<br>
                    @endforeach
                </td>
                <td>
                    @foreach ($phonebook->phone as $phone)
                    {{ $phone->phone}}<br>
                    @endforeach
                </td>
                <td>{{ $phonebook->address }}</td>
                <td>{{ $phonebook->mailing_address }}</td>
                <td>
                    <a href="{{ route('phonebook.edit', $phonebook->id)}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form action="{{ route('phonebook.destroy', $phonebook->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>
@endsection