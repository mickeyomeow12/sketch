@extends('layouts.default')
@section('title', $thread->title )

@section('content')
<div class="container-fluid">
    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
        @include('shared.errors')
        <!-- 首页／版块／类型 -->
        @include('threads._site_map')
        {{ $posts->links() }}
        @if($posts->currentPage()==1)
        <div class="panel panel-default">
            <div class="panel-body">
                <!-- 主题介绍部分 -->
                @if($thread->book_id>0)
                @include('books._book_profile')
                @else
                @include('threads._thread_profile')
                @endif
            </div>
            <div class="panel-vote">
                <!-- 对主题进行投票／收藏／赞赏等操作 -->
                @if(Auth::check())
                @include('threads._thread_vote')
                @else
                <h6 class="display-4">请 <a href="{{ route('login') }}">登录</a> 后参与讨论</h6>
                @endif
            </div>
        </div>
        @endif
        <!-- 展示该主题下每一个帖子 -->
        @foreach($posts as $key=>$post)
        @include('posts._post')
        @endforeach
        {{ $posts->links() }}
        <!-- 回复输入框 -->
        @if(Auth::check())
        @include('threads._reply')
        @endif
    </div>
</div>
@stop
