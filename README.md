# Birjand Shop
## Technologies
+ PHP
+ JS (+AJAX)
+ Pluslib (My own Library)
+ Bootstrap
## How to install dependencies?
 This Project only have one dependency: <a href="https://github.com/parsa-mostafaie/pluslib">**Pluslib**</a>
 
 To Install Pluslib You need to download it from <a href="https://github.com/parsa-mostafaie/pluslib/archive/refs/heads/master.zip">here</a> (Or clone it and remove .git folder)

 Then go to root directory of Pluslib (a folder that contains init.php and __autoload.php), 
 move all files of that folder into a folder like ``{DOCUMENT_ROOT}/libs/pluslib`` (This is that folder that i'm using)

 If you are not using folder that i'm using (``{DOCUMENT_ROOT}/libs/pluslib``), You need to reconfig the `composer.json` of the **Project** (=*BirjandShop*) 
 and run `composer dump-autoload`.

### How to reconfig Composer.json
  You only need to change `composer.json`:`autoload.files` to ``[ "RELATIVE_PATH_TO_PLUSLIB" ]``

### Good News
  Pluslib will be available in composer in near future
