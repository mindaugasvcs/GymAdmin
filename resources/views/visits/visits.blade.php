@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Sporto klubo narių lankymo žurnalas</h2></div>
                @if ($message)
                  <div class="alert alert-danger">
                      <h4>{{ $message }}.</h4><br>
                  </div>
                @endif


                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Apsilankymo data</th>
                          <th>Kortelės ID</th>
                          <th>Lankytojo vardas</th>
                          <th>Galiojimo pabaiga</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($visits as $visit)
                          <tr>
                            <td>{{ $visit['created_at']}}</td>
                            <td>{{ $visit['card_id'] }}</td>
                            <td>{{ $visit->member['name']}}</td>
                            <td>{{ $visit->member['expiry_date']}}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <div>
                      {{ $visits->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
