<?php

namespace wallypacmero;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use wallypacmero\command\FlyCommand;

class Loader extends PluginBase
{
 public function onEnable(): void
 {
  $this->getServer()->getCommandMap()->register("fly", new FlyCommand($this));
  $this->getLogger()->info("Enabled");
 }
    public function onPlayerJoin(PlayerJoinEvent $event)
    {
        $player = $event->getPlayer();
        if($player->getAllowFlight()) {
            $player->setFlying(false);
            $player->setAllowFlight(false);
            $player->sendMessage(TextFormat::RED . "Your flight has been disabled");
        }
    }
}
