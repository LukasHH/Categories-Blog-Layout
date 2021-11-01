<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;

?>
<div class="com-content-category-blog__item blog-item">
	<div class="text-center">
		<a href="<?php echo Route::_(RouteHelper::getCategoryRoute($this->item->id, $this->item->language)); ?>">				
			<h5><?php echo $this->escape($this->item->title); ?></h5>
			<?php if ($this->params->get('show_description_image') && $this->item->getParams()->get('image')) : ?>
			<img src="<?php echo $this->item->getParams()->get('image'); ?>" alt="<?php echo htmlspecialchars($this->item->getParams()->get('image_alt'), ENT_COMPAT, 'UTF-8'); ?>">
			<?php endif; ?>					
		</a>
		<?php if ($this->params->get('show_cat_num_articles_cat') == 1) :?>
		<p><span class="badge bg-info"><?php echo Text::_('COM_CONTENT_NUM_ITEMS'); ?><?php echo $this->item->numitems; ?></span></p>
		<?php endif; ?>
	</div>
	<?php if ($this->params->get('show_subcat_desc_cat') == 1) : ?>
		<?php if ($this->item->description) : ?>
			<?php echo HTMLHelper::_('content.prepare', $this->item->description, '', 'com_content.categories'); ?>
		<?php endif; ?>
	<?php endif; ?>
	<p class="readmore">
		<a class="btn btn-secondary" href="<?php echo Route::_(RouteHelper::getCategoryRoute($this->item->id, $this->item->language)); ?>" aria-label="<?php echo Text::sprintf('COM_CONTENT_READ_MORE_TITLE',$this->escape($this->item->title)); ?>">
		<span class="icon-chevron-right" aria-hidden="true"></span> <?php echo Text::sprintf('COM_CONTENT_READ_MORE_TITLE',$this->escape($this->item->title)); ?></a>
	</p>
</div>