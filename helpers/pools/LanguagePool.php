<?php

namespace helpers\pools;

class LanguagePool
{
    private const GERMANY = 'de';
    private const ENGLISH = 'en';
    private const FRENCH = 'fr';

    private const ENGLISH_US    = 'en-us';
    private const ENGLISH_UK     = 'en-gd';

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

    public static function US_ENGLISH(): LanguagePool
    {
        return new LanguagePool(self::ENGLISH_US);
    }

    public static function UK_ENGLISH(): LanguagePool
    {
        return new LanguagePool(self::ENGLISH_UK);
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
            self::US_ENGLISH()->getLabel() => self::US_ENGLISH(),
            self::UK_ENGLISH()->getLabel() => self::UK_ENGLISH(),
            default => self::GERMANY(),
        };
    }

    public static function getValueFromLabel(string $label)
    {
        return self::getByLabel($label)->getLabel();
    }

}