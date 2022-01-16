@extends('layouts.app')

@section('content')
    <div class="card-header border-0">
        <div class="d-flex justify-content-between flex-column">
            <h2 class="card-title text-bold">ALKALMAZOTTAK</h2>
            <div class="d-flex justify-content-start flex-row mt-3">
                <a class="btn btn-success mr-1" href="{{ route('new-employee') }}"><i class="fas fa-user-plus"></i>  Új alkalmazott</a>
                <button class="btn btn-danger ml-4 d-none" id="btn-multiple-delete-employees">Több törlése</button>
            </div>
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
