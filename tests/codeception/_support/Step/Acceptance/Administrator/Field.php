<?php
/**
 * @package     Joomla.Test
 * @subpackage  AcceptanceTester.Step
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Step\Acceptance\Administrator;

use Behat\Gherkin\Node\TableNode;
use Page\Acceptance\Administrator\ArticleFieldPage;
use Page\Acceptance\Administrator\FieldsArticleManagerPage;

/**
 * Acceptance Step object class contains suits for fields.
 *
 * @package  Step\Acceptance\Administrator
 *
 * @since    __DEPLOY_VERSION__
 */
class Field extends Admin
{

	/**
	 * @Given I have a field with:
	 *
	 * @param TableNode $table
	 */
	public function haveAFieldWith(TableNode $table)
	{
		$I          = $this;
		$attributes = $table->getHash()[0];

		$I->haveInJoomlaDatabase('fields', $attributes);
	}

	/**
	 * @Given I am on the edit page for field:
	 *
	 * @param TableNode $table
	 */
	public function amOnTheEditFieldPage(TableNode $table)
	{
		$I          = $this;
		$attributes = $table->getHash()[0];
		$id         = $I->grabFromJoomlaDatabase('fields', 'id', $attributes);

		$I->amOnPage(ArticleFieldPage::$url . '&id=' . $id);
	}

	/**
	 * @Given I am on the create new article custom field page
	 */
	public function amOnTheCreateNewArticleCustomFieldPage()
	{
		$I = $this;
		$I->amOnPage(ArticleFieldPage::$url);
	}

	/**
	 * @When I create field of type ":type" with ":title" as title
	 *
	 * @param $type  string
	 * @param $title string
	 **/
	public function createAFieldOfTypeWithTitleAndLabel($type, $title)
	{
		$this->articleFieldPage->fillForm([
			'title' => $title,
			'type'  => $type,
			'label' => $title,
		]);
	}

	/**
	 * @When I save the field
	 */
	public function saveTheField()
	{
		$this->articleFieldPage->clickToolbarButton('Save');
	}

	/**
	 * @Given I am logged in the backend as an administrator
	 *
	 * @TODO  put this is a super class/trait
	 */
	public function amLoggedInTheBackendAsAnAdministrator()
	{
		$this->doAdministratorLogin();
	}

	/**
	 * @When I change ":field" to ":value"
	 *
	 * @Todo put this in a super class/trait
	 *
	 * @param $field
	 * @param $value
	 */
	public function changeFieldToValue($field, $value)
	{
		$id = $this->articleFieldPage->getIdByName($field);

		$this->articleFieldPage->fillFieldById($field, $value);
	}

	/**
	 * @param string $table
	 * @param array  $criteria
	 *
	 * @TODO put this in a database helper class/trait
	 */
	public function haveInJoomlaDatabase($table, $criteria = null)
	{
		$table = $this->addPrefix($table);

		$this->haveInDatabase($table, $criteria);
	}

	/**
	 * @param      $table
	 * @param      $column
	 * @param null $criteria
	 *
	 * @TODO put this in a database helper class/trait
	 * @return mixed
	 */
	protected function grabFromJoomlaDatabase($table, $column, $criteria = null)
	{
		$table = $this->addPrefix($table);

		return $this->grabFromDatabase($table, $column, $criteria);
	}

	/**
	 * Add the table prefix
	 *
	 * @param $table string
	 *
	 * @return string
	 */
	protected function addPrefix($table)
	{
		// TODO use array get and put this in a helper file
		// TODO replace with getSuiteConfiguration()
		return 'jos_' . $table;
	}
}

