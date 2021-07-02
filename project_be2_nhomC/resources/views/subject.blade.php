@extends('dashboard')
    @section('content')
    <div class="table-responsive ">
        <table  style="margin: 0 100px" class="table">
            <thead>
                <tr>
                    <th>subject_id</th>
                    <th>subject_name</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subject as $subjects)
                <tr>
                    <td>{!! $subjects->subject_id !!}</td>
                    <td>{!! $subjects->subject_name !!}</td>
                    <td>{!! $subjects->status !!}</td>
                    <td>
                        <!-- Delete -->
                        <a href="{{ route('subjects.delete',$subjects->subject_id) }}" class="btn btn-sm btn-danger">Delete</a>

                        <a href="{{ route('subjects.edit',$subjects->subject_id) }}" class="btn btn-sm btn-danger">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection