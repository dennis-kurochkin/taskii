<div class="card mb-1">
    <div class="card-header bg-transparent">
        <div class="d-flex justify-content-between">
            <span>
                <strong>
                    {{ $comment->user->name }} {{ $comment->user->surname }},
                </strong>
                {{ $comment->user->role === 'admin' ? 'Администратор' :
                    ($comment->user->role === 'manager' ? 'Менеджер' : 'Сотрудник')
                }}
            </span>
            <span>{{ $comment->created_at }}</span>
        </div>
    </div>
    <div class="card-body">
        <p class="card-text">{{ $comment->text }}</p>
    </div>
</div>
