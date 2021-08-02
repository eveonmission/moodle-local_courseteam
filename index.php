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
 * Main interface to Moodle courseteam
 *
 * The main page and functionalities of the plugin.
 * This plugin page uses the functionality of local_o365
 * utils class written by James McQuillan.
 *
 * @package     local_courseteam
 * @copyright   2021 Eve Ormisson <eve.ormisson@artun.ee>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use local_o365\feature\usergroups\utils;

require_once(__DIR__ . '/../../config.php');
require_once('courseteam_form.php');
require_once($CFG->dirroot.'/lib/adminlib.php');

global $COURSE, $DB, $PAGE, $OUTPUT, $USER;

$courseid = required_param('courseid', PARAM_INT);

$course = $DB->get_record('course', array('id' => $courseid));
$context = context_course::instance($course->id, MUST_EXIST);

require_login($course);

$title = get_string('pluginname', 'local_courseteam');
$pagetitle = $title;

$url = new moodle_url('/local/courseteam/index.php', array('courseId' => $courseid));

$PAGE->set_url($url);
$PAGE->set_title($title);
$PAGE->set_heading($title);
$PAGE->set_context($context);

$teamenabled = utils::course_is_group_feature_enabled($courseid, 'team');

$courseteam = new couseteam_form();
$toform['courseid'] = $courseid;

if (!empty($teamenabled )) {
    $toform['addgroup'] = 1;
}

$courseteam->set_data($toform);

$courseurl = new moodle_url('/course/view.php', array('id' => $courseid));

if ($courseteam->is_cancelled()) {

    redirect($courseurl);

} else if ($fromform = $courseteam->get_data()) {

    $role = $DB->get_record('role', array('shortname' => 'editingteacher'));
    $teachers = get_role_users($role->id, $context);
    $teachersids = array_column($teachers, 'id');

    if (!has_capability('local/courseteam:edit', $context)) {
        redirect($courseurl, get_string('actiononlyallowedforeditingteacher_error', 'local_courseteam'),
            null, \core\output\notification::NOTIFY_ERROR);
    }

    if ($fromform->addgroup == 1 && $fromform->courseid == $course->id && has_capability('local/courseteam:edit', $context)) {

        if (empty($teachers)) {
            $participantsurl = new moodle_url('/user/index.php', array('id' => $courseid));
            redirect($participantsurl, get_string('teamsgroupcannotbeadded_error', 'local_courseteam'),
                null, \core\output\notification::NOTIFY_ERROR);
        }

        if (!in_array($USER->id, $teachersids)) {
            redirect($courseurl, get_string('actiononlyallowedforeditingteacher_error', 'local_courseteam'),
                null, \core\output\notification::NOTIFY_ERROR);
        }

        utils::set_course_group_enabled($courseid, true, false);
        utils::set_course_group_feature_enabled($courseid, ['team'], true);

        redirect($courseurl, get_string('teamsgroupwasadded_success', 'local_courseteam'),
            null, \core\output\notification::NOTIFY_SUCCESS);
    }

    if ($fromform->addgroup == 0 && $fromform->courseid == $course->id && has_capability('local/courseteam:edit', $context)) {

        if (!in_array($USER->id, $teachersids)) {
            redirect($courseurl, get_string('actiononlyallowedforeditingteacher_error', 'local_courseteam'),
                null, \core\output\notification::NOTIFY_ERROR);
        }

        utils::set_course_group_enabled($courseid, false, false);
        utils::set_course_group_feature_enabled($courseid, ['team'], false);

        redirect($courseurl, get_string('teamsgroupwasremoved_success', 'local_courseteam'),
            null, \core\output\notification::NOTIFY_SUCCESS);
    }

} else {
    echo $OUTPUT->header();
    $courseteam->display();
    echo $OUTPUT->footer();
}
