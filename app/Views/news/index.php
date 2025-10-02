<h2><?= esc($title) ?></h2>

<?php if ($news_list !== []): ?>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

        <?php foreach ($news_list as $news_item): ?>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($news_item['title']) ?></h5>
                        <p class="card-text"><?= esc($news_item['body']) ?></p>
                        <a class="btn btn-primary" href="news/<?= esc($news_item['slug'], 'url') ?>">View article</a>
                    </div>
                </div>
            </div>

        <?php endforeach ?>
    </div>
<?php else: ?>

    <h3>No News</h3>

    <p>Unable to find any news for you.</p>

<?php endif ?>