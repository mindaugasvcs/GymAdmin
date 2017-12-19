@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Narystės planai</h3>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Pavadinimas</th>
                            <th>Tipas</th>
                            <th>Kiekis</th>
                            <th>Kaina (EUR)</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($memberships as $membership)
                        <tr>
                            <td>{{ $membership->title }}</td>
                            <td>{{ $membership->limit_type }}</td>
                            <td>{{ $membership->limit }}</td>
                            <td>{{ $membership->amount }}</td>
                            <td>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">Veiksmas <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('memberships.edit', $membership->id) }}">Atnaujinti</a>
                                        </li>
                                        <li>
                                            <a href="#confirm-delete-dialog" data-toggle="modal" data-name="{{ $membership->title }}">Ištrinti</a>
                                            <form action="{{ route('memberships.destroy', $membership->id) }}" method="POST" style="display: none;">
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
            </div>
        </div>
    </div>
</div>
@endsection
