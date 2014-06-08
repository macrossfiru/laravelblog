@extends('templates.main')
@section('content')
@if(Session::has('success_message'))
  <div class="well">
    {{ Alert::success('Success! Post deleted!') }}
  </div>
@endif

@foreach($posts as $post)
<div class="panel panel-default">
  <div class="panel-heading"><h2 class="panel-title">{{ $post->post_title }}</h2></div>
  <div class="panel-body">
  <p>{{ $post->post_body }}</p>
  <span class="badge badge-success">Posted {{$post->updated_at}}</span>
  @if(!Auth::guest())
  {{FORM::open('post/'.$post->id, 'DELETE')}}
  <p>{{FORM::submit('Delete', array('class'=>'btn-small'))}}</p>
  {{FORM::close()}}
  @endif
  </div>
</div>

@endforeach
@endsection

@section('pagination')
<div id="bg_pagination">
   {{ $posts->links(); }}
</div>
@endsection