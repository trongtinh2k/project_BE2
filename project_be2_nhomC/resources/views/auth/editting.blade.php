@extends('dashboard')

@section('content')

<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Edit Form</h3>
                    <div class="card-body">
                        @foreach($info as $value)
                        <form action="{{ route('updateSubject') }}" method="post">
                            <div class="form-group mb-3">
                                <input type="text" id="subject_name" class="form-control @error('subject_name') 
                                is-invalid @enderror" name="subject_name" value="{{$value->subject_name}}" 
                                    required autocomplete = "subject_name" autofocus>
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                                <input type="text"  id="status" class="form-control" name="status" value="{{$value->status}}" 
                                    required autocomplete = "status" autofocus>                            
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">SAVE</button>
                            </div>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection