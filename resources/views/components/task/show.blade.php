<div class="card mb-3">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                Проект:
                <strong>{{ $task->project->title }}</strong>
            </div>
            @include('components.task.complete')
        </div>
    </div>
    <div class="card-body">

        <h5 class="card-title"><strong>Задача:</strong> {{ $task->title }}</h5>
        <h5 class="card-title"><strong>Описание:</strong> {{ $task->description ?? 'отсутствует' }}</h5>

        <hr>

        <h5 class="h5 card-title font-italic">Комментарии:</h5>

        @forelse($task->comments as $comment)
            @include('components.comment', $comment)
        @empty
            Комментариев пока нет. Вы можете оставить первый
        @endforelse

        @include('components.comment.form')

    </div>
    <div class="card-footer text-muted">
        выполнить до {{ date('d.m', strtotime($task->due_date)) }}
    </div>
</div>
