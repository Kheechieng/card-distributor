@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                        <br/><br/>
                        <div class="container">
                        <div class="row">
                            <h3>Card Distributor</h3>
                        </div>
                        <div class="row">
                            <form action="/submit" method="post">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        Input value does not exist or value is invalid
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="no_of_people">Number of People</label>
                                    <input type="text" class="form-control @error('no_of_people') is-invalid @enderror" id="no_of_people" name="no_of_people" placeholder="Number of People" value="{{ old('no_of_people') }}">
                                    @error('no_of_people')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <br/><br/>
                        <div class="row">
                            <h6>Result: </h6>
                        </div>
                        {!! $result ?? '' !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
