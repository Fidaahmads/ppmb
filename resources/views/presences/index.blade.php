@extends('layouts.admin')
@section('content')


    <!-- Awal Data Table -->
    <div id="table" class="container">
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif

        @if(count($errors))
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </div>
        @endif


        <h1>
            ACTIVE CLASS DATA
        </h1>

        <table class="table table-strip">
            <a href="{{ route('presences.create') }}" class="btn btn-md btn-success mb-3"><i class="fa fa-plus-circle"></i> ADD NEW ({{ Auth::user()->name }})</a>
            <thead>
                <tr class="table">
                    <th scope="col">
                        ID
                    </th>
                    <th scope="col">
                        Schedule Id
                    </th>
                    <th scope="col">
                        Student Id
                    </th>
                    <th scope="col">
                        Presence
                    </th>
                    <th scope="col">
                        Note
                    </th>
                    <th scope="col" colspan="2">
                        Action
                    </th>
                </tr>
            </thead>

            <tbody>
                @forelse($presences as $item)
                <tr class="text-center">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->schedule_id }}</td>
                    <td>{{ $item->student_id }}</td>
                    <td>{{ $item->presence }}</td>
                    <td>{{ $item->note }}</td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('presences.destroy', $item->id) }}" method="POST">
                            <a href="{{ route('presences.edit', $item->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> EDIT</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> DELETE</button>
                        </form>
                    </td>
                </tr>

                @empty
                <div class="alert alert-danger">
                    DATA NOT FOUND
                </div>

                @endforelse
            </tbody>
            <!-- Akhir Data Table -->
        </table>
        <div>

        </div>
    </div>
    
@stop
