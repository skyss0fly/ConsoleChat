<?php

namespace skyss0fly\ConsoleChat;

use pocketmine\plugin\PluginBase;
use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat as tf;

class Main extends PluginBase {
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if (!$sender instanceof Player) { // Corrected syntax
            if ($command->getName() === "c") {
                if (empty($args)) {
                    $sender->sendMessage(tf::RED . "Usage: /c <message>");
                } else {
                    $message = implode(" ", $args);
                    $this->getServer()->broadcastMessage(tf::LIGHT_PURPLE . "[SERVER] " . $message);
                }
                return true;
            }
        } else {
            $sender->sendMessage(tf::RED . "You are not Console!");
            return true;
        }
        return false;
    }
}
?>