<form
    class="d-inline"
    onsubmit="return confirm('Confermi di voler eliminare: {{$comic->title}} ')"
    action="{{ route('comics.destroy', $id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" href="#"><i class="fa-solid fa-trash"></i></button>
</form>
