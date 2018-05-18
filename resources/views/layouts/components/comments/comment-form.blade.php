<div id="respond" class="comment-form">
    <p id="reply-title"><small><a rel="nofollow" id="cancel-comment-reply-link" href="#respond" style="display:none;">Отменить</a></small></p>
    <form action="{{ route($route) }}" method="post" id="commentform" name="comment-form">
        <label for="comment">Ваш комментарий: </label>
        <div class="clearfix"></div>
        <textarea class="pull-left" id="comment" name="text" rows="4" placeholder="Ваш комментарий" minlength="10" maxlength="1200" required></textarea>
        <div class="clearfix"></div>
        <p class="form-submit">
            {{ csrf_field() }}
            <input id="comment_post_ID" type="hidden" name="comment_post_ID" value="{{ $item->id }}" />
            <input id="user_id" type="hidden" name="user_id" value="{{ Auth::id()}}" />
            <input id="comment_parent" type="hidden" name="comment_parent" value="0" />
            <input name="submit" type="submit" class="btn btn-default" id="submit" value="Отправить" />
        </p>
    </form>
</div>