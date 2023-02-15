@extends('layouts.admin')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('presences.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">Schedule Id</label>
                                <!-- <input type="number" class="form-control @error('group_id') is-invalid @enderror" name="group_id" value="{{ old('group_id') }}" placeholder="#"> -->
                                <select type="text" class="form-control  @error('schedule_id') is-invalid @enderror" name="schedule_id" id="schedule_id">
                                    <option>Pilih Schedule</option>
                                    @foreach ($schedule as $schedule)
                                    <option value="{{ $schedule->id }}">{{ $schedule->id }}</option>
                                    @endforeach
                                </select>

                                <!-- error message untuk schedule_id -->
                                @error('schedule_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Student Id</label>
                                <!-- <input type="number" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ old('user_id') }}" placeholder="#"> -->

                                <select type="text" class="form-control  @error('student_id') is-invalid @enderror" name="student_id" id="student_id">
                                    <option>Pilih Student</option>
                                    @foreach ($student as $student)
                                    <option value="{{ $student->id }}">{{ $student->id }}. {{ $student->name }}</option>
                                    @endforeach
                                </select>

                                <!-- error message untuk student_id -->
                                @error('student_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!-- <div class="form-group">
                                <label class="font-weight-bold">presence</label>
                                <input type="text" class="form-control @error('presence') is-invalid @enderror" name="presence" value="{{ old('presence') }}"> -->

                                <!-- error message untuk presence -->
                                <!-- @error('presence')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror -->
                            <!-- </div> -->
                            <div class="form-group">
                                <label class="font-weight-bold">Presence</label>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('presence') is-invalid @enderror" type="radio" name="presence" id="presence1" value="Hadir">
                                    <label class="form-check-label" for="presence1">Hadir</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('presence') is-invalid @enderror" type="radio" name="presence" id="presence2" value="Sakit">
                                    <label class="form-check-label" for="presence2">Sakit</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('presence') is-invalid @enderror" type="radio" name="presence" id="presence3" value="Izin">
                                    <label class="form-check-label" for="presence3">Izin</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('presence') is-invalid @enderror" type="radio" name="presence" id="presence3" value="Alfa">
                                    <label class="form-check-label" for="presence3">Alfa</label>
                                </div>

                                <!-- error message untuk presence -->
                                @error('presence')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Note</label>
                                <input type="text" class="form-control @error('note') is-invalid @enderror" name="note" value="{{ old('note') }}">

                                <!-- error message untuk note -->
                                @error('note')
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




</html>
@stop