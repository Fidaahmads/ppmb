@extends('layouts.admin')
@section('content')
<h4>Student Schedule</h4>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('schedules.create') }}" class="btn btn-md btn-success mb-3">ADD SCHEDULE</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">ID Kelas</th>
                                <th scope="col">ID Dosen</th>
                                <th scope="col">Note</th>
                                <th scope="col">Mulai Kelas</th>
                                <th scope="col">Akhir Kelas</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($schedules as $schedule)
                                <tr>
                                    <td>{{ $schedule->group_id }}</td>
                                    <td>{{ $schedule->user_id }}</td>
                                    <td>{{ $schedule->note }}</td>
                                    <td>{{ $schedule->time_start_at }}</td>
                                    <td>{{ $schedule->time_end_at }}</td>
                                    <td class="text-center">
                                        <img src="{{ Storage::url('public/schedules/').$schedule->photo }}"      class="rounded" style="width: 150px">
                                    </td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('schedules.destroy', $schedule->id) }}" method="POST">
                                            <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Post belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $schedules->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    @stop