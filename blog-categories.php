<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   (C) 2009 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;

// Add strings for translations in Javascript.
Text::script('JGLOBAL_EXPAND_CATEGORIES');
Text::script('JGLOBAL_COLLAPSE_CATEGORIES');

/** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
$wa = $this->document->getWebAssetManager();
$wa->getRegistry()->addExtensionRegistryFile('com_categories');
$wa->usePreset('com_categories.shared-categories-accordion');

?>

<div class="com-content-category-blog blog">
<?php $leadingcount = 0; ?>
<?php $introcount = 0; ?>
<?php $columncount = 0; ?>
<?php $counter = 0; ?>

<?php if ($this->params->get('base_title')) : ?>
<h2><?php echo htmlspecialchars($this->params->get('base_title'), ENT_COMPAT, 'UTF-8'); ?></h2>
<?php endif; ?>

<?php echo LayoutHelper::render('joomla.content.categories_default', $this); ?>
<?php if ($this->maxLevelcat != 0 && count($this->items[$this->parent->id]) > 0) : ?>
	<?php foreach ($this->items[$this->parent->id] as $id => &$item) : ?>		
		<?php if ($this->params->get('show_empty_categories_cat') || $item->numitems || count($item->getChildren())) : ?>	
			<?php // ------ Leading Count ------------- ?>		
			<?php if ($this->params->get('num_leading_categories') > 0 AND $leadingcount < $this->params->get('num_leading_categories')) : ?>
				<?php // ------ START ITEM -------
				$this->item = & $item;
				echo $this->loadTemplate('item');
				// ------ ENDE ITEM ----------- ?>
			<?php $leadingcount++; ?>
			<?php endif; ?>
		
			<?php // ------ Items Count ------------ ?>
			<?php if ($counter >= $leadingcount) : ?>
				<?php if ($this->params->get('num_intro_categories') > 0 AND $introcount < $this->params->get('num_intro_categories')) : ?>
					<?php if ((int) $this->params->get('num_intro_categories_cols') > 1) : ?>
						<?php $blogClass = ' columns-'.(int) $this->params->get('num_intro_categories_cols'); ?>
					<?php endif; ?>
					
					<?php if ($columncount == 0) : ?>
					<hr />
					<div class="com-content-category-blog__items blog-items <?php echo $blogClass; ?>">
					<?php endif; ?>

					<?php // ------ START ITEM -------
					$this->item = & $item;
					echo $this->loadTemplate('item');
					// ------ ENDE ITEM ----------- ?>
					
					<?php if ($columncount == 0) : ?>
					<?php $columncount++; ?>
					<?php elseif ($columncount > $this->params->get('num_intro_categories_cols')): ?>
					</div>
					<?php $columncount = 0; ?>
					<?php endif; ?>
					<?php $introcount++; ?>
					
				<?php endif; ?>
			<?php endif; ?>
			<?php $counter++; ?>
		<?php endif; ?>
	<?php endforeach; ?>
<?php endif; ?>

</div>