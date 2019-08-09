<?php

namespace App\Plugins;

use Illuminate\Http\Request;

class ClientRequestAdapter
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * Create a new AbstractVueTableFilter instance.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Get filter from VueTable's request
     * @return array
     */
    public function getFilter()
    {
        $filters = [];
        $query = $this->request->input('query');
        $conditions = get_query($query);

        if (empty($conditions)) {
            return [];
        }

        foreach ($conditions as $column => $value) {
            if (is_array($value) && isset($value['start']) && isset($value['end'])) {
                $fieldKey = $column;
                $filters[$fieldKey] = [
                    'method'     => 'whereBetween',
                    'parameters' => [[$value['start'], $value['end']]]
                ];

            } elseif (strpos($column, '__having_like') !== false) {
                $fieldKey = preg_replace('/__having_like$/', '', $column);
                $filters[$fieldKey] = [
                    'method'     => 'having',
                    'parameters' => [
                        'like',
                        '%' . $value . '%'
                    ]
                ];

            } elseif (strpos($column, '__having') !== false) {
                $fieldKey = preg_replace('/__having$/', '', $column);
                $filters[$fieldKey] = [
                    'method'     => 'having',
                    'parameters' => [
                        '=',
                        $value
                    ]
                ];

            } elseif (strpos($column, '__like') !== false) {
                $fieldKey = preg_replace('/__like$/', '', $column);
                $filters[$fieldKey] = [
                    'method'     => 'where',
                    'parameters' => [
                        'like',
                        '%' . $value . '%'
                    ]
                ];

            } else {
                $fieldKey = $column;
                $filters[$fieldKey] = [
                    'method'     => 'where',
                    'parameters' => [$value]
                ];
            }

            $filters[$fieldKey]['value'] = $value;
        }

        return $filters;
    }

    /**
     * Get sort from VueTable's request
     * @return array
     */
    public function getSort()
    {
        $sorts = [];

        if ($orderBy = $this->request->input('orderBy')) {
            $direction = $this->request->input('ascending') ? 'asc' : 'desc';
            $sorts[$orderBy] = $direction;
        }

        return $sorts;
    }
}
