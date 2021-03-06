@extends('layouts.admin')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Edit post</h3>
        </div>
        <div class="panel-body">
            <form action="{{route('posts.update', ['post' => $post['id']])}}" method="post">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title">Title</label>
                    <input type="text"
                           name="title"
                           class="form-control"
                           value="{{ old('title') ?? $post['title'] }}"
                           id="title"
                           placeholder="Title">

                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
                    <label for="body">Body</label>
                    <textarea name="body"
                              class="form-control"
                              id="body"
                              cols="30"
                              rows="10">{!! $post['body'] !!}</textarea>
                    @if ($errors->has('body'))
                        <span class="help-block">
                            <strong>{{ $errors->first('body') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="checkbox">
                    <label>
                        <input @if( old('published') || $post['published'] ) checked @endif name="published" type="checkbox"> Published
                    </label>
                </div>
                <br>
                <button type="submit" class="btn btn-default">Update</button>
                <a href="{{ route('posts.index') }}" class="btn btn-link">Back</a>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    @include('posts.shared.ckeditor')
@endpush
