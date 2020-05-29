<div class="list-group-item p-3">
    <div class="row">
        <div class="col-auto pr-0">

            @include('components.task.complete', ['task' => $task, 'project' => $project])

        </div>
        <div class="col-auto">

            <h5 class="mb-1">{{ $task->title }}</h5>

            @if($task->description)
                <p class="mb-1">{{ $task->description }}</p>
            @endif

            @if(Auth::user()->isEmployee())

                @include('components.task.employee', ['task' => $task, 'project' => $project])

            @endif

            @if(Auth::user()->isManager())

                @include('components.task.manager', ['task' => $task, 'project' => $project])

            @endif


        </div>
        <div class="col-3 ml-auto d-flex flex-column align-items-end justify-content-between">
            <span class="mb-1 @if ($task->isOverdue() && !$task->isCompleted()) alert alert-danger m-0 p-2 font-weight-bold @endif">
                выполнить до
                {{ date('d.m', strtotime($task->due_date)) }}
            </span>
            <small class="mb-2 font-italic">Комментарии: {{ count($task->comments) }}</small>
            <a
            href="{{ Auth::user()->isEmployee() ? route('tasks.show', $task) : route('projects.tasks.show', ['task' => $task, 'project' => $project]) }}"
            class="btn btn-primary">Подробнее</a>
        </div>
    </div>
</div>
