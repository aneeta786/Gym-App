
<form action="{{ route('admin.excercise.assignExercise', $id) }}" method="POST">
    @csrf
    <select name="selected_item" id="item-select">
        @foreach ($exlist as $list)
            <option value="{{ $list->id }}">{{ $list->name }}</option>
        @endforeach
    </select>
    <button type="submit">Submit</button>
</form>
