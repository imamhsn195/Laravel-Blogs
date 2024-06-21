<form action="{{ $action }}" method="POST" style="display:inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger text-red-600 dark:text-red-500 hover:underline">
        {{ $buttonText }}
    </button>
</form>