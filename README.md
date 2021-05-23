# README #

### Moodle plugin local_courseteam ###

local_courseteam enables the teacher to generate an MS Teams group from the course configuration page in Moodle.  
The course participants will be synchronized to the generated Teams group.  

* Version: 2021041100

### Dependencies ###

* The plugin requires local_o365 https://moodle.org/plugins/local_o365 to be installed
* local_o365 should be installed and configured before or alongside the installation of local_coursteam
* The plugin requires Moodle version 2020110900

### Installation ###

Add the plugin to /local/courseteam/  
Run the Moodle upgrade.

### Setup ###

After adding and configuring the local_o356, enable the local_courseteam to appear in the side menu:  
**Site administration > Plugins > Local plugins > Course Teams group > Show in navigation**

* After checking the "Show in navigation" selection, the plugin will appear in the bottom of the side menu in course view
* The plugin will only appear in the side menu if the user is either admin or the editing teacher of the current course

### Client usage ###

If the plugin is enabled and the user is in role **editing teacher** or **admin**,  
**Course Teams group** should be displayed in the bottom of the left menu in course view.

If the **editing teacher** of the course checks the **Generate a Teams group for this course**  
checkbox and saves the changes, a Teams group will be generated for the course. 

* The group name will be the full name of the course
* The group owner will be the editing teacher who generated the group
* After generating the group, course participants will be synchronized to the group

If the **editing teacher** of the course unchecks the **Generate a Teams group for this course**  
checkbox and saves the changes, a Teams group will be deleted.

### Useful links ###

Source control: https://github.com/eveonmission/moodle-local_courseteam
Bug tracker: https://github.com/eveonmission/moodle-local_courseteam/issues
Discussion: https://moodle.org/mod/forum/discuss.php?d=422577
Documentation: https://github.com/eveonmission/moodle-local_courseteam/wiki

### Contact ###

* This plugin was developed by Eve Ormisson
* Contact me on eve.ormisson@artun.ee
