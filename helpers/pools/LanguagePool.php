<?php

namespace helpers\pools;

class LanguagePool
{
    private const GERMANY = 'de';
    private const ENGLISH = 'en';
    private const FRENCH = 'fr';
    private string $label;

    private function __construct(string $label)
    {
        $this->label = $label;
    }

    public static function GERMANY(): LanguagePool
    {
        return new LanguagePool(self::GERMANY);
    }

    public static function ENGLISH(): LanguagePool
    {
        return new LanguagePool(self::ENGLISH);
    }

    public static function FRENCH(): LanguagePool
    {
        return new LanguagePool(self::FRENCH);
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public static function getByLabel(string $label): LanguagePool
    {
        return match ($label) {
            self::GERMANY()->getLabel() => self::GERMANY(),
            self::ENGLISH()->getLabel() => self::ENGLISH(),
            self::FRENCH()->getLabel() => self::FRENCH(),
            default => throw new \Exception('Invalid language'),
        };
    }

    public static function getValueFromLabel(string $label)
    {
        return self::getByLabel($label)->getLabel();
    }

}