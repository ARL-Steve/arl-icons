<?php

namespace BladeUI\Arlicons\Icons;

use Filament\Support\Enums\ScalableIcon;
use Filament\Support\Enums\IconSize;

enum ArlIcon: string implements ScalableIcon
{
    case ArlTriangle = 'arl-triangle';
    case OutlinedArlTriangle = 'o-arl-triangle';

    public function getIconForSize(IconSize $size): string
    {
        if (str_starts_with($this->value, 's-')) {
            return "arlicon-{$this->value}";
        }

        return match ($size) {
            IconSize::ExtraSmall, IconSize::Small => "arlicon-c-{$this->value}",
            IconSize::Medium => "arlicon-m-{$this->value}",
            IconSize::Large, IconSize::ExtraLarge, IconSize::TwoExtraLarge => "arlicon-s-{$this->value}",
        };
    }
}