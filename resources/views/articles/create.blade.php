@extends('app')

@section('body')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'articles.store']) !!}

        @include('articles.fields')

    {!! Form::close() !!}
</div>
@endsection
