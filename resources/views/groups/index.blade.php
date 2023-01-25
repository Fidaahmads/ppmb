@extends('layout.admin')
@section('content')
<h4>Student Data</h4>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('students.create') }}" class="btn btn-md btn-success mb-3">ADD STUDENT</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Students</th> 
                                <th scope="col">ID</th>
                                <th scope="col">Dosen ID</th>
                                <th scope="col">Dosen</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($groups as $group)
                                <tr>
                                    <td><a href="" class="btn btn-sm btn-success">LIST</a></td>
                                    <td>{{ $group->id }}</td>
                                    <td>{{ $group->user_id }}</td>
                                    <td>{{ $group->user_name; }}</td>
                                    <td>{{ $group->name }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('groups.destroy', $group->id) }}" method="POST">
                                            <a href="{{ route('groups.edit', $group->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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
                          {{ $groups->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    @stop