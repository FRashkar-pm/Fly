<?php /** @noinspection PhpPropertyOnlyWrittenInspection */

namespace wallypacmero\fly\command;

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

    public function execute(CommandSender $sender, string $commandLabel, array $args): bool
    {
        if (!$sender instanceof Player) {
            $sender->sendMessage(TextFormat::RED . "Please use this command in-game.");
            return false;
        }
        if(!$this->testPermission($sender)) {
    return;
        }
        if ($sender->getAllowFlight()) {
            $sender->setAllowFlight(false);
            $sender->setFlying(false);
            $sender->sendMessage(TextFormat::GREEN . "You can no longer fly.");
        } else {
            $sender->setAllowFlight(true);
            $sender->setFlying(true);
            $sender->sendMessage(TextFormat::GREEN . "You can now fly.");
        }
        return true;
    }
}