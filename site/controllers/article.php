<?php
return function($site, $pages, $page) {
  $alert = null;
  if(get('submit')) {

    $data = array(
      'name'  =>  filter_var(get('name'), FILTER_SANITIZE_STRING),
      'email' => filter_var(get('email'), FILTER_SANITIZE_STRING),
      'comment'  => filter_var(get('comment'), FILTER_SANITIZE_STRING),
      'date' => date('Y-m-d'),
      'time' => date('H:i')
    );
    $rules = array(
      'name'  => array('required'),
      'email' => array('required', 'email'),
      'comment'  => array('required', 'min' => 1, 'max' => 1024),
    );
    $messages = array(
      'name'  => 'Please enter a valid name',
      'email' => 'Please enter a valid email address',
      'comment'  => 'Please enter a comment between 1 and 1024 characters',
    );

    // some of the data is invalid
    if($invalid = invalid($data, $rules, $messages)) {
      $alert = $invalid;
    // the data is fine, let's save the comment
    } else {

      try {
        $comments = yaml($page->comments());
        $comments[] = $data;

        page()->update(array(
          'comments' => yaml::encode($comments),
        ));

        go('#comments');

      } catch(Exception $e) {
        echo $e->getMessage();
      }

    }
  }
  return compact('alert');
};