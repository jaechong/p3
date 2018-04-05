# Project 3
+ By: Jae Yong Chong
+ Production URL: <http://p3.jaechong.me>

CSCI E15 - Project 3
## Outside resources
+ how to put background image:
<https://www.tutorialspoint.com/css/css_background-image.htm>
+ to adjust background image size:
<https://css-tricks.com/almanac/properties/b/background-size/>
+ background image source:
<https://www.nytimes.com/2017/08/07/travel/traveling-together-apps-to-help-split-and-pay-the-bills.html>
+ how to set default value for 'select' element
<https://stackoverflow.com/questions/3518002/how-can-i-set-the-default-value-for-an-html-select-element>
+ adding comments in blade.php
<https://stackoverflow.com/questions/27830200/laravel-blade-comments-blade-rendering-causing-page-to-crash>
+ title text outline to stand out from the background image
<https://stackoverflow.com/questions/4919076/outline-effect-to-text>

## Notes for instructor
Using html input attributes, input on this site is mostly numeric and can be caught in the client side validation.  I have listened to the Week 8 Validation video again and noticed that I missed the last paragraph mentioning that although the client side validation is good, it is not expected to be used in our class or project.  So, I made the last minute changes to remove the client side validations.  Now I understand why I lost 5 marks in project 2 for using the client side validation.
Also, I wanted the entered data to be available after the form is submitted to be able to adjust the input even if the input data is all valid.  For that reason, I added `Clear` button to clear the data manually if the user wants.
Now, because of the last minute change to remove the client side validation and since I wanted to keep the entered data to be available to be updated, when the server side validation is done and fails, there is no changes to the page except for the error message and may cause the page content to be out of sync.
That is, for example, you calculated the amount to be splitted with valid data, it was designed to show the entered data to be available to be adjusted.  When the user adjusts and enter invalid input, the server side validation will just prompt the error message but the all other content of the page remains so that the answer shows the amount previously calculated.  It is better to update this for the next project.

# p3