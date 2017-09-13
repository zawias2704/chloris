Feature: Edit plant
  In order to edit plant
  As a user
  I need to be able to enter edit

  @database
  Scenario: Editing plant with required field
    Given I am authenticated as "admin" using "admin"
    When I am on "/my-plants"
    And I click "show" in the "cactus" row
    And I follow "Edit"
    And I fill in "Name" with "flower"
    And I fill in "Frequency" with "4"
    And I fill in "Amount" with "0.25"
    And I press "Save"
    Then I should see "Plant chnged!"

  @database
  Scenario: Adding plants with all field
    Given I am authenticated as "admin" using "admin"
    When I am on "/my-plants"
    And I click "show" in the "cactus" row
    And I follow "Edit"
    And I fill in "Name" with "flower"
    And I fill in "Frequency" with "4"
    And I fill in "Amount" with "0.25"
    And I fill in "Place" with "Window"
    And I fill in "Description" with "Nice a flower"
    And I press "Save"
    Then I should see "Plant chnged!"

  Scenario: Adding plants with blank required field
    Given I am authenticated as "admin" using "admin"
    When I am on "/my-plants"
    And I click "show" in the "cactus" row
    And I follow "Edit"
    And I fill in "Name" with ""
    And I fill in "Frequency" with ""
    And I fill in "Amount" with ""
    And I press "Save"
    Then I should see "This value should not be blank."

  Scenario: Adding plants and back to my plants
    Given I am authenticated as "admin" using "admin"
    When I am on "/my-plants"
    And I click "show" in the "cactus" row
    And I follow "Edit"
    And I fill in "Name" with "flower"
    And I fill in "Frequency" with "4"
    And I fill in "Amount" with "0.25"
    And I follow "Back to My Plant"
    Then I should not see the following text in row:
      | Name   | When        | Amount in liters |
      | flower | every 4 day | 0.25             |
