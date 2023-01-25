<?php

require_once('inc/supports.php');
require_once('inc/assets.php');
require_once('inc/menus.php');
require_once('inc/apparence.php');
require_once('inc/images.php');
require_once('inc/style.php');
require_once('inc/query/post.php');
require_once('inc/query/property.php');
require_once('inc/comments.php');

function agencia_icon(string $name): string
{
    $spriteUrl = get_template_directory_uri() . '/assets/sprite.14d9fd56.svg';
    return '
        <svg class="icon">
            <use xlink:href="' . $spriteUrl . '#' . $name . '"></use>
        </svg>
    ';
}

function agencia_paginate($type = "post")
{
    $args = [
        'prev_text' => agencia_icon('arrow'),
        'next_text' => agencia_icon('arrow'),
    ];
    switch ($type) {
        case "comments":
            echo '<div class="pagination">';
            paginate_comments_links($args);
            echo '</div>';
            break;
        default:
            return '
                <div class="pagination">
                    ' . paginate_links($args) . '
                </div>';
    }
}
