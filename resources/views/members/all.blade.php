@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Sporto klubo narių žurnalas</h2></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Unikalus ID</th>
                          <th>Lankytojo vardas</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($members as $member)
                            <tr>
                              <td>{{ $member['unique_id'] }}</td>
                              <td>{{ $member['name'] }}</td>
                              <td>
                                <div class="dropdown">
                                      <a class="dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" href="#">
                                        <span class="glyphicon glyphicon-edit"></span>
                                      </a>
                                      <ul class="dropdown-menu">
                                        <li><a href="#">New</a></li>
                                        <li><a href="#">Edit</a></li>
                                        <li><a href="#">Delete</a></li>
                                      </ul>
                                </div>
                              </td>
                            </tr>
                          @endforeach
                      </tbody>
                    </table>
                    <div>
                      {{ $members->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
