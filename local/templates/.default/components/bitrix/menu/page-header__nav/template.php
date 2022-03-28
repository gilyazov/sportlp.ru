<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?php if (!empty($arResult)):?>
    <nav class="page-header__nav">
        <ul class="page-header__nav-list">
            <?php
            foreach($arResult as $arItem):
                if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                    continue;
            ?>
                <li class="page-header__nav-list-item<?if($arItem["SELECTED"]):?> active<?endif;?>">
                    <a href="<?=$arItem["LINK"]?>" class="page-header__nav-link">
                        <span>
                            <?=$arItem["TEXT"]?>
                        </span>
                    </a>
                </li>
            <?php endforeach?>
        </ul>
    </nav>
<?php endif?>