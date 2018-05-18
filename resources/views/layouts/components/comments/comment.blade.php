@foreach($items as $item)
<li id="li-comment-{{ $item->id }}" class="comment">
    <div id="comment-{{$item->id}}" class="comment-container {{ $item->user_id === Auth::id() ? 'by-author-comment' : '' }}">
        @if(Auth::user()->role_id === 1 || Auth::user()->role_id === 2)
            <a href="{{ route($routeDelete, ['id' => $item->id]) }}" class="pull-right delete-comment"><i class="fas fa-times"></i></a>
        @endif
        <div class="comment-author">
            @if(!empty($item->user->avatar))
                <img src="{{ asset($item->user->avatar) }}" class="avatar" alt="Rap-Time" title="Rap-Time" />
            @endif
            <p class="user-name">{{ $item->user->name ? $item->user->name : $item->user->email }}</p>
        </div>
        <div class="comment-meta {{ $item->user_id === Auth::id() ? 'by-author-comment-left' : '' }}">
            <div class="intro hidden-xs">
                <div class="comment-date">
                    {{ is_object($item->created_at) ? $item->created_at->format('d.m.Y в H:i') : ''}}
                </div>
            </div>
            <div class="comment-body">
                <p>{{ $item->text }}</p>
            </div>
            <div class="clearfix"></div>
            <div class="reply group pull-right">
                <a class="comment-reply-link" href="#respond" onclick="return addComment.moveForm(&quot;comment-{{$item->id}}&quot;, &quot;{{$item->id}}&quot;, &quot;respond&quot;, &quot;{{$item->$post_id}}&quot;)">Ответить</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    @if(isset($comments[$item->id]))
        <ul class="children">
            @include('layouts.components.comments.comment', ['items' => $comments[$item->id]])
        </ul>
    @endif

</li>
@endforeach