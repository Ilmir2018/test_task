<?php


namespace App\Repositories;


use Illuminate\Support\Facades\Request;

abstract class Repository
{
    protected $model = false;

    protected $result = [
        'status'   => '',
        'response' => [
            'code'    => '',
            'message' => [],
            'errors'  => []
        ],
        'data'     => [],
    ];

    /**
     * @param bool|array $data
     *
     * @return array|false|string
     */
    protected function result( $data = false ) {

        //Forced data return
        $result = $data ? $data : $this->result;

        //Forced array return
        $format = Request::input( 'api_format' ) ?? 'json';

        if ( $format == 'object' ) {
            return $result;
        }

        return Request::input( 'api_token' ) ? json_encode( $result ) : $result;
    }

    /**
     * @param $type
     * @param $text
     */
    protected function message( $type, $text ) {
        $this->result['response']['message'][] = array(
            'type' => $type,
            'text' => $text
        );
    }


    /**
     * @param string $select Параметр для указания массива необходимых полей из таблицы.
     * @param false $take Параметр нужен для того чтобы достать из таблицы определённое колечство записей
     * @param false $pagination Параметр для того чтобы указать нужна ли пагинация выводимых данных.
     * @param false $sort Параметр для того чтобы указать нужна ли сортировка.
     * @return false Возвращается обработанный запрос к базе данных.
     */

    public function get($select = '*', $take = false, $pagination = false, $sort = false)
    {
        $builder = $this->model->select($select);

        if ($take) {
            $builder->take($take);
        }

        if ($pagination){
            return $builder->paginate(\Illuminate\Support\Facades\Config::get('settings.paginate'));
        }

        if ($sort) {
            return $builder->get()->sortBy('id');
        }

        return $builder->get();

    }
}
