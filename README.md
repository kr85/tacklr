mytacks
=======

This is the primary repository of the MyTacks application.

=======
IMPORTANT!

-When working on a project feature, make sure you use a feature branch of the latest CI branch:

  $ git branch feature/<some_feature_name> ci
  
This will create a new branch of a unique name starting from the latest commit to CI.
 
-Do not push to CI without confirmation from at least one other team member and proper unit tests have been implemented and regression testing has taken place by you.
    IF IT DOESN'T BUILD AND PASS ALL TESTS, DON'T COMMIT to CI

-Every commit must contain a message that describes what the commit contains for consistency and clarity purposes.

  $ "This commit contains the changes made to complete the Login Widget and affects the following links:
      1. link1
      2. link2
      ...
      N. linkN"

-Pull and rebase from CI often:
  
  $ git fetch && git pull --rebase origin ci
  
This will pull back your changes, put the chages made to CI on your local branch, and then apply the changes you've made.

-When in doubt, ask Jeff or consult a teammate after attempting to find a solution online:

  http://git-scm.com/documentation
  https://help.github.com/articles/generating-ssh-keys
