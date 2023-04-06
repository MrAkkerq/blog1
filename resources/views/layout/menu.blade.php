<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        <a class="p-2 link-secondary" href="/">Главная</a>
        <a class="p-2 link-secondary" href="/news">Новости</a>
        <a class="p-2 link-secondary" href="/articles">Статьи</a>
        <a class="p-2 link-secondary" href="/articles/create">Создать статью</a>
        <a class="p-2 link-secondary" href="/contacts">Контакты</a>
        <a class="p-2 link-secondary" href="/statistics">Статистика</a>
        <a class="p-2 link-secondary" href="/about">О нас</a>
        {{--        @hasrole('admin')--}}
{{--            <a class="p-2 link-secondary" href="/admin/articles">Админ. раздел</a>--}}
{{--        @endhasrole--}}
        <x-admin/>
    </nav>
</div>
