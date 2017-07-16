<?php

$index_focus = '';
$games_focus = '';
$search_focus = '';

switch (uri_string()) {
    case 'games':
        $games_focus = 'focus';
        break;

    case 'search':
        $search_focus = 'focus';
        break;

    default:
        if (empty($query_string)) {
            $index_focus = 'focus';
        }
        break;
}

?>

<section id="nav">
    <nav itemscope itemtype="http://www.schema.org/SiteNavigationElement">
        <a href="/"  class="<?php echo $index_focus; ?>" itemprop="url">
            <span itemprop="name">首頁</span>
        </a>
        <a href="/games" class="<?php echo $games_focus; ?>" itemprop="url">
            <span itemprop="name">所有遊戲</span>
        </a>
    </nav>
</section>