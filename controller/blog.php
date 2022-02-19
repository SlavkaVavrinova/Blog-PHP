<?php

$blogPostRepository = new BlogPostRepository();

$id = $_GET['id'] ?? null;

if ($id) {
  $clanek = $blogPostRepository->findBlogPostById($id);
  if ($clanek) {
    $sablona = 'blogDetail';
  } else {
    $sablona = '404';
  }
} else {
  $sablona = 'blog';

  $clanky = $blogPostRepository->findBlogPosts();
}