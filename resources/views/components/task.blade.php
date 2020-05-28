<div class="list-group-item">
    <div class="row">
        <div class="col-auto pr-0">

            @include('components.task.complete', ['task' => $task, 'project' => $project])

        </div>
        <div class="col">

            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{ $task->title }}</h5>
                <small class="@if ($task->isOverdue() && !$task->isCompleted()) alert alert-danger m-0 p-2 font-weight-bold @endif">
                    выполнить до
                    {{ date('d.m', strtotime($task->due_date)) }}
                </small>
            </div>

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
    </div>
</div>
