<?php
use \Bitrix\Landing\Manager;
use \Bitrix\Landing\Assets;
use \Bitrix\Main\Loader;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

if (!Loader::includeModule('landing'))
{
	return;
}

$assets = Assets\Manager::getInstance();
$assets->addAsset('landing_auto_font_scale');

$APPLICATION->ShowProperty('FooterJS');
?>
    </main>
    <? include_once(DEFAULT_PATH . 'include/footer.php');?>
</div>
<?$APPLICATION->ShowProperty('BeforeBodyClose');?>

<?if (\Bitrix\Landing\Connector\Mobile::isMobileHit()):?>
<script type="text/javascript">
	if (typeof BXMPage !== 'undefined')
	{
		BXMPage.TopBar.title.setText('<?= $APPLICATION->getTitle();?>');
		BXMPage.TopBar.title.show();
	}
</script>
<?endif;?>

</body>
</html>