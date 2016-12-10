<?php
/**
 * @package     Joomla.Test
 * @subpackage  AcceptanceTester.Page
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Page\Acceptance\Administrator;

/**
 * Acceptance Page object class to define Content Manager page objects.
 *
 * @package  Page\Acceptance\Administrator
 *
 * @since    __DEPLOY_VERSION__
 */
class ArticleFieldsPage extends AdminPage
{

    /**
     * Link to the article listing page.
     *
     * @var    string
     * @since  __DEPLOY_VERSION__
     */
    public static $url = "/administrator/index.php?option=com_fields&view=fields&context=com_content.article";

    /**
     * Locator for article's name field
     *
     * @var    array
     * @since  __DEPLOY_VERSION__
     */
    public static $seeName = ['xpath' => "//table[@id='fieldList']//tr[1]//td[4]"];
}
