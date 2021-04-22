<?php
/**
 * Created by PhpStorm.
 * User: Shivam
 * Date: 09/04/21
 * Time: 9:34 PM
 */

defined('_JEXEC') or die;

/**
 * Analytics system plugin
 *
 * @since  1.0
 */
class plgSystemHeadingreplace extends JPlugin
{
    /**
     * Constructor.
     *
     * @param   object &$subject The object to observe.
     * @param   array $config An optional associative array of configuration settings.
     *
     * @since   1.0
     */
    public function __construct(&$subject, $config)
    {
        // Calling the parent Constructor
        parent::__construct($subject, $config);

        // Do some extra initialisation in this constructor if required
    }

    public function onBeforeCompileHead()
    {
        //echo 'compile';
        //only going to run these in the backend for now
        $app = JFactory::getApplication();
        $document = JFactory::getDocument();
        $heading_text = $this->params->get('heading_text', 1);
        if ($app->isAdmin()) {

            $document->addScriptDeclaration("jQuery.noConflict();  
        jQuery(document).ready(function(){
               
             var heading_text = '$heading_text';
             jQuery('.page-title').text(heading_text);
            }); 
       
        ");
            return;
        }

    }

}