<?php
defined('_JEXEC') or die('Restricted access'); 

$lang = JFactory::getLanguage();
$upper_limit = $lang->getUpperLimitSearchWord();
?>
<form id="searchForm" action="<?php echo JRoute::_('index.php?option=com_exlineo');?>" method="get">

	<fieldset class="txt_search">
         <legend class="search_legend"><?php echo JText::_('COM_EXLINEO_LEGEND_SEARCH'); ?></legend>
            <p><?php echo JText::_('COM_EXLINEO_TEXT_SEARCH'); ?></p>
		
        <label for="search-searchword">
			<?php echo JText::_('COM_EXLINEO_SEARCH_MOTCLE'); ?>
		</label>
        <br />
        <input type="text" name="motcle" id="search-searchword" size="60" maxlength="<?php echo $upper_limit; ?>" value="<?php echo $this->escape($this->motcle ); ?>" class="inputbox" />
                <br />
                
        
        <label for="search-searchword">
			<?php echo JText::_('COM_EXLINEO_SEARCH_TITLE'); ?>
		</label>
                <br />
        
		<input type="text" name="searchTitle" id="search-searchword" size="30" maxlength="<?php echo $upper_limit; ?>" value="<?php echo $this->escape($this->keywordTitle ); ?>" class="inputbox" />
                <br />
                <label for="search-searchword">
			<?php echo JText::_('COM_EXLINEO_SEARCH_ARTISTE'); ?>
		</label>
                <br />
		<input type="text" name="searchArtiste" id="search-searchword" size="30" maxlength="<?php echo $upper_limit; ?>" value="<?php echo $this->escape($this->keywordArtiste); ?>" class="inputbox" />
		<br />
                <label for="search-searchword">
			<?php echo JText::_('COM_EXLINEO_SEARCH_EDITOR'); ?>
		</label>
                <br />
                <input type="text" name="searchEditor" id="search-searchword" size="30" maxlength="<?php echo $upper_limit; ?>" value="<?php echo $this->escape($this->keywordEditor); ?>" class="inputbox" />
                <br />
                <label for="search-searchword">
			<?php echo JText::_('COM_EXLINEO_SEARCH_SUBJECT'); ?>
		</label>
                <br />
                <input type="text" name="searchSubject" id="search-searchword" size="30" maxlength="<?php echo $upper_limit; ?>" value="<?php echo $this->escape($this->keywordSubject); ?>" class="inputbox" />
                <br />
                <label for="search-searchword">
			<?php echo JText::_('COM_EXLINEO_SEARCH_DESC'); ?>
		</label>
                <br />
                <input type="text" name="searchDescription" id="search-searchword" size="30" maxlength="<?php echo $upper_limit; ?>" value="<?php echo $this->escape($this->keywordDescription); ?>" class="inputbox" />
                <br />
	</fieldset>
        <fieldset class="date_search">
            <legend class="search_legend">
                <?php echo JText::_('COM_EXLINEO_SEARCH_DATE'); ?>
            </legend>
            <p><?php echo JText::_('COM_EXLINEO_TEXT_SEARCH_DATE'); ?></p>
            <p>Période de temps : </p>
            <input type="checkbox" name="validSearchDate" value="searchDate" id="validSearchDate" value="true" <?php if($this->keywordSearchdate != "")echo 'checked="checked"'; ?> >
            <label for="validSearchDate">
            <light><?php echo JText::_('COM_EXLINEO_INCLUDE_SEARCH_DATE'); ?></light></label><br />
            <?php echo JText::_('COM_EXLINEO_FROM_SEARCH_DATE'); ?><br />
            <input type="text" class="datebox" name="minDate" id="minDate" size="30" class="inputbox" <?php if($this->keywordFrom == "" )echo 'disabled="disabled"'; ?> value="<?php echo $this->escape($this->keywordFrom); ?>" />
            <br />
            <?php echo JText::_('COM_EXLINEO_UNTIL_SEARCH_DATE'); ?>
            <br />
            <input type="text" class="datebox" name="maxDate" id="maxDate" size="30" class="inputbox" <?php if($this->keywordUntil == "" )echo 'disabled="disabled"'; ?> value="<?php echo $this->escape($this->keywordUntil); ?>" />
            
        </fieldset>
    <!--Todo Générer cette liste depuis le backoffice -->
        <fieldset class="type_search">
            <legend class="search_legend"><?php echo JText::_('COM_EXLINEO_SEARCH_TYPE'); ?></legend>
            <p><?php echo JText::_('COM_EXLINEO_TEXT_SEARCH_TYPE'); ?></p>
        </fieldset>
    
	<div class="searchintro<?php echo $this->params->get('pageclass_sfx'); ?>">
		<?php if (!empty($this->searchword)):?>
		<p><?php echo JText::plural('COM_EXLINEO_SEARCH_KEYWORD_N_RESULTS', $this->total);?></p>
		<?php endif;?>
	</div>

	<fieldset class="phrases">
		<legend><?php echo JText::_('COM_EXLINEO_FOR');?>
		</legend>
			<div class="phrases-box">
			<?php echo $this->lists['searchphrase']; ?>
			</div>
			<div class="ordering-box">
			<label for="ordering" class="ordering">
				<?php echo JText::_('COM_EXLINEO_ORDERING');?>
			</label>
			<?php echo $this->lists['ordering'];?>
			</div>
	</fieldset>
    
    <button name="OaiSearch" onclick="this.form.submit()" class="button"><?php echo JText::_('COM_EXLINEO_GO');?></button>
        <input type="hidden" name="task" value="search" />

<?php if ($this->total > 0) : ?>

	<div class="form-limit">
		<label for="limit">
			<?php echo JText::_('JGLOBAL_DISPLAY_NUM'); ?>
		</label>
		<?php echo $this->pagination->getLimitBox(); ?>
	</div>
<p class="counter">
		<?php echo $this->pagination->getPagesCounter(); ?>
	</p>

<?php endif; ?>

</form>


