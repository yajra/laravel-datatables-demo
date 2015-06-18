<?php namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use Carbon\Carbon;

class DatatablesTransformer extends TransformerAbstract
{
    /**
     * @return array
     */
    public function transform(array $data)
    {
        return [
            'id'         => (int) $data['id'],
            'name'       => $data['name'] . ' - fractal',
            'email'      => $data['email'],
            'created_at' => $this->dateFormatter($data['created_at']),
            'updated_at' => $this->dateFormatter($data['updated_at']),
        ];
    }

    /**
     * @param null|DateTime $dateTime
     * @return string
     */
    public function dateFormatter($dateTime)
    {
        return $dateTime ? with(new Carbon($dateTime))->format($this->getDateFormat()) : null;
    }

    /**
     * @return string
     */
    public function getDateFormat()
    {
        return 'Y-m-d';
    }
}
