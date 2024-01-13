<?php

namespace SonsaYT\TempBan\commands;

/*
 *	This program is free software: you can redistribute it and/or modify
 *	it under the terms of the GNU General Public License as published by
 *	the Free Software Foundation, either version 3 of the License, or
 *	(at your option) any later version.
 *
 *	This program is distributed in the hope that it will be useful,
 *	but WITHOUT ANY WARRANTY; without even the implied warranty of
 *	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *	GNU General Public License for more details.
 *
 *	You should have received a copy of the GNU General Public License
 *	along with this program.  If not, see <http://www.gnu.org/licenses/>.
 * 	
 */

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginOwned;

use SonsaYT\TempBan\Main;

class TCheckCommand extends Command implements PluginOwned {

  public function __construct(private Main $plugin){
    parent::__construct("tcheck", "Check ban list", null, ["tcheck"]);
    $this->setPermission("tempban.command.tcheck");
  }

  public function execute(CommandSender $sender, string $cmdLabel, array $args): bool{
    if(!($sender instanceof Player)){
      $sender->sendMessage("§crun command in-game only!");
      return false;
    }
  	$this->plugin->openTcheckForm($sender);
    return true;
  }

  public function getOwningPlugin(): Main {
    return $this->plugin;
  }
}
