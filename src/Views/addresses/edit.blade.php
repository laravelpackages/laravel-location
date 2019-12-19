@extends(config('cw_address.layout'))
@section('title', trans('location::addresses.create'))
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title float-left">
                            {{ __($title ?? 'location::addresses.create') }}
                        </h3>
                        @includeIf('location::partials.card_header_pills', ['nameRoute' => 'addresses'])
                    </div>
                    <div class="card-body">
                        {!! Form::model($address, ['route' => ['admin.locations.addresses.update', $address->id], 'method' => 'put', 'class' => 'horizontal-form']) !!}
                            @include('location::addresses.partials.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
