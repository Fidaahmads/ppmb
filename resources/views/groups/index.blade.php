@extends('layouts.admin')
@section('content')

<table class="table table-strip">
            <a href="{{ route('groups.create') }}" class="btn btn-md btn-success mb-3">ADD NEW</a>
             <thead class="thead table-dark">
                <tr class="table table-dark">
                <th scope="col">
                      <center>View Student</center>  
                    </th>
                    <th scope="col">
                      <center>ID</center>  
                    </th>
                    <th scope="col">
                    <center>Dosen ID </center>  
                    </th>
                    <th scope="col">
                    <center>Teacher Name</center>  
                    </th>
                    <th scope="col">
                    <center>Class Name</center> 
                    </th>
                    <th scope="col" colspan="2">
                    <center> Adjustment </center>  
                    </th>
                </tr>
            </thead>

            <tbody>
                @forelse($groups as $group)
                 <tr>
                <td><center><a href="{{ url('members') }}/{{ $group->id }}" class="btn btn-sm btn-success">LIST</a></td>
                    <td class="text-center">{{ $group->id }}</td>
                    <td class="text-center">{{ $group->user_id }}</td>
                    <td class="text-center">{{ $group->user_name }}</td>
                    <td class="text-center">{{ $group->name }}</td>
                    <td class="text-center"> 
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('groups.destroy', $group->id) }}" method="POST">
                            <a href="{{ route('groups.edit', $group->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                        </form>
                    </td>
                </tr>

                @empty
                <div class="alert alert-danger">
                    <center>DATA NOT FOUND</center>
                </div>

                @endforelse
            </tbody>
            <!-- Akhir Data Table -->
        </table>
        <div>

        </div>
    </div>

    <!-- Start Footer Code -->
    <?php
    // include("style/footer.php")
    ?>
  
    <!-- <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 
        @elseif(session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script> -->
@stop