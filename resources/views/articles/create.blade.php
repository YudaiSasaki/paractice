@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'articles.store']) !!}

        @include('articles.fields')

    {!! Form::close() !!}
</div>
@endsection
