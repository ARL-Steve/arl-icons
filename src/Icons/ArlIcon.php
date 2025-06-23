<?php

namespace BladeUI\Arlicons\Icons;

use Filament\Support\Enums\ScalableIcon;
use Filament\Support\Enums\IconSize;

enum ArlIcon: string implements ScalableIcon
{
    case ArlTriangle = 'arl-triangle';
    case SolidArlTriangle = 's-arl-triangle';

    public function getIconForSize(IconSize $size): string
    {
        if (str_starts_with($this->value, 's-')) {
            return "arlicon-{$this->value}";
        }

        return match ($size) {
            IconSize::ExtraSmall, IconSize::Small => "heroicon-c-{$this->value}",
            IconSize::Medium => "heroicon-m-{$this->value}",
            IconSize::Large, IconSize::ExtraLarge, IconSize::TwoExtraLarge => "heroicon-s-{$this->value}",
        };
    }
}