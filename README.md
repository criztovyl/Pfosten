#ABOUT
This is an emerging PHP-script for doing simple polls or surveys.

It's written for/with [EllisLab](https://ellislab.com/) CodeIgniter.

#INSTALL

 * Download CodeIgniter: [https://ellislab.com/codeigniter](https://ellislab.com/codeigniter)
 * Copy this directory to your CodeIgniter installation

#CONFIGURATION

 - Needs a database connection
 - Needs following tables ([SQL see here](#sql))
   - `polls`
   - `participants`
   - `participations`

##SQL

###polls

    CREATE TABLE IF NOT EXISTS `polls` (
      `name` varchar(120) NOT NULL,
      `owner` varchar(120) NOT NULL,
      `description` text NOT NULL,
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `dates` text NOT NULL,
      `times` text NOT NULL,
      `choose` text NOT NULL,
      `location` text NOT NULL,
      PRIMARY KEY (`id`),
      UNIQUE KEY `name` (`name`)
    ) AUTO_INCREMENT=2 ;

####Special Formats

 * `dates`: JSON-Array with Strings, e.g. `["Mon", "Tue", "Wed"]`
 * `times`: JSON-Array with Strings
 * `choose`: JSON-Array with Strings

###participants

    CREATE TABLE IF NOT EXISTS `participants` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
      `name` text,
      PRIMARY KEY (`id`)
    ) AUTO_INCREMENT=3 ;

###participations

    CREATE TABLE IF NOT EXISTS `participations` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `participant` int(11) NOT NULL,
      `poll` int(11) NOT NULL,
      `choosen` text NOT NULL,
      PRIMARY KEY (`id`)
    ) AUTO_INCREMENT=2 ;

####Special formats
 * `participant`: the participant-id from `participants`-table
 * `poll`: the poll-id from `polls`-table
 * `choosen`: the "answers" choosen, as a JSON-Array with the index of the answer from `choose` from `polls`, e.g. formatted as `[[1, 2, 3], [2, 1, 3]]`

#LINKS

[Homepage] (http://www.joinout.de/pfosten)  
[GitHub] (http://github.com/criztovyl/pfosten)

#LICENSE

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

#AUTHOR

Written by Christoph "criztovyl" Schulz, <ch.schulz@joinout.de>

[Homepage] (http://criztovyl.joinout.de)  
[GitHub] (http://github.com/criztovyl)
