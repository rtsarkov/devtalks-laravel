<?php

namespace App\Http\Controllers;




use App\DTO\CreateTaskDTO;
use App\Http\DTO\ApiResponseDTO;
use App\Http\Requests\CreateTaskRequest;
use App\Mail\CreateTaskMail;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    public function __construct(protected TaskService $service)
    {
    }

    public function all(Request $request)
    {
    }

    public function get(Request $request)
    {

    }

    public function create(CreateTaskRequest $request)
    {
        $data = [
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'status' => 0,
        ];

        $dto = CreateTaskDTO::from($request->all());

        $this->service->create($dto);

        try {

            Mail::to(config('app.email_alert'))->send(new CreateTaskMail($result->toArray()));

        } catch (QueryException $e) {
            return new ApiResponseDTO(data: $data, message: 'asd');
            return response()->json(data: ['success' => false, 'message' => 'Ошибка создания задачи'], status: 500);
        }

        return response()->json(['success' => true, 'data' => $result->toArray()]);
    }

    public function update(Request $request)
    {

    }
}
