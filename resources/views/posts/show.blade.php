@extends('main')

@section('title','| View Posts')

@section('stylesheets')
      {{Html::style('css/custom.css')}}
@endsection

@section('main content')
    <div class="row">
      <div class="col-md-8">
        <h1>{{ $post->title }}</h1>
        <p class="lead">{{ $post->body }}</p>
      </div>
      <div class="col-md-4">
        <div class="well">
          <dl class="dl-horizontal">
            <label>Url:</label>
            <p><a href="{{ url('blog/'.$post->slug) }}">{{url('blog/'.$post->slug)}}</a></p>
          </dl>
          <dl class="dl-horizontal">
            <label>Create at</label>
            <p>{{date('M j, Y H:i',strtotime($post->created_at))}}</p>
          </dl>
          <dl class="dl-horizontal">
            <label>Last update:</label>
            <p>{{date('M j, Y H:i',strtotime($post->updated_at))}}</p>
          </dl>
          <hr>
          <div class="row">
            <div class="col-sm-6">
              {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-success btn-block')) !!}
            </div>
            <div class="col-sm-6">
              {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

              {!! Form::submit('Delete',['class' => 'btn btn-danger btn-block']) !!}

              {!! Form::close() !!}
            </div>
          </div>


          <div class="row">

            <div class="col-md-2">

            </div>
            <div class="col-md-8">
              {{Html::linkRoute('posts.index', 'See All Blogs', [],['class' => 'btn btn-default btn-block btn-h1-spacing'])}}
            </div>

           <div class="col-mod-2">

           </div>
          </div>
        </div>

      </div>
    </div>


@endsection
