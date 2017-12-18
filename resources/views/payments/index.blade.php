@extends('layouts.app')

@section('content')
<div class="container">
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Pirkėjas</th>
                <th>Unikalus ID</th>
                <th>Pardavėjas</th>
                <th>Data</th>
                <th>Narysė</th>
                <th>Suma</th>
                <th>Galioja nuo</th>
            </tr>
        </thead>
        <tbody>
@foreach ($payments as $payment)
            <tr>
                <td>{{ $payment->member->name }}</td>
                <td>{{ $payment->member->unique_id }}</td>
                <td>{{ $payment->user->name }}</td>
                <td>{{ $payment->created_at }}</td>
                <td>{{ $payment->membership->title }}</td>
                <td>{{ $payment->amount }}</td>
                <td>{{ $payment->active_since }}</td>
            </tr>
@endforeach
        </tbody>
    </table>
    {{ $payments->links() }}
</div>
@endsection
