@extends('layouts.app')

@section('content')
    <div class="card-header border-0">
        <div class="d-flex justify-content-between flex-column">
            <h2 class="card-title text-bold">CÉGEK</h2>
            <div class="d-flex justify-content-start flex-row mt-3">
                <a class="btn btn-success mr-1" href="{{ route('new-company') }}"><i class="fas fa-user-plus"></i>  Új cég</a>
                <button class="btn btn-danger ml-4 d-none" id="btn-multiple-delete-companies">Több törlése</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table id="companies_table" class="display" style="width: 100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>Cégnév</th>
                <th>Email</th>
                <th>Logo</th>
                <th>Weboldal</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

    </div>
@endsection
