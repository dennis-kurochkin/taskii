@if($task->completed_at)
    <button type="button" class="btn btn-success disabled" title="Выполнено" disabled>
        <i class="fa fas fa-check"></i>
    </button>
@else
    <form
        action="{{ Auth::user()->isManager() ? route('projects.tasks.update', [$project, $task]) : route('tasks.update', $task) }}"
        method="POST"
        class="d-inline">

        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <input type="hidden" name="type" value="complete">
        <button type="submit" class="btn btn-outline-success" title="Выполнить">
            <i class="fa fas fa-check"></i>
        </button>
    </form>
@endif