@extends('layouts.app')

@section('content')
    <div class="card-header border-0">
        <div class="d-flex justify-content-between">
            <h3 class="card-title">Új cég felvétele</h3>
        </div>
        <div class="mt-3">
            <a href="{{ route('companies.list') }}">&leftarrow; Vissza</a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('update-company') }}"
              method="post"
              id="edit-company-form"
              class="form-to-submit"
              enctype="multipart/form-data">
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
                            id="company_id"
                            name="id"
                            hidden
                            value="{{ $id }}">
                    </div>
                    @if($logo_url)
                    <div id="logo-container" class="form-group w-100 d-flex flex-column justify-content-center align-items-center">
                        <img class="logo-image" src="{{ $logo_url }}" alt="{{ $logo_name }}">
                        <button id="logo-delete" class="btn btn-danger btn-xs mb-2 mt-3">Logo törlése</button>
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="company_name">Cégnév</label>
                        <input
                            class="form-control"
                            type="text"
                            name="company_name"
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
                        <label for="website_url">Weboldal elérhetősége</label>
                        <input
                            class="form-control"
                            type="text"
                            name="website_url"
                            value="{{ old('website_url') ?? $website_url }}">
                    </div>
                    <div class="form-group">
                        <label for="logo">Logo frissítése</label>
                        <input
                            type="file"
                            name="logo"
                            value="{{ old('logo') }}">
                    </div>
                </div>
                <div class="col-md-8 offset-2 d-flex justify-content-center">
                    <button class="btn btn-success btn-submit">Szerkesztés</button>
                </div>

            </div>

        </form>

    </div>
@endsection
