<?php

/**
 * @version		$Id: view.html.php 42 2011-03-31 09:12:23Z chdemko $
 * @package		l21oai25
 * @subpackage	Component
 * @copyright	Copyright (C) 2010-today Christophe Demko. All rights reserved.
 * @author		Christophe Demko
 * @link		http://joomlacode.org/gf/project/l21oai25/
 * @license		http://www.gnu.org/licenses/gpl-2.0.html
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * Set View of Nemateria component
 */
class NemateriaViewCollection extends JViewLegacy
{
    /**
     * Execute and display a layout script.
     *
     * @param	string $tpl	The name of the layout file to parse.
     *
     * @return	void|JError
     *
     * @see		JView::display
     */
    public function display($tpl = null)
    {
        jimport('joomla.filesystem.file');
        // Initialiase variables.
        $this->form = $this->get('Form');
        $this->item = $this->get('Item');
        $this->state = $this->get('State');

        // Check for errors.
        if (count($errors = $this->get('Errors')))
        {
            JError::raiseError(500, implode("<br />", $errors));
            return false;
        }
        // Add toolbar
        $this->addToolbar();

        // Prepare the document
        $this->prepareDocument();

        // Display the layout
        parent::display($tpl);
    }

    /**
     * Add the page title and toolbar.
     */
    protected function addToolbar()
    {
        $doc = JFactory::getDocument();
        //Ajout d'une feuille de style
        $doc->addStyleSheet('components/com_nemateria/assets/css/style.css');

        $isNew = ($this->item->id_collection == 0);
        JToolBarHelper::title(JText::_('COM_NEMATERIA_COLLECTION_MANAGER_' . ($isNew ? 'NEW' : 'EDIT')),'collection_manager');
        // Built the actions for new and existing records.

        JToolBarHelper::apply('collection.apply', 'JTOOLBAR_APPLY');
        JToolBarHelper::save('collection.save', 'JTOOLBAR_SAVE');
        JToolBarHelper::cancel('collection.cancel', 'JTOOLBAR_CANCEL');

    }

    /**
     * Method to set up the document properties
     *
     * @return void
     */
    protected function prepareDocument()
    {
    }
}
