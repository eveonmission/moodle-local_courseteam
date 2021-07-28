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
 * The submit form for courseteam
 *
 * @package     local_courseteam
 * @copyright   2021 Eve Ormisson <eve.ormisson@artun.ee>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once("{$CFG->libdir}/formslib.php");
require_login();

/**
 * The submit form for courseteam
 */
class couseteam_form extends moodleform {

    /**
     * Define the submit form - called by parent construct
     */
    public function definition() {

        $mform = $this->_form;

        $mform->addElement('advcheckbox', 'addgroup', get_string('generateteamsgroup', 'local_courseteam'));
        $mform->addHelpButton('addgroup', 'addteamsgroup', 'local_courseteam');
        $mform->addElement('hidden', 'courseid');
        $mform->setType('courseid', PARAM_INT);
        $this->add_action_buttons();
    }
}
