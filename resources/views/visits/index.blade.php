@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Klubo narių lankymo žurnalas</h3>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Vardas</th>
                            <th>Unikalus ID</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($visits as $visit)
                        <tr>
                            <td>{{ $visit->member->name }}</td>
                            <td>{{ $visit->member->unique_id }}</td>
                            <td>{{ $visit->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            {{ $visits->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
