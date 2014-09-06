<!--
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

-->
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Pfosten | Umfragen</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("css/pfosten.css"); ?>">
</head>
<body>
<div class="poll wrapper">
<div class="poll info">
<h1><?php echo $name?></h1>
<h2>Von: <?php echo $owner?></h2>
<i><?php echo $location?></i>
<p><?php echo $description?></p></div>
<div class="poll poll">
<table>
<tr>
<td></td>
<?php
foreach($dates as $date){
    echo "<td colspan=\"".sizeof($times)."\">$date</td>";
}
?>
</tr>
<tr><td></td>
<?php
for($i = sizeof($dates); $i != 0; $i--){
foreach($times as $time){
    echo "<td>$time</td>";
}
}
?>
</tr>
<tr>
<?php
foreach($participations as $participation){
    echo "<tr><td>".$participation['name']."</td>";
    for($i = 0; $i < sizeof($dates); $i++){
        for($j = 0; $j < sizeof($times); $j++){
            echo "<td class=\"poll choose\">";
            echo "<input type='text' name='choosen' hidden value=''>";
            $k = 0;
            foreach($choose as $key):?>

                <a href="#" class="select <?php if($k == $participation["choosen"][$i][$j]) echo "selected";?>">(<?php echo $key;?>)</a><br>
<?
                $k++;
           endforeach;
            echo "</td>";
        }
    }
    echo "</tr>";
}
?>
<td></td>
</tr>
</table>
</div>
</div>
</body>
</html>
