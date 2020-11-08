<?php


namespace App\Repositories;


use App\Models\RentBook;
use Illuminate\Support\Facades\Validator;


class RentBookRepository extends Repository
{
    public function __construct(RentBook $books)
    {
        $this->model = $books;
    }

    private $validatorRules = [
        'title' => ['required', 'string', 'max:255'],
        'tenant' => ['required', 'string', 'max:255'],
        'count' => ['required', 'integer'],
        'lease' => ['required', 'integer'],
        'sum' => ['required', 'integer'],
    ];

    public function addBook($request)
    {

        $validator = $this->validator($request->all(), $this->validatorRules);

        if ($validator->fails()) {
            $this->result['status'] = 'error';
            $this->result['response']['errors'] = $validator->errors();
        } else {
            $data = $request->except('_token', 'image');

            $this->model->fill($data);

            $book = new RentBook();

            $book->title = $request->title;
            $book->tenant = $request->tenant;
            $book->count = $request->count;
            $book->lease = $request->lease;
            $book->sum = $request->sum;
            $book->save();

            $this->result['status'] = 'success';
            $this->message( 'success', __( 'validation' ) );
        }
        return $this->result();
    }

    protected function validator( array $data, $baseRules, $addRules = [], $messages = [] ) {
        $rules = (!empty($addRules)) ? array_merge($baseRules, $addRules) : $baseRules;
        return Validator::make( $data, $rules, $messages );
    }
}
