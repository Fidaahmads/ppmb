@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('schedules.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">Group Id</label>
                                <!-- <input type="number" class="form-control @error('group_id') is-invalid @enderror" name="group_id" value="{{ old('group_id') }}" placeholder="#"> -->
                                <select type="text" class="form-control  @error('group_id') is-invalid @enderror" name="group_id" id="group_id">
                                    <option>Pilih Group</option>
                                        @foreach ($group as $group)
                                            <option value="{{ $group->id }}">{{ $group->id }}. {{ $group->name }}</option>
                                        @endforeach
                                </select>

                                <!-- error message untuk group_id -->
                                @error('group_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">User Id</label>
                                <!-- <input type="number" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ old('user_id') }}" placeholder="#"> -->

                                <select type="text" class="form-control  @error('user_id') is-invalid @enderror" name="user_id" id="user_id">
                                    <option>Pilih User</option>
                                        @foreach ($user as $user)
                                            <option value="{{ $user->id }}">{{ $user->id }}. {{ $user->name }}</option>
                                        @endforeach
                                </select>

                                <!-- error message untuk user_id -->
                                @error('user_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Note</label>
                                <input type="text" class="form-control @error('note') is-invalid @enderror" name="note" value="{{ old('note') }}" placeholder="">

                                <!-- error message untuk note -->
                                @error('note')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Time Start</label>
                                <input type="text" class="form-control @error('time_start_at') is-invalid @enderror" name="time_start_at" value="{{ old('time_start_at') }}" placeholder="">

                                <!-- error message untuk time_start_at -->
                                @error('time_start_at')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Time End</label>
                                <input type="text" class="form-control @error('time_end_at') is-invalid @enderror" name="time_end_at" value="{{ old('time_end_at') }}" placeholder="">

                                <!-- error message untuk time_end_at -->
                                @error('time_end_at')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <br>
                            <button type="submit" class="btn btn-md btn-primary">SUMBIT</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>


@stop