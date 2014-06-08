@extends('templates.main')
@section('content')
@if(Session::has('success_message'))
  <div class="well">
    {{ Alert::success('Success! Post deleted!') }}
  </div>
@endif

@foreach($posts as $post)
<div class="jumbotron">
  <h3>{{ $post->post_title }}</h3>
  <hr>
  <p>{{ $post->post_body }}</p>
  <span class="badge badge-success"> Posted {{$post->updated_at}}</span>
  @if(!Auth::guest())
  {{FORM::open('post/'.$post->id, 'DELETE')}}
  <p>{{FORM::submit('Delete', array('class'=>'btn-small'))}}</p>
  {{FORM::close()}}
  @endif
</div>


@endforeach
@endsection

@section('pagination')
<div id="bg_pagination">
   {{ $posts->links(); }}
</div>
@endsection

