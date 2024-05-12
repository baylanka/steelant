<?php
use \model\Template;
?>
<div class=" my-5  p-5" style="background-color: #eef1f4;">

    <h4 class="color-blue">
        <?php if($mode == Template::MODE_VIEW):?>
            <?= $ad_on_content->title ?? '' ?>
        <?php else: ?>
            TITLE
        <?php endif; ?>
    </h4>
    <p class="custom-font">
        <?php if($mode == Template::MODE_VIEW):?>
            <?= $ad_on_content->description ?? '' ?>
        <?php else: ?>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
        <?php endif; ?>
    </p>

</div>