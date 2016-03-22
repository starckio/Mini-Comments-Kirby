<?php
return function($site, $pages, $page) {

  // fetch the basic set of pages
  $articles = $page->children()->visible()->flip();

  // add the tag filter
  if($tag = param('tag')) {
    $articles = $articles->filterBy('tags', $tag, ',');
  }

  // fetch all tags
  $tags = $articles->pluck('tags', ',', false);

  // apply pagination
  $articles   = $articles->paginate(10);
  $pagination = $articles->pagination();

  return compact('articles', 'tags', 'tag', 'pagination');

};