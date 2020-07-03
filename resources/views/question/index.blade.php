@extends('adminlte.master')

@section('content')
<div class="card-header d-flex justify-content-between">
  <h3 class="card-title">Questions</h3>
  <a href="/question/create" style="margin-left: auto;"><button  class="btn btn-primary col-12">Add Question</button></a>
</div>
<!-- /.card-header -->
<div class="card-body">
        @foreach ($questions as $index => $question)
        <div class="card" id="{{$question->id}}">
            <div class="card-header">
              <a class="card-title" href="/answer/{{$question->id}}"><h4>{{$question->title}}</h4></a>
            </div>
            <div class="card-body">
                {{$question->content}}
            </div>
            <!-- /.card-body -->
            <div class="card-footer d-flex justify-content-end">
              <span style="font-size: small;">{{$question->created_at}}</span>
            </div>
            <!-- /.card-footer-->
        </div>

        @endforeach
</div>
@endsection

@push('scripts')

@endpush