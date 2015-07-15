<?php

namespace App\Services;

use Illuminate\Support\Collection;

class Donate
{
    /**
     * Get an inspiring quote.
     * Taylor & Dayle made this commit from Jungfraujoch. (11,333 ft.)
     *
     * @return string
     */
    public static function quote()
    {
        return Collection::make([

            'No one has ever become poor by giving. - Anne Frank, diary of Anne Frank ',
            'It\'s not how much we give but how much love we put into giving. - Mother Teresa',
            'There is no exercise better for the heart than reaching down and lifting people up. - John Holmes',
            'When we give cheerfully and accept gratefully, everyone is blessed. - Maya Angelou',
            'You have not lived today until you have done something for someone who can never repay you. - John Bunyan',
            'The simplest acts of kindness are by far more powerful then a thousand heads bowing in prayer. - Mahatma Gandhi',
            'We only have what we give. - Isabel Allende',
            'Doing nothing for others is the undoing of ourselves. - Horace Mann',

        ])->random();
    }
}
