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
class Data extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getPoll($id){
        $q = $this->db->query("SELECT * FROM polls WHERE id=$id");

        foreach($q->result() as $r){
            return array("name" => $r->name, "owner" => $r->owner, "location" => $r->location, "description" => $r->description, "dates" => json_decode($r->dates), "times" => json_decode($r->times), "choose" => json_decode($r->choose));
        }
    }

    public function getParticipations($id){

        $q = $this->db->query("SELECT * FROM participations WHERE id=$id");

        $participations = array();

        foreach($q->result() as $r){
            array_push($participations , array("name" => self::getParticipant($r->participant), "choosen" => json_decode($r->choosen)));
        }
        
        return $participations;
    }

    public function getParticipant($id){

        $q = $this->db->query("SELECT * FROM participants WHERE id=$id");

        foreach($q->result() as $r){
            if($r->name == "")
                return "User ".$r->id;
            else
                return $r->name;
        }
    }

    public function getChoosenNames($id, $choosen){

        $chooseNames = json_decode($this->db->query("SELECT choose FROM polls WHERE id=$id")->result()[0]->choose);

        $choosenNames = array();

        foreach($choosen as $sub){

            $subNames = array();

            foreach($sub as $choosenID){
                array_push($subNames, $chooseNames[$choosenID]);
            }

            array_push($choosenNames, $subNames);
        }

        return $choosenNames;
    }


}
?>
