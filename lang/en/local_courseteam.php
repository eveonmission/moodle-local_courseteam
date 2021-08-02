<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Language strings
 *
 * @package     local_courseteam
 * @copyright   2021 Eve Ormisson <eve.ormisson@artun.ee>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['pluginname'] = 'Course Teams group';
$string['generateteamsgroup'] = 'Generate a Teams group for this course';
$string['addteamsgroup'] = 'Add a Teams group?';
$string['addteamsgroup_help'] = 'If enabled, the system will automatically generate a MS Teams group and will keep track of the users added to this course adding them to the Teams group as well.';

// Action messages.
$string['teamsgroupwasadded_success'] = 'A Teams group was added to this course. It might take some time for the changes to appear in Teams';
$string['teamsgroupwasremoved_success'] = 'The Teams group was removed from this course. It might take some time for the changes to appear in Teams';
$string['actiononlyallowedforeditingteacher_error'] = 'This acton is only allowed to an editing teacher of this course. If you wish to make a change as an administrator, use the Site administration.';
$string['teamsgroupcannotbeadded_error'] = 'The teams group cannot be added if the course has no teacher enrolled.';

// Admin settings.
$string['manage'] = 'Course Teams group';
$string['showinnavigation'] = 'Show in navigation';
$string['showinnavigation_desc'] = 'Enable this plugin after the local_o365 plugin has been correctly configured.';

// Metadata.
$string['privacy:metadata'] = 'The Course Teams plugin does not store any personal user data.';
