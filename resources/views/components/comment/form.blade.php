<form method="POST" action="{{ route('comments.store', $task) }}" class="mt-4">
    @csrf

    <div class="form-group mb-2">
        @method('PUT')

        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="task_id" value="{{ $task->id }}">

        <textarea
            name="text"
            class="form-control @error('text') is-invalid @enderror"
            id="text"
            rows="3"
            placeholder="Ваш комментарий к задаче"
            required>{{ old('text') }}</textarea>

        @error('text')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Отправить</button>
</form>
