<?php snippet('header') ?>

  <main class="main" role="main">

    <?php foreach($articles as $article): ?>
    <article class="blog">
      <h1><a href="<?php echo $article->url() ?>"><?php echo $article->title()->html() ?></a></h1>
      <ul class="meta cf">
        <li><b>Date:</b> <time datetime="<?php echo $article->date('c') ?>" pubdate="pubdate"><?php echo $article->date('F N, Y') ?></time></li>
        <li><b>Tags:</b> 
        <?php foreach(str::split($article->tags()) as $tag): ?>
        <a href="<?php echo url('blog/tag:' . urlencode($tag)) ?>"><?php echo $tag; ?></a>
        <?php endforeach ?>
        </li>
      </ul>
      <?php echo $article->text()->excerpt(300) ?>
    </article>
    <?php endforeach ?>

    <nav class="pagination">
      <?php if($pagination->hasPrevPage()): ?>
      <a href="<?php echo $pagination->prevPageUrl() ?>">previous posts</a>
      <?php endif ?>
    
      <?php if($pagination->hasNextPage()): ?>
      <a href="<?php echo $pagination->nextPageUrl() ?>">next posts</a>
      <?php endif ?>
    </nav>

  </main>

<?php snippet('footer') ?>