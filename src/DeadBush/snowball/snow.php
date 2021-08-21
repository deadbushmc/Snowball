<?php

namespace DeadBush\snowball;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\item\Item;
use pocketmine\event\entity\EntityDamageByChildEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\entity\projectile\Snowball;
use pocketmine\utils\Config;

class snow extends PluginBase implements Listener {
    public function onEnable(){
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onDamage(EntityDamageEvent $event) {
        if($event instanceof EntityDamageByChildEntityEvent){
            $child = $event->getChild();
            $player = $event->getEntity();
            if($child instanceof Snowball) {
                $mhealth = ($this->getConfig()->get("hearts"));
                $player->setHealth($player->getHealth() - $mhealth);
            }
        }
    }  
}