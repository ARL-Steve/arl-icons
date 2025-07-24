<?php

namespace BladeUI\Arlicons\Icons;

use Filament\Support\Enums\ScalableIcon;
use Filament\Support\Enums\IconSize;

enum ArlIcon: string implements ScalableIcon
{
    case ArlTriangle = 'arl-triangle';
    case OutlinedArlTriangle = 'o-arl-triangle';
    case ArlEntryRight = 'arl-entry-right';
    case OutlinedArlEntryRight = 'o-arl-entry-right';
    case ArlCompany = 'arl-company';
    case OutlinedArlCompany = 'o-arl-company';
    case ArlCircleAll = 'arl-circle-all';
    case ArlCircleAuditors = 'arl-circle-auditors';
    case ArlCircleBrokers = 'arl-circle-brokers';
    case ArlCircleFas = 'arl-circle-fas';
    case ArlCircleFprs = 'arl-circle-fprs';
    case ArlCircleLaws = 'arl-circle-laws';
    case ArlCircleOther = 'arl-circle-registrars';

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