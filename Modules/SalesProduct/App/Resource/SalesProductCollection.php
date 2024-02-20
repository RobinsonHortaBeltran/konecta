<?php
namespace Modules\SalesProduct\App\Resource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SalesProductCollection extends ResourceCollection
{

    public $message;

    public function __construct($resource, $message = null)
    {
        parent::__construct($resource);
        $this->message = $message;
    }


    public function toArray($request)
    {
        return [
            'message' => $this->message,
            'data' => $this->collection,
            'status' => true,
            'code' => 200,
        ];
    }
}
