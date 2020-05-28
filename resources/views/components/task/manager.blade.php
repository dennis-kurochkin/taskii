 <p class="m-0">
     <small>
         <strong>Исполнитель: </strong>
         {{ "{$task->user->name} {$task->user->surname}, {$task->user->email}" }}
     </small>
 </p>

 <div class="mt-2">

     <a
         href="{{ route('projects.tasks.edit', [$project, $task]) }}"
         class="btn btn-sm btn-primary">Редактировать</a>

     <form
         action="{{ route('projects.tasks.destroy', [$project, $task]) }}"
         method="POST" class="d-inline">

         {{ csrf_field() }}
         {{ method_field('DELETE') }}

         <button
             type="submit"
             id="delete-task-{{ $task->id }}"
             class="btn btn-sm btn-danger">Удалить</button>
     </form>
 </div>