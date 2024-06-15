@include('layout.header')


<style>
    .todo-container {
        background-color: #fff;
        position: absolute;
        width: 760px;
        left: calc(50% - (760px / 2));
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
    }
    .todo-container .btn svg {
        position: relative;
        top: 4px;
        margin-right: 10px;
    }

    .todo-container .btn:hover {
        background-color: rgb(98, 193, 236);
    }
    .todo-container .no-tasks {
        margin-top: 24px;
        padding: 32px 24px;
        border-radius: 12px;
    }
    .alert {
        position: absolute;
        width: 600px;
        padding: 12px 24px 24px 24px;
        background: #FF5722;
        color: white;
        border-radius: 0 0 10px 10px;
        left: calc(50% - 300px);
        top: 0;
        text-transform: capitalize;
        font-size: 1.2rem;
        transition: all 1s ease-in-out;
    }
    .alert.hide {
        top: -100px;
        opacity: 0;
    }
    .alert svg {
        fill: white;
        position: relative;
        top: 8px;
        margin-right: 24px;
    }
    /* paginator */
    ul.pagination {
        list-style: none;
        display: flex;
        justify-content: center;
        margin-top: 12px;
    }
    ul.pagination li.disabled,
    ul.pagination li.active {
        padding: 12px;
        background-color: #eee;
        cursor: not-allowed;
    }
    ul.pagination li {
        display: block;
        margin: 1px;
        border-radius: 12px;
        overflow: hidden;
    }
    ul.pagination li a {
        display: block;
        padding: 12px 16px;
        background-color: #0b58af;
        color: white;
    }
    /* paginator */
</style>

<div class="todo-container">
    <div class="header d-flex">
        <h2>ToDoList</h2>
        <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" height="32px" viewBox="0 -960 960 960" width="32px"><path d="M655-200 513-342l56-56 85 85 170-170 56 57-225 226Zm0-320L513-662l56-56 85 85 170-170 56 57-225 226ZM80-280v-80h360v80H80Zm0-320v-80h360v80H80Z"/></svg>
        </div>
    </div>
    <div class="task-body">
        @foreach ($tasks as $task)
            <x-task :task="$task"></x-task>
        @endforeach
        @if (count($tasks) == 0)
            <div class="no-tasks text-center">
                <h3>You have no tasks<br>Please add some!</h3>
                <a href="{{ route('task.create') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" height="84px" viewBox="0 -960 960 960" width="84px"><path d="M466.08-300h30.77v-162.92H660v-30.77H496.85V-660h-30.77v166.31H300v30.77h166.08V-300Zm14.32 180q-75.18 0-140.29-28.34-65.12-28.34-114.25-77.42-49.13-49.08-77.49-114.21Q120-405.11 120-480.37q0-74.49 28.34-140.07 28.34-65.57 77.42-114.2 49.08-48.63 114.21-76.99Q405.11-840 480.37-840q74.49 0 140.07 28.34 65.57 28.34 114.2 76.92 48.63 48.58 76.99 114.26Q840-554.81 840-480.4q0 75.18-28.34 140.29-28.34 65.12-76.92 114.07-48.58 48.94-114.26 77.49Q554.81-120 480.4-120Zm.1-30.77q136.88 0 232.81-96.04 95.92-96.04 95.92-233.69 0-136.88-95.73-232.81-95.74-95.92-233.5-95.92-137.15 0-233.19 95.73-96.04 95.74-96.04 233.5 0 137.15 96.04 233.19 96.04 96.04 233.69 96.04ZM480-480Z"/></svg>
                </a>
            </div>
        @endif
        {{ $tasks->links() }}
    </div>
    <div class="footer">
        <a href="{{ route('task.create') }}" class="btn">
            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q65 0 123 19t107 53l-58 59q-38-24-81-37.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160q32 0 62-6t58-17l60 61q-41 20-86 31t-94 11Zm280-80v-120H640v-80h120v-120h80v120h120v80H840v120h-80ZM424-296 254-466l56-56 114 114 400-401 56 56-456 457Z"/></svg>
            Create new task
        </a>
    </div>
</div>


@session('success')
    <div class="alert">
        <span class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" height="32px" viewBox="0 -960 960 960" width="32px"><path d="M480-80q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-200v-80h320v80H320Zm10-120q-69-41-109.5-110T180-580q0-125 87.5-212.5T480-880q125 0 212.5 87.5T780-580q0 81-40.5 150T630-320H330Zm24-80h252q45-32 69.5-79T700-580q0-92-64-156t-156-64q-92 0-156 64t-64 156q0 54 24.5 101t69.5 79Zm126 0Z"/></svg>
        </span>
        {{ session('success') }}
    </div>
    <script>
        const alertElement = document.querySelector('.alert');
        setTimeout(function() {
            alertElement.classList.add('hide');
        }, 2000);
    </script>
@endsession





@include('layout.footer')