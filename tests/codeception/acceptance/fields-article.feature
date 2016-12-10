Feature: fields-article
  In order to manage custom fields for articles
  As an administrator
  I need to create, modify, trash, publish, unpublish and delete custom fields for articles

  Background:
    Given I am logged in the backend as an administrator

  Scenario: Create a custom field for an article
    Given I am on the create new article custom field page
    When I create field of type "Text" with "ISBN" as title
    And I save the field
    Then I should see the "Item successfully saved." message

  Scenario: Modify a custom field of an article
    Given I have a field with:
      | title | type | label |
      | ISBN  | text | Isbn  |
    Given I am on the edit page for field:
      | title | type | label |
      | ISBN  | text | Isbn  |
    When I change "label" to "modified label"
    And I save the field
    Then I should see the "Item successfully saved." message
