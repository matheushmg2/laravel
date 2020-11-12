@extends('Student.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">Add Dados</h3>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div>
            @endif

            <div class="modal fade" id="edit_real-{{ $item->id }}" role="dialog">
                <div class="modal-dialog modal-sm-8">
                    <div class="modal-content">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs pull-left">
                                <li class=""><a href="{{ url('plan') }}">Plan</a></li>
                                <li class="active"><a href="{{ url('real') }}">Real</a></li>
                            </ul>

                            {{-- <div class="tab-content">
                                <div class="chart tab-pane active" id="revenue-chart">
                                    {!! Form::open([$spent_time, 'url' => route('real.update', $spent_time->id), 'method' =>
                                    'POST', 'role' => 'form']) !!}
                                    {{ csrf_field() }} {{ method_field('PUT') }}

                                    <div class="box-body">
                                        <div class="form-group">
                                            {!! Form::label('user_story', 'Today Plan *', ['class' => 'control-label',
                                            'name' => 'user_story']) !!}</label>
                                            {!! Form::text('user_story', old('plan_id',
                                            is_null($spent_time->plan->user_story) ? null : $spent_time->plan->user_story),
                                            ['class' => 'form-control', 'readonly' => 'true']) !!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('daily_spent_time', 'Spent Time *', ['class' => 'control-label',
                                            'name' => 'daily_spent_time']) !!}</label>
                                            {!! Form::text('daily_spent_time', old('daily_spent_time',
                                            $spent_time->daily_spent_time ?: null), ['class' => 'form-control', 'id' =>
                                            'daily_spent_time']) !!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('daily_percentage', '% Done *', ['class' => 'control-label',
                                            'name' => 'daily_percentage']) !!}</label>
                                            {!! Form::text('daily_percentage', old('daily_percentage',
                                            $spent_time->daily_percentage ?: null), ['class' => 'form-control']) !!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('reason', 'Reason', ['class' => 'control-label', 'name' =>
                                            'reason']) !!}</label>
                                            {!! Form::textarea('reason', old('reason', $spent_time->reason ?: null),
                                            ['class' => 'form-control']) !!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::submit('Save', ['class' => 'btn btn-block btn-primary btn-flat']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>

            </div>

            <script>
                // jquery
                   $('.edit_real').on('click', function (event) {
                     event.preventDefault();
                   $('#edit_real').modal();
                   });
                </script>

        @endsection
