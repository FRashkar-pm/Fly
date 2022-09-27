<?php

namespace wallypacmero\command;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;

class FlyCommand extends Command
{

    public function __construct()
    {
        parent::__construct("fly", "Fly command", "/fly", ["f"]);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if($sender instanceof Player) {
            if($sender->hasPermission("fly.command")) {
                if($sender->getAllowFlight()) {
                    $sender->setFlying(false);
                    $sender->setAllowFlight(false);
                    $sender->sendMessage(TextFormat::RED . "Your flight has been disabled");
                } else {
                    $sender->setFlying(true);
                    $sender->setAllowFlight(true);
                    $sender->sendMessage(TextFormat::GREEN . "Your flight has been enabled");
                }
            } else {
                $sender->sendMessage(TextFormat::RED . "You don't have permission to use this command");
            }
        } else {
            $sender->sendMessage(TextFormat::RED . "Please use this command in-game");
        }
    }
}

