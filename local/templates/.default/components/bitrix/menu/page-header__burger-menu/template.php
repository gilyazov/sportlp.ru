<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?php if (!empty($arResult)):?>
    <?php
    foreach($arResult as $arItem):
        if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
            continue;
    ?>
        <li class="page-header__burger-menu-nav-list-item<?if($arItem["SELECTED"]):?> active<?endif;?>">
            <a href="<?=$arItem["LINK"]?>" class="page-header__burger-menu-nav-link">
                <?=$arItem["TEXT"]?>
            </a>
        </li>
    <?php endforeach?>
<?php endif?>