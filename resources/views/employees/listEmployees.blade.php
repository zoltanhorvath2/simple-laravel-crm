@extends('layouts.app')

@section('content')
    <div class="card-header border-0">
        <div class="d-flex justify-content-between">
            <h3 class="card-title">Alkalmazottak</h3>
        </div>
    </div>
    <div class="card-body">
        <table id="employees_table" class="display">
            <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Vezetéknév</th>
                <th>Keresztnév</th>
                <th>Cégnév</th>
                <th>Email-cím</th>
                <th>Telefonszám</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

    </div>
@endsection
