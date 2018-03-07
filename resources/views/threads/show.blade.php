@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="#">{{ $thread->owner->name }}</a> posted: 
                    {{ $thread->title }}
                </div>

                <div class="card-body">
                    <article>
                        <div class="body">{{ $thread->body }}</div>
                    </article>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($thread->replies as $reply)
                @include('threads.reply')
            @endforeach
        </div>
    </div>

    @if(auth()->check())
    <br />
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('reply.store', $thread) }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea class="form-control" name="body" placeholder="Have something to say?" rows="5"></textarea>
                </div>

                <button type="submit" class="btn btn-default">Post</button>
            </form>
        </div>
    </div>
    @else
    <br />
<p class="text-center">Please <a href="{{ route('login') }}">sign in</a> to participate in this discussion.</p>
    @endif
</div>
@endsection
