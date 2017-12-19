@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Naujo nario registracija</h2></div>

                <div class="panel-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif --}}


                    @if ($errors->any())
                      <div class="alert alert-danger">
                      @foreach ($errors->all() as $error)
                          {{ $error }}.<br>
                      @endforeach
                      </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('members.store') }}" enctype="multipart/form-data">
                      {{csrf_field()}}

                        <div class="form-group{{ $errors->has('card_id') ? ' has-error' : '' }}">
                            <label for="card_id" class="col-md-4 control-label">Kortelės ID</label>

                            <div class="col-md-6">
                                <input id="card_id" type="text" class="form-control" name="card_id" value="{{ old('card_id') }}" required>

                                @if ($errors->has('card_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('card_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Lankytojo vardas</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('membership') ? ' has-error' : '' }}">
                            <label for="membership" class="col-md-4 control-label">Narystės tipas</label>
                            <div class="col-md-6">
                                <select class="form-control memberships" name="memberships" value="{{ old('memberships') }}" required>
                                        <option hidden>Pasirinkti narystės tipą</option>
                                    @foreach ($memberships as $membership)
                                        <option value="{{ $membership['id'] }}">{{ $membership['title'] }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('membership'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('membership') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                            <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }} date" id="datetimepicker">
                                <label for="start_date" class="col-md-4 control-label">Galioja nuo</label>
                                <div class='date col-md-6'>
                                  <input type='text' class="form-control" id='start_date' name="start_date" value="{{ old('start_date') }}"  required/>

                                  @if ($errors->has('start_date'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('start_date') }}</strong>
                                      </span>
                                  @endif
                                </div>
                            </div>
                        <div class="form-group">
                            <label for="price" class="col-md-4 control-label">Kaina</label>
                            <div class="col-md-6" id="div_price">
                                <input id="price" type="text" class="form-control" name="price" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="expiry_date" class="col-md-4 control-label">Galioja iki</label>
                            <div class='date col-md-6'>
                              <input type='text' class="form-control vd0" id='expiry_date' name="expiry_date" readonly/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registruoti
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
