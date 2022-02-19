<?php

$sablona = 'domu';

$blogPostRepository = new BlogPostRepository();

$pocetClanku = $blogPostRepository->getBlogPostsTotalCount();

$clanky = $blogPostRepository->findBlogPosts(3);