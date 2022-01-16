@extends('layouts.app')

@section('content')
    <div class="card-header border-0">
        <div class="d-flex justify-content-between">
            <h3 class="card-title">Cégek</h3>
        </div>
    </div>
    <div class="card-body">
        <table id="companies_table" class="display" style="width: 100%">
            <thead>
            <tr>
                <th>
                    <input type="checkbox" name="main-checkbox" id="main-checkbox-companies">
                </th>
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
