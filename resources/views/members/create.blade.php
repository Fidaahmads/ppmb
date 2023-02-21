@extends('layouts.admin')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <div class="form-group">
                            <label class="font-weight-bold">Student Name </label>
                                <!-- <input type="number" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ old('user_id') }}" placeholder="#"> -->

                                <select type="text" class="form-control  @error('student_id') is-invalid @enderror" name="student_id" id="student_id">
                                    <option>Choose Student</option>
                                        @foreach ($student as $students)
                                            <option value="{{ $students->id }}">{{ $students->id }}. {{ $students->name }}</option>
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
                                <label class="font-weight-bold">Group Name</label>
                                <select type="text" class="form-control"   name="group" id="group">
                                    <option>Choose Class</option>
                                        @foreach ($gr as $students)
                                            <option value="{{ $students->id }}">{{ $students->id }}. {{ $students->name }}</option>
                                        @endforeach
                                </select>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-md btn-primary">SUBMIT</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>



@stop