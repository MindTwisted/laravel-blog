<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

// Authenticated dashboard breadcrumbs
// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
});

// Home > Posts
Breadcrumbs::register('posts', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Posts', route('posts.index'));
});

// Home > Posts > Add Post
Breadcrumbs::register('addPost', function ($breadcrumbs) {
    $breadcrumbs->parent('posts');
    $breadcrumbs->push('Add Post', route('posts.create'));
});

// Home > Comments > [Show Post]
Breadcrumbs::register('showPost', function ($breadcrumbs, $post) {
    $breadcrumbs->parent('posts');
    $breadcrumbs->push("Post '{$post->title}'",
        route('posts.show', $post->id));
});

// Home > Comments > [Edit Post]
Breadcrumbs::register('editPost', function ($breadcrumbs, $post) {
    $breadcrumbs->parent('posts');
    $breadcrumbs->push("Edit post '{$post->title}'",
        route('posts.edit', $post->id));
});

// Home > Categories
Breadcrumbs::register('categories', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Categories', route('categories.index'));
});

// Home > Categories > Add Category
Breadcrumbs::register('addCategory', function ($breadcrumbs) {
    $breadcrumbs->parent('categories');
    $breadcrumbs->push('Add Category', route('categories.create'));
});

// Home > Categories > [Edit Category]
Breadcrumbs::register('editCategory', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('categories');
    $breadcrumbs->push("Edit Category '{$category->title}'",
        route('categories.edit', $category->id));
});

// Home > Tags
Breadcrumbs::register('tags', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Tags', route('tags.index'));
});

// Home > Tags > Add Tag
Breadcrumbs::register('addTag', function ($breadcrumbs) {
    $breadcrumbs->parent('tags');
    $breadcrumbs->push('Add Tag', route('tags.create'));
});

// Home > Tags > [Edit Tag]
Breadcrumbs::register('editTag', function ($breadcrumbs, $tag) {
    $breadcrumbs->parent('tags');
    $breadcrumbs->push("Edit Tag '{$tag->title}'",
        route('tags.edit', $tag->id));
});

// Home > Comments
Breadcrumbs::register('comments', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Comments', route('comments.index'));
});

// Home > Comments > Add Comment
Breadcrumbs::register('addComment', function ($breadcrumbs) {
    $breadcrumbs->parent('comments');
    $breadcrumbs->push('Add Comment', route('comments.create'));
});

// Home > Comments > [Show Comment]
Breadcrumbs::register('showComment', function ($breadcrumbs, $comment) {
    $breadcrumbs->parent('comments');
    $breadcrumbs->push("Comment by {$comment->author_name}",
        route('comments.show', $comment->id));
});

// Home > Comments > [Edit Comment]
Breadcrumbs::register('editComment', function ($breadcrumbs, $comment) {
    $breadcrumbs->parent('comments');
    $breadcrumbs->push("Edit Comment by {$comment->author_name}",
        route('comments.edit', $comment->id));
});

// Public site breadcrumbs
// Main
Breadcrumbs::register('main', function ($breadcrumbs) {
    $breadcrumbs->push('Main', route('landingPage'));
});

// Main > Login
Breadcrumbs::register('login', function ($breadcrumbs) {
    $breadcrumbs->parent('main');
    $breadcrumbs->push('Login', route('login'));
});