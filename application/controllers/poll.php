<?php
/*
    This is a part of an upcoming script to make polls and surveys.
    Copyright (C) 2014 Christoph 'criztovyl' Schulz

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

*/
class Poll extends CI_Controller{

    public function index(){

        $this->load->model("poll/data", "polldata");

        $data = $this->polldata->getPoll(1);
        $data["participations"] = $this->polldata->getParticipations(1);

        $this->load->view('page/pfosten', $data);
    }
}
?>
