<?php

/*
 * Broadcaster (v1.4) by EvolSoft
 * Developer: EvolSoft (Flavius12)
 * Website: https://www.evolsoft.tk
 * Date: 01/02/2018 04:43 PM (UTC)
 * Copyright & License: (C) 2014-2018 EvolSoft
 * Licensed under MIT (https://github.com/EvolSoft/Broadcaster/blob/master/LICENSE)
 */

namespace Broadcaster\Tasks;

use pocketmine\scheduler\PluginTask;

use Broadcaster\Broadcaster;

class MessageTask extends PluginTask {
    
    /** @var int */
    private $i;
    
    public function __construct(Broadcaster $plugin){
        parent::__construct($plugin);
		$this->i = 0;
    }

    public function onRun(int $currentTick){
    	$plugin = $this->getOwner();
    	$messages = $plugin->cfg["message-broadcast"]["messages"];
    	back:
    	if($this->i < count($messages)){
    	    $plugin->getServer()->broadcastMessage($plugin->translateColors("&", $plugin->formatMessage($messages[$this->i])));
    	    $this->i++;
    	}else{
		    $this->i = 0;
		    goto back;
		}
    }
}