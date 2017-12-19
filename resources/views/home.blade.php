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
                <th>Unikalus ID</th>
                <th>Vardas</th>
                <th>Aktyvi narystė</th>
                <th>Tipas</th>
                <th>Kiekis</th>
                <th>Apsilankymų</th>
                <th>Galiojimas</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
@foreach ($members as $member)
            <tr>
                <td>{{ $member->unique_id }}</td>
                <td>{{ $member->name }}</td>
                <td>{{ $member->active_since }}</td>
                <td>{{ $member->limit_type }}</td>
                <td>{{ $member->limit }}</td>
                <td>{{ $member->visits_count }}</td>
                <td>{{ $member->is_valid }}</td>
                <td>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">Veiksmas <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('payments.index') }}" onclick="event.preventDefault(); this.nextElementSibling.submit();">Mokėjimų istorija</a>
                                <form action="{{ route('payments.index') }}" method="GET" style="display: none;">
                                    <input type="hidden" name="member_id" value="{{ $member->id }}">
                                </form>
                            </li>
                            <li>
                                <a href="{{ route('visits.index') }}" onclick="event.preventDefault(); this.nextElementSibling.submit();">Apsilankymų istorija</a>
                                <form action="{{ route('visits.index') }}" method="GET" style="display: none;">
                                    <input type="hidden" name="member_id" value="{{ $member->id }}">
                                </form>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{ route('members.edit', $member->id) }}">Atnaujinti duomenis</a>
                            </li>
                            <li>
                                <a href="#confirm-delete-dialog" data-toggle="modal" data-name="{{ $member->name }}">Ištrinti visus duomenis</a>
                                <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                </form>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
@endforeach
        </tbody>
    </table>
    {{ $members->links() }}
</div>
@endsection
