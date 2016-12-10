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
class ArticleFieldPage extends AdminPage
{
	/**
	 * Link to the article listing page.
	 *
	 * @var    string
	 * @since  __DEPLOY_VERSION__
	 */
	public static $url = "/administrator/index.php?option=com_fields&view=field&layout=edit&context=com_content.article";

	/**
	 * @param $value
	 */
	protected function fillTypeField($value)
	{
		$I = $this;
		$I->selectOptionInChosenById($this->getIdByName('type'), $value);
	}

	/**
	 * Method to create fill the field form
	 *
	 * @When    I create new field with field title as :title of type :type with the label :label
	 * @since   __DEPLOY_VERSION__
	 *
	 * @param array $attributes
	 *
	 * @todo    move to form helper
	 */
	public function fillForm(array $attributes = [])
	{
		foreach ($attributes as $key => $value)
		{
			$methodName = 'fill' . ucfirst($key) . 'Field';
			if (method_exists($this, $methodName))
			{
				$this->{$methodName}($value);
			}
			else
			{
				$this->fillFieldById($this->getIdByName($key), $value);
			}
		}
	}

	/**
	 * @param $name
	 *
	 * @return string
	 *
	 * @todo move to form helper
	 */
	public function getIdByName($name)
	{
		return 'jform_' . $name;
	}

	/**
	 * Fill a field by id
	 *
	 * @param $id
	 * @param $value
	 *
	 * @return mixed|null
	 * @todo move to form helper
	 */
	public function fillFieldById($id, $value)
	{
		return $this->fillField(['id' => $id], $value);
	}
}
