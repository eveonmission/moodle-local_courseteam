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
 * Library of functions for courseteam
 *
 * @package     local_courseteam
 * @copyright   2021 Eve Ormisson <eve.ormisson@artun.ee>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Add plugin url to the side menu
 *
 * @param global_navigation $navigation The global navigation
 */
function local_courseteam_extend_navigation(global_navigation $navigation) {

    global $PAGE;

    $showinnavigation = get_config('local_courseteam', 'showinnavigation');

    if (!$PAGE->course or $PAGE->course->id == 1 or !$showinnavigation) {
        return;
    }

    if (!has_capability('local/courseteam:view', context_course::instance($PAGE->course->id))) {
        return;
    }

    $url = new moodle_url('/local/courseteam/index.php', array('courseid' => $PAGE->course->id));
    $node = $navigation->add(get_string('pluginname', 'local_courseteam'), $url);
    $node->nodetype = 1;
    $node->collapse = false;
    $node->forceopen = true;
    $node->isexpandable = false;
    $node->showinflatnavigation = true;
    $node->icon = new pix_icon('t/edit', '');
}