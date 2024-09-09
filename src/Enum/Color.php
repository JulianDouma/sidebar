<?php

declare(strict_types=1);

namespace App\Enum;

enum Color: string
{
    case BLUE = 'blue';
    case AZURE = 'azure';
    case INDIGO = 'indigo';
    case PURPLE = 'purple';
    case PINK = 'pink';
    case RED = 'red';
    case ORANGE = 'orange';
    case YELLOW = 'yellow';
    case LIME = 'lime';
    case GREEN = 'green';
    case TEAL = 'teal';
    case CYAN = 'cyan';

    // Light colors
    case BLUE_LT = 'blue-lt';
    case AZURE_LT = 'azure-lt';
    case INDIGO_LT = 'indigo-lt';
    case PURPLE_LT = 'purple-lt';
    case PINK_LT = 'pink-lt';
    case RED_LT = 'red-lt';
    case ORANGE_LT = 'orange-lt';
    case YELLOW_LT = 'yellow-lt';
    case LIME_LT = 'lime-lt';
    case GREEN_LT = 'green-lt';
    case TEAL_LT = 'teal-lt';
    case CYAN_LT = 'cyan-lt';

    // Gray palette
    case GRAY_50 = 'gray-50';
    case GRAY_100 = 'gray-100';
    case GRAY_200 = 'gray-200';
    case GRAY_300 = 'gray-300';
    case GRAY_400 = 'gray-400';
    case GRAY_500 = 'gray-500';
    case GRAY_600 = 'gray-600';
    case GRAY_700 = 'gray-700';
    case GRAY_800 = 'gray-800';
    case GRAY_900 = 'gray-900';

    // Social colors
    case FACEBOOK = 'facebook';
    case TWITTER = 'twitter';
    case LINKEDIN = 'linkedin';
    case GOOGLE = 'google';
    case YOUTUBE = 'youtube';
    case VIMEO = 'vimeo';
    case DRIBBBLE = 'dribbble';
    case GITHUB = 'github';
    case INSTAGRAM = 'instagram';
    case PINTEREST = 'pinterest';
    case VK = 'vk';
    case RSS = 'rss';
    case FLICKR = 'flickr';
    case BITBUCKET = 'bitbucket';

    // New Colors (Primary, Secondary, etc.)
    case PRIMARY = 'primary';
    case PRIMARY_LIGHTEN = 'primary-lighten';
    case PRIMARY_DARKEN = 'primary-darken';

    case SECONDARY = 'secondary';
    case SECONDARY_LIGHTEN = 'secondary-lighten';
    case SECONDARY_DARKEN = 'secondary-darken';

    case TERTIARY = 'tertiary';
    case TERTIARY_LIGHTEN = 'tertiary-lighten';
    case TERTIARY_DARKEN = 'tertiary-darken';

    case SUCCESS = 'success';
    case SUCCESS_DARKEN = 'success-darken';

    case WARNING = 'warning';
    case WARNING_DARKEN = 'warning-darken';

    case DANGER = 'danger';
    case DANGER_DARKEN = 'danger-darken';

    case INFO = 'info';
    case INFO_DARKEN = 'info-darken';

    case BODY_BACKGROUND = 'body-background';
    case FONT = 'font';
    case FONT_WHITE = 'font-white';
    case FONT_BLACK = 'font-black';

    case WHITE = 'white';
    case WHITE_DARKEN = 'white-darken';
    case WHITE_BORDER = 'white-border';
}
