<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title><?php echo htmlspecialchars($title); ?></title>
<link rel="alternate" hreflang="tw" href="<?php echo $site_url; ?>" />
<?php echo $meta; ?>

<link rel="stylesheet" href="/static/gameprice/build/gameprice.css">
<link rel="stylesheet" href="/static/gameprice/build/auto-complete.css">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-87356259-1', 'auto');
  ga('send', 'pageview');

</script>
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "Product",
    "url": <?php echo $json_ld['url']; ?>,
    "name": <?php echo $json_ld['name']; ?>,
    "image": <?php echo $json_ld['image']; ?>,
    "description": <?php echo $json_ld['description']; ?>,
    "offers": {
        "@type": "AggregateOffer",
        "priceCurrency": "TWD",
        "lowPrice": <?php echo $json_ld['lowPrice']; ?>,
        "highPrice": <?php echo $json_ld['highPrice']; ?>,
        "offerCount": <?php echo $json_ld['offerCount']; ?>
    }
}
</script>
<style>

</style>
</head>
<body>

<?php include('_headr.php'); ?>

<?php include('_nav.php'); ?>

<section id="container">
<?php if (empty($q)) {?>
    <h2>Gameprice 比價找遊戲 這是一個二手 PS4 遊戲片的搜尋平台</h2>
    <p id="index_desc">不用出門即可找到自己想要的二手遊戲片</p>
    <section id="hot_game" itemscope itemtype="http://www.schema.org/SiteNavigationElement">
        <h3>熱門遊戲搜尋</h3>
        <?php for ($i=0; $i < sizeof($game_keyword); $i++) { ?>
        <a class="mod_tag" href="/?q=<?php echo urlencode($game_keyword[$i]); ?>" itemprop="url">
            <span itemprop="name"><?php echo $game_keyword[$i]; ?></span>
        </a>
        <?php } ?>
        </div>
    </section>
    <section id="rank_game" itemscope itemtype="http://schema.org/ItemList">
        <h3 itemprop="name">熱門遊戲排行</h3>
        <div>
            <ol>
    <?php $rank_count = 1; ?>
    <?php foreach ($game_rank as $key) { ?>
                <li class="mod_list" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <meta itemprop="position" content="<?php echo $rank_count; ?>">
                    <a href="/?q=<?php echo urlencode($key['name']); ?>" itemprop="url">
                        <span itemprop="name"><?php echo $key['name']; ?></span>
                    </a>
                </li>
    <?php } ?>
            </ol>
        </div>
    </section>
    <section id="index_info">
        2 天前最後更新資料量
        <ul>
        <?php foreach ($type_count_array as $value) { ?>
            <li><?php echo $source[$value['type']] . ' 有 ' . $value['total'] . ' 筆'; ?></li>
        <?php }?>
        </ul>
        共 <?php echo $type_count_total; ?> 筆
    </section>
<?php } else if ($count === 0) { ?>
    <h2>目前沒找到有 <?php echo htmlspecialchars($q); ?> 這款遊戲有二手遊戲片</h2>
<?php } else { ?>
    <nav class="mod_breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
        <a class="breadcrumbs" href="/" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <span itemprop="name">Gameprice</span>
            <meta itemprop="position" content="1" />
        </a>
        <span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <span itemprop="name"><?php echo $q; ?></span>
            <meta itemprop="position" content="2" />
        </span>
    </nav>
    <div id="sort" class="mod_table">
        <a class="mod_table_cell divider <?php echo $order_focus_1; ?>" href="?q=<?php echo $q;?>&order=1" data-order="1">價格低到高</a>
        <a class="mod_table_cell divider <?php echo $order_focus_2; ?>" href="?q=<?php echo $q;?>&order=2" data-order="2">價格高到低</a>
        <a class="mod_table_cell <?php echo $order_focus_3; ?>" href="?q=<?php echo $q;?>&order=3" data-order="3">相關度</a>
    </div>
    <h2 id="item_desc"><strong><?php echo $q; ?></strong> 共 <?php echo $count; ?> 個結果</h2>
    <div id='ypaAdWrapper-top'></div>
    <ul class="item_list">
        <?php foreach ($gameprice_data as $value): ?>
        <li>
            <a href="<?php echo $value['url']; ?>" class="item_link mod_table" target="_blank" data-type="<?php echo $value['type']; ?>">
                <img src="<?php echo $value['image']; ?>" alt="<?php echo $value['title']; ?>" class="thumbnail mod_table_cell">
                <div class="info mod_table_cell">
                    <h3><?php echo $value['title']; ?></h3>
                    <div>
                        <div class="price">
                            價格:&nbsp;<span class="price_num"><?php echo $value['price']; ?></span>
                        </div>
                        <div class="source">
                            來源:&nbsp;<?php echo $source[$value['type']]; ?>
                        </div>
                    </div>
                </div>
            </a>
        </li>
        <?php endforeach ?>
    </ul>
    <div id='ypaAdWrapper-bottom'></div>
    <div id="pagination">
        <?php echo $pagination; ?>
    </div>
<?php } ?>
</section>

<?php include('_footer.php'); ?>

</body>
<script src="/static/gameprice/build/ajax.min.js"></script>
<script src="/static/gameprice/build/auto-complete.min.js"></script>
<script>

var js = document.createElement('script'),
    url = '//ssl.sitemaji.com/ypa/gameprice.js';
    if (location.protocol === 'http:') {
        url = '//ad.sitemaji.com/ypa/gameprice.js';
    }
    js.src = url;
    document.getElementsByTagName('head')[0].appendChild(js);

    var searchFrom = document.querySelector('#search_form');
    if (searchFrom) {
        searchFrom.addEventListener('submit', function () {
            ga('send', 'event', 'search', 'search', searchFrom.querySelector('input[type=text]').value);
        });
    }

    new autoComplete({
        selector: 'input[name="q"]',
        minChars: 1,
        source: function(term, callback) {
            ajax({
                method: 'GET',
                url: '/api/suggest?keyword=' + term,
                data: {
                },
                response: 'json',
                success: function (data) {
                    if (data.data) {
                        callback(data.data);
                    }
                },
                error: function(status, data) {
                    // status = http status
                    // do something
                }
            });
        },
        onSelect: function(e, term, item){
            location.href = '/?q=' + encodeURIComponent(item.getAttribute('data-val'));
        }
    });

    var sort = document.querySelectorAll('#sort a');
    if (sort) {
        for (var i = sort.length - 1; i >= 0; i--) {
            sort[i].addEventListener('click', function () {
                ga('send', 'event', 'search', 'click', this.getAttribute('data-order'));
            });
        }
    }

    if (document.querySelectorAll('.item_list')[0]) {
        var items = document.querySelectorAll('.item_list')[0].querySelectorAll('a');
        for (var i = items.length - 1; i >= 0; i--) {
            items[i].addEventListener('click', function () {
                ga('send', 'event', 'url', 'click', this.getAttribute('href'));
                ga('send', 'event', 'url', 'type', this.getAttribute('data-type'));
            });
        }
    }

    var rank = document.querySelectorAll('#rank_game a');
    if (rank) {
        for (var i = rank.length - 1; i >= 0; i--) {
            rank[i].addEventListener('click', function () {
                ga('send', 'event', 'search', 'rank', this.innerHTML);
            });
        }
    }

    var hot = document.querySelectorAll('#hot_game a');
    if (hot) {
        for (var i = hot.length - 1; i >= 0; i--) {
            hot[i].addEventListener('click', function () {
                ga('send', 'event', 'search', 'search', this.innerHTML);
            });
        }
    }
</script>
</html>
