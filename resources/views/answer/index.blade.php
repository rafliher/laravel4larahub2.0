@extends('adminlte.master')

@section('content')
<div class="card-header">
    <h2>{{$data['question'][0]->title}}</h2>
    <h4><pre style='font-family: "Source Sans Pro","Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif !important'>{{$data['question'][0]->content}}</pre></h4>
    <div class="card-footer d-flex justify-content-between">
      <span style="font-size: medium;">anonymus</span>
      <span style="font-size: medium; margin-left: auto;">
        created: {{$data['question'][0]->created_at}}, last updated: {{$data['question'][0]->updated_at}}
      </span>  
    </div>
    <div class="container d-flex justify-content-around">
      <a class="col-3" href="/question/{{$data['question'][0]->id}}/edit">
        <button  class="btn btn-primary col-12" style="margin: 0">Edit</button>
      </a>
      <form class="col-3" action="/question/{{$data['question'][0]->id}}/delete" method="post">
        <input class="btn btn-primary col-12" type="submit" value="Delete" />
        @method('delete')
        @csrf
      </form>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    @foreach ($data['answers'] as $index => $answer)
    <div class="card">
        <div class="card-body">
          <pre style='font-family: "Source Sans Pro","Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif !important'>{{$answer->content}}</pre>
        </div>
        <!-- /.card-body -->
        <div class="card-footer d-flex justify-content-between">
          <span style="font-size: small;">anonymus</span>
          <span style="font-size: small; margin-left: auto;">
            created: {{$answer->created_at}}, last updated: {{$answer->updated_at}}
          </span>
        </div>
        <!-- /.card-footer-->
    </div>

    @endforeach
      
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
            Upload your answer here
          </h3>
        </div>
        <div class="card-body pad">
          <form action="/answer/{{$data['question'][0]->id}}" method="POST">
            @csrf
            <div class="mb-3">
              <textarea name="content" class="textarea" placeholder="Type your answer here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px;"></textarea>
            </div>
            <div class="offset-2 col-8">
              <button  class="btn btn-primary col-12" style="margin: 30px 0 10px">Add Answer</button>
            </div>
          </form>
        </div>
      </div>
  </div>
@endsection