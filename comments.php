<?php
require_once('inc/walker/CommentWalker.php');
$commentCount = absint(get_comments_number());
?>
<div class="comments">
    <div class="comments__title">
        <?php if ($commentCount > 0) : ?>
            <?= sprintf(_n('%s comment', '%s comments', $commentCount, 'agency'), $commentCount) ?>
        <?php else : ?>
            <?= __('Leave a comment', 'agency') ?>
        <?php endif; ?>
    </div>

    <div class="comments__list">
        <?php wp_list_comments([
            "style" => "div",
            "walker" => new AgenciaCommentWalker(),
        ]) ?>
    </div>

    <?= agencia_paginate("comments"); ?>

    <?php if (comments_open()) {
        comment_form();
    } ?>

    <?php ?>
</div>