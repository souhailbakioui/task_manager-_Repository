<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Interfaces\TaskRepositoryInterface;
use Illuminate\Http\Request;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{
    private TaskRepositoryInterface $taskRepository;
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }
    public function index()
    {
        $tasks = $this->taskRepository->getAllTasks();
        return view('tasks.index', ['tasks' =>  $tasks]);
    }
    public function create()
    {
        return view('tasks.create');
    }
    public function edit(Request $request)
    {
        $taskId = $request->route('taskId');

        $task = $this->taskRepository->getTaskById($taskId);

        if (empty($task)) {
            return back();
        }

        return view('tasks.edit', ['task' => $task]);
    }
    public function store(TaskStoreRequest $request)
    {
        $data = array_merge($request->only(['title', 'description']), ["is_completed" => false]);
        $this->taskRepository->createTask($data);
        return redirect()->Route('tasks');
    }
    public function show(Request $request)
    {
        $taskId = $request->route('taskId');

        $task = $this->taskRepository->getTaskById($taskId);

        if (empty($task)) {
            return back();
        }

        return view('tasks.show', ['task' => $task]);
    }
    public function update(TaskUpdateRequest $request)
    {
        $taskId = $request->route('taskId');
        $taskDetails['is_completed'] = isset($request->is_completed);
        // if (isset($request->is_completed)) {
        //     $taskDetails['is_completed'] = true;
        // } else {
        //     $taskDetails['is_completed'] = false;
        // }
        $this->taskRepository->updateTask($taskId, $taskDetails);

        return redirect()->Route('tasks');
    }
    public function destroy(Request $request)
    {
        $taskId = $request->route('taskId');

        $this->taskRepository->deleteTask($taskId);

        return back();
    }
}
