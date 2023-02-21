@extends('layouts.admin')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <table class="table table-strip">
                    <tbody>
                         <tr class="table table-dark">
                            <th>Id Schedule</th>
                            <td>{{ $schedule->id }}</td>
                        </tr>
                         <tr class="table table-dark">
                            <th>Id - Group Name</th>
                            <td>{{ $schedule->group_id }} - {{ $result->group_name }}</td>
                        </tr>
                         <tr class="table table-dark">
                            <th>Id - User Name</th>
                            <td>{{ $schedule->user_id }} - {{ $result->user_name }}</td>
                        </tr>
                         <tr class="table table-dark">
                            <th>Student Amount</th>
                            <td>{{ $count }} Siswa</td>
                        </tr>
                         <tr class="table table-dark">
                            <th>Note</th>
                            <td>{{ $schedule->note }}</td>
                        </tr>
                         <tr class="table table-dark">
                            <th>Study Time</th>
                            <td>{{ $schedule->time_start_at.' WIB - '.$schedule->time_end_at. ' WIB' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12">
                <table class="table table-strip">
                     <thead class="thead table-dark" class="thead table-dark">
                         <tr  class="text-center">
                            <th>No</th>
                            <th>Id Students</th>
                            <th>Presence</th>
                            <th>Note</th>
                        </tr>
                    </thead>

                    <tbody  class="text-center">

                        @foreach ($presence as $item) 
                         <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->student_id }}</td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('presence') is-invalid @enderror" type="radio" name="status[{{$item->id }}]" id="presence1" value="Hadir">
                                    <label class="form-check-label" for="presence1">Hadir</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('presence') is-invalid @enderror" type="radio" name="status[{{$item->id }}]" id="presence2" value="Sakit">
                                    <label class="form-check-label" for="presence2">Sakit</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('presence') is-invalid @enderror" type="radio" name="status[{{$item->id }}]" id="presence3" value="Izin">
                                    <label class="form-check-label" for="presence3">Izin</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('presence') is-invalid @enderror" type="radio" name="status[{{$item->id }}]" id="presence3" value="Alfa">
                                    <label class="form-check-label" for="presence3">Alfa</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control @error('note') is-invalid @enderror" name="note" value="{{ old('note') }}">

                                    <!-- error message untuk note -->
                                    @error('note')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>

@stop