# Project 4
+ By: Satya Palvadi
+ Production URL: <http://p4.satyap.me>

## Database
Primary tables:
  + `groups`
  + `people`
  + `logs`
    
Pivot table(s):
  + `group_person`

## CRUD

__Create__
  + Visit <http://p4.satyap.me/person/create/display>
  + Fill out form with new person details
  + Click *Create*
  + If operation is success, a listing page of all persons in the db will be displayed with a success alert message.
  
__Read__
  + Visit <http://p4.satyap.me/review/group/display>
  + Make some selections in prompts 
  + Displays a listing of the group's performance in the db
  
__Update__
  + Visit <http://p4.satyap.me/person/view>; choose the pencil icon next to one of the persons
  + Make some changes in the edit person form
  + Click *Save*
  + If operation is success, a listing page of all persons in the db will be displayed with a success alert message.
  
__Delete__
  + Visit <http://p4.satyap.me/person/view>; choose the trash can icon next to one of the persons
  + Confirm deletion
  + If operation is success, a listing page of all persons in the db will be displayed with a success alert message.

## Outside resources
  + Got some help for drop downs in navigation here: <https://www.w3schools.com/css/css_navbar.asp>
  + Used php, laravel, & eloquent documentation along with class notes and foobooks project.
  + Referred to this post for Laravel's updateOrCreate Eloquent feature: <https://stackoverflow.com/questions/33139076/laravel-update-if-record-exists-or-create-if-not>

## Code style divergences
  + Some HTML code is really long and spans multiple lines
  + Even after using indent feature of phpStorm, some lines in the file did not indent properly

## Notes for instructor
  + Used some of styling from foobooks - specifically related to form layouts and alert messages
  + All of validator errors were resolved except for the following similar warnings that appears in several pages. I chose not to add heading tags in the HTML to resolve these warnings.
  ```
  Warning: Section lacks heading. Consider using h2-h6 elements to add identifying headings to all sections.
  From line 56, column 1; to line 56, column 19
  /header>↩↩<section id='main'>↩   
  ```
