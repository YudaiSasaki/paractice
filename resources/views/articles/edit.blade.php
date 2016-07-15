@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($article, ['route' => ['articles.update', $article->id], 'method' => 'patch']) !!}

        @include('articles.fields')

    {!! Form::close() !!}
</div>
@endsection
