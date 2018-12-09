<?php

declare(strict_types=1);

namespace Marussia\Components\EventBus;

class Repository
{
    private $memberLayers;
    private $members;
    
    // Регистрирует участника в репозитории шины событий
    public function register(Member $member)
    {
        $this->members[$member->type . '.' . $member->name] = $member;
        
        $this->memberLayers[$member->type . '.' . $member->name] = $member->layer;
    }

    // Возвращает слой для участника $name
    public function getMemberLayer(string $name)
    {
        return $this->memberLayers[$name];
    }
    
    // Возвращает массив участников по массиву слоев
    public function getMembersByLayers(array $layers)
    {
        $array = array_intersect($this->memberLayers), $layers);
        
        return array_intersect_key($this->members, $array);
    }
    
    public function getMember(string $name)
    {
        return $this->members[$name];
    }
}