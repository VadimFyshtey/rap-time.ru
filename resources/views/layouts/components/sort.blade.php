<div class="pull-right sort-block">
    <span class="sort-text">Сортировать по:</span>
    <span class="sort-item
        {{ @$_GET['sort'] === 'rate_count' && @$_GET['by'] === 'desc' ? "fas fa-caret-up" : " " }}
        {{ @$_GET['sort'] === 'rate_count' && @$_GET['by'] === 'asc' ? "fas fa-caret-down" : " " }}
        {{ @$_GET['sort'] === 'rate_count' ? 'active' : '' }}" data-sort="rate_count"
        data-by="{{ @$_GET['sort'] === 'rate_count' && @$_GET['by'] === 'desc' ? 'asc' : 'desc' }}">
        Рейтингу
    </span>
    <span class="sort-item
        {{ @$_GET['sort'] === 'created_at' && @$_GET['by'] === 'desc' ? "fas fa-caret-up" : " " }}
        {{ @$_GET['sort'] === 'created_at' && @$_GET['by'] === 'asc' ? "fas fa-caret-down" : " " }}
        {{ @$_GET['sort'] === 'created_at' ? 'active' : '' }}" data-sort="created_at"
        data-by="{{ @$_GET['sort'] === 'created_at' && @$_GET['by'] === 'desc' ? 'asc' : 'desc' }}">
        Дате
    </span>
    <span class="sort-item
        {{ @$_GET['sort'] === 'view' && @$_GET['by'] === 'desc' ? "fas fa-caret-up" : " " }}
        {{ @$_GET['sort'] === 'view' && @$_GET['by'] === 'asc' ? "fas fa-caret-down" : " " }}
        {{ @$_GET['sort'] === 'view' ? 'active' : '' }}" data-sort="view"
        data-by="{{ @$_GET['sort'] === 'view' && @$_GET['by'] === 'desc' ? 'asc' : 'desc' }}">
        Просмотрам
    </span>
</div>