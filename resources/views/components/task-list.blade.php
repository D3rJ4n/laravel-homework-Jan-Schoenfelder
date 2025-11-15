  <div class="mt-4">
    <!-- Uncompleted Tasks -->

    <div class="bg-white border-2 border-gray-400 rounded-lg shadow-lg p-8 mb-8">
        <div class="flex items-center gap-16 pb-4 border-b-2 border-gray-400 mb-4">
            <div class="flex gap-4">
                <div class="w-16 text-center text-sm font-semibold">Complete</div>
                <div class="w-16 text-center text-sm font-semibold">Delete</div>
            </div>
            <h2 class="flex-1 text-sm font-semibold text-center">Task</h2>
            <div class="w-20 text-center text-sm font-semibold">Priority</div>
        </div>
        

        @if($tasks->where('completed', false)->count()===0)
            <div class="text-center py-8 text-gray-500">
            There are no incomplete tasks, create a new Task.
            </div>
        @else
            @foreach ($tasks->where('completed', false)->where('priority', 'high') as $task)
                 <div class="flex items-center gap-16 py-2 border-t border-gray-300">
                <!-- Checkboxen links -->
                <div class="flex gap-4">
                    <form method="POST" action="/tasks/{{ $task->id }}/complete">
                        @csrf
                        <button class="w-5 h-5 border-2 border-gray-600 bg-white hover:bg-green-100" type="submit"></button>
                    </form>
                    <form method="POST" action="/tasks/{{ $task->id }}">
                        @method('DELETE')
                        @csrf
                        <button class="w-5 h-5 border-2 border-gray-600 bg-white hover:bg-red-100 ml-16" type="submit">✗</button>
                    </form>
                </div>
                
                <!-- Task Text rechts -->
                <div class="flex-1 text-center">
                    <span class="text-gray-800">{{ $task->text }}</span>
                </div>
                
             <!-- Priority ganz rechts -->
    <div class="w-20 text-center">
        <span class="text-xs font-semibold {{ $task->priority === 'high' ? 'text-red-600' : ($task->priority === 'medium' ? 'text-yellow-600' : 'text-gray-600') }}">
            {{ strtoupper($task->priority) }}
        </span>
    </div>
</div>
        @endforeach
            @foreach ($tasks->where('completed', false)->where('priority', 'medium') as $task)
                  <div class="flex items-center gap-16 py-2 border-t border-gray-300">
                <!-- Checkboxen links -->
                <div class="flex gap-4">
                    <form method="POST" action="/tasks/{{ $task->id }}/complete">
                        @csrf
                        <button class="w-5 h-5 border-2 border-gray-600 bg-white hover:bg-green-100" type="submit"></button>
                    </form>
                    <form method="POST" action="/tasks/{{ $task->id }}">
                        @method('DELETE')
                        @csrf
                        <button class="w-5 h-5 border-2 border-gray-600 bg-white hover:bg-red-100 ml-16" type="submit">✗</button>
                    </form>
                </div>
                
                <!-- Task Text rechts -->
                <div class="flex-1 text-center">
                    <span class="text-gray-800">{{ $task->text }}</span>
                </div>
            <div class="w-20 text-center">
        <span class="text-xs font-semibold {{ $task->priority === 'high' ? 'text-red-600' : ($task->priority === 'medium' ? 'text-yellow-600' : 'text-gray-600') }}">
            {{ strtoupper($task->priority) }}
        </span>
    </div>
</div>
            @endforeach
        @foreach ($tasks->where('completed', false)->where('priority', 'low') as $task)
                  <div class="flex items-center gap-16 py-2 border-t border-gray-300">
                <!-- Checkboxen links -->
                <div class="flex gap-4">
                    <form method="POST" action="/tasks/{{ $task->id }}/complete">
                        @csrf
                        <button class="w-5 h-5 border-2 border-gray-600 bg-white hover:bg-green-100" type="submit"></button>
                    </form>
                    <form method="POST" action="/tasks/{{ $task->id }}">
                        @method('DELETE')
                        @csrf
                        <button class="w-5 h-5 border-2 border-gray-600 bg-white hover:bg-red-100 ml-16" type="submit">✗</button>
                    </form>
                </div>
                
                <!-- Task Text rechts -->
                <div class="flex-1 text-center">
                    <span class="text-gray-800">{{ $task->text }}</span>
                </div>
            <div class="w-20 text-center">
        <span class="text-xs font-semibold {{ $task->priority === 'high' ? 'text-red-600' : ($task->priority === 'medium' ? 'text-yellow-600' : 'text-gray-600') }}">
            {{ strtoupper($task->priority) }}
        </span>
    </div>
</div>
            @endforeach
        @endif
    </div>
    <!-- Completed Tasks -->
    @if($tasks->where('completed', true)->count() > 0)
        <div class="bg-green-50 border-2 border-green-400 rounded-lg shadow-lg p-8">
            <h3 class="text-lg font-bold mb-4 text-green-800">Completed Tasks</h3>
            
            <div class="flex items-center gap-16 pb-4 border-b-2 border-green-400 mb-4">
                <div class="flex gap-4">
                <div class="w-16 text-center text-sm font-semibold">Uncomplete</div>
                <div class="w-16 text-center text-sm font-semibold">Delete</div>
            </div>
            <h2 class="flex-1 text-sm font-semibold text-center mr-36">Task</h2>
        </div>
            
            @foreach ($tasks->where('completed', true) as $task)
                <div class="flex items-center gap-16 py-2 border-t border-gray-300">
                    <!-- Checkboxen links -->
                    <div class="flex gap-6">
                        <form method="POST" action="/tasks/{{ $task->id }}/complete">
                            @csrf
                            <button class="w-5 h-5 border-2 border-gray-600 bg-green-500 hover:bg-green-600" type="submit"></button>
                        </form>
                        <form method="POST" action="/tasks/{{ $task->id }}">
                            @method('DELETE')
                            @csrf
                            <button class="w-5 h-5 border-2 border-gray-600 bg-white hover:bg-red-100 ml-16" type="submit">✗</button>
                        </form>
                    </div>
                    
                    <!-- Task Text rechts -->
                    <div class="flex-1 text-center">
                        <span class="text-gray-800 line-through mr-36">{{ $task->text }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
   
                            <!-- 2nd Option -->


<!-- <div class="mt-4">
    <h2 class="text-xl font-bold text-center mb-8">Tasks</h2>
    <div class="bg-amber-100 border-4 border-amber-800 rounded-xl p-8 shadow-xl">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
            @foreach ($tasks as $task)
                <div class="bg-yellow-200 p-4 rounded-lg shadow-lg transform rotate-2 hover:rotate-0 transition-all duration-300 border-l-4 border-l-yellow-500">
                    <div class="mb-3">
                        <span class="text-gray-800 font-medium {{ $task->completed ? 'line-through' : '' }}">{{ $task->text }}</span>
                    </div>
                    <div class="flex gap-2 mt-4">
                        <form method="POST" action="/tasks/{{ $task->id }}/complete">
                            @csrf
                            <button class="bg-green-500 text-white px-2 py-1 text-xs rounded shadow hover:bg-green-600" type="submit">✓ Complete</button>
                        </form>
                        <form method="POST" action="/tasks/{{ $task->id }}">
                            @method('DELETE')
                            @csrf
                            <button class="bg-red-500 text-white px-2 py-1 text-xs rounded shadow hover:bg-red-600" type="submit">✗ Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div> -->