# String validator
Usage:

<?php
   
   $myValidator = new Validator();
   $myValidator->addConstraint(
    new ClosedParenthesisConstraint()
   );
   
   // return true or exception
   $myValidator->isValid('My Text');