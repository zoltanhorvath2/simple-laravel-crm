@extends('layouts.app')

@section('content')
    <div class="card-header border-0">
        <div class="d-flex justify-content-between">
            <h3 class="card-title">Alkalmazottak</h3>
        </div>
    </div>
    <div class="card-body">
        <table id="employees_table" class="display" style="width: 100%">
            <thead>
            <tr>
                <th>
                    <input type="checkbox" name="main-checkbox" id="main-checkbox-employees">
                </th>
                <th>ID</th>
                <th>Vezetéknév</th>
                <th>Keresztnév</th>
                <th>Cégnév</th>
                <th>Email-cím</th>
                <th>Telefonszám</th>
                <th></th>
            </tr>
            </thead>
            <tbody style="width: 100%">
            </tbody>
        </table>

    </div>
@endsection
