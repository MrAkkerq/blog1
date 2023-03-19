<div class="col-md-8">
    <h3 class="pb-4 mb-4 fst-italic border-bottom">
        Комментарии
    </h3>
    @each('articles.comments.item', $article->comments, 'comment')
</div>
