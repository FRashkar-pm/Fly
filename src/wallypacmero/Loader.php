<?php

namespace wallypacmero;

use pocketmine\plugin\PluginBase;
use wallypacmero\fly\command\FlyCommand;

class Loader extends PluginBase
{
 public function onEnable(): void
 {
  $this->getServer()->getCommandMap()->register("fly", new FlyCommand($this));
  $this->getLogger()->info("Enabled");
 }
}
