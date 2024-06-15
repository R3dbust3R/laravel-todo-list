@props(['task'])

<style>
    .single-task {
        background-color: #f3f3f3;
        padding: 6px 24px;
        margin-bottom: 4px;
        justify-content: space-between;
    }
    .single-task.done {
        background-color: rgb(2, 184, 75);
    }

    .single-task .done {
        text-decoration: line-through;
    }
    .single-task a svg {transition: all .25s ease-in-out;}
    .single-task a.edit svg { fill: rgb(64, 109, 255) }
    .single-task a.done svg { fill: rgb(2, 184, 75) }
    .single-task a.delete svg { fill: rgb(255, 64, 64) }
    .single-task a:hover svg { fill: black }

    .single-task.done a svg { fill: black; }


</style>

<div class="single-task d-flex {{ $task->done == 1 ? 'done' : '' }}">
    <h4 class="{{ $task->done == 1 ? 'done' : '' }}">{{ $task->name }}</h4>
    <div class="actions">
        <a href="{{ route('task.edit', $task->id) }}" class="edit"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/></svg></a>
        <a href="{{ route('task.done', $task->id) }}" class="done"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q65 0 123 19t107 53l-58 59q-38-24-81-37.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160q133 0 226.5-93.5T800-480q0-18-2-36t-6-35l65-65q11 32 17 66t6 70q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm-56-216L254-466l56-56 114 114 400-401 56 56-456 457Z"/></svg></a>
        <a class="delete" onclick="return confirm('Are you sure that you want to remove {{ $task->name }}?')" href="{{ route('task.destroy', $task->id) }}" class=""><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg></a>
    </div>
</div>