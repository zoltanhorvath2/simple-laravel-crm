@extends('layouts.app')

@section('content')
    <div class="card-header border-0">
        <div class="d-flex justify-content-between">
            <h3 class="card-title">Alkalmazott szerkesztése</h3>
        </div>
        <div class="mt-3">
            <a href="{{ route('employees.list') }}">&leftarrow; Vissza</a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('update-employee') }}"
              method="post"
              class="form-to-submit"
              id="edit-employee-form">
            @csrf
            <div class="container">

                @if ($errors->any())
                    <div class="alert alert-danger col-md-8 offset-2">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session()->has('success_message'))
                    <div class="alert alert-success col-md-8 offset-2">
                        {{ session()->get('success_message') }}
                    </div>
                @endif
                @if(session()->has('error_message'))
                    <div class="alert alert-danger col-md-8 offset-2">
                        {{ session()->get('error_message') }}
                    </div>
                @endif

                <div class="col-md-8 offset-2">
                    <div class="form-group">
                        <input
                            class="form-control"
                            type="text"
                            name="id"
                            hidden
                            value="{{ $id }}">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Vezetéknév</label>
                        <input
                            class="form-control"
                            type="text"
                            name="last_name"
                            value="{{ old('last_name') ?? $last_name }}">
                    </div>
                    <div class="form-group">
                        <label for="first_name">Keresztnév</label>
                        <input
                            class="form-control"
                            type="text"
                            name="first_name"
                            value="{{ old('first_name') ?? $first_name }}">
                    </div>
                    <div class="form-group">
                        <label for="company_name">Cégnév</label>
                        <input
                            class="form-control"
                            type="text"
                            name="company_name"
                            id="company_name"
                            placeholder="Kattintson a szövegdobozba és kezdjen gépelni!"
                            value="{{ old('company_name') ?? $company_name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email-cím</label>
                        <input
                            class="form-control"
                            type="text"
                            name="email"
                            value="{{ old('email') ?? $email }}">
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Telefonszám</label>
                        <input
                            class="form-control"
                            type="text"
                            name="phone_number"
                            value="{{ old('phone_number')?? $phone_number }}">
                    </div>
                </div>
                <div class="col-md-8 offset-2 d-flex justify-content-center">
                    <button class="btn btn-success btn-submit">Szerkesztés</button>
                </div>

            </div>

        </form>

    </div>
@endsection
