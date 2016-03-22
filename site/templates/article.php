<?php snippet('header') ?>

  <main class="main" role="main">

    <h1><?php echo $page->title()->html() ?></h1>

    <ul class="meta cf">
      <li><b>Date:</b> <time datetime="<?php echo $page->date('c') ?>" pubdate="pubdate"><?php echo $page->date('F N, Y') ?></time></li>
      <li><b>Tags:</b> 
      <?php foreach(str::split($page->tags()) as $tag): ?>
      <a href="<?php echo url('blog/tag:' . urlencode($tag)) ?>"><?php echo $tag; ?></a>
      <?php endforeach ?>
      </li>
    </ul>

    <div class="text">
      <?php echo $page->text()->kirbytext() ?>
    </div>

    <nav class="nextprev cf" role="navigation">
      <?php if($prev = $page->prevVisible()): ?>
      <a class="prev" href="<?php echo $prev->url() ?>">&larr; previous</a>
      <?php endif ?>
      <?php if($next = $page->nextVisible()): ?>
      <a class="next" href="<?php echo $next->url() ?>">next &rarr;</a>
      <?php endif ?>
    </nav>

    <?php if($page->active_comments() != 'false'): ?>
    <div class="comments_form disabled">
      <p>Comments are disabled.</p>
    </div>
    <?php elseif($page->active_comments() != 'true'): ?>
    <div class="comments_form">
      <h2>Leave a comment:</h2>
      <form id="form" method="post">

        <?php if($alert): ?>
        <div class="text alert">
          <ul>
            <?php foreach($alert as $message): ?>
            <li><?php echo html($message) ?></li>
            <?php endforeach ?>
          </ul>
        </div>
        <?php endif ?>

        <div class="cf">
          <div class="field one">
            <label for="name">Name <abbr title="required">*</abbr></label>
            <input type="text" id="name" name="name" placeholder="Name">
          </div>
          <div class="field two">
            <label for="email">Email <abbr title="required">*</abbr></label>
            <input type="email" id="email" name="email" placeholder="Email" required>
          </div>
        </div>
        <div class="field">
          <label for="comment">Comment <abbr title="required">*</abbr></label>
          <textarea id="comment" name="comment" placeholder="Comment" required></textarea>
        </div>
        <input class="btn" type="submit" name="submit" value="Submit">

      </form>
    </div>
    <?php endif ?>

    <?php if($page->comments() != ''): ?>
    <div id="comments" class="cf">
      <?php foreach($page->comments()->toStructure()->flip() as $comment): ?>
        <div class="comment cf">
          <h3><?php echo $comment->name() ?></h3>
          <time><?php echo $comment->date('F N, Y') ?> / <?php echo $comment->time() ?></time>
          <p><?php echo $comment->comment() ?></p>
        </div>
      <?php endforeach ?>
    </div>
    <?php endif ?>
  </main>

<?php snippet('footer') ?>