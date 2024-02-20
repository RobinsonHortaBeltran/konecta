<?php
namespace Modules\Products\App\Resource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\JsonResponse;

class ErrorResponseResource extends JsonResource
{
    protected $message;
    protected $error;

    public function __construct($message, $error)
    {
        $this->message = $message;
        $this->error = $error;
    }

    public function toArray($request)
    {
        return [
            'message' => $this->message,
            'error' => $this->error,
        ];
    }

    public function toResponse($request)
    {
        return response()->json($this->toArray($request), 500);
    }
}

