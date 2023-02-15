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
                                <label class="font-weight-bold">ID Kelas</label>
                                <select type="number" class="form-control @error('group_id') is-invalid @enderror" name="group_id" id="group_id">
                                    <option>Pilih Kelas</option>
                                    @foreach($members as $data)
                                        <option value="{{ $data->id }}">{{ $data->id }}. {{ $data->name }}</option>
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
                                <label class="font-weight-bold">Nama Kelas</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Kelas Programmer">

                                <!-- error message untuk name -->
                                @error('name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
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