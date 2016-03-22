<?php if(!defined('KIRBY')) exit ?>

title: Article
pages: false
files:
  sortable: true
fields:
  title:
    label: Title
    type: title
  date:
    label: Date
    type: date
    width: 1/2
    default: today
  author:
    label: Author
    type: user
    width: 1/2
  tags:
    label: Tags
    type: tags
  text:
    label: Text
    type: textarea

  line:
    type: line

  active_comments:
    label: Activate comments
    type: switch
    text_on: Enable comments
    text_off: Disable comments

  comments:
    label: Comments
    type: structure
    entry: >
      <b>{{name}}</b> / {{date}} - {{time}}<br>
      ({{email}})<br><br>
      {{comment}}
    fields:
      date:
        width: 1/2
        label: Date
        type: date
        default: today
        validate: date
      time:
        width: 1/2
        label: Time
        type: time
        default: now
        validate: time
        interval: 1
      name:
        label: Username
        type: text
      email:
        label: Email
        type: email
        validate: email
      comment:
        label: Comment
        type: textarea
      id:
        label: id
        type: text