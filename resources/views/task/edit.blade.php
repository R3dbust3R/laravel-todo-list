@include('layout.header')


<style>
    .todo-container {
        background-color: #fff;
        position: absolute;
        width: 680px;
        left: calc(50% - 340px);
        padding: 46px;
        border-radius: 12px;
        margin-top: 24px;
    }
    .todo-container .header {
        margin-bottom: 24px;
    }
    .todo-container .header .icon {
        margin-left: 24px;
        position: relative;
        top: 2px;
    }
    .todo-container .footer {
        margin-top: 32px;
    }
    .todo-container .btn {
        display: block;
        padding: 12px 32px;
        background-color: rgba(98, 193, 236, .25);
        color: black;
        text-align: center;
        text-transform: uppercase;
        border-radius: 32px;
        transition: all .25s ease-in-out;
        cursor: pointer;
    }
    .todo-container input {
        display: block;
        padding: 12px 24px;
        font-size: 1rem;
        width: 100%;
        border: 1px solid #eee;
    }
    .todo-container .btn:hover {
        background-color: rgb(98, 193, 236);
    }
</style>

<form action="{{ route('task.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')


    <div class="todo-container">
        <div class="header d-flex">
            <h2>Edit task</h2>
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" height="32px" viewBox="0 -960 960 960" width="32px"><path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/></svg>
            </div>
        </div>
        <div class="task-body">
            <input type="text" placeholder="Task name" value="{{ old('name') ?? $task->name }}" name="name">
        </div>
        <div class="footer">
            <input class="btn" type="submit"name="submit" value="Update">
        </div>
    </div>
</form>






@include('layout.footer')