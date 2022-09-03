<?php

namespace wallypacmero\fly;

use pocketmine\plugin\PluginBase;
use wallypacmero\fly\command\FlyCommand;

class Loader extends PluginBase
{
 public function onEnable(): void
 {
  $this->getServer()->getCommandMap()->registre("fly", new FlyCommand($this));
  $this->getLogger()->info("Enabled");
 }
