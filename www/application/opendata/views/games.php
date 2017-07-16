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
<style>

</style>
</head>
<body>

<?php include('_headr.php'); ?>

<?php include('_nav.php'); ?>


<?php if (!sizeof($all_games)) { ?>

<section id="container">
    <h2>暫無資料喔 Orz...</h2>
</section>

<?php } else { ?>

<section id="container">
    <div id="games_grid" class="clearfix">
    <?php foreach ($all_games as $key) { ?>
        <div class="mod_grid">
            <a class="" href="/?q=<?php echo $key['name']; ?>">
                <img src="<?php echo $key['image']; ?>" alt="<?php echo $key['name']; ?>" onerror="this.src='/static/gameprice/build/img_no_img.png';this.onerror=null;">
                <h3><?php echo $key['name']; ?></h3>
                <p class="mod_table">
                    <span class="sub_title mod_table_cell">發行公司:</span>
                    <span class="games_company mod_table_cell"><?php echo $key['companies']; ?></span>
                </p>
                <p class="mod_table">
                    <span class="sub_title mod_table_cell">發售日期:</span>
                    <span class="mod_table_cell"><?php echo $key['release_date']; ?></span>
                </p>
                <p class="mod_table">
                    <span class="sub_title mod_table_cell">遊戲類型:</span>
                    <span class="mod_table_cell"><?php echo $key['type']; ?></span>
                </p>
            </a>
        </div>
    <?php } ?>
    </div>
    <div id="pagination">
        <?php echo $pagination; ?>
    </div>
</section>

<?php } ?>

<?php include('_footer.php'); ?>

</body>
<script src="/static/gameprice/build/ajax.min.js"></script>
<script src="/static/gameprice/build/auto-complete.min.js"></script>
<script>
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

</script>
</html>
